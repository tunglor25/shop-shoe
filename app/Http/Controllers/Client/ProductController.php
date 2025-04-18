<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Trang Danh Sách Sản Phẩm';
        // Lấy sản phẩm có trạng thái là 1 (hoạt động) và danh mục hoạt động
        $query = Product::with(['category' => function($q) {
                $q->where('status', 1);
            }])
            ->where('status', 1);

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        // Chỉ lấy danh mục đang hoạt động
        $categories = Category::where('status', 1)->get();

        // chỉ lấy slide đang hoạt động
        $slides = Slide::where('status', 1)
            ->orderByDesc('id')
            ->get();
            // dd($slides);

        $products = $query->orderByDesc('id')->paginate(6);

        return view('client.home', compact('title', 'products', 'categories', 'slides'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // Kiểm tra nếu sản phẩm hoặc danh mục không hoạt động thì redirect hoặc 404
        if ($product->status != 1 || $product->category->status != 1) {
            abort(404);
        }

        $title = 'Trang chi tiết sản phẩm';

        // Lấy sản phẩm cùng loại, đang hoạt động và danh mục hoạt động
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('status', 1)
            ->whereHas('category', function($q) {
                $q->where('status', 1);
            })
            ->where('id', '!=', $product->id)
            ->get();

        return view('client.detail', compact('title', 'product', 'relatedProducts'));
    }

    // Phương thức tìm kiếm sản phẩm
    public function search(Request $request)
    {
        $searchTerm = $request->input('query');
        $selectedCategories = $request->input('categories', []);

        if (empty($searchTerm)) {
            return redirect()->route('shop');
        }

        // Giá trị mặc định
        $defaultMaxPrice = 10000000; // 10 triệu
        $minPrice = (float)$request->input('min_price', 0);
        $maxPrice = (float)$request->input('max_price', $defaultMaxPrice);

        // Các mức lọc giá mới theo yêu cầu
        $priceRanges = [
            'duoi-500k' => ['min' => 0, 'max' => 500000],
            '500k-1m' => ['min' => 500000, 'max' => 1000000],
            '1m-5m' => ['min' => 1000000, 'max' => 5000000],
            'tren-5m' => ['min' => 5000000, 'max' => 100000000], // Giới hạn trên 100 triệu
        ];

        // Áp dụng bộ lọc giá nếu được chọn
        if ($request->has('price_range') && array_key_exists($request->price_range, $priceRanges)) {
            $selectedRange = $priceRanges[$request->price_range];
            $minPrice = $selectedRange['min'];
            $maxPrice = $selectedRange['max'];
        }

        // Chỉ tìm kiếm sản phẩm và danh mục đang hoạt động
        $query = Product::with(['category' => function($q) {
                $q->where('status', 1);
            }])
            ->where('status', 1)
            ->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%')
                    ->orWhereHas('category', function ($q) use ($searchTerm) {
                        $q->where('status', 1)
                          ->where('name', 'like', '%' . $searchTerm . '%');
                    });
            })
            ->whereBetween('price', [$minPrice, $maxPrice]);

        if (!empty($selectedCategories)) {
            $query->whereIn('category_id', $selectedCategories);
        }

        $query->orderByDesc('id');
        $products = $query->latest()->paginate(12);

        // Chỉ lấy danh mục đang hoạt động
        $categories = Category::where('status', 1)->get();

        return view('client.search', [
            'products' => $products,
            'searchTerm' => $searchTerm,
            'categories' => $categories,
            'title' => $searchTerm . " - Tìm kiếm trên SoleMate",
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'priceRanges' => $priceRanges,
            'selectedPriceRange' => $request->price_range,
            'selectedCategories' => $selectedCategories,
            'isSearchPage' => true,
        ]);
    }

    public function shop(Request $request)
    {
        // Chỉ lấy sản phẩm và danh mục đang hoạt động
        $query = Product::with(['category' => function($q) {
                $q->where('status', 1);
            }])
            ->where('status', 1);

        // Lọc theo khoảng giá nếu có
        if ($request->has(['min_price', 'max_price'])) {
            $query->whereBetween('price', [
                $request->input('min_price', 0),
                $request->input('max_price', 10000000)
            ]);
        }

        // Lọc theo danh mục nếu có
        if ($request->has('categories')) {
            $query->whereIn('category_id', $request->input('categories', []));
        }

        // Luôn sắp xếp theo id giảm dần
        $query->orderByDesc('id');

        // Tính lại max price cho thanh lọc
        $defaultMaxPrice = 10000000;
        $maxPriceInResults = (float)$query->max('price') ?? $defaultMaxPrice;

        $products = $query->paginate(12);

        // Các mức lọc giá mới theo yêu cầu
        $priceRanges = [
            'duoi-500k' => ['min' => 0, 'max' => 500000],
            '500k-1m' => ['min' => 500000, 'max' => 1000000],
            '1m-5m' => ['min' => 1000000, 'max' => 5000000],
            'tren-5m' => ['min' => 5000000, 'max' => 100000000],
        ];

        // Xác định khoảng giá được chọn
        $selectedPriceRange = $request->input('price_range');

        // Chỉ lấy danh mục đang hoạt động
        $categories = Category::where('status', 1)->get();

        return view('client.shop', [
            'products' => $products,
            'categories' => $categories,
            'title' => 'Cửa hàng',
            'minPrice' => $request->input('min_price', 0),
            'maxPrice' => $request->input('max_price', $maxPriceInResults),
            'priceRanges' => $priceRanges,
            'selectedPriceRange' => $selectedPriceRange,
            'selectedCategories' => $request->input('categories', []),
            'isSearchPage' => false,
        ]);
    }
}
