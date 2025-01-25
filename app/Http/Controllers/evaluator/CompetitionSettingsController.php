<?php

namespace App\Http\Controllers\evaluator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\Stage;
use App\Models\Photograph;
use App\Models\PhotoCategory;
use App\Models\User;

class CompetitionSettingsController extends Controller
{   public $photo_limit;
    public function __construct()
    {
        $this->photo_limit = 24;
    }
    public function index(Competition $competition, Request $request)
    {
        $page = request()->page ?? 1;
        $page = !filled($page) ? 1 : $page;
        $perPage = $this->photo_limit;
        $offset = ($page - 1) * $perPage;
        $action = $request->input('action');
        $userId = auth()->guard('evaluator')->id();
        $stage  =  Stage::whereHas('judges_juries', function ($query) use ($userId) {
                        $query->where('users.id', $userId);
                    })
                    ->where('status', true)
                    ->where('competition_id', $competition->id)
                    ->latest()
                    ->first();
        if (request()->ajax()) {
            if($stage->type== 'elimination') {
                $all_photos = $stage
                            ->photosForReviewer($perPage,$page);
                $total_photo_count = count($all_photos) > 0
                ? $all_photos->count() * $page . '/'. $all_photos->total()
                : 0;
                $html = view('evaluator.competition.photos-loop', compact('all_photos'))->render();
                $has_more = $all_photos->hasMorePages();
                return response()->json(['html' => $html, 'has_more' => $has_more,'total_photo_count'=>$total_photo_count]);
            }elseif($stage->type== 'validation') {
                $action = $request->input('action');
                $all_photos = $stage
                            ->photosForReviewerInValidation(false)
                            ->when($request->has('category'), function ($query) use ($request) {
                                return $query->filterByCategory($request->category);
                            })
                            ->when($action === 'pending', function ($query) {
                                return $query->where('validation.grade', '=', 0);
                            })
                            ->when($action === 'taken', function ($query) {
                                return $query->where('validation.grade', '>', 0);
                            })
                            ->offset($offset)
                            ->limit($perPage)
                            ->paginate($perPage);
                $total_photo_count = 0;
                if (count($all_photos) > 0) {
                    if ($page * $perPage > $all_photos->total()) {
                        $total_photo_count = $all_photos->total() . '/' . $all_photos->total();
                    } else {
                        $total_photo_count = count($all_photos) * $page . '/' . $all_photos->total();
                    }
                }
                $has_more = $all_photos->hasMorePages();
                $html = view('evaluator.competition.validation.photo-loop', compact('all_photos'))->render();
                return response()->json(['html' => $html, 'has_more' => $has_more,'total_photo_count'=>$total_photo_count]);

            }
        }
        if ($stage) {
            if($stage->type== 'elimination') {
                $all_photos = $stage
                            ->photosForReviewer($perPage,1);
                            // ->paginate($perPage);
            }elseif($stage->type== 'validation') {
                $firstCategory = $competition->categories()->first();
                if ($firstCategory) {
                    if (!$request->has('category')){
                        return redirect()->route('evaluator.competition.manage.settings', ['competition'=>$competition,'category' => $firstCategory->id]);
                    }
                }

                $all_photos = $stage
                            ->photosForReviewerInValidation(false)
                            ->when($request->has('category'), function ($query) use ($request) {
                                return $query->filterByCategory($request->category);
                            })
                            ->when($action === 'pending', function ($query) {
                                return $query->where('validation.grade', '=', 0);
                            })
                            ->when($action === 'taken', function ($query) {
                                return $query->where('validation.grade', '>', 0);
                            })
                            // ->with('averageScore')->get();
                            ->paginate($perPage);
            }
        } else {
            $all_photos = collect(); // Create an empty collection if $stage doesn't exist
        }
        $photo_categories   = $competition->categories;
        $total_photo_count = count($all_photos) > 0
                                ? $all_photos->count() * $page . '/'. $all_photos->total()
                                : 0;
        $eliminated_photos = $stage ? $stage->eliminatedPhotosForReviewer($this->photo_limit,1) : 0;
        $total_eliminated_photo_count = ($eliminated_photos && (count($eliminated_photos) > 0))
                                        ?  $eliminated_photos->total()
                                        : 0;

        $promoted_photos = $stage ? $stage->promotedPhotosForReviewer($this->photo_limit,1) : 0;
        $total_promoted_photo_count = ($promoted_photos && (count($promoted_photos) > 0))
                                        ?  $promoted_photos->total()
                                        : 0;


        $params = [
            'main_tab' => (isset($stage) && $stage->type) ?? '',
            'sub_tab' => (isset($stage) && $stage->type == 'elimination') ? 'all_elimination_entries' : '',
            'elimination_tab' => '',
            'validation_tab' =>  '',
            'competition_id' => $competition->id,
            'stage_id' => (isset($stage) && $stage->id) ? $stage->id : ''
        ];
        return view('evaluator.competition.settings',compact('competition','all_photos','photo_categories', 'stage','params','total_photo_count','total_eliminated_photo_count','total_promoted_photo_count'));
    }

    public function eliminated(Competition $competition, Stage $stage, Request $request)
    {
        $page = $request->page ?? 1;
        $page = !filled($page) ? 1 : $page;
        $perPage = $this->photo_limit;
        $offset = ($page - 1) * $perPage;
        $filter_category = $request->filter_category ?? null;

        $userId = auth()->guard('evaluator')->id();
        $stage  =  Stage::whereHas('judges_juries', function ($query) use ($userId) {
                        $query->where('users.id', $userId);
                    })
                    ->where('status', true)
                    ->where('competition_id', $competition->id)
                    ->latest()
                    ->first();
        if (request()->ajax()) {
            $all_photos = $stage->eliminatedPhotosForReviewer($perPage,$page);
            // dd($all_photos);
            $total_photo_count = count($all_photos) > 0
            ? $all_photos->count() * $page . '/'. $all_photos->total()
            : 0;
            $html = view('evaluator.competition.photos-loop', compact('all_photos'))->render();
            $has_more = $all_photos->hasMorePages();
            return response()->json(['html' => $html, 'has_more' => $has_more,'total_photo_count'=>$total_photo_count]);
        }
        $photos = $stage->photosForReviewer($this->photo_limit,1);
        $total_photo_count = count($photos) > 0
                                ?  $photos->total()
                                : 0;

        $all_photos = $stage->eliminatedPhotosForReviewer($this->photo_limit,1);
        $total_eliminated_photo_count = count($all_photos) > 0
                                        ?  $all_photos->total()
                                        : 0;

        $promoted_photos = $stage->promotedPhotosForReviewer($this->photo_limit,1);
        $total_promoted_photo_count = count($promoted_photos) > 0
                                        ?  $promoted_photos->total()
                                        : 0;

        $photo_categories   = $competition->categories();

        return view('evaluator.competition.elimination.eliminated', compact('competition', 'stage', 'all_photos','photo_categories','total_photo_count','total_eliminated_photo_count' , 'total_promoted_photo_count'));
    }


    public function promoted(Competition $competition, Stage $stage, Request $request)
    {
        $page = $request->page ?? 1;
        $page = !filled($page) ? 1 : $page;
        $perPage = $this->photo_limit;
        $offset = ($page - 1) * $perPage;
        $filter_category = $request->filter_category ?? null;

        $userId = auth()->guard('evaluator')->id();
        $stage  =  Stage::whereHas('judges_juries', function ($query) use ($userId) {
                        $query->where('users.id', $userId);
                    })
                    ->where('status', true)
                    ->where('competition_id', $competition->id)
                    ->latest()
                    ->first();
        if (request()->ajax()) {
            $all_photos = $stage->promotedPhotosForReviewer($perPage,$page);
            $total_photo_count = count($all_photos) > 0
            ? $all_photos->count() * $page . '/'. $all_photos->total()
            : 0;
            $html = view('evaluator.competition.photos-loop', compact('all_photos'))->render();
            $has_more = $all_photos->hasMorePages();
            return response()->json(['html' => $html, 'has_more' => $has_more,'total_photo_count'=>$total_photo_count]);
        }
        $photos = $stage->photosForReviewer($this->photo_limit,1);
        $total_photo_count = count($photos) > 0
                                ?  $photos->total()
                                : 0;

        $eliminated_photos = $stage->eliminatedPhotosForReviewer($this->photo_limit,1);
        $total_eliminated_photo_count = count($eliminated_photos) > 0
                                        ?  $eliminated_photos->total()
                                        : 0;

        $all_photos = $stage->promotedPhotosForReviewer($this->photo_limit,1);
        $total_promoted_photo_count = count($all_photos) > 0
                                        ?  $all_photos->total()
                                        : 0;

        $photo_categories   = $competition->categories();
        return view('evaluator.competition.elimination.promoted',compact('competition', 'stage', 'all_photos','photo_categories','total_photo_count','total_eliminated_photo_count' , 'total_promoted_photo_count'));
    }
    public function ajax_page_action(Request $request)
    {
        $main_tab       = $request->main_tab;
        $sub_tab        = $request->sub_tab;
        $elimination_tab= $request->elimination_tab;
        $validation_tab = $request->validation_tab;
        $competition_id = $request->competition_id;
        $stage_id       = $request->stage_id;
        $html           = '';
        if(in_array($main_tab,['screening', 'elimination','validation','stages','votes','public'])){
            $params = [
                        'main_tab' => $main_tab,
                        'sub_tab' => $sub_tab,
                        'elimination_tab' => $elimination_tab ?? '',
                        'validation_tab' => $validation_tab ?? '',
                        'competition_id' => $competition_id,
                        'stage_id' => $stage_id
                    ];
            $html = $this->renderSubTabBasedHTML( $params);
        }
        return response()->json($html);
    }
    public function delete_competition_photos(Request $request)
    {
        $photo_ids = $request->photo_ids;
        Photograph::whereIn('id',$photo_ids)->delete();
    }
    public function renderSubTabBasedHTML($params)
    {
        $main_tab = $params['main_tab'];
        $sub_tab = $params['sub_tab'];
        $elimination_tab    = $params['elimination_tab'];
        $validation_tab     = $params['validation_tab'];
        $competition_id     = $params['competition_id'];
        $stage_id           = $params['stage_id'];

        $html = '';
        $sub_nav = '';
        $navigation = $main_tab;
        if($main_tab == 'elimination')
        {
            if($elimination_tab == "false"){
                    $activeEliminationStage = Stage::where('type', 'elimination')
                                                    ->where('status', true)
                                                    ->where('competition_id', $competition_id)
                                                    ->latest()
                                                    ->first();
            }else{
                    $activeEliminationStage = Stage::where('type', 'elimination')
                                                    ->where('competition_id', $competition_id)
                                                    ->where('id',$elimination_tab)
                                                    ->first();
            }
            if($sub_tab == 'eliminated_entries'){
                $all_photos = $activeEliminationStage ? $activeEliminationStage->eliminatedPhotosForReviewer : [];
            }else if($sub_tab == 'promoted_entries'){
                $all_photos = $activeEliminationStage ? $activeEliminationStage->acceptedPhotosForReviewer : [];
            }else{
                $all_photos = $activeEliminationStage ? $activeEliminationStage->photosForReviewer($this->photo_limit,1) : [];
            }

            $html = view('evaluator.competition.elimination.index',compact('all_photos','params'))->render();

        }
        else if($main_tab == 'validation')
        {
            if($sub_tab == 'validated')
            {
                $html = view('evaluator.competition.validation.validated')->render();
            }
            else
            {
                $html = view('evaluator.competition.validation.index')->render();
            }
        }else if($main_tab == 'stages')
        {
            $competition = Competition::findOrFail(1);
            $judges_juries = User::select('id','name', 'role', 'email')->whereIn('role',['judge', 'jury'])->get();
            $html = view('evaluator.competition.stage.index',compact('competition','judges_juries'))->render();
        }
        else if($main_tab == 'votes')
        {
            $html = view('evaluator.competition.votes.index')->render();
        }
        $sub_nav = view('evaluator.competition.sub-nav',compact('navigation'))->render();
        return ['html' => $html, 'sub_nav' => $sub_nav];
    }
}
