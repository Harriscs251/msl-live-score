<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'team_id',
        'name',
        'position',
        'price',
        'total_points',
        'nationality',
        'market_value',
        'birthdate', // include this if you plan to show age
    ];

    protected $appends = ['age', 'total_goals', 'formatted_market_value'];

    // Relationship: A player can belong to many fantasy teams
    public function fantasyTeams()
    {
        return $this->belongsToMany(FantasyTeam::class, 'fantasy_team_players')
                    ->withPivot('is_captain', 'is_vice_captain');
    }

    // Relationship: A player has many stats
    public function playerStats()
    {
        return $this->hasMany(PlayerStat::class);
    }

    // Accessor: Calculate age from birthdate
    public function getAgeAttribute()
    {
        return $this->birthdate ? Carbon::parse($this->birthdate)->age : null;
    }

    // Accessor: Sum of all goals
    public function getTotalGoalsAttribute()
    {
        return $this->playerStats ? $this->playerStats->sum('goals') : 0;
    }

    // Accessor: Format market value
    public function getFormattedMarketValueAttribute()
    {
        return 'RM ' . number_format($this->market_value, 2);
    }
}
