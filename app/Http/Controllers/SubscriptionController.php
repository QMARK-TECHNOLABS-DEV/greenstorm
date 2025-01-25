<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        // Validate the email address
        $request->validate([
            'email' => 'required|email|unique:subscriptions',
        ]);

        // Create a new subscription record in the database
        $subscription = Subscription::create([
            'email' => $request->input('email'),
        ]);

        // Send a response indicating success
        return response()->json(['message' => 'Subscription successful!']);
    }
}
