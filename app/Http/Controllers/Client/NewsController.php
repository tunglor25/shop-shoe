<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::active()
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        $featuredNews = News::featured()
            ->active()
            ->where('published_at', '<=', now())
            ->take(3)
            ->get();

        $categories = NewsCategory::withCount(['news' => function($query) {
                $query->where('status', true)
                    ->where('published_at', '<=', now());
            }])
            ->orderBy('name')
            ->get();

        return view('client.news.index', compact('news', 'featuredNews', 'categories'));
    }

    public function show($slug)
    {
        $news = News::with('category')
            ->where('slug', $slug)
            ->where('status', true)
            ->where('published_at', '<=', now())
            ->firstOrFail();

        // Tăng lượt xem
        $news->increment('views');

        $relatedNews = News::where('news_category_id', $news->news_category_id)
            ->where('id', '!=', $news->id)
            ->active()
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->take(4)
            ->get();

        $latestNews = News::active()
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->take(10)
            ->get();

        $categories = NewsCategory::withCount(['news' => function($query) {
                $query->where('status', true)
                    ->where('published_at', '<=', now());
            }])
            ->orderBy('name')
            ->get();

        return view('client.news.show', compact('news', 'relatedNews', 'latestNews', 'categories'));
    }
}
