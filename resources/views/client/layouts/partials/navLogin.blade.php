
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Luxury Shop</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<!-- Đảm bảo bạn đã thêm thư viện này trước thẻ đóng </body> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<style>
    :root {
        --gold-color: #D4AF37;
        --dark-bg: #1a1a1a;
        --light-gold: #f8e6c0;
        --transition-time: 0.4s;
    }

    /* Navbar styles */
    .luxury-navbar {
        background-color: var(--dark-bg) !important;
        border-bottom: 1px solid rgba(212, 175, 55, 0.3);
        box-shadow: 0 2px 15px rgba(212, 175, 55, 0.2);
        padding-top: 1rem;
        padding-bottom: 1rem;
        transition: all var(--transition-time) ease;
        backdrop-filter: blur(5px);
    }

    .luxury-navbar.scrolled {
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        box-shadow: 0 4px 30px rgba(212, 175, 55, 0.3);
        border-bottom: 1px solid var(--gold-color);
    }

    .luxury-navbar .navbar-brand img {
        max-height: 45px;
        transition: all var(--transition-time) ease;
    }

    .luxury-navbar .navbar-brand:hover img {
        transform: scale(1.05);
        filter: drop-shadow(0 0 8px rgba(212, 175, 55, 0.6));
    }

    /* Main navigation */
    .luxury-navbar .nav-link {
        color: white !important;
        font-weight: 500;
        letter-spacing: 0.5px;
        margin: 0 5px;
        position: relative;
        overflow: hidden;
        transition: all var(--transition-time) ease;
    }

    .luxury-navbar .nav-link:before {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        background-color: var(--gold-color);
        transition: all var(--transition-time) ease;
        visibility: hidden;
    }

    .luxury-navbar .nav-link:hover:before {
        width: 70%;
        visibility: visible;
    }

    .luxury-navbar .nav-link:hover {
        color: var(--gold-color) !important;
        transform: scale(1) translateY(-2px);
        text-shadow: 0 0 10px rgba(212, 175, 55, 0.5);
    }

    /* Search box */
    .luxury-navbar .search-box {
        width: 250px;
        border-radius: 30px;
        overflow: hidden;
        border: 1px solid rgba(212, 175, 55, 0.5);
        transition: all var(--transition-time) ease;
        margin-right: 15px;
    }

    .luxury-navbar .search-box:hover {
        box-shadow: 0 0 15px rgba(212, 175, 55, 0.3);
        border-color: var(--gold-color);
    }

    .luxury-navbar .search-box .form-control {
        background-color: rgba(255, 255, 255, 0.05);
        color: white;
        border: none;
        padding: 8px 15px;
        transition: all var(--transition-time) ease;
        font-size: 14px;
    }

    .luxury-navbar .search-box .form-control:focus {
        background-color: rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.1);
    }

    .luxury-navbar .search-box .btn {
        background-color: transparent;
        color: var(--gold-color);
        border: none;
        padding: 0 15px;
        transition: all var(--transition-time) ease;
    }

    .luxury-navbar .search-box .btn:hover {
        color: white;
        background-color: var(--gold-color);
    }

    /* Action buttons */
    .luxury-navbar .action-buttons {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .luxury-navbar .nav-action {
        background: none;
        border: none;
        color: var(--gold-color);
        padding: 8px 12px;
        transition: all var(--transition-time) ease;
        display: flex;
        align-items: center;
        text-decoration: none;
        position: relative;
        border-radius: 30px;
        white-space: nowrap;
        font-size: 14px;
    }

    .luxury-navbar .nav-action:hover {
        color: white;
        background-color: rgba(212, 175, 55, 0.2);
        transform: translateY(-2px);
    }

    .luxury-navbar .nav-action i {
        margin-right: 6px;
        transition: all var(--transition-time) ease;
        font-size: 16px;
    }

    .luxury-navbar .nav-action:hover i {
        transform: scale(1.2);
    }

    .luxury-navbar .cart-count {
        position: absolute;
        top: -5px;
        right: -5px;
        background-color: var(--gold-color);
        color: var(--dark-bg);
        border-radius: 50%;
        width: 18px;
        height: 18px;
        font-size: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        transition: all var(--transition-time) ease;
    }

    /* User dropdown styles */
    .user-dropdown {
        background: none;
        border: none;
        color: var(--gold-color);
        padding: 8px 12px;
        transition: all var(--transition-time) ease;
        display: flex;
        align-items: center;
        border-radius: 30px;
        white-space: nowrap;
        font-size: 14px;
    }

    .user-dropdown:hover {
        color: white;
        background-color: rgba(212, 175, 55, 0.2);
        transform: translateY(-2px);
    }

    .user-avatar {
        width: 32px;
        height: 32px;
        margin-right: 8px;
        object-fit: cover;
        border: 1px solid rgba(212, 175, 55, 0.5);
        transition: all var(--transition-time) ease;
        border-radius: 50%;
    }

    .user-dropdown:hover .user-avatar {
        border-color: var(--gold-color);
        transform: scale(1.05);
    }

    .avatar-placeholder {
        width: 32px;
        height: 32px;
        margin-right: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: rgba(212, 175, 55, 0.2);
        color: var(--gold-color);
        border-radius: 50%;
        font-weight: bold;
        transition: all var(--transition-time) ease;
    }

    .user-dropdown:hover .avatar-placeholder {
        background-color: var(--gold-color);
        color: var(--dark-bg);
    }

    .dropdown-menu {
        background-color: var(--dark-bg);
        border: 1px solid rgba(212, 175, 55, 0.3);
        box-shadow: 0 5px 15px rgba(212, 175, 55, 0.2);
        animation: fadeInDown 0.3s ease forwards;
    }

    .dropdown-item {
        color: white;
        padding: 8px 16px;
        transition: all var(--transition-time) ease;
    }

    .dropdown-item:hover {
        background-color: var(--gold-color);
        color: var(--dark-bg);
        transform: translateX(5px);
    }

    .dropdown-divider {
        border-color: rgba(212, 175, 55, 0.3);
    }

    .dropdown-toggle::after {
        margin-left: 8px;
        color: var(--gold-color);
        transition: all var(--transition-time) ease;
    }

    .user-dropdown:hover .dropdown-toggle::after {
        color: white;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Offcanvas sidebar */
    .offcanvas-luxury {
        background-color: var(--dark-bg);
        color: white;
        border-right: 1px solid var(--gold-color);
    }

    .offcanvas-luxury .nav-link {
        color: white !important;
        padding: 12px 20px;
        margin: 5px 0;
        border-radius: 5px;
        transition: all var(--transition-time) ease;
    }

    .offcanvas-luxury .nav-link:hover {
        background-color: var(--gold-color) !important;
        color: var(--dark-bg) !important;
        transform: translateX(5px);
        box-shadow: 5px 0 15px rgba(212, 175, 55, 0.3);
    }

    .offcanvas-luxury .offcanvas-header {
        border-bottom: 1px solid var(--gold-color);
    }

    .offcanvas-luxury .offcanvas-title {
        color: var(--gold-color);
        font-weight: 600;
        text-shadow: 0 0 10px rgba(212, 175, 55, 0.3);
    }

    .offcanvas-luxury .btn-close {
        filter: invert(1) sepia(1) saturate(5) hue-rotate(0deg);
        transition: all var(--transition-time) ease;
    }

    .offcanvas-luxury .btn-close:hover {
        transform: rotate(90deg);
    }

    /* Mobile actions */
    .mobile-actions {
        display: flex;
        justify-content: space-around;
        margin-top: 20px;
    }

    .mobile-actions .nav-action {
        flex: 1;
        margin: 0 5px;
        text-align: center;
        padding: 10px;
        border-radius: 5px;
        background-color: rgba(212, 175, 55, 0.1);
    }

    /* Floating gold particles effect */
    .gold-particle {
        position: absolute;
        background-color: var(--gold-color);
        border-radius: 50%;
        pointer-events: none;
        z-index: -1;
        opacity: 0;
    }

    /* Gold ripple effect */
    .gold-ripple {
        position: absolute;
        background-color: rgba(212, 175, 55, 0.3);
        border-radius: 50%;
        transform: scale(0);
        animation: ripple 0.6s linear;
        pointer-events: none;
    }

    @keyframes ripple {
        to {
            transform: scale(2.5);
            opacity: 0;
        }
    }

    /* Gradient underline for active nav item */
    .nav-item.active .nav-link:after {
        content: '';
        position: absolute;
        width: 70%;
        height: 2px;
        bottom: 0;
        left: 15%;
        background: linear-gradient(90deg, transparent, var(--gold-color), transparent);
        animation: underlineGlow 2s infinite;
    }

    @keyframes underlineGlow {
        0% {
            opacity: 0.5;
        }

        50% {
            opacity: 1;
        }

        100% {
            opacity: 0.5;
        }
    }

    /* Gold pulse effect */
    @keyframes goldPulse {
        0% {
            box-shadow: 0 0 0 0 rgba(212, 175, 55, 0.4);
        }

        70% {
            box-shadow: 0 0 0 10px rgba(212, 175, 55, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(212, 175, 55, 0);
        }
    }

    .gold-pulse {
        animation: goldPulse 2s infinite;
    }

    .cart-item input[type="number"] {
        max-width: 60px;
        text-align: center;
    }

    /* Thêm style cho loading spinner */
    .btn-loading .spinner-border {
        vertical-align: middle;
        margin-right: 8px;
    }

    /* Style cho error container */
    #registerErrors {
        margin-bottom: 1rem;
    }

    /* Additional styles for better UX */
    .nav-action {
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    .nav-action:hover {
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 3px 10px rgba(212, 175, 55, 0.2);
    }

    /* Form input focus effects */
    .form-control:focus {
        border-color: var(--gold-color);
        box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
    }

    /* Button hover effects */
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(212, 175, 55, 0.3);
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
        .luxury-navbar .search-container {
            order: 1;
            width: 100%;
            margin: 10px 0;
        }

        .luxury-navbar .action-buttons {
            order: 2;
            width: 100%;
            justify-content: flex-end;
        }

        .auth-buttons {
            gap: 5px;
        }

        .nav-action span {
            display: none;
        }

        .nav-action i {
            margin-right: 0;
            font-size: 1.2rem;
        }
    }

    /* Loading spinner for form submission */
    .loading-spinner {
        display: inline-block;
        width: 1rem;
        height: 1rem;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top-color: white;
        animation: spin 1s ease-in-out infinite;
        margin-left: 8px;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    .dropdown-menu-luxury {
        background-color: var(--dark-bg);
        border: 1px solid rgba(212, 175, 55, 0.5);
        box-shadow: 0 5px 25px rgba(212, 175, 55, 0.2);
        min-width: 280px;
        padding: 0;
        overflow: hidden;
        animation: fadeInDown 0.3s ease forwards;
    }

    .dropdown-header {
        padding: 12px 16px;
        background: rgba(212, 175, 55, 0.1);
        border-bottom: 1px solid rgba(212, 175, 55, 0.2);
    }

    .dropdown-item {
        color: #fff;
        padding: 10px 16px;
        transition: all 0.3s ease;
        position: relative;
        border-left: 3px solid transparent;
    }

    .dropdown-item:hover {
        background-color: rgba(212, 175, 55, 0.1);
        color: var(--gold-color);
        border-left: 3px solid var(--gold-color);
        padding-left: 20px;
    }

    .dropdown-item i {
        width: 20px;
        text-align: center;
    }

    .logout-item:hover {
        background-color: rgba(255, 0, 0, 0.1) !important;
        color: #ff6b6b !important;
    }

    .text-gold {
        color: var(--gold-color);
        opacity: 0.8;
    }

    .user-avatar {
        width: 36px;
        height: 36px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid rgba(212, 175, 55, 0.5);
    }

    .avatar-placeholder {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: rgba(212, 175, 55, 0.2);
        color: var(--gold-color);
        border-radius: 50%;
        font-weight: bold;
        font-size: 14px;
    }
</style>
@if (session('messageLogin'))
    <script>
        alert('{{ session('messageLogin') }}');
    </script>
@endif
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark luxury-navbar sticky-top">
    <div class="container">
        <!-- Sidebar toggle button -->
        <button class="navbar-toggler me-3" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#luxurySidebar" aria-controls="luxurySidebar">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Logo -->
        <a class="navbar-brand me-auto" href="#">
            <img src="{{ asset('css/logo.png') }}" class="gold-pulse" style="max-height: 50px;" alt="Luxury Logo">
        </a>

        <!-- Main menu - visible on lg screens -->
        <div class="d-none d-lg-flex mx-auto">
            <ul class="navbar-nav">
                <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">TRANG CHỦ</a>
                </li>
                <li class="nav-item {{ request()->routeIs('shop') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('shop') }}">SẢN PHẨM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">DỊCH VỤ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">BỘ SƯU TẬP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">LIÊN HỆ</a>
                </li>
            </ul>
        </div>

        <!-- Search and action buttons -->
        <div class="d-flex align-items-center">
            <!-- Search box -->
            <div class="search-container">
                <form action="{{ route('search') }}" method="GET" class="search-box d-flex">
                    <input type="text" id="search" name="query" class="form-control search-input"
                        placeholder="Tìm kiếm..." value="{{ request('query') }}">
                    <button type="submit" class="btn btn-outline-secondary">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <!-- Action buttons container -->
            <div class="action-buttons">
                <!-- Giỏ hàng -->
                <a href="http://127.0.0.1:8000/cart" class="nav-action cart-btn-animate">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Giỏ hàng</span>
                    {{-- <span class="cart-count">{{ Cart::count() }}</span> --}}
                </a>

                <!-- Phần đăng nhập/đăng xuất -->
                @auth
                    <div class="dropdown user-dropdown ms-2">
                        <button class="btn dropdown-toggle d-flex align-items-center py-2 px-3" type="button"
                            id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- Hiển thị avatar nếu có -->
                            @if (auth()->user()->avatar)
                                <img src="{{ auth()->user()->avatar }}" class="user-avatar me-2" alt="User Avatar">
                            @else
                                <div class="avatar-placeholder me-2">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>
                            @endif
                            <span class="d-none d-lg-inline">{{ auth()->user()->name }}</span>
                        </button>

                        <!-- Dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-luxury dropdown-menu-end" aria-labelledby="userDropdown">
                            <li class="dropdown-header">
                                <div class="d-flex align-items-center">
                                    @if (auth()->user()->avatar)
                                        <img src="{{ auth()->user()->avatar }}" class="user-avatar me-2"
                                            alt="User Avatar">
                                    @else
                                        <div class="avatar-placeholder me-2">
                                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                        </div>
                                    @endif
                                    <div>
                                        <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                                        <small class="text-gold">{{ auth()->user()->email }}</small>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user-circle me-2"></i>Trang cá nhân
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('orders.index') }}">
                                    <i class="fas fa-shopping-bag me-2"></i>Đơn hàng của tôi
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-heart me-2"></i>Yêu thích
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cog me-2"></i>Cài đặt
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item logout-item">
                                        <i class="fas fa-sign-out-alt me-2"></i>Đăng xuất
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <button type="button" class="nav-action login-btn" data-bs-toggle="modal"
                        data-bs-target="#loginModal">
                        <i class="fas fa-user"></i>
                        <span>Đăng nhập</span>
                    </button>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Offcanvas Sidebar -->
<div class="offcanvas offcanvas-start offcanvas-luxury" tabindex="-1" id="luxurySidebar"
    aria-labelledby="luxurySidebarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="luxurySidebarLabel">Menu</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">TRANG CHỦ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('shop') }}">SẢN PHẨM</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">DỊCH VỤ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">BỘ SƯU TẬP</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">LIÊN HỆ</a>
            </li>
        </ul>

        <!-- User menu for mobile -->
        <hr class="my-4" style="border-color: rgba(212, 175, 55, 0.3);">
        <div class="mobile-actions">
            <a href="#" class="nav-action cart-btn">
                <i class="fas fa-shopping-cart"></i>
                <span>Giỏ hàng</span>
                {{-- <span class="cart-count">{{ Cart::count() }}</span> --}}
            </a>
            @auth
                <form action="{{ route('logout') }}" method="POST" class="nav-action">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Đăng xuất</span>
                    </button>
                </form>
            @else
                <button type="button" class="nav-action login-btn" data-bs-toggle="modal"
                    data-bs-target="#loginModal">
                    <i class="fas fa-user"></i>
                    <span>Đăng nhập</span>
                </button>
            @endauth
        </div>
    </div>
</div>

<!-- Modal Đăng Nhập -->
<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Đăng Nhập</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control" name="email"
                                value="{{ old('email') }}" required>
                            <span class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mật khẩu</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" required>
                            <span class="input-group-text password-toggle">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>

                    <div class="mb-3 d-flex justify-content-between">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                        </div>
                        <a href="#" class="text-decoration-none">Quên mật khẩu?</a>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Đăng Nhập</button>

                    <div class="divider my-3">
                        <span>hoặc</span>
                    </div>

                    <div class="social-login d-flex gap-2">
                        <button type="button" class="btn btn-outline-danger flex-grow-1">
                            <i class="fab fa-google me-2"></i>Google
                        </button>
                        <button type="button" class="btn btn-outline-primary flex-grow-1">
                            <i class="fab fa-facebook-f me-2"></i>Facebook
                        </button>
                    </div>

                    <div class="text-center mt-3">
                        Chưa có tài khoản?
                        <a href="#" class="text-decoration-none" data-bs-toggle="modal"
                            data-bs-target="#registerModal" data-bs-dismiss="modal">
                            Đăng ký ngay
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Đăng Ký -->
<div class="modal fade" id="registerModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Đăng Ký Tài Khoản</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Container hiển thị lỗi AJAX -->
                <div id="registerErrors"></div>

                <!-- Thông báo lỗi từ BE khi reload trang -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="registerForm" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tên đăng nhập *</label>
                            <input type="text" class="form-control" name="username"
                                value="{{ old('username') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Họ và tên *</label>
                            <input type="text" class="form-control" name="full_name"
                                value="{{ old('full_name') }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email *</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Mật khẩu *</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Xác nhận mật khẩu *</label>
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Số điện thoại *</label>
                            <input type="tel" class="form-control" name="phone"
                                value="{{ old('phone') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Giới tính</label>
                            <select class="form-select" name="gender">
                                <option value="">Chọn giới tính</option>
                                <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Nam</option>
                                <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Nữ</option>
                                <option value="O" {{ old('gender') == 'O' ? 'selected' : '' }}>Khác</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="agreeTerms" name="agreeTerms"
                            {{ old('agreeTerms') ? 'checked' : '' }}>
                        <label class="form-check-label" for="agreeTerms">
                            Tôi đồng ý với <a href="#" class="text-decoration-none">điều khoản sử dụng</a>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100" id="registerSubmitBtn">Đăng Ký</button>

                    <div class="text-center mt-3">
                        Đã có tài khoản?
                        <a href="#" class="text-decoration-none" data-bs-toggle="modal"
                            data-bs-target="#loginModal" data-bs-dismiss="modal">
                            Đăng nhập ngay
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Hàm xóa backdrop
    function removeAllBackdrops() {
        document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
        document.body.classList.remove('modal-open');
        document.body.style.overflow = '';
        document.body.style.paddingRight = '';
    }

    // Toggle mật khẩu
    document.querySelectorAll('.password-toggle').forEach(toggle => {
        toggle.addEventListener('click', function() {
            const input = this.closest('.input-group').querySelector('input');
            const icon = this.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    });

    // Xử lý chuyển modal và đóng backdrop
    document.querySelectorAll('[data-bs-target="#registerModal"]').forEach(btn => {
        btn.addEventListener('click', () => {
            bootstrap.Modal.getInstance(document.getElementById('loginModal'))?.hide();
            removeAllBackdrops();
        });
    });

    document.querySelectorAll('[data-bs-target="#loginModal"]').forEach(btn => {
        btn.addEventListener('click', () => {
            bootstrap.Modal.getInstance(document.getElementById('registerModal'))?.hide();
            removeAllBackdrops();
        });
    });

    // Đảm bảo xóa backdrop khi đóng modal
    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('hidden.bs.modal', removeAllBackdrops);
    });

    // Xử lý form đăng ký bằng AJAX
    document.getElementById('registerForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);
        const submitBtn = document.getElementById('registerSubmitBtn');
        const originalBtnText = submitBtn.innerHTML;
        const errorContainer = document.getElementById('registerErrors');

        try {
            // Hiển thị loading
            submitBtn.innerHTML =
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Đang xử lý...';
            submitBtn.classList.add('btn-loading');
            submitBtn.disabled = true;
            errorContainer.innerHTML = '';

            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await response.json();

            if (response.ok) {
                // Đăng ký thành công - reload trang
                window.location.reload();
            } else {
                // Hiển thị lỗi bằng tiếng Việt
                let errorHtml = '<div class="alert alert-danger"><ul class="mb-0">';

                if (data.errors) {
                    for (const key in data.errors) {
                        data.errors[key].forEach(error => {
                            // Chuyển đổi thông báo lỗi sang tiếng Việt
                            const vietnameseError = translateErrorToVietnamese(key, error);
                            errorHtml += `<li>${vietnameseError}</li>`;
                        });
                    }
                } else if (data.message) {
                    errorHtml += `<li>${translateErrorToVietnamese('general', data.message)}</li>`;
                } else {
                    errorHtml += '<li>Có lỗi xảy ra khi đăng ký. Vui lòng thử lại sau.</li>';
                }

                errorHtml += '</ul></div>';
                errorContainer.innerHTML = errorHtml;

                // Cuộn lên đầu để xem lỗi
                errorContainer.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        } catch (error) {
            console.error('Error:', error);
            errorContainer.innerHTML =
                '<div class="alert alert-danger">Có lỗi xảy ra, vui lòng thử lại</div>';
        } finally {
            submitBtn.innerHTML = originalBtnText;
            submitBtn.classList.remove('btn-loading');
            submitBtn.disabled = false;
        }
    });

    // Hàm chuyển đổi thông báo lỗi sang tiếng Việt
    function translateErrorToVietnamese(field, error) {
        const translations = {
            'username': {
                'required': 'Vui lòng nhập tên đăng nhập',
                'unique': 'Tên đăng nhập đã được sử dụng',
                'min': 'Tên đăng nhập phải có ít nhất :min ký tự',
                'max': 'Tên đăng nhập không được vượt quá :max ký tự'
            },
            'email': {
                'required': 'Vui lòng nhập địa chỉ email',
                'email': 'Địa chỉ email không hợp lệ',
                'unique': 'Email đã được sử dụng'
            },
            'password': {
                'required': 'Vui lòng nhập mật khẩu',
                'min': 'Mật khẩu phải có ít nhất :min ký tự',
                'confirmed': 'Xác nhận mật khẩu không khớp'
            },
            'phone': {
                'required': 'Vui lòng nhập số điện thoại',
                'regex': 'Số điện thoại không hợp lệ'
            },
            'full_name': {
                'required': 'Vui lòng nhập họ và tên'
            },
            'agreeTerms': {
                'required': 'Bạn phải đồng ý với điều khoản sử dụng'
            },
            'general': {
                'Registration failed': 'Đăng ký không thành công'
            }
        };

        // Tìm bản dịch phù hợp
        if (translations[field] && translations[field][error]) {
            return translations[field][error];
        }

        // Nếu không tìm thấy bản dịch, trả về thông báo gốc
        return error;
    }

    // Tự động mở modal nếu có lỗi từ BE (trường hợp JS bị tắt)
    @if ($errors->any())
        document.addEventListener('DOMContentLoaded', function() {
            const registerModal = new bootstrap.Modal(document.getElementById('registerModal'));
            registerModal.show();
        });
    @endif

    // Add ripple effect to dropdown items
    document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', function(e) {
            if (this.getAttribute('href') === '#') {
                e.preventDefault();
            }

            const rect = this.getBoundingClientRect();
            const ripple = document.createElement('span');
            ripple.className = 'gold-ripple';
            ripple.style.left = `${e.clientX - rect.left}px`;
            ripple.style.top = `${e.clientY - rect.top}px`;
            this.appendChild(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });

    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.luxury-navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>
