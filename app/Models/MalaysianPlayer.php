<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MalaysianPlayer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'goals',
        'matches_played',
        'market_price',
        'photo',
    ];

    // Optional: Add accessor for full photo URL
    public function getPhotoUrlAttribute()
    {
        if ($this->photo) {
            return asset('storage/' . $this->photo);
        }

        return asset('images/default-player.png'); // Create a default image
    }
}
