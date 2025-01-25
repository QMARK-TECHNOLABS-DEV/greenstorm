<?php

namespace App\Http\Controllers\evaluator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\StageReview;
use App\Models\Elimination;
use Auth;

class EliminationController extends Controller
{
    public function index(Request $request)
    {
        return view('evaluator.elimination.index');
    }
    public function eliminate_photos(Request $request)
    {
        $photos = $request->input('photos', []);
        $stageId = $request->input('stage_id');
        $reviewerId = Auth::id();
        Elimination::where('stage_id', $stageId)
            ->whereIn('photo_id', $photos)
            ->where('reviewer_id', $reviewerId)
            ->update(['eliminate' => true]);
        $all_elimination_entries_count = Elimination::where('stage_id', $stageId)->where('reviewer_id', $reviewerId)->where('eliminate', null)->count();
        $eliminated_entries_count = Elimination::where('stage_id', $stageId)->where('reviewer_id', $reviewerId)->where('eliminate', 1)->count();
        $promoted_entries_count = Elimination::where('stage_id', $stageId)->where('reviewer_id', $reviewerId)->where('eliminate', 0)->count();
        return response()->json(compact('all_elimination_entries_count','eliminated_entries_count','promoted_entries_count'), 200);

    }
    public function promote_photos(Request $request)
    {
        $photos = $request->input('photos', []);
        $stageId = $request->input('stage_id');
        $reviewerId = Auth::id();
        Elimination::where('stage_id', $stageId)
            ->whereIn('photo_id', $photos)
            ->where('reviewer_id', $reviewerId)
            ->update(['eliminate' => false]);
        $all_elimination_entries_count = Elimination::where('stage_id', $stageId)->where('reviewer_id', $reviewerId)->where('eliminate', null)->count();
        $eliminated_entries_count = Elimination::where('stage_id', $stageId)->where('reviewer_id', $reviewerId)->where('eliminate', 1)->count();
        $promoted_entries_count = Elimination::where('stage_id', $stageId)->where('reviewer_id', $reviewerId)->where('eliminate', 0)->count();
        return response()->json(compact('all_elimination_entries_count','eliminated_entries_count','promoted_entries_count'), 200);
    }
    public function revert_eliminated_photos(Request $request)
    {
        $photos = $request->input('photos', []);
        $stageId = $request->input('stage_id');
        $reviewerId = Auth::id();

        Elimination::where('stage_id', $stageId)
            ->whereIn('photo_id', $photos)
            ->where('reviewer_id', $reviewerId)
            ->update(['eliminate' => null]);
    }
}
