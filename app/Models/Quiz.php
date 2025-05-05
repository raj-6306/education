<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'class_id',
        'subject_id',
        'topic_id',
        'quiz_type',
        'question',
        'answer',
        'marks',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
    ];
}
