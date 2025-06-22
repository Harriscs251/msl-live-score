<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FantasyLeaderboard;
use App\Models\Player;  // Ensure the Player model is imported
use Illuminate\Http\Request;
use App\Models\FantasyTeam;

class AdminFantasyLeaderboardController extends Controller
{
    public function index()
    {
        // Fetch all leaderboards with user data, ordered by points
        $leaderboards = FantasyLeaderboard::with('user')->orderByDesc('points')->get();
        return view('admin.fantasy_leaderboard.index', compact('leaderboards'));
    }

    public function edit($id)
    {
        // Fetch the specific leaderboard to edit
        $leaderboard = FantasyLeaderboard::with('user')->findOrFail($id);
        return view('admin.fantasy_leaderboard.edit', compact('leaderboard'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the points for the leaderboard
        $request->validate([
            'points' => 'required|integer|min:0',
        ]);

        $leaderboard = FantasyLeaderboard::findOrFail($id);
        $leaderboard->points = $request->points;
        $leaderboard->save();

        return redirect()->route('admin.fantasy.leaderboard')->with('success', 'Points updated successfully!');
    }

    public function viewTeam($userId)
    {
        // Fetch the fantasy team for a specific user
        $team = FantasyTeam::with('players')->where('user_id', $userId)->first();

        // Check if the team exists
        if (!$team) {
            return redirect()->route('admin.fantasy.leaderboard')->with('error', 'This user has not created a team yet.');
        }

        // Calculate the total price of players in the team
        $totalPrice = $team->players->sum('price');

        return view('admin.fantasy_leaderboard.view_team', compact('team', 'totalPrice'));
    }

    public function viewPlayers()
    {
        // Fetch all players
        $players = Player::all();  // Adjust according to your Player model

        return view('admin.fantasy_leaderboard.view_players', compact('players'));
    }

    public function assignPoints(Request $request)
    {
        // Loop through each player and update their points
        foreach ($request->points as $playerId => $points) {
            $player = Player::findOrFail($playerId);
            $player->points = $points;
            $player->save();
        }

        return redirect()->route('admin.fantasy.leaderboard.viewPlayers')
                         ->with('success', 'Points updated successfully!');
    }
}
