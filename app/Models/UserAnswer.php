<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;

    // Define the table if it's not the default (optional)
    // protected $table = 'user_answers';

    // Fillable properties
    protected $fillable = [
        'user_id',
        'question_id',
        'answer_id',
        'is_correct',
    ];

    // Relationship with the User model (assuming a User has many answers)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with the Question model
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    // Relationship with the Answer model
    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }
}
