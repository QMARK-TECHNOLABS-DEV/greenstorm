<?php

namespace App\Http\Controllers\evaluator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\User;
use App\Models\PhotoCategory;
use App\Models\Photograph;
use App\Models\Validation;
use App\Models\Elimination;
use App\Models\Stage;
use App\DataTables\CompetitionsDataTable;
use Auth;
class CompetitionController extends Controller
{
    public function index(CompetitionsDataTable $dataTable)
    {
        $photo_categories = PhotoCategory::get();
        return $dataTable->render('evaluator.competition.index',compact('photo_categories'));
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
     public function image_details(Photograph $photo, Request $request)
    {
        //  try {
            $photo_action = [];
            $stage = Stage::where('id',$request->stage)->first();
            if(isset($stage) && $stage->type == 'elimination'){
                $elimination = Elimination::where('stage_id', $request->stage)
                            ->where('reviewer_id', Auth::user()->id)
                            ->where('photo_id', $photo->id)
                            ->first();
                $photo_action = $elimination->eliminate;
            }elseif(isset($stage) && $stage->type == 'validation'){
                $validation = Validation::where('stage_id', $request->stage)
                            ->where('reviewer_id', Auth::user()->id)
                            ->where('photo_id', $photo->id)
                            ->first();
                // dd($validation);
                $photo_action = $validation->grade;
            }
            $photoData = Photograph::select('id', 'captured_location', 'description', 'device', 'month', 'photo_category', 'photo_unique_id', 'year')->with('photocategory')->where('id', $photo->id)->first();
            // $photoData = $photo->select('id', 'captured_location', 'description', 'device', 'month', 'photo_category', 'photo_unique_id', 'year')->with('photocategory')->first();

            if (!$photoData) {
                return response()->json(['error' => 'Photo not found'], 404);
            }
            $html = view('evaluator.competition.photo-popup-details', compact('photoData','photo_action','stage', 'photo'))->render();

            return response()->json(['html' => $html], 200);
        // } catch (\Exception $e) {
        //     \Log::error($e->getMessage());
        //     return response()->json(['error' => 'An error occurred'], 500);
        // }
    }
    public function image_slide_details(Request $request)
    {
            $photo_action = [];
            $stage = Stage::where('id',$request->stage)->first();
            if(isset($stage) && $stage->type == 'elimination'){
                $elimination = Elimination::where('stage_id', $request->stage)
                            ->where('reviewer_id', Auth::user()->id)
                            ->where('photo_id', $request->photo_id)
                            ->first();
                $photo_action = $elimination->eliminate;
            }elseif(isset($stage) && $stage->type == 'validation'){
                $currentRecord = Validation::where('stage_id', $request->stage)
                            ->where('reviewer_id', Auth::user()->id)
                            ->where('photo_id', $request->photo_id)
                            ->first();
                $categoryFilter = function ($query) use ($request) {
                    if ($request->has('category')) {
                        $query->where('photographs.photo_category', $request->category); // Assuming the category ID is in the 'id' column
                    }
                };
                if($request->slide == 'next'){
                   $validation = Validation::where('id', '>', $currentRecord->id)
                            ->where('reviewer_id', Auth::user()->id)
                            ->whereHas('photograph', $categoryFilter) // Apply category filter
                            ->orderBy('id')
                            ->first();
                }else{
                    $validation = Validation::where('id', '<', $currentRecord->id)
                                                ->where('reviewer_id', Auth::user()->id)
                                                ->whereHas('photograph', $categoryFilter) // Apply category filter
                                                ->orderBy('id', 'desc')
                                                ->first();
                }

                $photo_action = $validation->grade;
            }
            $photoData = Photograph::select('id','image', 'captured_location', 'description', 'device', 'month', 'photo_category', 'photo_unique_id', 'year')->with('photocategory')->where('id',  $validation->photo_id)->first();
            $photo = Photograph::where('id',  $validation->photo_id)->first();
            if (!$photoData) {
                return response()->json(['error' => 'Photo not found'], 404);
            }
            $html = view('evaluator.competition.photo-popup-details', compact('photoData','photo_action','stage', 'photo'))->render();

            return response()->json(['html' => $html, 'photo_id'=> $validation->photo_id,'image'=>$photo->image], 200);
    }
    public function assign_mark_photos(Request $request)
    {
        // try {
            $validation = Validation::where('reviewer_id', Auth::user()->id)
                                    ->where('stage_id', $request->stage_id)
                                    ->where('photo_id', $request->photo_id)
                                    ->first();
            $validation->grade = (int) ($request->mark ?? 0);
            $validation->save();
            return response()->json(['message' => 'Success.'], 200);
        // } catch (\Exception $e) {
        //     return response()->json(['message' => 'Error fetching photos for stage.'], 500);
        // }
    }
}
