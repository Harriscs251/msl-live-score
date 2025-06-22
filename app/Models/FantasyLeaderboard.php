<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FantasyLeaderboard extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'points'];

    /**
     * Each leaderboard entry belongs to one user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
