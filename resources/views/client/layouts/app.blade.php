<?php
// nếu người dùng đã đăng nhập, lấy thông tin avatar từ session
if (Auth::check()) {
    $user = Auth::user();
    $avatar = $user->avatar; // Giả sử bạn đã lưu đường dẫn avatar trong trường 'avatar' của bảng users
} else {
    $avatar = null; // Nếu chưa đăng nhập, không có avatar
}

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Web bán giày vip')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Biểu tượng Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- Logo trang web -->
    <link rel="icon" href="{{ asset('css/logo.png') }}" type="image/x-icon">

    <!-- NProgress CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* Thanh RGB dài full trang, màu nổi bật */
        #nprogress .bar {
            background: linear-gradient(90deg, red, orange, yellow, green, cyan, blue, violet);
            height: 1.5px;
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100%;
        }

        #nprogress .peg {
            display: none;
        }
    </style>

    @stack('styles')
</head>
<!-- NProgress JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Cấu hình chạy nhanh và hết chiều dài luôn
    NProgress.configure({
        easing: 'linear',
        speed: 300, // Tốc độ nhanh
        trickleSpeed: 200, // Nhỏ giọt nhanh
        showSpinner: false
    });

    // Khi bắt đầu rời trang (hoặc click link)
    window.addEventListener('beforeunload', () => {
        NProgress.start();
        NProgress.set(0.99); // Gần như full chiều dài ngay
    });

    // Khi trang load xong thì kết thúc
    window.addEventListener('load', () => {
        NProgress.done();
    });

    // Click vào link thì chạy lại progress
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', function(e) {
                const href = link.getAttribute('href');
                if (
                    href &&
                    !href.startsWith('#') &&
                    !href.startsWith('javascript:') &&
                    !link.hasAttribute('target')
                ) {
                    NProgress.start();
                    NProgress.set(0.99); // Cho cảm giác chạy full chiều dài
                }
            });
        });
    });
</script>

<body>
    @include('client.layouts.partials.nav')

    <div class="hehe container-fluid">
        <div class="row">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>

    @include('client.layouts.partials.footer')

    <!-- jQuery (nếu bạn dùng) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap Bundle (gồm Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- NProgress JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>

    <!-- Khởi tạo hiệu ứng chuyển trang & dropdown -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Bootstrap dropdown
            var dropdownElements = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
            dropdownElements.map(function(dropdownToggleEl) {
                return new bootstrap.Dropdown(dropdownToggleEl);
            });

            // Bootstrap offcanvas
            var offcanvasElements = [].slice.call(document.querySelectorAll('[data-bs-toggle="offcanvas"]'));
            offcanvasElements.map(function(offcanvasEl) {
                offcanvasEl.addEventListener('click', function() {
                    var target = offcanvasEl.getAttribute('data-bs-target');
                    var offcanvas = new bootstrap.Offcanvas(document.querySelector(target));
                    offcanvas.toggle();
                });
            });

            // Hiệu ứng NProgress khi click link
            document.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', (e) => {
                    const href = link.getAttribute('href');
                    if (
                        href &&
                        !href.startsWith('#') &&
                        !href.startsWith('javascript:') &&
                        !link.hasAttribute('target')
                    ) {
                        NProgress.start();
                    }
                });
            });
        });
    </script>
    <!-- Chatra {literal} -->
    <script>
        (function(d, w, c) {
            w.ChatraID = 'AFKaph7yY6GpssNp9';
            var s = d.createElement('script');
            w[c] = w[c] || function() {
                (w[c].q = w[c].q || []).push(arguments);
            };
            s.async = true;
            s.src = 'https://call.chatra.io/chatra.js';
            if (d.head) d.head.appendChild(s);
        })(document, window, 'Chatra');
    </script>
    <!-- /Chatra {/literal} -->

    @yield('scripts')
    @stack('scripts')
</body>

</html>
