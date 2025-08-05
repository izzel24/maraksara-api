<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        "quiz_session_id",
        "question_id",
        "answer_id",
        "answer_data"
    ];

    public function session()
    {
        return $this->belongsTo(QuizSession::class, 'quiz_session_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

}
