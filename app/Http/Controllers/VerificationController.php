<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;


class VerificationController extends Controller
{

    public function show(Request $request)
    {
        if ($request->user() && $request->user()->hasVerifiedEmail()) {
            return redirect('/profile'); // Redirect to the desired page for logged-in and verified users.
        } elseif ($request->user()) {
            return view('email-verify');
        } else {
            return redirect('/login'); // Redirect to the login page if the user is not logged in.
        }
        // if ($request->user() && $request->user()->hasVerifiedEmail()) {
        //     return redirect('/profile'); // Redirect to the desired page for verified users.
        // }
        // return view('email-verify');
        // // return view('auth.verify-email');
    }
    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }
        $request->user()->sendEmailVerificationNotification();

        return back()->with('resent', true);
    }
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect('/profile')
            ->with('verified', true);
    }
}
