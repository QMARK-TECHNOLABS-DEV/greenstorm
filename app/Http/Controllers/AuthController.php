<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class AuthController extends Controller
{ 
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        // Handle the authenticated user
        // For example, create a new user or authenticate an existing user
    }
}

 