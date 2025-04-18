<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories.
     */
    public function index(Request $request)
    {
        $title = 'Danh sách danh mục';

        $query = Category::query();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $categories = $query->orderByDesc('id')->paginate(5);

        return view('admin.categories.index', compact('title', 'categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        $title = 'Thêm mới danh mục';
        return view('admin.categories.create', compact('title'));
    }

    /**
     * Store a newly created category.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();

        // Xử lý upload ảnh
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('uploads/categories', 'public');
            $data['image'] = $imagePath;
        }

        Category::create($data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Thêm mới danh mục thành công');
    }

    /**
     * Display the specified category.
     */
    public function show(Category $category)
    {
        $title = 'Chi tiết danh mục';
        return view('admin.categories.show', compact('title', 'category'));
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category)
    {
        $title = 'Sửa danh mục';
        return view('admin.categories.edit', compact('title', 'category'));
    }

    /**
     * Update the specified category.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        // Xử lý ảnh
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('uploads/categories', 'public');
            $data['image'] = $imagePath;

            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
        } else {
            $data['image'] = $category->image;
        }

        // Nếu danh mục đang được mở lại (status = 1)
        if ($data['status'] == 1 && $category->status == 0) {
            // Khôi phục trạng thái gốc của sản phẩm
            Product::where('category_id', $category->id)
                ->update(['status' => DB::raw('original_status')]);
        }

        $category->update($data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified category.
     */

    public function destroy(Category $category)
    {
        // 1. Lưu trạng thái gốc của sản phẩm trước khi ẩn
        Product::where('category_id', $category->id)
            ->where('status', '!=', 0) // Chỉ lưu nếu status khác 0 (đang hiển thị)
            ->update([
                'original_status' => DB::raw('status'), // Lưu status hiện tại vào original_status
                'status' => 0 // Ẩn sản phẩm
            ]);

        // 2. Ẩn danh mục
        $category->update(['status' => 0]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Đã ẩn danh mục và các sản phẩm liên quan!');
    }
}
