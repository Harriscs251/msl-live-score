<?php

// app/Models/FantasyTeam.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FantasyTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'budget',
    ];

    // Relationship: A fantasy team has many players through FantasyTeamPlayer
    public function players()
    {
        return $this->belongsToMany(Player::class, 'fantasy_team_players')
                    ->withPivot('is_captain', 'is_vice_captain');
    }

    // Relationship: A fantasy team belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
