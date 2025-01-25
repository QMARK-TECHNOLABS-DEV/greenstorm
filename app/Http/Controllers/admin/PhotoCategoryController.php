<?php

namespace App\Http\Controllers\admin;
use App\DataTables\PhotoCategoriesDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhotoCategory; 
use Illuminate\Support\Facades\Validator;
class PhotoCategoryController extends Controller
{
    public function index(PhotoCategoriesDataTable $dataTable) {
        // return view('admin.photo-categories.index');
        return $dataTable->render('admin.photo-categories.index');
    }
    public function show($id)
    {
        $category = PhotoCategory::findOrFail($id);
        return response()->json($category);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'max_upload_limit' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $photoCategory = PhotoCategory::findOrFail($id);
        $photoCategory->title = $request->input('title');
        $photoCategory->max_upload_limit = $request->input('max_upload_limit');
        $photoCategory->description = $request->input('description');
        $photoCategory->save();

        return response()->json(['message' => 'Photo category updated successfully.']);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'max_upload_limit' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()],422);
        }

        $photoCategory = new PhotoCategory();
        $photoCategory->title = $request->input('title');
        $photoCategory->max_upload_limit = $request->input('max_upload_limit');
        $photoCategory->description = $request->input('description');
        $photoCategory->save();

        return response()->json(['message' => 'Photo category created successfully.']);
    }
}
