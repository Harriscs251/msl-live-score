<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;

class AdminController extends Controller
{
    public function showFeedbacks()
    {
        // Fetch all feedbacks with the related user data
        $feedbacks = Feedback::with('user')->latest()->paginate(10);

        // Return the view with feedback data
        return view('admin.feedbacks', compact('feedbacks'));
    }
}

