<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'content',
        'image',
        'news_category_id',
        'views',
        'is_featured',
        'status',
        'published_at'
    ];

    protected $dates = ['published_at'];

    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id');
    }

    // Scope for active news
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    // Scope for featured news
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
