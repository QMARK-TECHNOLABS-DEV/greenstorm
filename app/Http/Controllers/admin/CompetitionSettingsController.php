<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\Stage;
use App\Models\Photograph;
use App\Models\Elimination;
use App\Models\Validation;
use App\Models\PhotoReviewer;
use App\Models\User;
class CompetitionSettingsController extends Controller
{
    public $photo_limit;
    public function __construct()
    {
        $this->photo_limit = 24;
    }
    public function index(Competition $competition, Request $request)
    {
        // if($request->category){
        //     dd($request->category);
        // }
        $perPage = $this->photo_limit;
        $photos = Photograph::where('competition_id', $competition->id)
                                ->with(['user', 'photocategory'])
                                ->latest();
        if ($request->has('category')) {
            $photos->where('photo_category', $request->category);
        }
        $photos             = $photos->paginate($perPage);
        $active_elimination_stage = Stage::where('type', 'elimination')
                                    ->where('status', true)
                                    ->where('competition_id', $competition->id)
                                    ->latest()
                                    ->first();
        $all_photos = $photos->items();
        $total_photo_count = $photos->count() . '/'. $photos->total();
        $judges_juries      = User::select('id','name', 'role', 'email')->whereIn('role',['judge', 'jury'])->get();
        $photo_categories   = $competition->categories;
        $isAllEntriesPage = true;
        return view('admin.competitions.settings',compact('competition','all_photos','photo_categories','judges_juries','total_photo_count','active_elimination_stage','isAllEntriesPage'));
    }
    public function pagination(Competition $competition, Request $request)
    {
        $page = $request->page ?? 1;
        $page = !filled($page) ? 1 : $page;
        $perPage = $this->photo_limit;
        $offset = ($page - 1) * $perPage;
        $filter_category = $request->filter_category ?? null;
        $photos = Photograph::with(['user', 'photocategory'])
                    ->where('competition_id', $competition->id)
                    ->when($filter_category, function ($query, $filter_category) {
                        return $query->where('photo_category', $filter_category);
                    })
                    ->latest()
                    ->offset($offset)
                    ->limit($perPage)
                    ->paginate($perPage);

        // Access the paginated photos and the total count
        $all_photos = $photos->items();
        $total_photo_count = $photos->count() * $page . '/'. $photos->total();

        $photo_categories = $competition->categories();
        $html = view('admin.competitions.screening.index',compact('all_photos','photo_categories'))->render();
        return ['html'=>$html,'total_photo_count'=>$total_photo_count];
    }
    public function elimination_pagination(Competition $competition, Stage $stage, Request $request)
    {

        try {
            $page = request()->page ?? 1;
            $page = !filled($page) ? 1 : $page;
            $perPage = $this->photo_limit;
            $offset = ($page - 1) * $perPage;
            $active_elimination_stage = Stage::where('type', 'elimination')
                                                    // ->where('status', true)
                                                    ->where('id', $stage->id)
                                                    ->where('competition_id', $competition->id)
                                                    ->latest()
                                                    ->first();
            // dd($active_elimination_stage);
            $all_photos = $active_elimination_stage
                            ? $active_elimination_stage->photos()
                                    ->where('eliminate',NULL)
                                    ->when($request->has('category'), function ($query) use ($request) {
                                        return $query->filterByCategory($request->category);
                                    })
                                    ->offset($offset)
                                    ->limit($perPage)
                                    ->paginate($perPage)
                                // ->limit($this->photo_limit)->get()
                            : [];
            $total_photo_count = count($all_photos) > 0
                                ? $all_photos->count() * $page . '/'. $all_photos->total()
                                : 0;
            $total_eliminated_count = $active_elimination_stage->photos()->where('eliminate',1)->count();
            $total_promoted_count = $active_elimination_stage->photos()->where('eliminate',0)->count();


            $stage_levels   =   $competition
                                ? $competition
                                    ->stages()
                                    ->where('type','elimination')
                                    ->get()
                                : false;
            $photo_categories   = $competition->categories;

            $html = view('admin.competitions.screening.index',compact('all_photos'))->render();
            return ['html'=>$html,'total_photo_count'=>$total_photo_count];
        } catch (\Throwable $th) {
            return redirect()->route('competition.manage.settings', ['competition' => $competition])->with('error', 'Sorry! You are trying to access invalid level.');
        }
    }


    public function ajax_page_action(Request $request)
    {
        $main_tab       = $request->main_tab;
        $sub_tab        = $request->sub_tab;
        $load_more        = $request->load_more;
        $filter_category    = $request->filter_category;
        $elimination_tab= $request->elimination_tab;
        $validation_tab = $request->validation_tab;
        $competition_id = $request->competition_id;
        $html           = '';
        if(in_array($main_tab,['screening', 'elimination','validation','stages','votes','public'])){
            $params = [
                        'main_tab' => $main_tab,
                        'sub_tab' => $sub_tab,
                        'load_more' => $load_more,
                        'filter_category' => $filter_category ?? '',
                        'elimination_tab' => $elimination_tab ?? '',
                        'validation_tab' => $validation_tab ?? '',
                        'competition_id' => $competition_id
                    ];
            $html = $this->renderSubTabBasedHTML( $params);
        }
        return response()->json($html);
    }
    public function delete_competition_photos(Request $request)
    {
        $photo_ids = $request->photo_ids;
        Photograph::whereIn('id',$photo_ids)->delete();
        $totalPhotoCount = Photograph::count();
        return response()->json(['total_photo_count' => $totalPhotoCount]);
    }
    public function renderSubTabBasedHTML($params)
    {
        $main_tab           = $params['main_tab'];
        $sub_tab            = $params['sub_tab'];
        $load_more          = $params['load_more'] == 'true' ? true : false;
        $filter_category    = $params['filter_category'] != 'false' ? $params['filter_category'] : '';
        $elimination_tab    = $params['elimination_tab'];
        $validation_tab     = $params['validation_tab'];
        $competition_id     = $params['competition_id'];
        $competition = Competition::with('categories')
                                    ->where('id', $competition_id)
                                    ->first();
        $judges_juries = User::select('id','name', 'role', 'email')->whereIn('role',['judge', 'jury'])->get();
        $html = '';
        $sub_nav = '';
        $all_photos = '';
        $data =[];
        // $total_photo_count = Photograph::getTotalPhotoCountForCompetition($competition_id);
        $total_photo_count = 0;
        $navigation = $main_tab;
        if($main_tab == 'screening'){
            if($sub_tab == 'screening_deleted')
            {
                $all_photos = Photograph::where('competition_id', $competition_id)->latest()->get();
                $trashed_photos = Photograph::where('competition_id', $competition_id)->onlyTrashed()->latest()->get();
                $html = view('admin.competitions.screening.deleted',compact('trashed_photos'))->render();
            }
            else
            {
                $page = request()->page ?? 1;
                $page = !filled($page) ? 1 : $page;
                $perPage = $this->photo_limit;
                $offset = ($page - 1) * $perPage;

                $photos = Photograph::with(['user', 'photocategory'])
                    ->where('competition_id', $competition_id)
                    ->when($filter_category, function ($query, $filter_category) {
                        return $query->where('photo_category', $filter_category);
                    })
                    ->latest()
                    ->offset($offset)
                    ->limit($perPage)
                    ->paginate($perPage);

                // Access the paginated photos and the total count
                $all_photos = $photos->items();
                $total_photo_count = $photos->count() * $page . '/'. $photos->total();

                $photo_categories = $competition->categories();
                $html = view('admin.competitions.screening.index',compact('all_photos','photo_categories','load_more'))->render();
            }
        }
        else if($main_tab == 'elimination')
        {
            $page = request()->page ?? 1;
            $page = !filled($page) ? 1 : $page;
            $perPage = $this->photo_limit;
            $offset = ($page - 1) * $perPage;

            if($elimination_tab == "false"){
                    // Get the active elimination stage
                    $activeEliminationStage = Stage::where('type', 'elimination')
                                                    ->where('status', true)
                                                    ->where('competition_id', $competition_id)
                                                    ->latest()
                                                    ->first();

            }else{
                    $activeEliminationStage = Stage::where('type', 'elimination')
                                                ->where('id',$elimination_tab)
                                                ->first();
            }
            $all_photos = $activeEliminationStage
                            ? $activeEliminationStage->photos()
                                    ->offset($offset)
                                    ->limit($perPage)
                                    ->paginate($perPage)
                                // ->limit($this->photo_limit)->get()
                            : [];
            $total_photo_count = count($all_photos) > 0
                                ? $all_photos->count() * $page . '/'. $all_photos->total()
                                : 0;
            $html = view('admin.competitions.elimination.index',compact('all_photos'))->render();

        }
        else if($main_tab == 'validation')
        {
            if($sub_tab == 'validated')
            {
                $html = view('admin.competitions.validation.validated',compact('competition','judges_juries'))->render();
            }
            else
            {
                $html = view('admin.competitions.validation.index',compact('competition','judges_juries'))->render();
            }
        }else if($main_tab == 'stages')
        {
            $html = view('admin.competitions.stage.index',compact('competition','judges_juries'))->render();
        }
        else if($main_tab == 'votes')
        {
            $html = view('admin.competitions.votes.index')->render();
        }
        if($load_more == false){
            $sub_nav = view('admin.competitions.sub-nav',compact('navigation','all_photos' ,'total_photo_count'))->render();
        }
        return ['html' => $html, 'sub_nav' => $sub_nav, 'all_photos' => $all_photos,'total_photo_count'=>$total_photo_count];
    }
    public function get_popup_photos(Request $request)
    {
        $competition = $request->input('competition');
        $stage      = $request->input('stage');
        $action     = $request->input('action');
        $photo_category = $request->input('photo_category');
        $photo_id     = $request->input('currentPhotoID');
        if ($stage == 'screening') {
            if($action  == 'next'){
                  $photo = Photograph::when($photo_category, function ($query, $photo_category) {
                                        return $query->where('photo_category', $photo_category);
                                    })
                                    ->where('id', '<', $photo_id)
                                    ->with('user','photocategory')
                                    ->orderByDesc('id')->first();
            }else{
                $photo = Photograph::when($photo_category, function ($query, $photo_category) {
                                        return $query->where('photo_category', $photo_category);
                                    })
                                    ->where('id', '>', $photo_id)
                                    ->with('user','photocategory')
                                    ->orderBy('id')->first();
            }

            return response()->json(['photo'=>$photo], 200);
        }
    }
    public function elimination(Competition $competition, Stage $level, Request $request)
    {
        try {
            $page = request()->page ?? 1;
            $page = !filled($page) ? 1 : $page;
            $perPage = $this->photo_limit;
            $offset = ($page - 1) * $perPage;
            $active_elimination_stage = Stage::where('type', 'elimination')
                                                    // ->where('status', true)
                                                    ->where('id', $level->id)
                                                    ->where('competition_id', $competition->id)
                                                    ->latest()
                                                    ->first();
            //ajax action starts here
            if($request->ajax()){
                $all_photos = $active_elimination_stage
                            ? $active_elimination_stage->photos()
                                    ->where('eliminate',NULL)
                                    ->when($request->has('category'), function ($query) use ($request) {
                                        return $query->filterByCategory($request->category);
                                    })
                                    ->when($request->has('evaluator'), function ($query) use ($request) {
                                            $query->where('reviewer_id', $request->evaluator);
                                    })
                                    ->offset($offset)
                                    ->limit($perPage)
                                    ->paginate($perPage)
                            : [];
                // dd($all_photos);
                $hasMorePages = $all_photos->hasMorePages();
                $html = view('admin.competitions.photo-loop', compact('all_photos'))->render();
                // dd($all_photos);
                return response()->json(['html'=>$html,
                                        'hasMorePages'=> $hasMorePages,
                                        'total_photo_count' => $all_photos ? $all_photos->total() : 0,
                                        'message'=>'Success'], 200);
            }
            //ajax ends here
            $all_photos = $active_elimination_stage
                            ? $active_elimination_stage->photos()
                                    ->where('eliminate',NULL)
                                    ->when($request->has('category'), function ($query) use ($request) {
                                        return $query->filterByCategory($request->category);
                                    })
                                    ->when($request->has('evaluator'), function ($query) use ($request) {
                                        $query->where('reviewer_id', $request->evaluator);
                                    })
                                    ->offset($offset)
                                    ->limit($perPage)
                                    ->paginate($perPage)
                                // ->limit($this->photo_limit)->get()
                            : [];
            $total_photo_count = count($all_photos) > 0
                                ? $all_photos->count() * $page . '/'. $all_photos->total()
                                : 0;
            $total_eliminated_count = $active_elimination_stage->photos()->where('eliminate',1)->count();
            $total_promoted_count = $active_elimination_stage->photos()->where('eliminate',0)->count();


            $stage_levels   =   $competition
                                ? $competition
                                    ->stages()
                                    ->where('type','elimination')
                                    ->get()
                                : false;
            $photo_categories   = $competition->categories;
            $stage_evaluators = $active_elimination_stage->judges_juries;
            return view('admin.competitions.elimination.index',compact('competition',
                                                                        'all_photos',
                                                                        'total_photo_count' ,
                                                                        'total_eliminated_count',
                                                                        'total_promoted_count' ,
                                                                        'stage_levels',
                                                                        'active_elimination_stage',
                                                                        'photo_categories',
                                                                        'stage_evaluators',
                                                                        'level'));
        } catch (\Throwable $th) {
            return redirect()->route('competition.manage.settings', ['competition' => $competition])->with('error', 'Sorry! You are trying to access invalid level.');
        }

    }
    public function eliminated(Competition $competition, Stage $level, Request $request)
    {
        $page = request()->page ?? 1;
        $page = !filled($page) ? 1 : $page;
        $perPage = $this->photo_limit;
        $offset = ($page - 1) * $perPage;
        $active_elimination_stage = Stage::where('id',$level->id)->first();
        if($request->ajax()){
            $all_photos = $active_elimination_stage
                        ? $active_elimination_stage->photos()
                                ->where('eliminate',1)
                                ->when($request->has('category'), function ($query) use ($request) {
                                    return $query->filterByCategory($request->category);
                                })
                                ->when($request->has('evaluator'), function ($query) use ($request) {
                                        $query->where('reviewer_id', $request->evaluator);
                                })
                                ->offset($offset)
                                ->limit($perPage)
                                ->paginate($perPage)
                        : [];
            $hasMorePages = $all_photos->hasMorePages();
            $html = view('admin.competitions.photo-loop', compact('all_photos'))->render();
            return response()->json(['html'=>$html,
                                    'hasMorePages'=> $hasMorePages,
                                    'total_photo_count' => $all_photos ? $all_photos->total() : 0,
                                    'message'=>'Success'], 200);
        }
        // $active_elimination_stage = Stage::where('type', 'elimination')
        //                                         ->where('status', true)
        //                                         ->where('competition_id', $competition->id)
        //                                         ->latest()
        //                                         ->first();

        $all_photos = $active_elimination_stage
                        ? $active_elimination_stage->photos()
                                ->where('eliminate',1)
                                ->when($request->has('category'), function ($query) use ($request) {
                                    return $query->filterByCategory($request->category);
                                })
                                ->when($request->has('evaluator'), function ($query) use ($request) {
                                        $query->where('reviewer_id', $request->evaluator);
                                })
                                ->offset($offset)
                                ->limit($perPage)
                                ->paginate($perPage)
                            // ->limit($this->photo_limit)->get()
                        : [];
        $total_photo_count =  $active_elimination_stage
                                ? $active_elimination_stage
                                    ->photos()
                                    ->where('eliminate',null)
                                    ->when($request->has('category'), function ($query) use ($request) {
                                        return $query->filterByCategory($request->category);
                                    })
                                    ->when($request->has('evaluator'), function ($query) use ($request) {
                                        $query->where('reviewer_id', $request->evaluator);
                                    })
                                    ->count()
                                : 0;
        $total_eliminated_count = $active_elimination_stage
                                    ? $active_elimination_stage
                                        ->photos()
                                        ->when($request->has('category'), function ($query) use ($request) {
                                            return $query->filterByCategory($request->category);
                                        })
                                        ->when($request->has('evaluator'), function ($query) use ($request) {
                                            $query->where('reviewer_id', $request->evaluator);
                                        })
                                        ->where('eliminate',1)
                                        ->count()
                                    : 0;
        $total_promoted_count = $active_elimination_stage
                                    ? $active_elimination_stage->photos()
                                        ->when($request->has('category'), function ($query) use ($request) {
                                            return $query->filterByCategory($request->category);
                                        })
                                        ->when($request->has('evaluator'), function ($query) use ($request) {
                                            $query->where('reviewer_id', $request->evaluator);
                                        })
                                        ->where('eliminate',0)
                                        ->count()
                                    : 0;


        $stage_levels   =   $competition
                            ? $competition
                                ->stages()
                                ->where('type','elimination')
                                ->get()
                            : false;
        $stage_evaluators = $active_elimination_stage->judges_juries;
        $photo_categories   = $competition->categories;
        return view('admin.competitions.elimination.index',compact('competition','all_photos', 'total_photo_count' ,'total_eliminated_count','total_promoted_count' ,'stage_levels','active_elimination_stage' ,'photo_categories','stage_evaluators'));
    }
    public function promoted(Competition $competition, Stage $level, Request $request)
    {
        $page = request()->page ?? 1;
        $page = !filled($page) ? 1 : $page;
        $perPage = $this->photo_limit;
        $offset = ($page - 1) * $perPage;
        // $active_elimination_stage = Stage::where('type', 'elimination')
        //                                         ->where('status', true)
        //                                         ->where('competition_id', $competition->id)
        //                                         ->latest()
        //                                         ->first();
        $active_elimination_stage = Stage::where('id',$level->id)->first();
        if($request->ajax()){
            $all_photos = $active_elimination_stage
                        ? $active_elimination_stage->photos()
                                ->where('eliminate',0)
                                ->when($request->has('category'), function ($query) use ($request) {
                                    return $query->filterByCategory($request->category);
                                })
                                ->when($request->has('evaluator'), function ($query) use ($request) {
                                        $query->where('reviewer_id', $request->evaluator);
                                })
                                ->offset($offset)
                                ->limit($perPage)
                                ->paginate($perPage)
                        : [];
            $hasMorePages = $all_photos->hasMorePages();
            $html = view('admin.competitions.photo-loop', compact('all_photos'))->render();
            return response()->json(['html'=>$html,
                                    'hasMorePages'=> $hasMorePages,
                                    'total_photo_count' => $all_photos ? $all_photos->total() : 0,
                                    'message'=>'Success'], 200);
        }
        $all_photos = $active_elimination_stage
                        ? $active_elimination_stage->photos()
                                ->where('eliminate',0)
                                ->when($request->has('category'), function ($query) use ($request) {
                                    return $query->filterByCategory($request->category);
                                })
                                ->when($request->has('evaluator'), function ($query) use ($request) {
                                    $query->where('reviewer_id', $request->evaluator);
                                })
                                ->offset($offset)
                                ->limit($perPage)
                                ->paginate($perPage)
                            // ->limit($this->photo_limit)->get()
                        : [];
        // $total_photo_count = count($all_photos) > 0
        //                     ? $all_photos->count() * $page . '/'. $all_photos->total()
        //                     : 0;
        $total_photo_count =  $active_elimination_stage->photos()
                                                    ->where('eliminate',null)
                                                    ->when($request->has('category'), function ($query) use ($request) {
                                                        return $query->filterByCategory($request->category);
                                                    })
                                                    ->when($request->has('evaluator'), function ($query) use ($request) {
                                                        $query->where('reviewer_id', $request->evaluator);
                                                    })
                                                    ->count();
        $total_eliminated_count = $active_elimination_stage->photos()
                                                    ->when($request->has('category'), function ($query) use ($request) {
                                                        return $query->filterByCategory($request->category);
                                                    })
                                                    ->when($request->has('evaluator'), function ($query) use ($request) {
                                                        $query->where('reviewer_id', $request->evaluator);
                                                    })
                                                    ->where('eliminate',1)
                                                    ->count();
        $total_promoted_count = $active_elimination_stage->photos()
                                                    ->when($request->has('category'), function ($query) use ($request) {
                                                        return $query->filterByCategory($request->category);
                                                    })
                                                    ->when($request->has('evaluator'), function ($query) use ($request) {
                                                        $query->where('reviewer_id', $request->evaluator);
                                                    })
                                                    ->where('eliminate',0)
                                                    ->count();


        $stage_levels   =   $competition
                            ? $competition
                                ->stages()
                                ->where('type','elimination')
                                ->get()
                            : false;
        $photo_categories   = $competition->categories;
        $stage_evaluators = $active_elimination_stage->judges_juries;
        return view('admin.competitions.elimination.index',compact('competition',
                                                                    'all_photos',
                                                                    'total_photo_count' ,
                                                                    'total_eliminated_count',
                                                                    'total_promoted_count' ,
                                                                    'stage_levels',
                                                                    'photo_categories',
                                                                    'stage_evaluators',
                                                                    'active_elimination_stage'));
    }
    public function deleted(Competition $competition)
    {
        $active_elimination_stage = Stage::where('type', 'elimination')
                                                ->where('status', true)
                                                ->where('competition_id', $competition->id)
                                                ->latest()
                                                ->first();
        // $total_photo_count = $active_elimination_stage ? $active_elimination_stage->photos()->count() : 0;
        $total_photo_count = Photograph::where('competition_id', $competition->id)->count();
        // dd($total_photo_count);
        $trashed_photos = Photograph::where('competition_id', $competition->id)->onlyTrashed()->latest()->get();
        return view('admin.competitions.screening.deleted',compact('competition',
                                                                    'trashed_photos',
                                                                    'active_elimination_stage',
                                                                    'total_photo_count'))->render();
    }
    public function validation_index(Competition $competition, Request $request)
    {
       $validation = Stage::where('competition_id', $competition->id)->where('type','validation')->latest()->first();
       if(!$validation){
            return redirect()->route('competition.manage.settings', ['competition' => $competition])->with('error', 'Sorry! Currently we don\'t have validation stage for this competition.');
       }else{
            return redirect()->route('competition.validation.entries', ['competition' => $competition,'level' => $validation->id]);
       }
    }
    public function validation(Competition $competition, Stage $level, Request $request)
    {
        $page = request()->page ?? 1;
        $page = !filled($page) ? 1 : $page;
        $perPage = $this->photo_limit;
        $offset = ($page - 1) * $perPage;
        $sortBy = $request->input('sort');
        $total_photo_count = 0;
        try {
            if ($level->type == 'elimination') {
                return redirect()->route('competition.manage.settings', ['competition' => $competition])->with('error', 'Sorry! You are trying to access invalid level.');
            }
            $stage = Stage::with('judges_juries')->where('id', $level->id)->first();
            $judgesJuriesCount = $stage->judges_juries->count();
            $totalMark = $judgesJuriesCount * 10;
            if($request->ajax()){
                $all_photos = $stage->photos_val()
                ->when($request->has('category'), function ($query) use ($request) {
                    return $query->filterByCategory($request->category);
                })
                ->when($sortBy === 'low', function ($query) {
                    return $query->orderBy(\DB::raw("(SELECT COALESCE(SUM(grade), 0) FROM validation WHERE validation.photo_id = photographs.id)"), 'asc');
                })
                ->when($sortBy === 'high', function ($query) {
                    return $query->orderBy(\DB::raw("(SELECT COALESCE(SUM(grade), 0) FROM validation WHERE validation.photo_id = photographs.id)"), 'desc');
                })
                ->distinct()
                ->with(['validations_admin' => function ($query) {
                    $query->select('photo_id', \DB::raw('COALESCE(SUM(grade), 0) as total_grade'))
                        ->groupBy('photo_id');
                }]);
                $full_photos = $all_photos->get();
                $all_photos = $all_photos->offset($offset)
                                ->limit($perPage)
                                ->paginate($perPage);

                if (count($all_photos) > 0) {
                    if ($page * $perPage > count($full_photos)) {
                        $total_photo_count = count($full_photos) . '/' . count($full_photos);
                    } else {
                        $total_photo_count = count($all_photos) * $page . '/' . count($full_photos);
                    }
                }
                $html =  view('admin.competitions.validation.photo-loop',compact('all_photos', 'stage','totalMark'))->render();
                return response()->json(['html'=>$html ,'total_photo_count' => $total_photo_count], 200);
            }
            $all_photos = $stage->photos_val()
                        ->when($request->has('category'), function ($query) use ($request) {
                            return $query->filterByCategory($request->category);
                            })
                            ->when($sortBy === 'low', function ($query) {
                                return $query->orderBy(\DB::raw("(SELECT COALESCE(SUM(grade), 0) FROM validation WHERE validation.photo_id = photographs.id)"), 'asc');
                            })
                            ->when($sortBy === 'high', function ($query) {
                                return $query->orderBy(\DB::raw("(SELECT COALESCE(SUM(grade), 0) FROM validation WHERE validation.photo_id = photographs.id)"), 'desc');
                            })
                    ->distinct()
                    ->with(['validations_admin' => function ($query) {
                        $query->select('photo_id', \DB::raw('COALESCE(SUM(grade), 0) as total_grade'))
                            ->groupBy('photo_id');
                    }]);
                    $full_photos = $all_photos->get();
                    $all_photos = $all_photos->offset($offset)
                                            ->limit($perPage)
                                            ->paginate($perPage);
            $photo_categories   = $competition->categories;
            $total_photo_count = count($all_photos) > 0
                                        ? $all_photos->count() * $page . '/'. count($full_photos)
                                        : 0;

            return view('admin.competitions.validation.index',compact('competition','all_photos', 'stage' ,'totalMark','photo_categories','total_photo_count'));

        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return redirect()->route('competition.manage.settings', ['competition' => $competition])->with('error', 'Sorry! You are trying to access invalid level.');
        }

    }
}
