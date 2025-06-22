<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteTeam extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'team_id', 'team_name', 'team_logo'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}