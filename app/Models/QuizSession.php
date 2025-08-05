<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizSession extends Model
{
    use HasFactory;

    protected $fillable = [
        "token",
        "score",
        "expired_at",
    ];

    public function quizAnswers()
    {
        return $this->hasMany(QuizAnswer::class);
    }
}
