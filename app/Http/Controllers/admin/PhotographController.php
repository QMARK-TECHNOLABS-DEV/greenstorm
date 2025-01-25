<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photograph;
use App\Models\Photographer;
use App\Models\PhotoCategory;
class PhotographController extends Controller
{
    //
    public function index($type='') { 
        $photographs        = NULL; 
        $photographers      = NULL;
        $photograph_categories = NULL;
        $posts              = NULL;
        $approved           = NULL;
        $pending            = NULL; 
        switch ($type) {
            case 'posts':
                $posts = Photograph::latest()->get();
                $photographers = Photographer::latest()->get(); 
                break;
            
            default: 
                $photograph_categories = PhotoCategory::with('photographs')->get(); 
                $photographs = Photograph::latest()->get();
                break;
        }
        return view('admin.photographs.index',
                                            compact(
                                                'photographs',
                                                'type',
                                                'posts',
                                                'photograph_categories', 
                                                'approved', 
                                                'pending',
                                                'photographers'
                                            ));
    }
    public function category($id) {
        if ($id !== null) {
            $photographs = Photograph::where('photo_category', $id)->get();
        } else { 
            $photographs = Photograph::all();
        }
        return view('admin.category.index',compact('photographs'));
    }
}
