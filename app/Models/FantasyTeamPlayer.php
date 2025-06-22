<?php

// app/Models/FantasyTeamPlayer.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FantasyTeamPlayer extends Model
{
    use HasFactory;

    protected $fillable = [
        'fantasy_team_id', 'player_id', 'is_captain', 'is_vice_captain',
    ];

    // Relationship: FantasyTeamPlayer belongs to a player
    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    // Relationship: FantasyTeamPlayer belongs to a fantasy team
    public function fantasyTeam()
    {
        return $this->belongsTo(FantasyTeam::class);
    }

    // Method to update fantasy team points
    public function updateFantasyTeamPoints()
    {
        $teamPlayers = $this->fantasyTeam->players; // All players in the team
        $totalPoints = 0;

        // Loop through the players and sum up their points
        foreach ($teamPlayers as $teamPlayer) {
            $totalPoints += $teamPlayer->player->total_points; // Make sure this matches the column name in the players table
        }

        // Update the fantasy team's total points
        $this->fantasyTeam->points = $totalPoints;
        $this->fantasyTeam->save();
    }
}