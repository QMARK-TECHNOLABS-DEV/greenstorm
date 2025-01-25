<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Competition;
use App\Models\Photograph;
use App\Models\Validation;
use App\Models\Voting;
use App\Models\UserVote;
use Carbon\Carbon;
use DB;

class VoteController extends Controller
{
    public function index(Competition $competition, Request $request)
    {
        $competition_id = $competition->id;
        $lastValidationStage = Stage::where('type', 'validation','judges_juries')
                        ->where('competition_id', $competition_id)
                        ->latest()
                        ->first();
        $judgesJuriesCount = $lastValidationStage->judges_juries->count();
        $totalMark = $judgesJuriesCount * 10;
        $sortBy = $request->input('sort');
        $sortByEvaluator = $request->input('evaluatorSort');
        $votingPhotos = Voting::with([
            'photograph.validations_admin' => function ($query) use ($sortByEvaluator) {
                $query->select('photo_id', \DB::raw('COALESCE(SUM(grade), 0) as total_grade'))
                    ->groupBy('photo_id');
                    // ->when($sortByEvaluator == 'low', function ($query) {
                    //     $query->orderBy('total_grade', 'asc');
                    // })
                    // ->when($sortByEvaluator == 'high', function ($query) {
                    //     $query->orderBy('total_grade', 'desc');
                    // });
            },
            'photograph' => function ($query) {
                $query->withCount('userVotes as user_votes_count');
            },
        ])
        ->where('competition_id', $competition_id)
        ->get()
        ->filter(function ($vote) {
            return !is_null($vote->photograph);
        })
        ->when($sortBy == 'high', function ($collection) {
            return $collection->sortByDesc('photograph.user_votes_count');
        })
        ->when($sortBy == 'low', function ($collection) {
            return $collection->sortBy('photograph.user_votes_count');
        });
        $stage = $lastValidationStage;
        return view('admin.competitions.votes.index', compact('votingPhotos', 'competition','totalMark','stage'));
    }
}
