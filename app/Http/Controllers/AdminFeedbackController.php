<?php

namespace App\Http\Controllers;

use App\Models\Feedback;

class AdminFeedbackController extends Controller
{
    // Show all feedback for the admin
    public function index()
    {
        // Fetch feedbacks along with user data
        $feedbacks = Feedback::with('user')->get();
        return view('admin.feedbacks.index', compact('feedbacks'));
    }
}
