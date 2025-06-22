<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchPoll extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fixture_id',
        'vote',
    ];

    // Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔍 Check if a specific user has already voted for a match
    public static function hasUserVoted($userId, $fixtureId)
    {
        return self::where('user_id', $userId)
            ->where('fixture_id', $fixtureId)
            ->exists();
    }

    // 📊 Get vote counts grouped by option
    public static function getVoteStats($fixtureId)
    {
        $votes = self::where('fixture_id', $fixtureId)->get();

        return [
            'home' => $votes->where('vote', 'home')->count(),
            'away' => $votes->where('vote', 'away')->count(),
            'draw' => $votes->where('vote', 'draw')->count(),
            'total' => $votes->count()
        ];
    }
}
