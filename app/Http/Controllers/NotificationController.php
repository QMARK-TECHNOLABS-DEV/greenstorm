<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();
        $notifications = $user->notifications;
        return view('notifications.index',compact('notifications'));
    }
}
