<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

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

    public function userTests()
    {
        // return $this->hasOneThrough('App\Models\Test', 'App\Models\User', 'id', s);
        // return $query->where('tests.user_id', auth()->user()->id);
    }
}
