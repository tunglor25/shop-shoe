<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <style>
        :root {
            --gold: #d4af37;
            --gold-light: #f1e5ac;
            --gold-dark: #a67c00;
            --gold-soft: rgba(212, 175, 55, 0.7);
            --dark-bg: #121212;
            --darker-bg: #0a0a0a;
            --border-gold: rgba(212, 175, 55, 0.3);
            --footer-height: 60px;
            --header-height: 60px;
            --sidebar-width: 250px;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0a0e1a 0%, #1a1a2e 100%);
            color: white;
            padding-top: var(--header-height);
        }

        /* NProgress */
        #nprogress .bar {
            background: linear-gradient(90deg, red, orange, yellow, green, cyan, blue, violet);
            height: 1.5px;
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100%;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            min-height: calc(100vh - var(--header-height) - var(--footer-height));
        }

        @media (max-width: 992px) {
            .luxury-sidebar {
                left: -100%;
            }
            .luxury-sidebar.show {
                left: 0;
            }
            .main-content {
                margin-left: 0;
            }
            .luxury-footer {
                left: 0;
            }
        }
    </style>
    @yield('styles')
</head>

<body>
    @include('admin.layouts.partials.nav')
    @include('admin.layouts.partials.sidebar')

    <main class="main-content">
        @yield('content')
    </main>

    @include('admin.layouts.partials.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>

    <script>
        // Sidebar toggle
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.querySelector('.luxury-sidebar').classList.toggle('show');
        });

        // NProgress
        NProgress.configure({ showSpinner: false });
        window.addEventListener('beforeunload', () => NProgress.start());
        window.addEventListener('load', () => NProgress.done());
    </script>

    @yield('scripts')
</body>
</html>
