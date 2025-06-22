<?php

namespace App\Http\Controllers;

use App\Models\FantasyLeaderboard;
use Illuminate\Http\Request;

class FantasyLeaderboardController extends Controller
{
    /**
     * Admin view: Display the fantasy leaderboard with all users and their points.
     */
    public function index()
    {
        $leaderboards = FantasyLeaderboard::with('user')->orderByDesc('points')->get();
        return view('admin.fantasy_leaderboards.index', compact('leaderboards'));
    }

    /**
     * Admin view: Show a form to edit points for a specific user.
     */
    public function edit($id)
    {
        $leaderboard = FantasyLeaderboard::with('user')->findOrFail($id);
        return view('admin.fantasy_leaderboards.edit', compact('leaderboard'));
    }

    /**
     * Admin action: Update the user's points.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'points' => 'required|integer|min:0',
        ]);

        $leaderboard = FantasyLeaderboard::findOrFail($id);
        $leaderboard->points = $request->points;
        $leaderboard->save();

        return redirect()->route('admin.fantasy_leaderboards.index')
                         ->with('success', 'Points updated successfully!');
    }

    /**
     * Public view: Users can view the fantasy leaderboard.
     */
    public function publicIndex()
    {
        $leaderboards = FantasyLeaderboard::with('user')->orderByDesc('points')->get();
        $userPoints = auth()->user()->fantasyLeaderboard->points ?? 0;

        return view('fantasy.leaderboard', compact('leaderboards', 'userPoints'));
    }
}
