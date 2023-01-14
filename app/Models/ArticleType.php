<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArticleType extends Model
{
    use HasFactory;

    protected $fillable = [
        'articleType',
    ];

    public function article()
    {
        return $this->hasMany(Article::class);
    }
}
