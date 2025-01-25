<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;
use App\Models\Voting;
use App\Models\Photograph;
use App\Models\Competition;
use App\Models\UserVote;
use App\Models\PhotoCategory;
use Illuminate\Pagination\Paginator;
class WebController extends Controller
{
    private $competition;

    public function __construct() {
        $this->competition = 1;
        $this->commonButtonText = 'Submit Entry';
    }
    public function pre_login()
    {
        return view('pre-login');
    }

    public function index() : View{
    //    dd(bcrypt('sudhi.km@vividreal.com'));
        return view('index');
    }
    public function about() : View{

    }
    public function sign_up() : View{
        return view('signup');
    }
    public function press_release() : View{
        return view('press-release');
    }
    public function log_in(){
        if(Auth::guard('web')->check()){
            if(Auth::user()->role == 'photographer'){
                return redirect('/profile/upload-photograph');
            }else{
                return redirect('/profile');
            }
        }
        return view('login');
    }
    public function contest() : View{
        return view('contest');
    }
    // public function voting(Request $request)
    // {
    //     $perPage = 6; // Adjust the number of items per page as needed

    //     if (!$request->has('category')) {
    //         $competition = Competition::find($this->competition);
    //         $category = $competition->categories()->first();
    //         if ($category) {
    //             return redirect()->route('contest.voting', ['category' => $category->id]);
    //         } else {
    //             return redirect()->route('contest.voting');
    //         }
    //     }

    //     $page = $request->get('page', 1);

    //     $votingPhotos = Voting::with([
    //         'photograph' => function ($query) {
    //             $query->withCount('userVotes as user_votes_count');
    //             if (request('category')) {
    //                 $query->where('photo_category', request('category'));
    //             }
    //         },
    //     ])
    //     ->where('competition_id', $this->competition)
    //     ->paginate($perPage, ['*'], 'page', $page);

    //     $votingPhotos->getCollection()->transform(function ($vote) {
    //         return optional($vote->photograph); // Use optional() to handle null values
    //     });

    //     $competition = Competition::with('categories')
    //         ->where('id', $this->competition)->first();
    //     $photo_categories = $competition->categories;

    //     if ($request->ajax()) {
    //         // If the request is AJAX, return only the voting photos as JSON
    //         return response()->json(['votingPhotos' => $votingPhotos]);
    //     }

    //     return view('voting', compact('votingPhotos', 'photo_categories'));
    // }



    public function voting(Request $request){
        if (!$request->has('category')) {
           $competition = Competition::find($this->competition);
           $category = $competition->categories()->first();
           if($category){
               return redirect()->route('contest.voting', ['category' => $category->id]);
           }else{
            return redirect()->route('contest.voting');
           }
        }
        $votingPhotos = Voting::with([
            'photograph' => function ($query) {
                $query->withCount('userVotes as user_votes_count');
                if (request('category')) {
                    $query->where('photo_category', request('category'));
                }
            },
        ])
        ->where('competition_id', $this->competition)
        ->get();
        $votingPhotos = $votingPhotos->filter(function ($vote) {
            return !is_null($vote->photograph);
        });

        $votingPhotos = $votingPhotos->sortByDesc(function ($vote) {
            return $vote->photograph->user_votes_count ?? 0;
        });
        $competition = Competition::with('categories')
                        ->where('id', $this->competition)->first();
        $photo_categories = $competition->categories;
        return view('voting',compact('votingPhotos','photo_categories'));
    }
    public function votingLikeAction(Request $request)
    {
        return response()->json(['status' => false, 'message' => '<p>Thank you for your invaluable support and participation in the voting phase.
        Stay tuned for the Award Ceremony on <b>22 April 2024, World Earth Day. </b></p> <p>Together, let\'s continue to make a positive impact for our planet.</p>'], 422);
        
        $photo_id = $request->photo_id;
        $photo = Photograph::find($photo_id);
        if (!$photo) {
            return response()->json(['status' => false, 'message' => 'Photo not found.'], 404);
        }
        $voteExistCheck = Voting::where('photo_id', $photo_id)->where('is_published', true)->exists();
        if (!$voteExistCheck) {
            return response()->json(['status' => false, 'message' => 'Requested image is not selected for voting. Please check again'], 422);
        }
        $photoAlreadyVotedCheck = UserVote::where('user_id', Auth::id())
                                ->where('photo_id', $photo_id)
                                ->first();
        if ($photoAlreadyVotedCheck) {
            $photoAlreadyVotedCheck->delete();
            $message = 'Vote removed successfully';
            $likeStatus = "dislike";
        }else{
            $currentPhotoCategoryID  = $photo->photocategory->id;
            $photoCategoryVotedCheck = UserVote::where('user_id', Auth::id())
                        ->whereHas('photograph', function ($query) use ($currentPhotoCategoryID) {
                            $query->where('photo_category', $currentPhotoCategoryID);
                        })->first();
            if($photoCategoryVotedCheck){
                // $message = 'Sorry, Already Voted in this category! Please unvote the existing photo.';
                $message = 'Please go back to the photo you voted for, deselect it, and then return here to vote for this selected photograph.';
            }else{
                UserVote::create(['user_id' => Auth::id(), 'photo_id' => $photo_id]);
                $message = 'Vote added successfully.';
                $likeStatus = "like";
            }
        }
        $newVoteCount = $photo->votes()->count();
        return response()->json([
            'status' => true,
            'message' => $message,
            'likeStatus' => $likeStatus ??  false,
            'voteCount' => $newVoteCount ?? 0,
        ]);
    }

    public function popup_image_details(Request $request)
    {
        $photo_id = $request->photo_id;
        $photo = Photograph::where('id', $photo_id)->first();
        $html =  view('pop-up-details', compact('photo'))->render();
        return response()->json(['html'=>$html], 200);
    }
    public function festivals() : View{
        return view('festivals');
    }
    public function awards() : View{
        return view('awards');
    }
    public function about_greenstorm() : View{
        return view('about-greenstorm');
    }
    public function contact() : View{
        return view('contact');
    }
    public function privacy_policy() : View{
        return view('privacy');
    }
    public function terms_and_conditions() : View{
        return view('terms');
    }
    public function about_g20() : View{
        return view('about-g20');
    }
     public function getWinners() : View{
        return view('winners');
    }
     public function getCamera() : View{
        return view('camera');
    }
    
}
