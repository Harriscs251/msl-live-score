<?php

namespace App\Http\Controllers;

use App\Models\FantasyTeam;
use App\Models\FantasyTeamPlayer;
use App\Models\FantasyLeaderboard;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FantasyTeamController extends Controller
{
    /**
     * Show the form to create a fantasy team.
     */
    public function create()
    {
        $players = Player::all();
        return view('fantasy.create', compact('players'));
    }

    /**
     * Store the created fantasy team and assign players.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'players' => 'required|array|size:7',
            'captain' => 'required|integer|exists:players,id',
            'vice_captain' => 'required|integer|exists:players,id',
        ]);

        // Get selected player objects
        $players = Player::whereIn('id', $validated['players'])->get();

        $totalPrice = $players->sum('price');
        if ($totalPrice > 50) {
            return redirect()->back()->with('error', 'Your team exceeds the 50 million budget! Please select cheaper players.');
        }

        $existingTeam = FantasyTeam::where('user_id', Auth::id())->first();
        if ($existingTeam) {
            return redirect()->route('fantasy.team.show', $existingTeam->id)
                             ->with('error', 'You already have a team!');
        }

        $fantasyTeam = FantasyTeam::create([
            'user_id' => Auth::id(),
            'name' => Auth::user()->name . "'s Team",
            'budget' => 50,
        ]);

        foreach ($validated['players'] as $playerId) {
            FantasyTeamPlayer::create([
                'fantasy_team_id' => $fantasyTeam->id,
                'player_id' => $playerId,
                'is_captain' => $validated['captain'] == $playerId,
                'is_vice_captain' => $validated['vice_captain'] == $playerId,
            ]);
        }

        // ✅ Create leaderboard row if not exist
        FantasyLeaderboard::firstOrCreate([
            'user_id' => Auth::id(),
        ], [
            'points' => 0
        ]);

        session(['team_id' => $fantasyTeam->id]);

        return redirect()->route('fantasy.team.create')
                         ->with('success', 'Team created successfully!');
    }

    /**
     * Show the created fantasy team and badge if in top 3.
     */
    public function show($id)
    {
        $fantasyTeam = FantasyTeam::with('players')->findOrFail($id);

        // Ensure user owns the team
        if ($fantasyTeam->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access to this fantasy team.');
        }

        $totalPrice = $fantasyTeam->players->sum('price');

        // Get leaderboard ordered by points
        $leaderboard = FantasyLeaderboard::orderByDesc('points')->get();

        // Find user's rank
        $userRank = $leaderboard->search(fn($entry) => $entry->user_id === auth()->id()) + 1;

        // Assign badge based on rank
        $badge = null;
        if ($userRank === 1) {
            $badge = '🥇 1st Place';
        } elseif ($userRank === 2) {
            $badge = '🥈 2nd Place';
        } elseif ($userRank === 3) {
            $badge = '🥉 3rd Place';
        }

        return view('fantasy.show', compact('fantasyTeam', 'totalPrice', 'badge'));
    }

    /**
     * Delete the fantasy team.
     */
    public function destroy($id)
    {
        $fantasyTeam = FantasyTeam::findOrFail($id);

        if ($fantasyTeam->user_id !== auth()->id()) {
            return redirect()->route('fantasy.team.create')->with('success', 'Your team has been deleted successfully!');
        }

        $fantasyTeam->players()->detach();
        $fantasyTeam->delete();

        return redirect()->route('fantasy.team.create')->with('success', 'Your team has been deleted successfully!');
    }

    /**
     * Update the player points in the pivot table.
     */
    public function updatePlayerPoints(Request $request, $playerId)
    {
        // Find the player by ID
        $player = Player::findOrFail($playerId);

        // Validate the input points
        $request->validate([
            'total_points' => 'required|numeric',
        ]);

        // Update the points in the pivot table (fantasy_team_player pivot table)
        $player->pivot->total_points = $request->input('total_points');
        $player->pivot->save(); // Save the updated pivot data

        // Redirect with a success message
        return redirect()->route('admin.fantasy.team.index')
                     ->with('success', 'Player points updated successfully!');
    }
}
