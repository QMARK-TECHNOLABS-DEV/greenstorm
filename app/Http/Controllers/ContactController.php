<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required |numeric',
            'message' => 'required',
        ]);
 
        Contact::create($validatedData);
        return response()->json(['success' => true, 'message'=>'Thank you. we will reach you soon.']);
    }
}
