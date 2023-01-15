<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mistake extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'series_id',
        'question_id',
        'seriesType_id',
        'sectionType',
        'result'
    ];
}
