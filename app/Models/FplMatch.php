<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FplMatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',            // ✅ Allow id to be manually set
        'home_team_id',
        'away_team_id',
        'kickoff',
        'status',
    ];
}
