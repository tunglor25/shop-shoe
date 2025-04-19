<nav class="navbar navbar-expand-lg luxury-navbar">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <button class="btn btn-gold me-3 d-lg-none" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand me-3" href="#">
                <i class="fas fa-crown me-2"></i>LUXURY ADMIN
            </a>
        </div>

        <form class="d-none d-md-flex search-box mx-4">
            <div class="input-group">
                <input class="form-control bg-dark border-gold text-light" type="search" placeholder="Search..." aria-label="Search">
                <button class="btn btn-gold" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>

        <div class="dropdown user-dropdown">
            <button class="btn dropdown-toggle d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-circle me-2"></i> Admin User
            </button>
            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-envelope"></i> Messages</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-user-edit"></i> Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="fas fa-sign-out-alt me-2"></i>Đăng xuất
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .luxury-navbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: var(--header-height);
        z-index: 1030;
        background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%);
        border-bottom: 1px solid var(--border-gold);
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.5);
        padding: 0.75rem 1.5rem;
    }

    .luxury-navbar::after {
        content: '';
        position: absolute;
        bottom: -4px;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, transparent 0%, var(--gold-light) 20%, var(--gold) 50%, var(--gold-light) 80%, transparent 100%);
        box-shadow: 0 2px 5px rgba(212, 175, 55, 0.5);
    }

    .navbar-brand {
        font-weight: 600;
        letter-spacing: 0.5px;
        color: var(--gold) !important;
    }

    .search-box .form-control {
        background-color: rgba(0, 0, 0, 0.3);
        border: 1px solid var(--border-gold);
        color: white;
        border-radius: 20px;
    }

    .user-dropdown .btn {
        border: 1px solid var(--border-gold);
        color: var(--gold);
        background: rgba(0, 0, 0, 0.2);
        border-radius: 20px;
    }

    .dropdown-menu {
        background: linear-gradient(145deg, #1a1a1a 0%, #121212 100%);
        border: 1px solid var(--border-gold);
        box-shadow: 0 5px 25px rgba(212, 175, 55, 0.2);
    }
</style>
