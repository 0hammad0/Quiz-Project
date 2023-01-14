<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'quantity', 'series_type', 'section_type', 'belongs'];

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    public function scopeGetSeriesType($query, $seriesType)
    {
        return $query->where('series_type', $seriesType);
    }

    public function tests()
    {
        return $this->hasMany('App\Models\Test');
    }

    public function learningVideo()
    {
        return $this->hasMany(LearningVideo::class);
    }
}
