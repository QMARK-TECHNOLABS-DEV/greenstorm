<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Auth;
class UserController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.users.index');
    }
    public function change_user_status(Request $request) {
       $user = User::where('id',$request->id)->first();
       $user->status = $request->status == 'true' ? true : false;
       $user->save();
       return response()->json(['message' => 'User status updated successfully'], 200);
    }
    public function view_user(Request $request) {
       $user = User::where('id',$request->id)->first();
       return response()->json(['data' => $user], 200);
    }
    // function submit_user_form(){

    // }
    public function submit_user_form(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email'=>'required|email|unique:users',
            'mobile'=>'required',
            'address'=>'required',
            'secondary_contact_number'=>'required',
            'role' => 'required|in:jury,judge',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        try {
            DB::beginTransaction();
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->mobile = $request->input('mobile');
            $user->secondary_contact_number = $request->input('secondary_contact_number');
            $user->role = $request->input('role');
            $user->password = bcrypt($request->input('email'));
            $user->address = $request->input('address');
            $user->save();

            if ($user->role === 'jury' || $user->role === 'judge') {
                $token = Str::random(40); // Generate a random token
                $user->verification_token = $token;
                $user->save();

                Mail::send('admin.emails.verification-email', ['token' => $token,'user' => $user], function ($message) use ($user) {
                    $message->to($user->email)->subject('Verify your account');
                });
            }

            DB::commit();
            return response()->json(['message' => 'User created successfully'], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['message' => 'User creation Failed'], 200);
            // Handle the exception
        }
    }
    public function showPasswordForm(Request $request)
    {
        $token = $request->token;
        $user = User::where('verification_token', $token)->first();
        return view('admin.verify.password-reset', compact('token','user'));
    }
    public function resetPassword(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', 'Validation failed. Please check your inputs.');
        }
        $user = User::where('verification_token', $request->token)->first();
        if (!$user) {
            return redirect()->back()->with('error', '<strong class="d-block d-sm-inline-block-force">Sorry!</strong> Please contact the administrator!');
        }
        $user->password = Hash::make($request->password);
        $user->verification_token = null; // Clear the token after resetting the password
        $user->save();
        // Your logic for auto-login after successful password change
        // Redirect the user to a success page
        $credentials['email']       = $user->email;
        $credentials['password']    = $request->password;
        $credentials['role']        = ['judge','jury'];
        try {
            if (Auth::guard('evaluator')->attempt($credentials)) {
                return redirect()->route('evaluator.dashboard')->with('success', '<strong class="d-block d-sm-inline-block-force">Welcome!</strong> You\'ve successfully logged in..!');
            }else {
                return redirect()->back()->with('error', '<strong class="d-block d-sm-inline-block-force">Sorry!</strong> Please contact the administrator!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', '<strong class="d-block d-sm-inline-block-force">Sorry!</strong> Please contact the administrator!');
            throw $th;
        }

    }
}
