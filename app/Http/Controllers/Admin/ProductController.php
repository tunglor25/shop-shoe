<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     */
    public function index(Request $request)
    {
        $title = 'Danh sách sản phẩm';

        $query = Product::with('category'); // Load quan hệ category để tránh N+1 query

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->orderByDesc('id')->paginate(5);

        return view('admin.products.index', compact('title', 'products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $title = 'Thêm mới sản phẩm';
        // Lấy các category đang hoạt động thôi
        $categories = Category::where('status', 1)->get();
        return view('admin.products.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created product.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        // Xử lý upload ảnh
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('uploads/products', 'public');
            $data['image'] = $imagePath;
        }
        // dd($data);

        Product::create($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Thêm mới sản phẩm thành công');
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
        $title = 'Chi tiết sản phẩm';
        return view('admin.products.show', compact('title', 'product'));
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        $title = 'Sửa sản phẩm';
        // Lấy các category đang hoạt động thôi
        $categories = Category::where('status', 1)->get();
        return view('admin.products.edit', compact('title', 'product', 'categories'));
    }

    /**
     * Update the specified product.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();

        // Xử lý ảnh
        if ($request->hasFile('image')) {
            // Lưu ảnh mới
            $image = $request->file('image');
            $imagePath = $image->store('uploads/products', 'public');
            $data['image'] = $imagePath;

            // Xóa ảnh cũ nếu tồn tại
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
        } else {
            // Giữ nguyên ảnh cũ nếu không có ảnh mới
            $data['image'] = $product->image;
        }
        $product->update($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified product.
     */
    public function destroy(Product $product)
    {
        // Xóa ảnh nếu tồn tại
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Xóa sản phẩm thành công');
    }
}
