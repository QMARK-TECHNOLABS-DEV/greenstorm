<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\PhotographRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photographer;
use App\Models\PhotoCategory;
use App\Models\Competition;
use App\Models\Photograph;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\Repositories\UserProfileRepository;
use App\Repositories\PhotographerRepository;
use App\Repositories\PhotographRepository;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
    public function update_profile(ProfileUpdateRequest $request, UserProfileRepository $userRepository, PhotographerRepository $photographerRepository)
    {
        try {
            $user = User::where('id', Auth::id())->first();
            $updatedUser = $userRepository->updateProfile($user, $request->all());
            $photographer = Photographer::firstOrNew(['user_id' => $updatedUser->id]);
            $updatedPhotographer = $photographerRepository->updatePhotographer($photographer, $request->all());
            return response()->json(['message' => 'Profile updated successfully'], 200);
        } catch (\Throwable $th) {
            // Log::error($th);
            return response()->json(['message' => 'An error occurred while updating the profile.'], 500);
        }
    }
    public function upload_photograph(Request $request) {
        $user = User::where('id',Auth::id())->first();
        $competition = Competition::select('id')->where('year', date('Y'))
                                ->where('status', 'active')
                                ->first();
        $photo_categories = $competition->categories;
        $hasReachedMaxUploadLimit = false;
        if(PhotoCategory::hasReachedMaxUploadLimit()){
            $hasReachedMaxUploadLimit = true;
        }
        return view('profile.upload-photograph',compact('user','photo_categories','hasReachedMaxUploadLimit'));
    }
    public function process_upload_photograph(PhotographRequest $request, PhotographRepository $photographRepository)
    {
        return $photographRepository->processUploadPhotograph($request);
    }

    public function list_uploaded_photographs(Request $request) {
        $photographs = Photograph::where('user_id',Auth::id())->latest()->get();
        return view('profile.list_uploaded',compact('photographs'));
    }
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::to('/');
    }
    public function competition_expiry_notification(Request $request)
    {
       return view('profile.photo-competition-expiry');
    }
}
