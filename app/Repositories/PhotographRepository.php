<?php

namespace App\Repositories;
use App\Models\Photograph;
use App\Models\PhotoCategory;
use App\Models\Competition;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PhotographRequest;
use App\Notifications\PhotographUploadedNotification;
use Illuminate\Support\Str;
class PhotographRepository
{
    public function __construct()
    {
        //
    }
    public function processUploadPhotograph(PhotographRequest $request)
    {
        try {
            $user = Auth::user();
            $photoCat = PhotoCategory::where('id',$request->photo_category)->first();
            $photoCatLimit =  number_format($photoCat->max_upload_limit);
            $uploadedCount = Photograph::where('user_id', $user->id)
                                        ->where('photo_category',$request->photo_category)->count();

            if ($uploadedCount > $photoCatLimit) {
                return response()->json(['message' => 'File upload failed! Your upload limit exceeded! <br/> <span class="mt-2 badge bg-danger text-white"> Maximum Allowed Count: <b>'.$photoCatLimit.' Nos </b></span>'], 500);
            }

            // Handle the file upload
            $uniqueID = Photograph::generateUniqueId();
            $competition = Competition::select('id')
                ->where('year', date('Y'))
                ->where('status', 'active')
                ->first();

            if (!$competition) {
                return response()->json(['message' => 'This competition has been expired!'], 500);
            }

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = $request->file('image')->store('images', 's3');
                $imageURL = Storage::disk('s3')->url($path);

                // Save photograph using the Photograph model
                $photograph = new Photograph();
                $photograph->image = $imageURL;
                $photograph->competition_id = $competition->id;
                $photograph->photo_unique_id = $uniqueID;
                $photograph->device = $request->input('device');
                $photograph->photo_category = $request->input('photo_category');
                $photograph->captured_location = $request->input('location');
                $photograph->year = $request->input('year');
                $photograph->month = $request->input('month');
                $photograph->description = $request->input('description');
                $photograph->is_tc_accepted = ($request->input('is_tc_accepted') == 'true') ? true : false;
                $photograph->user_id = $user->id;
                $photograph->save();


                $token = Str::random(32);
                $user->cert_token = $user->cert_token ?? $token;
                $user->save();

                $user->notify(new PhotographUploadedNotification($photograph->photo_unique_id));
                return response()->json(['message' => 'Thank you for participating in the 16th edition of GGPF. Please also check your spam folder for any emails.']);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => 'File upload failed'], 500);
        }
    }
}
