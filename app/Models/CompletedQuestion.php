<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletedQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['question_count', 'user_id', 'series_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function serie()
    {
        return $this->belongsTo(Series::class);
    }
}
