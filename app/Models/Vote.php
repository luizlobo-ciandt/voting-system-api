<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'answer_option_id',
        'question_id',
    ];

    // Define a relação com a opção de resposta
    public function answerOption() {
        return $this->belongsTo(AnswerOption::class);
    }

    // Define a relação com a pergunta
    public function question() {
        return $this->belongsTo(Question::class);
    }}
