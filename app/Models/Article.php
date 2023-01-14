<?php

namespace App\Models;

use App\Models\ArticleType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_title',
        'article_type_id',
        'series_type_id'
    ];

    public function seriesType()
    {
        return $this->belongsTo(SeriesType::class);
    }

    public function articleType()
    {
        return $this->hasMany(ArticleType::class);
    }

    public function articleContent()
    {
        return $this->hasMany(ArticlesContent::class);
    }
}
