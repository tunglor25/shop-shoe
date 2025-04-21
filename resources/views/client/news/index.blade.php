@extends('client.layouts.app')
@section('title', 'Tin tức')

@section('content')
<div class="container-fluid p-0">
    <!-- Banner lớn có ảnh -->
    <img src="{{ asset('storage/uploads/news/news1.webp') }}" alt="Banner" class="img-fluid" style="width: 100%; height: 200px; object-fit: cover;">

    <div class="container">
        <!-- Tab tin tức -->
        <ul class="nav nav-tabs news-tabs justify-content-center mb-5" id="newsTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab">TẤT CẢ</button>
            </li>
            @foreach($categories as $category)
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="{{ $category->slug }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $category->slug }}" type="button" role="tab">{{ strtoupper($category->name) }}</button>
            </li>
            @endforeach
        </ul>

        <!-- Nội dung các tab -->
        <div class="tab-content" id="newsTabsContent">
            <!-- Tab Tất cả -->
            <div class="tab-pane fade show active" id="all" role="tabpanel">
                <div class="row">
                    <!-- Bài viết nổi bật (1 cột 2 hàng) -->
                    @if($featuredNews->count() > 0)
                    <div class="col-md-6 col-lg-3">
                        @foreach($featuredNews as $featured)
                        <div class="card featured-card">
                            <img src="{{ asset('storage/' . $featured->image) }}" class="card-img-top" alt="{{ $featured->title }}">
                            <div class="card-body">
                                <span class="news-date">{{ $featured->published_at }}</span>
                                <h5 class="card-title">{{ $featured->title }}</h5>
                                <p class="card-text">{{ $featured->summary }}</p>
                                <a href="{{ route('news.show', $featured->slug) }}" class="btn btn-outline-primary">Xem thêm</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    <!-- 4 bài viết thường -->
                    <div class="col-md-6 col-lg-6">
                        <div class="row">
                            @foreach($news->take(4) as $item)
                            <div class="col-md-6 mb-4">
                                <div class="card news-card">
                                    <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}">
                                    <div class="card-body">
                                        <span class="news-date">{{ $item->published_at }}</span>
                                        <h5 class="card-title">{{ $item->title }}</h5>
                                        <a href="{{ route('news.show', $item->slug) }}" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- 2 bài viết nhỏ (1 cột 2 hàng) -->
                    <div class="col-md-6 col-lg-3">
                        @foreach($news->slice(4, 2) as $item)
                        <div class="card small-card mb-4">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid rounded-start" alt="{{ $item->title }}">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <span class="news-date">{{ $item->published_at }}</span>
                                        <h6 class="card-title">{{ $item->title }}</h6>
                                        <a href="{{ route('news.show', $item->slug) }}" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Hàng cuối - 4 bài viết -->
                <div class="row mt-4">
                    @foreach($news->slice(6, 4) as $item)
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="card news-card">
                            <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}">
                            <div class="card-body">
                                <span class="news-date">{{ $item->published_at }}</span>
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <a href="{{ route('news.show', $item->slug) }}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Phân trang -->
                {{ $news->links() }}
            </div>

            <!-- Tab theo danh mục -->
            @foreach($categories as $category)
            <div class="tab-pane fade" id="{{ $category->slug }}" role="tabpanel">
                <div class="row">
                    @foreach($category->news->take(8) as $item)
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="card news-card">
                            <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}">
                            <div class="card-body">
                                <span class="news-date">{{ $item->published_at }}</span>
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <a href="{{ route('news.show', $item->slug) }}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                @if($category->news->count() > 8)
                <div class="text-center mt-4">
                    <a href="{{ route('news-categories.show', $category->slug) }}" class="btn btn-outline-primary">Xem thêm tin {{ $category->name }}</a>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .hero-banner {
        background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://via.placeholder.com/1920x400');
        background-size: cover;
        background-position: center;
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 5rem;
        font-weight: bold;
        text-shadow: 2px 2px 10px rgba(0,0,0,0.8);
        margin-bottom: 30px;
    }

    .news-tabs .nav-link {
        font-weight: 600;
        color: #333;
        border: none;
        padding: 12px 24px;
    }

    .news-tabs .nav-link.active {
        color: #d4af37;
        border-bottom: 3px solid #d4af37;
        background: transparent;
    }

    .news-card {
        margin-bottom: 30px;
        border: none;
        transition: transform 0.3s;
        height: 100%;
        position: relative;
    }

    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    .featured-card {
        height: 100%;
    }

    .featured-card .card-img-top {
        height: 250px;
        object-fit: cover;
    }

    .small-card .card-img-top {
        height: 120px;
        object-fit: cover;
    }

    .card-title {
        font-weight: 600;
        color: #333;
    }

    .card-text {
        color: #666;
    }

    .news-date {
        color: #d4af37;
        font-size: 0.9rem;
    }

    .pagination .page-item.active .page-link {
        background-color: #d4af37;
        border-color: #d4af37;
    }

    .pagination .page-link {
        color: #333;
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
