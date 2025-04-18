@extends('client.layouts.login')

@section('title')
    {{ $title }}
@endsection

{{-- thông báo chưa dăng nhập  --}}
@if (session('messageLogin'))
    <div class="alert alert-danger">
        {{ session('messageLogin') }}
    </div>
@endif



<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/styleCard.css') }}">
<link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;600&display=swap"
    rel="stylesheet">

@section('content')
    {{-- chỗ để slider vào --}}
    <div class="slider">
        @include('client.layouts.partials.slider')
    </div>

    {{-- chỗ sản phẩm của ctegory nào đó --}}
    <div class="container">
        <div class="parent1">
            <!-- Ảnh danh mục -->
            @foreach ($categories as $cate)
                @if (trim($cate->name) == 'iphone 15 pro max')
                    <div class="div1">
                        <img src="{{ $slide->image ? asset('storage/' . $slide->image) : asset('storage/default-image.png') }}"
                            alt="{{ $cate->name }}">
                    </div>
                @endif
            @endforeach
            <!-- Slider sản phẩm -->
            <div class="div2-wrapper">
                <button class="flickity-button prev" type="button" aria-label="Previous">
                    <svg class="flickity-button-icon" viewBox="0 0 100 100">
                        <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"></path>
                    </svg>
                </button>

                <div class="div2-container">
                    <div class="product-slider">
                        {{-- kiểm tra xem có sản phẩm nào thuộc cái category đó không --}}
                        @if (empty($products))
                        @endif
                        @foreach ($products as $product)
                            <div class="div2">
                                <div class="card">
                                    <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('storage/default-image.png') }}"
                                        class="card-img-top" alt="Product Image">
                                    <div class="card-body">
                                        <a class="product-name" href="{{ route('products.show', $product->id) }}">
                                            <h5 class="card-title"><?= $product['name'] ?></h5>
                                        </a>
                                        <p class="card-text"><?= $product['description'] ?></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="h5 mb-0">$<?= $product['price'] ?></span>
                                            <div>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-half text-warning"></i>
                                                <small class="text-muted">(4.5)</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between bg-light">
                                        <button class="btn btn-primary btn-sm">Add to Cart</button>
                                        <button class="btn btn-outline-secondary btn-sm"><i
                                                class="bi bi-heart"></i></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button class="flickity-button next" type="button" aria-label="Next">
                    <svg class="flickity-button-icon" viewBox="0 0 100 100">
                        <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"
                            transform="translate(100, 100) rotate(180)"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>



    <div class="bg-luxury py-5">
        <div class="container">
            <div class="row g-4">
                @foreach ($products as $item)
                    <div class="col-6 col-md-4 col-lg-2-4 mb-4">
                        <div class="card product-card shadow-sm luxury-card h-100">
                            <div class="position-relative overflow-hidden">
                                <span class="badge bg-gold badge-floating">LIMITED EDITION</span>
                                <div class="image-container">
                                    <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('storage/default-image.png') }}"
                                        class="product-image card-img-top" alt="{{ $item->name }}">
                                    <div class="quick-view">
                                        <button class="btn btn-outline-light btn-sm">QUICK VIEW</button>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body px-3 py-3">
                                <a class="product-name" href="{{ route('products.show', $item->id) }}">
                                    <h5 class="product-name mb-2">{{ $item->name }}</h5>
                                </a>

                                <div class="product-rating mb-2">
                                    <div class="text-warning small">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span class="ms-1 text-muted">(48)</span>
                                    </div>
                                </div>

                                <p class="card-text text-muted small mb-2">{{ Str::limit($item->description, 50) }}</p>

                                <div class="mb-2">
                                    <span class="text-muted small">EXCLUSIVE COLORS:</span>
                                    <div class="mt-1 d-flex flex-wrap">
                                        <span class="color-option active me-1 mb-1" style="background-color: #1a1a1a;"
                                            title="Onyx Black"></span>
                                        <span class="color-option me-1 mb-1"
                                            style="background-color: #e6e6e6; border: 1px solid #ccc;"
                                            title="Platinum White"></span>
                                        <span class="color-option me-1 mb-1" style="background-color: #5a4d41;"
                                            title="Cognac Brown"></span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div>
                                        <span class="text-gold h5 mb-0">${{ number_format($item->price, 2) }}</span>
                                        <span class="text-muted small d-block">VAT included</span>
                                    </div>
                                    <span class="badge bg-danger small">ONLY 3 LEFT</span>
                                </div>

                                <div class="d-grid gap-2">
                                    <button class="btn btn-dark btn-luxury btn-sm">
                                        <i class="fas fa-lock me-1"></i>SECURE CHECKOUT
                                    </button>
                                    <button class="btn btn-outline-dark btn-sm">
                                        <i class="fas fa-heart me-1"></i>WISHLIST
                                    </button>
                                </div>
                            </div>

                            <div class="card-footer luxury-footer small px-3 py-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge bg-dark small"><i class="fas fa-check-circle me-1"></i>CERTIFIED
                                        AUTHENTIC</span>
                                    <span class="text-gold small"><i class="fas fa-crown me-1"></i>PREMIUM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

        {{ $products->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}


    </div>
@endsection

<script>
    document.querySelectorAll('.color-option').forEach(option => {
        option.addEventListener('click', function() {
            document.querySelectorAll('.color-option').forEach(opt => opt.classList.remove('active'));
            this.classList.add('active');
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const container = document.querySelector(".product-slider");
        const prevBtn = document.querySelector(".prev");
        const nextBtn = document.querySelector(".next");

        let scrollAmount = 0;
        const productWidth = container.children[0].offsetWidth + 15; // Lấy kích thước 1 sản phẩm + khoảng cách

        prevBtn.addEventListener("click", function() {
            scrollAmount -= productWidth * 3; // Lùi lại 3 sản phẩm
            if (scrollAmount < 0) scrollAmount = 0;
            container.style.transform = `translateX(-${scrollAmount}px)`;
        });

        nextBtn.addEventListener("click", function() {
            if (scrollAmount < container.scrollWidth - productWidth * 3) {
                scrollAmount += productWidth * 3; // Tiến lên 3 sản phẩm
            }
            container.style.transform = `translateX(-${scrollAmount}px)`;
        });
    });
</script>
