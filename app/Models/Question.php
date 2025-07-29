<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'show_option_total',
        'voting_active',
    ];

    protected $casts = [
        'show_option_total' => 'boolean',
        'voting_active' => 'boolean',
    ];

    public function options() {
        return $this->hasMany(AnswerOption::class); 
    }
}
