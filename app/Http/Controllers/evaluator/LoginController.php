<?php

namespace App\Http\Controllers\evaluator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Auth;

class LoginController extends Controller
{
    function index() {
        return view('evaluator.index');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');
        $credentials['role']= ['judge','jury'];
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

        // throw ValidationException::withMessages([
        //     'email' => [trans('auth.failed')],
        // ])->status(401);
    }
}
