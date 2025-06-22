<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        // Get top users ordered by points
        $users = User::orderBy('points', 'desc')->take(10)->get();

        return view('leaderboard.index', compact('users'));
    }
}
