<!-- LUXURY SIDEBAR BEGIN -->
<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar collapse"
    style="background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%); border-right: 1px solid rgba(212,175,55,0.3);">
    <div class="position-sticky pt-3 px-3">

        <ul class="nav flex-column">

            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center {{ request()->is('/admin') ? 'active' : '' }}"
                    href="{{ url('/admin') }}">
                    <i class="fas fa-home me-3 text-gold"></i>
                    <span class="text-gold">Dashboard</span>
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center {{ request()->is('admin/products*') ? 'active' : '' }}"
                    href="{{ route('admin.products.index') }}">
                    <i class="fas fa-box-open me-3 text-gold"></i>
                    <span class="text-gold">Products</span>
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center {{ request()->is('admin/categories*') ? 'active' : '' }}"
                    href="{{ route('admin.categories.index') }}">
                    <i class="fas fa-folder-open me-3 text-gold"></i>
                    <span class="text-gold">Categories</span>
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center {{ request()->is('admin/slides*') ? 'active' : '' }}"
                    href="{{ route('admin.slides.index') }}">
                    <i class="fas fa-image me-3 text-gold"></i>
                    <span class="text-gold">Sliders</span>
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center {{ request()->is('users*') ? 'active' : '' }}"
                    href="{{ route('admin.users.index') }}">
                    <i class="fas fa-users me-3 text-gold"></i>
                    <span class="text-gold">Customers</span>
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center {{ request()->is('admin/orders*') ? 'active' : '' }}"
                    href="{{ route('admin.orders.index') }}">
                    <i class="fas fa-shopping-cart me-3 text-gold"></i>
                    <span class="text-gold">Orders</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
<!-- LUXURY SIDEBAR END -->

<!-- LUXURY STYLES -->
<style>
    /* Custom Gold Color */
    .text-gold {
        color: #d4af37 !important;
    }

    .bg-gold {
        background-color: #d4af37 !important;
    }

    .border-gold {
        border-color: rgba(212, 175, 55, 0.3) !important;
    }

    /* Sidebar Styling */
    #sidebar {
        padding-top: 5rem;
        min-height: 100vh;
        transition: all 0.3s ease;
    }

    #sidebar .nav-link {
        padding: 0.75rem 1.25rem;
        border-radius: 6px;
        transition: all 0.3s ease;
        margin-bottom: 0.25rem;
    }

    #sidebar .nav-link:hover {
        background: rgba(212, 175, 55, 0.1);
        transform: translateX(5px);
    }

    #sidebar .nav-link.active {
        background: rgba(212, 175, 55, 0.2);
        border-left: 3px solid #d4af37;
        font-weight: 500;
    }

    #sidebar .nav-link.active i {
        color: #d4af37 !important;
    }

    #sidebar .nav-link i {
        width: 20px;
        text-align: center;
        transition: all 0.3s ease;
    }
</style>

<!-- FONT AWESOME -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
