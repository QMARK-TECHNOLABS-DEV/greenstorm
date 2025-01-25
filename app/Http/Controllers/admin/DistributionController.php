<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Competition;

class DistributionController extends Controller
{
    //
    public function index()  {
        $competitions = Competition::get();
        return view('admin.distributions.index',compact('competitions'));
    }
}
