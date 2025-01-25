<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Auth;

class LoginController extends Controller
{
    function index() {
        return view('admin.index');
    }
    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');
        $credentials['role']=['admin'];
        // dd($credentials);
        try {
            if (Auth::guard('admin')->attempt($credentials)) {
                return redirect()->route('admin.dashboard')->with('success', '<strong class="d-block d-sm-inline-block-force">Welcome!</strong> You\'ve successfully logged in..!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', '<strong class="d-block d-sm-inline-block-force">Sorry!</strong> Please contact the administrator!');
            throw $th;
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ])->status(401);
    }
}
