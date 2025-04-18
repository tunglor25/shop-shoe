<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --gold: #d4af37;
            --gold-light: #f1e5ac;
            --gold-dark: #a67c00;
            --gold-soft: rgba(212, 175, 55, 0.7);
            --dark-bg: #121212;
            --darker-bg: #0a0a0a;
            --border-gold: rgba(212, 175, 55, 0.3);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
            /* Ngăn chặn scroll ngang */
        }

        /* Luxury Navbar */
        .luxury-navbar {
            position: fixed;
            /* Giữ navbar cố định */
            top: 0;
            /* Đặt ở đỉnh màn hình */
            left: 0;
            right: 0;
            z-index: 1030;
            /* Đảm bảo navbar luôn trên các phần tử khác */
            width: 100%;
            /* Chiếm toàn bộ chiều rộng */
            background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%);
            border-bottom: 1px solid var(--border-gold) !important;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.5);
            padding: 0.75rem 1.5rem;
            position: relative;
        }

        /* Golden metal line */
        .luxury-navbar::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg,
                    transparent 0%,
                    var(--gold-light) 20%,
                    var(--gold) 50%,
                    var(--gold-light) 80%,
                    transparent 100%);
            box-shadow: 0 2px 5px rgba(212, 175, 55, 0.5);
        }

        /* User Dropdown - Fixed Positioning */
        .user-dropdown {
            position: relative;
            /* Quan trọng: giữ dropdown trong flow */
        }

        .user-dropdown .dropdown-menu {
            position: absolute;
            left: 20px !important;
            /* right: 15px !important; */
            transform: none !important;
            top: 100% !important;
            will-change: transform;
            margin-top: 0.5rem;
        }

        /* Responsive fix */
        @media (min-width: 992px) {
            .user-dropdown .dropdown-menu {
                left: 15px !important;
                right: auto !important;
            }
        }

        /* Phần còn lại giữ nguyên */
        .navbar-brand {
            font-weight: 600;
            letter-spacing: 0.5px;
            color: var(--gold) !important;
        }

        .navbar-brand i {
            color: var(--gold);
            transition: all 0.3s ease;
        }

        .search-box .form-control {
            background-color: rgba(0, 0, 0, 0.3);
            border: 1px solid var(--border-gold);
            color: white;
            border-radius: 20px;
            padding: 0.375rem 1.25rem;
        }

        .user-dropdown .btn {
            border: 1px solid var(--border-gold);
            color: var(--gold);
            background: rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            padding: 0.375rem 1rem;
        }

        .user-dropdown .dropdown-menu {
            background: linear-gradient(145deg, #1a1a1a 0%, #121212 100%);
            border: 1px solid var(--border-gold);
            box-shadow: 0 5px 25px rgba(212, 175, 55, 0.2);
            border-radius: 8px;
            min-width: 220px;
        }

        .dropdown-item {
            color: white;
            padding: 0.75rem 1.5rem;
        }
    </style>
</head>

<body>

    <!-- Luxury Admin Navbar -->
    <nav class="navbar navbar-expand-lg luxury-navbar">
        <div class="container-fluid">

            <!-- Logo & Sidebar toggle -->
            <div class="d-flex align-items-center">
                <a class="navbar-brand me-3" href="#">
                    <i class="fas fa-crown me-2"></i>LUXURY ADMIN
                </a>
            </div>

            <!-- Search Bar -->
            <form class="d-none d-md-flex search-box mx-4">
                <div class="input-group">
                    <input class="form-control" type="search" placeholder="Search..." aria-label="Search">
                    <button class="btn btn-gold" type="submit" style="margin-left: -40px; z-index: 5;">
                        <i class="fas fa-search text-dark"></i>
                    </button>
                </div>
            </form>

            <!-- User Dropdown - Fixed -->
            <div class="dropdown user-dropdown">
                <button class="btn dropdown-toggle d-flex align-items-center" type="button" id="userDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle me-2"></i> Admin User
                </button>
                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-envelope"></i> Messages</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-user-edit"></i> Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="nav-action">
                            @csrf
                            <div class="px-3 py-2">
                                <button type="submit" class="btn btn-sm logout-btn w-100">
                                    <i class="fas fa-sign-out-alt me-2"></i>Đăng xuất
                                </button>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Fix dropdown position on resize
        window.addEventListener('resize', function() {
            const dropdowns = document.querySelectorAll('.dropdown-menu');
            dropdowns.forEach(dropdown => {
                const rect = dropdown.getBoundingClientRect();
                if (rect.right > window.innerWidth) {
                    dropdown.style.left = 'auto';
                    dropdown.style.right = '0';
                }
            });
        });
    </script>

</body>

</html>
