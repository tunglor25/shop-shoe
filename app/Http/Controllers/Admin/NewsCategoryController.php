<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $categories = NewsCategory::with('parent', 'children')
            ->whereNull('parent_id')
            ->orderBy('order')
            ->get();

        return view('admin.news_categories.index', [
            'title' => 'Quản lý danh mục tin tức',
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $parentCategories = NewsCategory::whereNull('parent_id')->get();

        return view('admin.news_categories.create', [
            'title' => 'Tạo mới danh mục tin tức',
            'parentCategories' => $parentCategories
        ]);
    }

    public function store(Request $request)
    {
        // Merge status để đảm bảo giá trị đúng (true/false)
        $request->merge([
            'status' => $request->has('status') ? true : false
        ]);

        // Validate dữ liệu
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:news_categories,slug',
            'description' => 'nullable',
            'parent_id' => 'nullable|exists:news_categories,id',
            'order' => 'nullable|integer',
            'status' => 'nullable|boolean',
        ]);

        // Nếu validate thất bại, in ra lỗi
        if ($validator->fails()) {
            dd($validator->errors()->all()); // In ra lỗi chi tiết
        }

        // Lấy dữ liệu đã validate
        $validated = $validator->validated();

        // Tạo mới danh mục tin tức trong bảng `news_categories`
        $category = NewsCategory::create([
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'description' => $validated['description'] ?? null,
            'parent_id' => $validated['parent_id'] ?? null,
            'order' => $validated['order'] ?? 0,
            'status' => $validated['status'] ?? false,
        ]);

        // Kiểm tra kết quả sau khi lưu vào cơ sở dữ liệu
        // dd($category); // In ra dữ liệu vừa tạo để kiểm tra

        return redirect()->route('admin.news-categories.index')
            ->with('success', 'Danh mục tin tức đã được tạo thành công');
    }



    public function edit(NewsCategory $newsCategory)
    {
        $parentCategories = NewsCategory::whereNull('parent_id')
            ->where('id', '!=', $newsCategory->id)
            ->get();

        return view('admin.news_categories.edit', [
            'title' => 'Chỉnh sửa danh mục: ' . $newsCategory->name,
            'newsCategory' => $newsCategory,
            'parentCategories' => $parentCategories
        ]);
    }

    public function update(Request $request, NewsCategory $newsCategory)
    {
        // Merge status để đảm bảo giá trị đúng (true/false)
        $request->merge([
            'status' => $request->has('status') ? true : false
        ]);

        // Validate dữ liệu
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:news_categories,slug,' . $newsCategory->id, // Thêm ngoại lệ cho slug đã tồn tại
            'description' => 'nullable',
            'parent_id' => 'nullable|exists:news_categories,id',
            'order' => 'nullable|integer',
            'status' => 'nullable|boolean',
        ]);

        // Nếu validate thất bại, in ra lỗi
        if ($validator->fails()) {
            dd($validator->errors()->all()); // In ra lỗi chi tiết
        }

        // Lấy dữ liệu đã validate
        $validated = $validator->validated();

        // Cập nhật danh mục tin tức
        $newsCategory->update([
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'description' => $validated['description'] ?? null,
            'parent_id' => $validated['parent_id'] ?? null,
            'order' => $validated['order'] ?? 0,
            'status' => $validated['status'] ?? false,
        ]);

        // Redirect và thông báo thành công
        return redirect()->route('admin.news-categories.index')
            ->with('success', 'Danh mục tin tức đã được cập nhật');
    }


    public function destroy(NewsCategory $newsCategory)
    {
        if ($newsCategory->news()->count() > 0 || $newsCategory->children()->count() > 0) {
            return redirect()->back()
                ->with('error', 'Không thể xóa danh mục này vì có chứa tin tức hoặc danh mục con');
        }

        $newsCategory->delete();

        return redirect()->route('admin.news-categories.index')
            ->with('success', 'Danh mục tin tức đã được xóa');
    }
}
