@extends('layouts.client')

@section('content')
<div class="container news-container">
    <div class="row">
        <!-- Phần nội dung chính bên trái -->
        <div class="col-lg-8">
            <div class="news-header">
                <h1 class="news-title">{{ $news->title }}</h1>
                <div class="news-meta">
                    <span class="publish-date">Ngày đăng: {{ $news->published_at->format('d/m/Y H:i') }}</span> |
                    <span class="category">Danh mục: <a href="{{ route('client.news-categories.show', $news->category->slug) }}">{{ $news->category->name }}</a></span> |
                    <span class="views"><i class="fas fa-eye"></i> {{ $news->views }} lượt xem</span>
                </div>
            </div>

            @if($news->image)
            <img src="{{ asset('storage/' . $news->image) }}" class="news-image" alt="{{ $news->title }}">
            @endif

            <div class="news-content">
                {!! $news->content !!}
            </div>

            <!-- Bài viết liên quan -->
            @if($relatedNews->count() > 0)
            <div class="mt-5">
                <h3 class="sidebar-title mb-4">Tin liên quan</h3>
                <div class="row">
                    @foreach($relatedNews as $item)
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <p class="card-text"><small class="text-muted">{{ $item->published_at->format('d/m/Y') }}</small></p>
                                <a href="{{ route('client.news.show', $item->slug) }}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <!-- Sidebar bên phải -->
        <div class="col-lg-4">
            <!-- About section -->
            <div class="sidebar-card">
                <h3 class="sidebar-title">Về chúng tôi</h3>
                <div class="about-content">
                    <p>Chúng tôi là trang tin tức hàng đầu về các lĩnh vực xã hội, phong cách sống và giải trí. Với đội ngũ phóng viên chuyên nghiệp, chúng tôi luôn mang đến những thông tin nóng hổi và chính xác nhất.</p>
                    <p>Liên hệ với chúng tôi qua email: info@tintucsieuhot.com</p>
                </div>
            </div>

            <!-- Danh sách bài viết mới nhất -->
            <div class="sidebar-card">
                <h3 class="sidebar-title">Bài viết mới nhất</h3>
                <div class="latest-news-list">
                    @foreach($latestNews as $item)
                    <div class="latest-news-item">
                        <a href="{{ route('client.news.show', $item->slug) }}">{{ $item->title }}</a>
                        <div><small class="text-muted">{{ $item->published_at->format('d/m/Y') }}</small></div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Danh mục tin tức -->
            <div class="sidebar-card">
                <h3 class="sidebar-title">Danh mục tin tức</h3>
                <div class="category-list">
                    @foreach($categories as $category)
                    <div class="latest-news-item d-flex justify-content-between align-items-center">
                        <a href="{{ route('client.news-categories.show', $category->slug) }}">{{ $category->name }}</a>
                        <span class="badge bg-warning text-dark">{{ $category->news_count }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .news-container {
        margin-top: 30px;
        margin-bottom: 50px;
    }

    .news-header {
        margin-bottom: 20px;
    }

    .news-title {
        font-size: 2.2rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 15px;
    }

    .news-meta {
        color: #6c757d;
        font-size: 0.9rem;
        margin-bottom: 25px;
    }

    .news-image {
        width: 100%;
        height: 450px;
        object-fit: cover;
        margin-bottom: 30px;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .news-content {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #333;
    }

    .news-content img {
        max-width: 100%;
        height: auto;
        margin: 1rem 0;
        border-radius: 0.25rem;
    }

    .sidebar-card {
        background: white;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 25px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    .sidebar-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #f0f0f0;
    }

    .latest-news-item {
        padding: 10px 0;
        border-bottom: 1px dashed #eee;
    }

    .latest-news-item:last-child {
        border-bottom: none;
    }

    .latest-news-item a {
        color: #333;
        text-decoration: none;
        transition: color 0.3s;
    }

    .latest-news-item a:hover {
        color: #d4af37;
    }

    .about-content {
        font-size: 0.95rem;
        line-height: 1.7;
        color: #555;
    }

    .card {
        transition: transform 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    .stretched-link::after {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1;
        content: "";
    }
</style>
@endsection

@section('scripts')
@if(app()->environment('production'))
<!-- Font Awesome cho production -->
<script src="https://kit.fontawesome.com/your-kit-code.js" crossorigin="anonymous"></script>
@else
<!-- Font Awesome cho development -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
@endif
@endsection
