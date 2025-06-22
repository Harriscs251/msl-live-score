<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    // Show the feedback form
    public function create()
    {
        return view('feedback.create');
    }

    // Store feedback in the database
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'comment' => 'required|string|max:1000',
            'rating' => 'required|integer|between:1,5',
        ]);

        // Store feedback in the database
        Feedback::create([
            'user_id' => Auth::id(),  // Get logged-in user's ID
            'comment' => $validated['comment'],
            'rating' => $validated['rating'],
        ]);

        // Redirect the user with a success message
        return redirect()->route('dashboard')->with('success', 'Feedback submitted successfully');
    }
}
