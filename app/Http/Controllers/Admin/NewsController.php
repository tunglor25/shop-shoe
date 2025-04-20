<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    // Hiển thị danh sách tin tức
    public function index()
    {
        // Lấy tin tức với mối quan hệ category và phân trang
        $news = News::with('category')->latest()->paginate(10);
        $title = 'Quản lý tin tức';
        return view('admin.news.index', compact('news', 'title'));
    }

    // Hiển thị form tạo tin tức mới
    public function create()
    {
        // Lấy tất cả danh mục tin tức
        $categories = NewsCategory::all();
        return view('admin.news.create', compact('categories'));
    }

    // Xử lý việc lưu tin tức mới
    public function store(Request $request)
    {
        // Validate dữ liệu
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:news|max:255',
            'summary' => 'nullable',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'news_category_id' => 'required|exists:news_categories,id',
            'is_featured' => 'nullable|boolean',
            'status' => 'nullable|boolean',
            'published_at' => 'nullable|date'
        ]);

        // Xử lý upload ảnh nếu có
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        // Tạo tin tức mới
        News::create($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'Tin tức đã được tạo thành công');
    }

    // Hiển thị form chỉnh sửa tin tức
    public function edit(News $news)
    {
        // Lấy tất cả danh mục tin tức
        $categories = NewsCategory::all();
        return view('admin.news.edit', compact('news', 'categories'));
    }

    // Xử lý việc cập nhật tin tức
    public function update(Request $request, News $news)
    {
        // Validate dữ liệu
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255|unique:news,slug,' . $news->id, // Ngoại lệ cho slug hiện tại
            'summary' => 'nullable',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'news_category_id' => 'required|exists:news_categories,id',
            'is_featured' => 'nullable|boolean',
            'status' => 'nullable|boolean',
            'published_at' => 'nullable|date'
        ]);

        // Xử lý upload ảnh nếu có
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu tồn tại
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            // Lưu ảnh mới
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        // Cập nhật tin tức
        $news->update($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'Tin tức đã được cập nhật');
    }

    // Xử lý xóa tin tức
    public function destroy(News $news)
    {
        // Xóa ảnh nếu có
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        // Xóa bản ghi tin tức
        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'Tin tức đã được xóa');
    }
}
