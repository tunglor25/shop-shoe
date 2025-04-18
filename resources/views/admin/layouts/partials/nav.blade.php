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

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --gold: #d4af37;
            --gold-soft: rgba(212, 175, 55, 0.7);
            --dark-bg: #121212;
            --darker-bg: #0a0a0a;
            --border-gold: rgba(212, 175, 55, 0.3);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Luxury Navbar */
        .luxury-navbar {
            background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%);
            border-bottom: 1px solid var(--border-gold) !important;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.5);
            padding: 0.75rem 1.5rem;
            border-bottom : 2px solid rgba(212, 175, 55, 0.3);
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
            letter-spacing: 0.5px;
            color: var(--gold) !important;
        }

        .navbar-brand i {
            color: var(--gold);
            transition: all 0.3s ease;
        }

        .navbar-brand:hover i {
            text-shadow: 0 0 10px var(--gold-soft);
        }

        /* Search Bar */
        .search-box {
            max-width: 400px;
        }

        .search-box .form-control {
            background-color: rgba(0, 0, 0, 0.3);
            border: 1px solid var(--border-gold);
            color: white;
            border-radius: 20px;
            padding: 0.375rem 1.25rem;
            transition: all 0.3s ease;
        }

        .search-box .form-control:focus {
            background-color: rgba(0, 0, 0, 0.5);
            border-color: var(--gold);
            box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.25);
            color: white;
        }

        .search-box .form-control::placeholder {
            color: var(--gold-soft);
        }

        /* User Dropdown */
        .user-dropdown .btn {
            border: 1px solid var(--border-gold);
            color: var(--gold);
            background: rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            padding: 0.375rem 1rem;
            transition: all 0.3s ease;
        }

        .user-dropdown .btn:hover {
            background: rgba(212, 175, 55, 0.1);
            border-color: var(--gold);
        }

        .user-dropdown .dropdown-menu {
            background: var(--dark-bg);
            border: 1px solid var(--border-gold);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
            margin-top: 0.5rem;
        }

        .user-dropdown .dropdown-item {
            color: white;
            padding: 0.5rem 1.25rem;
            transition: all 0.2s ease;
        }

        .user-dropdown .dropdown-item:hover {
            background: rgba(212, 175, 55, 0.1);
            color: var(--gold);
            transform: translateX(5px);
        }

        .user-dropdown .dropdown-item i {
            width: 20px;
            text-align: center;
            margin-right: 0.75rem;
            color: var(--gold-soft);
        }

        .user-dropdown .dropdown-divider {
            border-color: var(--border-gold);
        }

        .logout-btn {
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
        }

        /* Toggle Button */
        .navbar-toggler {
            border: 1px solid var(--border-gold);
            padding: 0.25rem 0.5rem;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.25);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(212, 175, 55, 0.8)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
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

            <!-- User Dropdown -->
            <div class="dropdown user-dropdown ms-auto">
                <button class="btn dropdown-toggle d-flex align-items-center" type="button"
                    id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle me-2"></i> {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-envelope"></i> Messages</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-user-edit"></i> Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="px-3 py-2">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger logout-btn w-100">
                                <i class="fas fa-sign-out-alt me-2"></i>Đăng xuất
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Add subtle animation to navbar brand
        document.querySelector('.navbar-brand').addEventListener('mouseover', function() {
            this.style.transform = 'translateY(-2px)';
        });

        document.querySelector('.navbar-brand').addEventListener('mouseout', function() {
            this.style.transform = 'translateY(0)';
        });
    </script>

</body>

</html>
