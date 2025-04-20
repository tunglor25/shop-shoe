<nav class="luxury-sidebar">
    <div class="position-sticky pt-3 px-3">
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center {{ request()->is('/admin') ? 'active' : '' }}" href="{{ url('/admin') }}">
                    <i class="fas fa-home me-3"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center {{ request()->is('admin/products*') ? 'active' : '' }}" href="{{ route('admin.products.index') }}">
                    <i class="fas fa-box-open me-3"></i>
                    <span>Products</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center {{ request()->is('admin/categories*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                    <i class="fas fa-folder-open me-3"></i>
                    <span>Categories</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center {{ request()->is('admin/slides*') ? 'active' : '' }}" href="{{ route('admin.slides.index') }}">
                    <i class="fas fa-image me-3"></i>
                    <span>Sliders</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center {{ request()->is('users*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                    <i class="fas fa-users me-3"></i>
                    <span>Customers</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center {{ request()->is('admin/orders*') ? 'active' : '' }}" href="{{ route('admin.orders.index') }}">
                    <i class="fas fa-shopping-cart me-3"></i>
                    <span>Orders</span>
                </a>
            </li>
            {{-- bình luận --}}
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center {{ request()->is('admin/comments*') ? 'active' : '' }}" href="{{ route('admin.comments.index') }}">
                    <i class="fas fa-comments me-3"></i>
                    <span>Comments</span>
                </a>
            </li>
            {{-- danh mục bài viết --}}
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center {{ request()->is('admin/news-categories*') ? 'active' : '' }}" href="{{ route('admin.news-categories.index') }}">
                    <i class="fas fa-tags me-3"></i>
                    <span>News Categories</span>
                </a>
            </li>
            {{-- bài viết --}}
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center {{ request()->is('admin/news*') ? 'active' : '' }}" href="{{ route('admin.news.index') }}">
                    <i class="fas fa-newspaper me-3"></i>
                    <span>News</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

<style>
    .luxury-sidebar {
        position: fixed;
        top: var(--header-height);
        left: 0;
        bottom: var(--footer-height);
        width: var(--sidebar-width);
        z-index: 1020;
        background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%);
        border-right: 1px solid var(--border-gold);
        overflow-y: auto;
        transition: all 0.3s ease;
    }

    .luxury-sidebar .nav-link {
        padding: 0.75rem 1.25rem;
        border-radius: 6px;
        transition: all 0.3s ease;
        margin-bottom: 0.25rem;
        color: var(--gold);
    }

    .luxury-sidebar .nav-link:hover {
        background: rgba(212, 175, 55, 0.1);
        transform: translateX(5px);
    }

    .luxury-sidebar .nav-link.active {
        background: rgba(212, 175, 55, 0.2);
        border-left: 3px solid var(--gold);
        font-weight: 500;
    }
</style>
