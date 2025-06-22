<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\FantasyTeamPlayer;
use App\Models\FantasyLeaderboard;
use App\Models\FantasyTeam;
use Illuminate\Support\Facades\DB;

class AdminPlayerPointController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $playersQuery = Player::query();
        
        // If search parameter exists, filter results
        if ($search) {
            $playersQuery->where('name', 'like', '%' . $search . '%')
                         ->orWhere('position', 'like', '%' . $search . '%')
                         ->orWhere('id', 'like', '%' . $search . '%');
        }
        
        $players = $playersQuery->orderBy('name')->paginate(20);
        
        return view('admin.players.points.index', compact('players'));
    }

    public function edit($id)
    {
        $player = Player::findOrFail($id);
        return view('admin.players.points.edit', compact('player'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'total_points' => 'required|numeric',
        ]);

        $player = Player::findOrFail($id);
        
        // Store the point difference
        $pointDifference = $validated['total_points'] - $player->total_points;
        
        // Update player points
        $player->total_points = $validated['total_points'];
        $player->save();

        // If points were changed, update fantasy leaderboards
        if ($pointDifference != 0) {
            $this->updateFantasyLeaderboards($player->id, $pointDifference);
        }

        return redirect()->route('admin.players.points')->with('success', 'Player points updated successfully and fantasy leaderboards updated.');
    }

    private function updateFantasyLeaderboards($playerId, $pointDifference)
    {
        // Find all fantasy teams that include this player
        $fantasyTeams = FantasyTeam::whereHas('players', function($query) use ($playerId) {
            $query->where('players.id', $playerId);
        })->get();
        
        foreach ($fantasyTeams as $team) {
            // Get or create leaderboard entry for the team's user
            $leaderboard = FantasyLeaderboard::firstOrNew(['user_id' => $team->user_id]);
            
            if (!$leaderboard->exists) {
                $leaderboard->points = 0;
            }
            
            // Update points
            $leaderboard->points += $pointDifference;
            $leaderboard->save();
        }
    }
}