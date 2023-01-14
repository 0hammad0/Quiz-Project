<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticlesContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'heading',
        'image_path',
        'article_id',
        'description'
    ];

    public function seriesType()
    {
        return $this->belongsTo(Article::class);
    }
}
