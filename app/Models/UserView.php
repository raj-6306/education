<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserView extends Model
{
    use HasFactory;
    protected $table = 'user_views';
    protected $fillable = ['topic_id','student_id','quiz_id','status','marks'];
}
