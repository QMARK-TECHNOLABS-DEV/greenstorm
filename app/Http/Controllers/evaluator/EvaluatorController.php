<?php

namespace App\Http\Controllers\evaluator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Auth;
class EvaluatorController extends Controller
{
    function index()  {
        return view('evaluator.dashboard');
    }
    public function logout(Request $request)
    {
        Auth::guard('evaluator')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('evaluator.login');
    }

}
