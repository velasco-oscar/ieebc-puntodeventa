<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        // You'll need to implement your notification logic here
        $notifications = auth()->user()->notifications ?? [];
        return view('notifications.index', compact('notifications'));
    }
}