<?php
namespace App\Http\Controllers\evaluator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Competition;
use App\Models\Photograph;
use App\Models\Elimination;
use App\Models\User;
use App\DataTables\StagesDataTable;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use DB;
class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function get_stages(Competition $competition) {
        $stages = $competition ? $competition->stages()->with('judges_juries')->get() : false;
        return response()->json(compact('stages'));
    }
    public function stage_levels(Competition $competition, $type='') {
        $stage_levels =   $competition ?
                            $competition
                            ->stages_for_reviewers()
                            ->where('type',$type)
                            ->get()
                            : false;
        return response()->json(compact('stage_levels'));
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
}
