<?php

//
?>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

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

    /* Search box - ĐÃ SỬA LẠI */
    .luxury-navbar .search-box {
        /* min-width: 200px; */
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

    /* Action buttons - ĐÃ SỬA LẠI */
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

    /* User info */
    .luxury-navbar .user-info {
        display: flex;
        align-items: center;
        position: relative;
    }

    .luxury-navbar .logout-btn {
        background: none;
        border: none;
        color: var(--gold-color);
        padding: 8px 12px;
        transition: all var(--transition-time) ease;
        border-radius: 30px;
        display: flex;
        align-items: center;
        font-size: 14px;
        white-space: nowrap;
    }

    .luxury-navbar .logout-btn:hover {
        color: white;
        background-color: rgba(212, 175, 55, 0.2);
    }

    .luxury-navbar .logout-btn i {
        margin-right: 6px;
        transition: all var(--transition-time) ease;
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
</style>

<body>
    @if (session('messageLogin'))
        <script>
            alert('{{ session('messageLogin') }}');
        </script>
    @endif
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark luxury-navbar sticky-top">
        <div class="container">
            <!-- Sidebar toggle button -->
            <button class="navbar-toggler me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#luxurySidebar"
                aria-controls="luxurySidebar">
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

            <!-- Search and action buttons - ĐÃ SỬA LẠI -->
            <div class="d-flex align-items-center">
                <!-- Search box -->
                <div class="search-container">
                    <form action="{{ route('search') }}" method="GET" class="search-box d-flex">
                        <input type="text" id="search" name="query" class="form-control search-input"
                            placeholder="Tìm kiếm..." value="{{ request('query') }}">
                        <button type="submit" class="btn btn-outline-secondary">
                            <i class="fas fa-search"></i>
                    </form>
                </div>

                <!-- Action buttons container -->
                <div class="action-buttons">
                    <!-- Giỏ hàng -->
                    {{-- <a href="javascript:void(0);" class="nav-action cart-btn animate__animated animate__fadeIn"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart"> --}}
                    <a href="http://127.0.0.1:8000/cart" class="nav-action cart-btn-animate">

                        <i class="fas fa-shopping-cart"></i>
                        <span>Giỏ hàng</span>
                        {{-- <span class="cart-count">{{  }}</span> --}}
                    </a>


                    <!-- Phần đăng nhập/đăng xuất -->
                    @auth
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-action logout-btn">
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
                    <span class="cart-count">3</span>
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Đăng nhập
                    </button>
                @endauth
            </div>
        </div>
    </div>

    {{-- form login --}}
    <div class="modal fade" id="loginModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                {{-- thông báo lỗi chưa dang nhap --}}
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <strong>Thông báo:</strong> Bạn cần đăng nhập để thực hiện chức năng này.
                </div>
                <div class="modal-header">

                    <h5 class="modal-title">Wellcome Back!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    @if ($errors->any())
                        <div class="alert alert-danger w-100">{{ $errors->first() }}</div>
                    @endif
                </div>
                <div class="modal-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <div class="input-group">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter your password">
                                <span class="input-group-text password-toggle">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>

                        <div class="form-check">
                            <div>
                                <input type="checkbox" class="form-check-input" id="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <a href="#" class="text-decoration-none">Forgot password?</a>
                        </div>

                        <button type="submit" class="btn btn-login btn-primary w-100">Sign In</button>

                        <div class="divider">
                            <span>or continue with</span>
                        </div>

                        <div class="social-login">
                            <button type="button" class="btn btn-social">
                                <i class="fab fa-google"></i>Google
                            </button>
                            <button type="button" class="btn btn-social">
                                <i class="fab fa-facebook-f"></i>Facebook
                            </button>
                        </div>

                        <div class="register-link">
                            Don't have an account? <a href="#" class="text-decoration-none">Register now</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Tự động mở modal đăng nhập khi trang được tải
        document.addEventListener('DOMContentLoaded', function() {
            // Kiểm tra nếu có thông báo lỗi đăng nhập
            const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
            loginModal.show();

            // Hoặc nếu bạn muốn luôn mở modal (không cần điều kiện)
            // const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
            // loginModal.show();
        });
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.querySelector('.luxury-navbar');
            const logo = document.querySelector('.navbar-brand img');

            // Scroll effect
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                    logo.style.maxHeight = '40px';
                } else {
                    navbar.classList.remove('scrolled');
                    logo.style.maxHeight = '45px';
                }
            });

            // Optimized gold particles effect
            const goldActions = document.querySelectorAll('.nav-action, .nav-link, .btn');
            let activeParticles = 0;
            const maxParticles = 15; // Giới hạn số particles

            goldActions.forEach(element => {
                element.addEventListener('mouseover', function(e) {
                    if (activeParticles < maxParticles) {
                        createParticles(e.currentTarget, e.clientX, e.clientY);
                    }
                });
            });

            function createParticles(element, x, y) {
                const rect = element.getBoundingClientRect();
                const colors = ['#D4AF37', '#FFD700', '#F8E6C0', '#FFEC8B'];

                // Clean up finished particles
                const particles = element.querySelectorAll('.gold-particle');
                particles.forEach(p => {
                    if (getComputedStyle(p).opacity === '0') {
                        p.remove();
                        activeParticles--;
                    }
                });

                // Create new particles
                for (let i = 0; i < 3 && activeParticles < maxParticles; i++) {
                    activeParticles++;
                    const particle = document.createElement('div');
                    particle.className = 'gold-particle';

                    const size = Math.random() * 3 + 2; // Smaller particles
                    const color = colors[Math.floor(Math.random() * colors.length)];
                    const duration = Math.random() * 1.5 + 1; // Shorter duration

                    particle.style.width = `${size}px`;
                    particle.style.height = `${size}px`;
                    particle.style.backgroundColor = color;
                    particle.style.left = `${x - rect.left + (Math.random() * 10 - 5)}px`;
                    particle.style.top = `${y - rect.top + (Math.random() * 10 - 5)}px`;
                    particle.style.opacity = '0.8';

                    element.appendChild(particle);

                    particle.animate([{
                            transform: 'translate(0, 0) scale(1)',
                            opacity: 0.8
                        },
                        {
                            transform: `translate(${Math.random() * 20 - 10}px, ${Math.random() * 20 - 10}px) scale(0.2)`,
                            opacity: 0
                        }
                    ], {
                        duration: duration * 1000,
                        easing: 'cubic-bezier(0.4, 0, 0.2, 1)'
                    }).onfinish = () => {
                        particle.remove();
                        activeParticles--;
                    };
                }
            }

            // Optimized cart button click effect
            document.querySelectorAll('.cart-btn').forEach(btn => {
                let clickTimeout;

                btn.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Clear any pending animations
                    if (clickTimeout) clearTimeout(clickTimeout);

                    // Remove existing ripples
                    const ripples = btn.querySelectorAll('.gold-ripple');
                    ripples.forEach(r => r.remove());

                    // Create new ripple
                    const ripple = document.createElement('span');
                    ripple.className = 'gold-ripple';
                    const size = Math.max(btn.offsetWidth, btn.offsetHeight);
                    ripple.style.width = ripple.style.height = `${size}px`;
                    ripple.style.left = `${e.offsetX - size/2}px`;
                    ripple.style.top = `${e.offsetY - size/2}px`;
                    btn.appendChild(ripple);

                    // Remove ripple after animation
                    clickTimeout = setTimeout(() => {
                        ripple.remove();
                    }, 600);

                    // Thực tế bạn sẽ mở modal giỏ hàng ở đây
                    console.log('Mở giỏ hàng');
                });
            });

            // Animate elements on scroll
            const animateOnScroll = () => {
                const elements = document.querySelectorAll('.animate__animated');
                elements.forEach(element => {
                    const elementPosition = element.getBoundingClientRect().top;
                    const screenPosition = window.innerHeight / 1.2;
                    if (elementPosition < screenPosition) {
                        element.classList.add('animate__fadeInRight');
                    }
                });
            };
            // Thêm active class cho menu item tương ứng với trang hiện tại
            const currentUrl = window.location.href;
            document.querySelectorAll('.nav-link').forEach(link => {
                if (link.href === currentUrl) {
                    link.closest('.nav-item').classList.add('active');
                }
            });

            window.addEventListener('scroll', animateOnScroll);
            animateOnScroll(); // Run once on load
        });
    </script>
</body>
