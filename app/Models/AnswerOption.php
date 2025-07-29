<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_url',
        'question_id', // O ID da pergunta associada
    ];

    // Define a relação com a pergunta
    public function question() {
        return $this->belongsTo(Question::class);
    }
}
