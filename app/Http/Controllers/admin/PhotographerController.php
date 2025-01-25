<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photograph;
use App\Models\Photographer;
class PhotographerController extends Controller
{
    //
    public function index(Request $request, Photographer $photographer = null, $type = null){
        $photographs        = NULL; 
        $photographers      = NULL;
        $posts              = NULL;
        $approved           = NULL;
        $pending            = NULL; 
        switch ($type) {
            case 'posts':
                $posts = Photograph::where('user_id',$photographer->user_id)->latest()->get();
                $photographers = Photographer::latest()->get(); 
                break;
            
            default: 
                $photographs = Photograph::where('user_id',$photographer->user_id)->latest()->get();
                break;
        }
        return view('admin.photographers.index',
                                            compact(
                                                'photographer',
                                                'photographs',
                                                'type',
                                                'posts',
                                                'approved', 
                                                'pending',
                                                'photographers'
                                            )); 
    }
}
