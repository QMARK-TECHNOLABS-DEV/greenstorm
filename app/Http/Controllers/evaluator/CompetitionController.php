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
  public function index($competitionId = null)
{
    dd('Competition Page Loaded'); // Debugging

    if (!$competitionId) {
        return redirect()->route('evaluator.dashboard')->with('error', 'Competition ID is required.');
    }

    $competition = Competition::with(['stages', 'categories'])->find($competitionId);

    if (!$competition) {
        return redirect()->route('evaluator.dashboard')->with('error', 'Competition not found.');
    }

    $stage = $competition->stages->first();

    return view('evaluator.competition.settings', compact('competition', 'stage'));
}


    public function getCategories($id)
    {
        $competition = Competition::findOrFail($id);
        $categories = $competition->categories;
        $available_categories = PhotoCategory::get();
        
        $htmlOptions = '';
        foreach ($available_categories as $category) {
            $selected = in_array($category->id, $categories->pluck('id')->toArray()) ? 'selected' : '';
            $htmlOptions .= "<option value='{$category->id}' {$selected}>{$category->title}</option>";
        }

        return response()->json(['categories' => $categories, 'optionsHtml' => $htmlOptions], 200);
    }

    public function image_details(Photograph $photo, Request $request)
    {
        $photo_action = [];
        $stage = Stage::find($request->stage);

        if ($stage && $stage->type === 'elimination') {
            $elimination = Elimination::where([
                'stage_id' => $request->stage,
                'reviewer_id' => Auth::id(),
                'photo_id' => $photo->id,
            ])->first();
            $photo_action = optional($elimination)->eliminate;
        } elseif ($stage && $stage->type === 'validation') {
            $validation = Validation::where([
                'stage_id' => $request->stage,
                'reviewer_id' => Auth::id(),
                'photo_id' => $photo->id,
            ])->first();
            $photo_action = optional($validation)->grade;
        }

        $photoData = $photo->only(['id', 'captured_location', 'description', 'device', 'month', 'photo_category', 'photo_unique_id', 'year']);
        $photoData['photocategory'] = $photo->photocategory;

        if (!$photoData) {
            return response()->json(['error' => 'Photo not found'], 404);
        }

        $html = view('evaluator.competition.photo-popup-details', compact('photoData', 'photo_action', 'stage', 'photo'))->render();

        return response()->json(['html' => $html], 200);
    }

    public function image_slide_details(Request $request)
    {
        $photo_action = [];
        $stage = Stage::find($request->stage);

        if ($stage && $stage->type === 'elimination') {
            $elimination = Elimination::where([
                'stage_id' => $request->stage,
                'reviewer_id' => Auth::id(),
                'photo_id' => $request->photo_id,
            ])->first();
            $photo_action = optional($elimination)->eliminate;
        } elseif ($stage && $stage->type === 'validation') {
            $currentRecord = Validation::where([
                'stage_id' => $request->stage,
                'reviewer_id' => Auth::id(),
                'photo_id' => $request->photo_id,
            ])->first();

            $query = Validation::where('reviewer_id', Auth::id());

            if ($request->has('category')) {
                $query->whereHas('photograph', function ($q) use ($request) {
                    $q->where('photo_category', $request->category);
                });
            }

            if ($request->slide === 'next') {
                $validation = $query->where('id', '>', optional($currentRecord)->id)->orderBy('id')->first();
            } else {
                $validation = $query->where('id', '<', optional($currentRecord)->id)->orderBy('id', 'desc')->first();
            }

            $photo_action = optional($validation)->grade;
        }

        if (!$validation) {
            return response()->json(['error' => 'No more photos available'], 404);
        }

        $photo = Photograph::find($validation->photo_id);
        $photoData = $photo->only(['id', 'image', 'captured_location', 'description', 'device', 'month', 'photo_category', 'photo_unique_id', 'year']);
        $photoData['photocategory'] = $photo->photocategory;

        if (!$photoData) {
            return response()->json(['error' => 'Photo not found'], 404);
        }

        $html = view('evaluator.competition.photo-popup-details', compact('photoData', 'photo_action', 'stage', 'photo'))->render();

        return response()->json(['html' => $html, 'photo_id' => $validation->photo_id, 'image' => $photo->image], 200);
    }
public function getPhotos($competitionId)
{
    $competition = Competition::with('photographs')->find($competitionId);

    if (!$competition) {
        return response()->json(['error' => 'Competition not found'], 404);
    }

    return response()->json($competition->photographs);
}

public function eliminatePhoto(Request $request, $photoId)
{
    $photo = Photograph::find($photoId);

    if (!$photo) {
        return response()->json(['error' => 'Photo not found'], 404);
    }

    $photo->delete();

    return response()->json(['message' => 'Photo eliminated successfully']);
}

    public function assign_mark_photos(Request $request)
    {
        $validation = Validation::where([
            'reviewer_id' => Auth::id(),
            'stage_id' => $request->stage_id,
            'photo_id' => $request->photo_id,
        ])->firstOrFail();

        $validation->grade = (int) ($request->mark ?? 0);
        $validation->save();

        return response()->json(['message' => 'Success.'], 200);
    }
}
