<?php

// Import các controller cần sử dụng
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\SlideController as AdminSlideController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\CategoryController as ClientCategoryController;
use App\Http\Controllers\Client\OrderController as ClientOrderController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\UserAccountController as ClientUserAccountController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CÁC ROUTE CHÍNH (CLIENT)
|--------------------------------------------------------------------------
*/

// Trang chủ - hiển thị danh sách sản phẩm (Client)
Route::get('/', [ClientProductController::class, 'index'])->name('home');

// Route xem sản phẩm và tìm kiếm (không yêu cầu đăng nhập)
Route::get('/shop', [ClientProductController::class, 'shop'])->name('shop');
Route::get('/search', [ClientProductController::class, 'search'])->name('search');
Route::get('/products/{product}', [ClientProductController::class, 'show'])->name('products.show');

/*
|--------------------------------------------------------------------------
| CÁC ROUTE XÁC THỰC (AUTHENTICATION)
|--------------------------------------------------------------------------
*/

// Nhóm route dành cho khách (chưa đăng nhập)
Route::middleware('guest')->group(function () {
    // Hiển thị form đăng nhập
    Route::get('/login', [ClientProductController::class, 'login'])
        ->name('login');

    // Xử lý submit form đăng nhập
    Route::post('/login', [AuthController::class, 'login']);
});

// Xử lý đăng xuất - chỉ dành cho người đã đăng nhập
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// Xử lý form đăng ký
Route::post('/register', [AuthController::class, 'register'])->name('register');


/*
|--------------------------------------------------------------------------
| CÁC ROUTE DÀNH CHO CLIENT (NGƯỜI DÙNG THÔNG THƯỜNG) - YÊU CẦU ĐĂNG NHẬP
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    // Trang dashboard của client
    Route::get('/list', function () {
        return view('client.list');
    })->name('client.dashboard');

    // Giỏ hàng
    Route::prefix('cart')
        ->group(function () {
            Route::get('/', [CartController::class, 'index'])->name('cart.index');
            Route::post('/add/{product}', [CartController::class, 'add'])->name('cart.add');
            Route::put('/update/{cart}', [CartController::class, 'update'])->name('cart.update');
            Route::delete('/remove/{cart}', [CartController::class, 'destroy'])->name('cart.remove');
        });

    // Thanh toán
    Route::prefix('checkout')->group(function () {
        Route::get('/', [CheckoutController::class, 'show'])->name('checkout');
        Route::post('/', [CheckoutController::class, 'placeOrder'])->name('checkout.place');
    });

    // Xác nhận đơn hàng
    Route::get('/order/confirmation/{order}', [CheckoutController::class, 'confirmation'])
        ->name('order.confirmation');
    Route::get('/orders', [ClientOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [ClientOrderController::class, 'show'])->name('orders.show');
    Route::post('/orders/{order}/confirm', [ClientOrderController::class, 'confirm'])->name('orders.confirm');
    Route::post('/orders/{order}/cancel', [ClientOrderController::class, 'cancel'])->name('orders.cancel');

     // Hiển thị trang quản lý tài khoản
     Route::get('/my-account', [ClientUserAccountController::class, 'show'])->name('user.account');

     // Cập nhật thông tin cá nhân
     Route::post('/my-account/update-info', [ClientUserAccountController::class, 'updateInfo'])->name('user.update-info');

     // Cập nhật avatar
     Route::post('/my-account/update-avatar', [ClientUserAccountController::class, 'updateAvatar'])->name('user.update-avatar');

     // Đổi mật khẩu
     Route::post('/my-account/change-password', [ClientUserAccountController::class, 'changePassword'])->name('user.change-password');
});

/*
|--------------------------------------------------------------------------
| CÁC ROUTE DÀNH CHO ADMIN (QUẢN TRỊ VIÊN) - YÊU CẦU ĐĂNG NHẬP VÀ QUYỀN ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Trang dashboard của admin
        Route::get('/', function () {
            return view('admin.Dashboard');
        })->name('dashboard');

        // Resource route cho quản lý danh mục (CRUD)
        Route::resource('categories', AdminCategoryController::class);

        // Resource route cho quản lý sản phẩm (CRUD)
        Route::resource('products', AdminProductController::class);

        // Resource route cho quản lý ảnh slide (CRUD)
        Route::resource('slides', AdminSlideController::class);

        // Quản lý đơn hàng
        Route::resource('orders', AdminOrderController::class);
        Route::patch('orders/{order}/update-status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');

        // Quản lý người dùng
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::put('users/{user}/toggle-ban', [UserController::class, 'toggleBan'])
            ->name('users.toggle-ban');
    });
