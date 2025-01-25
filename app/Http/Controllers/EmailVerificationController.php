<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Adjust the namespace as per your project structure
use App\Models\EmailVerification;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationEmail; // Create this Mailable class
use Illuminate\Support\Str;
use Auth;
use Carbon\Carbon;
class EmailVerificationController extends Controller
{
    public function sendVerificationEmail(Request $request)
    {
        // // Generate a unique token
        // $token = Str::random(64);
        // // Associate the token with the user and save it in the database
        // $verification = EmailVerification::create([
        //     'user_id' => $request->user()->id,
        //     'token' => $token,
        // ]);
        // $token = $verification->token;
        // $verificationLink = route('verification.verify', ['token' => $token]);
        // Mail::to($request->user()->email)
        //         ->send(new VerificationEmail(['verificationLink' => $verificationLink]));
        // return redirect()->back()->with('message', 'Verification email sent.');
    }
    public function show(Request $request)
    {
        if ($request->user() && $request->user()->hasVerifiedEmail()) {
            return redirect('/profile'); // Redirect to the desired page for logged-in and verified users.
        } elseif ($request->user()) {
            $verification = EmailVerification::where('user_id', Auth::user()->id)->first();
            return view('email-verify',compact('verification'));
        } else {
            return redirect('/login'); // Redirect to the login page if the user is not logged in.
        }
    }
    public function resend(Request $request)
    {
        $user = Auth::user();
        $verification = EmailVerification::where('user_id', $user->id)->first();
        if (!$verification) {
            $token = Str::random(64);
            EmailVerification::create([
                'user_id' => $user->id,
                'token' => $token,
                'created_at' => now(),
            ]);
        } else {
            $token = Str::random(64);
            $verification->token = $token;
            $verification->created_at = now();
            $verification->save();
        }
        Mail::send('emails.verificationEmail', ['token' => $token], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Email Verification Mail');
        });
        return back()->with('resent', true);
    }
    public function verifyEmail(Request $request, $token)
    {
        // Find the corresponding verification record in the database
        $verification = EmailVerification::where('token', $token)->first();

        if (!$verification) {
            return redirect()->route('verification.error')->with('message', 'Invalid verification token.');
        }

        // Mark the user's email as verified
        $user = User::find($verification->user_id);
        $user->email_verified_at = now();
        $user->save();

        $verification->delete();
        if (Auth::check()) {
            return redirect('/profile')->with('verified', true);
        }else{
            return redirect('/login')->with('email_verified', true);
        }
    }
    public function error(Request $request)
    {
        return view('verify-email-error');
    }
}
