<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;

class NewsCategoryController extends Controller
{
    public function show($slug)
    {
        $category = NewsCategory::where('slug', $slug)->firstOrFail();

        $news = News::where('news_category_id', $category->id)
            ->active()
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        $subCategories = NewsCategory::where('parent_id', $category->id)
            ->withCount(['news' => function($query) {
                $query->where('status', true)
                    ->where('published_at', '<=', now());
            }])
            ->get();

        return view('client.news.category', compact('category', 'news', 'subCategories'));
    }
}
