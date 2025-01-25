<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\User;
use App\Models\PhotoCategory;
use App\Models\Photograph;
use App\Models\Validation;
use App\Models\Stage;
use App\DataTables\CompetitionsDataTable;
class CompetitionController extends Controller
{
    public function index(CompetitionsDataTable $dataTable)
    {
        $photo_categories = PhotoCategory::get();
        return $dataTable->render('admin.competitions.index',compact('photo_categories'));
    }
    public function getCategories($id)
    {
        $competition = Competition::find($id);
        if (!$competition) {
            return response()->json(['error' => 'Competition not found'], 404);
        }
        $categories = $competition->categories;
        $available_categories = PhotoCategory::get();
        $htmlOptions = '';
        foreach($available_categories as $category){
            if(in_array($category->id, $categories->pluck('id')->toArray())){
                $htmlOptions .= '<option value="'.$category->id.'" selected>'.$category->title.'</option>';
            }else{
                $htmlOptions .= '<option value="'.$category->id.'">'.$category->title.'</option>';
            }
        }
        return response()->json(['categories' => $categories,'optionsHtml' => $htmlOptions], 200);
    }
    public function saveCategories(Request $request)
    {
        $competitionId = $request->input('competition_id');
        $selectedCategoryIds = $request->input('category_ids');

        $competition = Competition::find($competitionId);

        if (!$competition) {
            return response()->json(['error' => 'Competition not found'], 404);
        }
        // Sync the selected categories for the competition
        $competition->categories()->sync($selectedCategoryIds);
        return response()->json(['message' => 'Categories saved successfully'], 200);
    }
    public function change_competitions_status(Request $request) {
        $competition = Competition::where('id',$request->id)->first();
        $competition->status = ($competition->status == 'active') ? 'inactive': 'active' ;
        $competition->save();
        return response()->json(['message' => 'Competition status updated successfully'], 200);
    }
    public function manage_stages(Competition $competition) {
        $judges_juries = User::select('id','name', 'role', 'email')->whereIn('role',['judge', 'jury'])->get();
        return view('admin.competitions.levels',compact('competition','judges_juries'));
    }
    public function edit_stage($competitionId, $stageId)
    {
        $competition = Competition::findOrFail($competitionId);
        $stage = Stage::findOrFail($stageId);
        $judges_juries = User::select('id','name', 'role', 'email')->whereIn('role',['judge', 'jury'])->get();
        // return view('admin.competitions.edit_stage', compact('competition', 'stage','judges_juries'));
        $html = view('admin.competitions.stage.edit', compact('competition', 'stage','judges_juries'))->render();
        return response()->json(['html'=>$html], 200);
    }

    public function create(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer',
            'period' => 'required|string|max:255',
            'category_ids' => 'required|array',
            'category_ids.*' => 'exists:photo_categories,id',
        ]);

        $competition = new Competition();
        $competition->title = $request->input('title');
        $competition->year = $request->input('year');
        $competition->period = $request->input('period');
        $competition->status = "Inactive";
        $competition->save();
        $selectedCategoryIds = $request->input('category_ids');
        $competition->categories()->attach($selectedCategoryIds);
        return response()->json(['message' => 'Competition created successfully.']);
    }
    public function image_details(Photograph $photo, Request $request)
    {
         try {
            $stage = Stage::where('id', $request->stage)->first();
            $photo_validation_data  = Validation::where('stage_id', $request->stage)
                            ->where('photo_id', $photo->id)
                            ->get();
            $photoData  = Photograph::with('photocategory','user')->where('id',$photo->id)->first();
            if (!$photoData) {
                return response()->json(['error' => 'Photo not found'], 404);
            }
            $html = view('admin.competitions.photo-popup-details', compact('photoData','photo_validation_data'))->render();
            return response()->json(['html' => $html], 200);
        } catch (\Exception $e) {
            // dd($e->getMessage());
            \Log::error($e->getMessage());
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }
}
