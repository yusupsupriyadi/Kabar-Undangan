<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'tag_id',
        'title',
        'description',
        'thumbnail',
        'content',
    ];

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
}
