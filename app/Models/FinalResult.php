<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalResult extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'series_id', 'question_id', 'result', 'result_future', 'question', 'ques_answer', 'user_answer', 'ques_desc', 'file_path', 'video_path'];
}
