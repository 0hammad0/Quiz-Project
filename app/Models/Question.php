<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['series_id', 'question_type', 'question_section', 'question', 'description', 'option1', 'option2', 'option3', 'option4', 'answer', 'question_category', 'audio_path', 'video_path', 'file_path'];

    public function series()
    {
        return $this->belongsTo('App\Models\Series');
    }
}
