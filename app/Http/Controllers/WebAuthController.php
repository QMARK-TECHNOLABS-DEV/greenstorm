<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserRegisteredNotification;
use Illuminate\Support\Str;
use App\Models\EmailVerification;
use Mail;
use Carbon\Carbon;
class WebAuthController extends Controller
{
    public function process_login(Request $request)
    {

        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::guard('web')->attempt($validatedData)) {
            $user = Auth::guard('web')->user();
            if ($user && ($user->role === 'user' || $user->role === 'photographer')) {
                return response()->json(['message' => 'Login successful', 'role' => $user->role]);
            } else {
                Auth::guard('web')->logout();
                return response()->json(['message' => 'Invalid credentials'], 422);
                // Redirect or show an error message to inform the user they don't have the necessary role.
            }
        } else {
            return response()->json(['message' => 'Invalid credentials'], 422);
        }
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'mobile' => 'nullable|numeric',
            // 'dial_code' => 'string',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'conditions' => 'required',
        ],[
            'name.required' => 'The first name field is required.',
            // Add other custom messages for specific validation rules here
        ]);
        $validator->after(function ($validator) use ($request) {
            if (!$request->has('conditions') || $request->input('conditions') !== 'accepted') {
                $validator->errors()->add('conditions', 'You must accept the Terms and Conditions.');
            }
        });
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $user = new User();
        $user->name     = $request->input('name');
        $user->email    = $request->input('email');
        $user->mobile   = $request->input('mobile');
        $user->dial_code   = $request->input('dial_code');
        $user->timezone = $request->input('timezone');
        $user->role     = 'user';
        $user->is_conditions_accepted   = $request->input('conditions') == 'accepted' ? true : false;
        $user->password = bcrypt($request->input('password'));
        $user->save();
        // event(new Registered($user));
        // $user->notify(new UserRegisteredNotification($user));
        if ($user->save()) {

            $token = Str::random(64);
            EmailVerification::create([
                'user_id' => $user->id,
                'token' => $token,
                // 'created_at' => Carbon::now('UTC')->toDateTimeString(),
                ]);

            Mail::send('emails.verificationEmail', ['token' => $token], function($message) use($request){
                $message->to($request->email);
                $message->subject('Email Verification Mail');
            });



            auth()->login($user);
            if ($request->ajax()) {
                //return redirect()->route('contest.voting');
                return redirect()->route('profile.edit');
            }
            // if ($request->ajax()) {
            //     return response()->json(['redirect' => route('profile.edit')], 200);
            // } else {
            //     return redirect()->route('profile');
            // }
        } else {
            return response()->json(['message' => 'Registration failed'], 500);
        }
    }
    public function redirect_to_google(Request $request)
    {
        $category = request()->query('category');
        $request->session()->put('category', $category);
        return Socialite::driver('google')->redirect();
    }

    public function handle_google_callback(Request $request)
    {
        $category = $request->session()->pull('category');
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::where('email', $googleUser->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $googleUser->name;
            $user->last_name = $googleUser->user['family_name'] ?? '';
            $user->avatar = $googleUser->avatar;
            $user->email = $googleUser->email;
            $user->password = $googleUser->id;
            $user->signup_through = 'google';
            $user->email_verified_at = time();
            $user->save();
        }
        auth()->login($user);
        // dd($request->query('category'));
        // $category = $request->query('category', 1);
        //return redirect()->route('contest.voting', ['category' => $category]);
        return redirect()->route('profile.edit');
        // if(Auth::user()->role == 'photographer'){
        //     return redirect()->route('profile.photograph.upload');
        // }else{
        //     // return redirect()->route('profile.edit');
        //     return redirect()->route('contest.voting');
        // }
    }
    public function process_pre_login(Request $request)
    {
        $password = $request->input('password');
        if ($password === 'Vividreal') {
            Session::put('authenticated', true);
            return redirect('/');
        }
        return redirect()->back()->withInput()->withErrors(['password' => 'Invalid password']);
    }
    public function windows_login(Request $request)
    {
        $username = $request->server('AUTH_USER');
        auth()->loginUsingId($userId);
        return redirect('/dashboard');
    }
    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookProviderCallback()
    {
        $fbuser = Socialite::driver('facebook')->user();
        $user = User::where('email', $fbuser->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $fbuser->name;
            $user->email = $fbuser->email;
            $user->avatar = $fbuser->avatar;
            $user->password = $fbuser->id;
            $user->signup_through = 'facebook';
            $user->save();
        }
        auth()->login($user);
        return redirect('/voting');

        // return redirect('/profile/#');
    }
    public function redirectToTwitter()
    {
        // dd(Socialite::driver('twitter'));
        return Socialite::driver('twitter')->redirect();
    }

    public function handleTwitterCallback()
    {
        $twitter_user = Socialite::driver('twitter')->user();
        $user = User::where('email', $twitter_user->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $twitter_user->name;
            $user->email = $twitter_user->email;
            $user->avatar = $twitter_user->avatar;
            $user->password = $twitter_user->id;
            $user->signup_through = 'twitter';
            $user->save();
        }
        auth()->login($user);
        return redirect('/profile');
    }
    public function redirectToLinkedIn()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    public function handleLinkedInCallback()
    {
        $user = Socialite::driver('linkedin')->user();
        dd($user);
        // Process user data and authenticate
        // Example:
        // $existingUser = User::where('email', $user->getEmail())->first();
        // if ($existingUser) {
        //     Auth::login($existingUser);
        // } else {
        //     // Create a new user
        // }
        // Redirect or perform other actions
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
