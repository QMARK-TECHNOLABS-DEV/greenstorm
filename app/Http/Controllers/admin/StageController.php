<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Competition;
use App\Models\Photograph;
use App\Models\Elimination;
use App\Models\Validation;
use App\Models\User;
use App\Models\Voting;
use App\DataTables\StagesDataTable;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use DB;
class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function stages(Competition $competition)
    {
        $stageValidationExistCheck = Stage::where('type', 'validation')
            ->where('competition_id', $competition->id)
            ->get()->count() > 0 ? true : false;


        $lastValidationStage = Stage::where('type', 'validation')
                        ->where('competition_id', $competition->id)
                        ->latest()
                        ->first();

        if ($lastValidationStage && $lastValidationStage->type === 'validation') {
            $photosNotVoted = $lastValidationStage->photos_val()
                ->whereDoesntHave('voting', function ($query) {
                    $query->whereRaw('voting.photo_id = photographs.id');
                })
                ->distinct()
                ->get();
        } else {
            $photosNotVoted = collect();
        }
        $votingPhotos = Voting::with('photograph')->where('competition_id', $competition->id)->get();
        return view('admin.competitions.stage.index',compact('competition','stageValidationExistCheck','photosNotVoted','votingPhotos'));
    }

    public function send_to_vote(Request $request)
    {
        $photoIds = $request->input('photo_ids', []);
        $competitionId = $request->input('competition_id');
        $existingVotes = Voting::where('competition_id', $competitionId)
                            ->whereIn('photo_id', $photoIds)
                            ->get(['photo_id']);

        $existingPhotoIds = $existingVotes->pluck('photo_id')->all();

        $newVotes = array_diff($photoIds, $existingPhotoIds);

        $data = array_map(function ($photoId) use ($competitionId) {
            return [
                'competition_id' => $competitionId,
                'photo_id' => $photoId,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $newVotes);

        if (!empty($data)) {
            Voting::insert($data);
        }

        return response()->json(['message' => 'Votes saved successfully']);
    }
    public function revertVoteAaction(Request $request)
    {
        $photoIds = $request->input('photo_ids', []);
        $competitionId = $request->input('competition_id');
        Voting::whereIn('photo_id', $photoIds)
           ->where('competition_id', $competitionId)
           ->delete();
        return response()->json(['message' => 'Selected photos removed successfully']);

    }
    public function voteActionContent(Request $request)
    {
        $competition_id = $request->competition_id;
        $stageValidationExistCheck = Stage::where('type', 'validation')
            ->where('competition_id', $competition_id)
            ->get()->count() > 0 ? true : false;

        $lastValidationStage = Stage::where('type', 'validation','judges_juries')
                        ->where('competition_id', $competition_id)
                        ->latest()
                        ->first();
        $judgesJuriesCount = $lastValidationStage->judges_juries->count();
        $totalMark = $judgesJuriesCount * 10;

        if ($lastValidationStage && $lastValidationStage->type === 'validation') {
            $photosNotVoted = $lastValidationStage->photos_val()
                ->whereDoesntHave('voting', function ($query) {
                    $query->whereRaw('voting.photo_id = photographs.id');
                })
                ->with(['validations_admin' => function ($query) {
                    $query->select('photo_id', \DB::raw('COALESCE(SUM(grade), 0) as total_grade'))
                    ->groupBy('photo_id');
                }])
                ->distinct()
                ->get();

        } else {
            $photosNotVoted = collect();
        }
        $votingPhotos = Voting::with(['photograph', 'photograph.validations_admin' => function ($query) {
            $query->select('photo_id', \DB::raw('COALESCE(SUM(grade), 0) as total_grade'))
                ->groupBy('photo_id');
        }])
        ->where('competition_id', $competition_id)
        ->get();


        $html = view('admin.competitions.stage.vote-action-area', compact('votingPhotos','photosNotVoted','lastValidationStage','stageValidationExistCheck','totalMark'))->render();
        return response()->json(['html' => $html], 200);
    }
    public function publishWinnerActionContent(Request $request)
    {
        $competition_id = $request->competition_id;
        $photo_category = $request->photo_category;
        $lastValidationStage = Stage::where('type', 'validation','judges_juries')
                        ->where('competition_id', $competition_id)
                        ->latest()
                        ->first();
        $judgesJuriesCount = $lastValidationStage->judges_juries->count();
        $totalMark = $judgesJuriesCount * 10;

        $publishedPhotos = Voting::with(['photograph', 'photograph.validations_admin' => function ($query) use ($photo_category){
            $query->select('photo_id', \DB::raw('COALESCE(SUM(grade), 0) as total_grade'))
            ->groupBy('photo_id');
        }])
        ->whereHas('photograph', function ($query) use ($photo_category){
            $query->where('photo_category', $photo_category);
        })
        ->where('competition_id', $competition_id)
        ->get();


        $html = view('admin.competitions.stage.publish-winners-action-area', compact('publishedPhotos','totalMark'))->render();
        return response()->json(['html' => $html], 200);
    }
    public function votePublishToWebAction(Request $request)
    {
        try {
            $competition_id = $request->competition_id;

            // Fetch the competition and last validation stage
            $competition = Competition::find($competition_id);
            $lastValidationStage = Stage::where('type', 'validation')
                                        ->where('competition_id', $competition_id)
                                        ->latest()
                                        ->first();

            // Check if competition and lastValidationStage exist
            if (!$competition || !$lastValidationStage) {
                return response()->json(['status' => false, 'message' => 'Competition or Validation Stage not found'], 404);
            }

            // Check and update the competition if not already published
            if (!$competition->is_published_for_vote) {
                $competition->update([
                    'is_published_for_vote' => true,
                    'vote_published_date' => now(),
                    'vote_last_published_date' => now()
                ]);

                // Increment vote_publish_count
                $competition->increment('vote_publish_count');
            } else {
                // Update only the last publish date
                $competition->vote_last_published_date = now();
                $competition->save();
            }

            // Update the is_published column in the Voting table
            Voting::query()->update(['is_published' => true]);

            // Update the last validation stage
            $lastValidationStage->status = 0;
            $lastValidationStage->save();

            return response()->json(['status' => true, 'message' => 'Successfully published to web!'], 200);
        } catch (QueryException $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function stopPublicVotingAction(Request $request)
    {
        try {
            $competition_id = $request->competition_id;
            $competition = Competition::where('id', $competition_id)->first();
            $competition->is_public_vote_completed = true;
            $competition->public_vote_completed_date = now();
            $competition->save();
            return response()->json(['status' => true, 'message' => 'Successfully stopped public voting!'], 200);
        } catch (\Throwable $th) {
            throw $th; return response()->json(['status' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function get_stages(Competition $competition) {
        $stages = $competition
                    ? $competition->stages()
                        ->with('judges_juries')
                        ->get()
                    : false;
        return response()->json(compact('stages'));
    }
    public function stage_levels(Competition $competition, $type='') {
        $stage_levels =   $competition ?
                            $competition
                            ->stages()
                            ->where('type',$type)
                            ->get()
                            : false;
        return response()->json(compact('stage_levels'));
    }
    public function next_stage_label(Competition $competition, Request $request)
    {
        $type = $request->type;
        $nextLevelLabel = '';
        if($type){
            $lastStage = Stage::where('type', $type)
                        ->where('competition_id', $competition->id)
                    ->orderBy('name', 'desc')
                    ->first();

            if (!$lastStage) {
                $lastTitleNumber = 0;
            } else {
                $lastTitleNumber = (int) preg_replace('/[^0-9]/', '', $lastStage->name);
            }
            $levelPrefix = ($type === 'elimination') ? 'Elimination Level ' : 'Validation Level ';
            $nextTitleNumber = $lastTitleNumber + 1;
            $nextLevelLabel = $levelPrefix . $nextTitleNumber;
        }
        return response()->json(['label' => $nextLevelLabel]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function stage_add_form(Competition $competition, $type='all')
    {
        $judges_juries = User::select('id','name', 'role', 'email')->whereIn('role',['judge', 'jury'])->get();
        $lastStage = Stage::where('competition_id', $competition->id)
                                            ->orderBy('id', 'desc')
                                            ->first();

        if($lastStage && $lastStage->type == 'elimination'){
            $photosNeedAction = $lastStage->photos()->where('eliminate', null);
            $NoActionTakenPhotosCount = Elimination::with(['category','reviewer'])
                                        ->where('stage_id', $lastStage->id)
                                        ->where('eliminate', null)
                                        ->get()
                                        ->groupBy(['category.title', 'reviewer.email']);
            $pendingActionCount = [];

            foreach ($NoActionTakenPhotosCount as $category => $items) {
                foreach ($items as $reviewer => $item) {
                    $pendingActionCount[$category][$reviewer] = count($item);
                }
            }


            $countPhotosNeedAction = $photosNeedAction->count();
            if ($countPhotosNeedAction > 0) {
                $message = "Need to Take action for {$countPhotosNeedAction} photos";
                $formHTML = view('admin.competitions.stage.error-creation', compact('message','pendingActionCount','lastStage'))->render();
                return response()->json(['html'=>$formHTML], 200);
            }
        }elseif($lastStage && $lastStage->type=='validation') {
            $message = "You can't create more stages, You've already have a validation stage for this competition.";
            $completedStageCreation = true;
            $formHTML = view('admin.competitions.stage.error-creation', compact('message','completedStageCreation'))->render();
            return response()->json(['html'=>$formHTML], 200);
        }
        $isNotFirstStage =  Stage::where('competition_id', $competition->id)->count() > 0 ? true : false;

        $formHTML = view('admin.competitions.stage.add-form', compact('competition','judges_juries','type','isNotFirstStage'))->render();
        return response()->json(['html'=>$formHTML], 200);
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        //sample wire frame implementation for creating a new stage

        $validatedData = $request->validate([
            'title' => 'string|max:255',
            'competition_id' => 'required|exists:competitions,id',
            'evaluators.*.*' => [
                'required',
                'integer',
                Rule::exists('users', 'id')->whereIn('role', ['judge', 'jury']),
            ],
            'stage_type' => 'required|in:elimination,validation',
        ]);
        try {
            DB::beginTransaction();
            $last_stage  = Stage::select('id','type')
                        ->where('competition_id', $validatedData['competition_id'])
                        ->latest()
                        ->first();
            Stage::where('competition_id', $validatedData['competition_id'])
                    ->where('status', true)
                    ->update(['status' => false]);

            $full_evaluators = [];
            foreach ($request->evaluators as $category => $evaluators) {
                foreach ($evaluators as $evaluator) {
                    $full_evaluators[] = $evaluator;
                }
            }

            $stage = new Stage();
            $stage->name = $validatedData['title'];
            $stage->competition_id = $validatedData['competition_id'];
            $stage->description = $validatedData['title'];
            $stage->status = true;
            $stage->type = $validatedData['stage_type'];
            $stage->category_reviewers = json_encode($request->evaluators);
            $stage->save();
            $stage->judges_juries()->attach(array_unique($full_evaluators));
            $createdStageID = $stage->id;
            $photos = Photograph::where('competition_id', $validatedData['competition_id']);
            $reviewers = User::whereIn('id', $full_evaluators)->get();

            if($last_stage){
                if($last_stage->type == 'elimination'){
                    if($stage->type ==  'validation'){
                        $reviewers = User::whereIn('id', array_unique($full_evaluators))->get();
                        $last_stage->photos()
                            ->wherePivot('eliminate', false)
                            ->chunk(1000, function ($selectedPhotos) use ($stage, $reviewers) {
                                $validations = [];
                                foreach ($selectedPhotos as $photo) {
                                    foreach ($reviewers as $reviewer) {
                                        $validations[] = [
                                            'photo_id' => $photo->id,
                                            'stage_id' => $stage->id,
                                            'reviewer_id' => $reviewer->id,
                                            'grade' => 0,
                                        ];
                                    }
                                }
                                if (!empty($validations)) {
                                    $stage->validations()->insert($validations);
                                }
                            });
                    }else{
                        $stage_evaluators = $request->evaluators;
                        foreach ($stage_evaluators as $category_id => $evaluators) {
                            $reviewers = User::whereIn('id', $evaluators)->get();
                            $selectedPhotos = Elimination::where('stage_id', $last_stage->id)
                                ->where('eliminate', false)
                                ->where('category_id',$category_id)
                                ->chunk(1000, function ($selectedPhotosChunk) use ($reviewers, $category_id, $createdStageID) {
                                    $numReviewers = $reviewers->count();
                                    if ($numReviewers > 0 && $selectedPhotosChunk->count() > 0) {
                                        $photosPerReviewer = ceil($selectedPhotosChunk->count() / $numReviewers);
                                        $clonedPhotos = [];
                                        foreach ($reviewers as $reviewer) {
                                            $photosForReviewer = $selectedPhotosChunk->splice(0, $photosPerReviewer);
                                            foreach ($photosForReviewer as $elimination) {
                                                $clonedPhotos[] = [
                                                    'photo_id' => $elimination->photo_id,
                                                    'stage_id' => $createdStageID,
                                                    'reviewer_id' => $reviewer->id,
                                                    'category_id' => $category_id,
                                                    'eliminate' => null,
                                                    'created_at' => now(),
                                                    'updated_at' => now()
                                                ];
                                            }
                                        }
                                        if (!empty($clonedPhotos)) {
                                            DB::table('elimination')->insert($clonedPhotos);
                                        }
                                    }
                            });
                        }

                    }
                }else{//first stage will be validation

                }
            }else{
                //start elimination stage
                $stage_evaluators = $request->evaluators;
                foreach ($stage_evaluators as $category_id => $evaluators) {
                    $photos = Photograph::where('competition_id', $validatedData['competition_id'])->where('photo_category',$category_id);
                    $reviewers = User::whereIn('id', $evaluators)->get();
                    $photos->chunk(1000, function ($chunk) use ($reviewers, $category_id , $stage) {
                        $totalPhotos = count($chunk);
                        $dataToInsert = [];
                        foreach ($reviewers as $reviewer) {
                            $photosPerReviewer = ceil($totalPhotos / $reviewers->count());
                            if ($photosPerReviewer > 0) {
                                $assignedPhotos = $chunk->splice(0, $photosPerReviewer);
                                foreach ($assignedPhotos as $photo) {
                                    if ($stage->type === 'elimination') {
                                        $dataToInsert[] = [
                                            'photo_id' => $photo->id,
                                            'stage_id' => $stage->id,
                                            'reviewer_id' => $reviewer->id,
                                            'category_id' => $category_id,
                                            'eliminate' => null,
                                            'created_at' => now(),
                                            'updated_at' => now()
                                        ];
                                    } elseif ($stage->type === 'validation') {
                                        $dataToInsert[] = [
                                            'photo_id' => $photo->id,
                                            'stage_id' => $stage->id,
                                            'reviewer_id' => $reviewer->id,
                                            // 'category_id' =>$category_id,
                                            'grade' => 0,
                                        ];
                                    }
                                }
                            }
                        }

                        if (!empty($dataToInsert)) {
                            DB::table('elimination')->insert($dataToInsert);
                        }
                    });
                }
                //end elimination stage
            }
            DB::commit();
            return response()->json(['message' => 'Competition stage created successfully.'], 201);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            DB::rollback();
            return response()->json(['message' => 'Competition stage created failed.'], 500);
        }

    }
    public function categorySelectForWinner(Request $request)
    {
        try {
            $competition = Competition::with('categories')->find($request->competition_id);
            $categories = $competition->categories;
            $html = view('admin.competitions.stage.categories-for-winners', compact('categories'))->render();
            return response()->json(['html' => $html], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error fetching photos for the active stage.'], 500);
        }
    }
    public function getPhotosForActiveStage(Request $request)
    {
        try {
            // Find the active stage
            $activeStage = Stage::where('status', true)->firstOrFail();
            // Retrieve photos for the active stage
            $photos = $activeStage->photos;
            return response()->json(['photos' => $photos], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error fetching photos for the active stage.'], 500);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stage $stage)
    {
        $validatedData = $request->validate([
            'title' => 'string|max:255',
            'evaluators' => 'required|array',
            'stage_type' => 'required|in:elimination,validation',
        ]);
        if($stage && $stage->type === 'elimination'){
            try {
                DB::beginTransaction();
                $stage->update([
                    'name' => $validatedData['title'],
                    'type' => $validatedData['stage_type'],
                    'category_reviewers' => json_encode($request->evaluators)
                ]);
                $full_evaluators = [];
                foreach ($request->evaluators as $category => $evaluators) {
                    foreach ($evaluators as $evaluator) {
                        $full_evaluators[] = $evaluator;
                    }
                }

                $stage->judges_juries()->sync(array_unique($full_evaluators));
                $stage_evaluators = $request->evaluators;
                foreach ($stage_evaluators as $category_id => $evaluators) {
                    $noActionTakenPhotos = $stage->photos()->where('eliminate', null)
                                        ->where('category_id',$category_id)->get();
                    $reviewers = User::whereIn('id', $evaluators)->get();
                    $numReviewers = count($reviewers);
                    foreach ($noActionTakenPhotos->chunk(1000) as $photos) {
                        $totalPhotos = count($photos);
                        foreach ($reviewers as $reviewer) {
                            $photosPerReviewer = ceil($totalPhotos / $reviewers->count());
                            if ($photosPerReviewer > 0) {
                                $assignedPhotos = $photos->splice(0, $photosPerReviewer);
                                $photoIds = $assignedPhotos->pluck('id')->toArray();
                                Elimination::whereIn('photo_id', $photoIds)
                                ->where('stage_id', $stage->id)
                                ->where('category_id', $category_id)
                                ->update([
                                    'reviewer_id' => $reviewer->id,
                                    'eliminate' => null
                                ]);
                            }
                        }
                    }
                }
                DB::commit();
                return response()->json(['success' => true]);
            } catch (\Throwable $th) {
                DB::rollback();
                return response()->json(['message' => 'Competition stage Updation failed.'], 500);
            }
        }else{
            try {
                DB::beginTransaction();
                $stage->update([
                    'name' => $validatedData['title'],
                    'type' => $validatedData['stage_type'],
                    'category_reviewers' => json_encode($request->evaluators)
                ]);
                $full_evaluators = [];
                foreach ($request->evaluators as $category => $evaluators) {
                    foreach ($evaluators as $evaluator) {
                        $full_evaluators[] = $evaluator;
                    }
                }
                $saved_reviewer_ids = $stage->judges_juries()->pluck('user_id')->toArray();
                $stage->judges_juries()->sync(array_unique($full_evaluators));
                $updated_stage_reviewers = collect($request->evaluators)->flatten()->unique()->toArray();
                $missing_reviewer_ids = array_diff($saved_reviewer_ids, $updated_stage_reviewers);
                if (!empty($missing_reviewer_ids)) {
                    Validation::whereIn('reviewer_id', $missing_reviewer_ids)->where('stage_id',$stage->id)->delete();
                }
                $last_stage  = Stage::select('id','type')
                                ->where('competition_id', $request->competition_id)
                                ->where('type', 'elimination')
                                ->latest()
                                ->first();

                $createIds = array_diff($updated_stage_reviewers, $saved_reviewer_ids);
                $reviewers= User::whereIn('id', $createIds)->get();
                $last_stage->photos()
                            ->wherePivot('eliminate', false)
                            ->chunk(1000, function ($selectedPhotos) use ($stage, $reviewers) {
                                $validations = [];
                                foreach ($selectedPhotos as $photo) {
                                     foreach ($reviewers as $reviewer) {
                                        $validations[] = [
                                            'photo_id' => $photo->id,
                                            'stage_id' => $stage->id,
                                            'reviewer_id' => $reviewer->id,
                                            'grade' => 0,
                                        ];
                                    }
                                }
                                if (!empty($validations)) {
                                    $stage->validations()->insert($validations);
                                }
                            });

                DB::commit();
                return response()->json(['success' => true]);
            } catch (\Throwable $th) {
                DB::rollback();
                return response()->json(['message' => 'Competition stage Updation on validation failed.'], 500);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
