@extends('client.layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/styleDetail.css') }}">

    <!-- Phần sản phẩm chính -->
    <div class="container py-5">
        <div class="row">
            <!-- Product Images -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    @if (isset($product->image))
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('storage/default-image.png') }}"
                            class="card-img-top" alt="Product Image">
                    @endif
                </div>
            </div>

            <!-- Product Details -->
            <div class="col-md-6">
                @if (isset($product->name))
                    <h1 class="h2 mb-3">{{ $product->name }}</h1>
                @endif

                <div class="mb-3">
                    @if (isset($product->price))
                        <span class="h4 me-2">${{ number_format($product->price, 2) }}</span>
                        <span class="badge bg-danger ms-2">25% OFF</span>
                    @endif
                </div>

                <div class="mb-3">
                    <div class="d-flex align-items-center">
                        <div class="text-warning me-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        @if (isset($product->views))
                            <span class="text-muted">({{ $product->views }} reviews)</span>
                        @endif
                    </div>
                </div>

                @if (isset($product->description))
                    <p class="mb-4">{{ $product->description }}</p>
                @endif

                <!-- Color Selection -->
                <div class="mb-4">
                    <h6 class="mb-2">Color</h6>
                    <div class="btn-group" role="group">
                        <input type="radio" class="btn-check" name="color" id="silver" checked>
                        <label class="btn btn-outline-secondary" for="silver">Silver</label>
                        <input type="radio" class="btn-check" name="color" id="gold">
                        <label class="btn btn-outline-secondary" for="gold">Gold</label>
                        <input type="radio" class="btn-check" name="color" id="black">
                        <label class="btn btn-outline-secondary" for="black">Black</label>
                    </div>
                </div>

                <!-- Quantity -->
                <div class="mb-4">
                    <div class="d-flex align-items-center">
                        <label class="me-2">Quantity:</label>
                        <select class="form-select w-auto" name="quantity" form="addToCartForm">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>

                <!-- Actions -->
                <div class="d-grid gap-2">
                    <!-- Form thêm vào giỏ hàng -->
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" id="addToCartForm">
                        @csrf
                        <button type="submit" class="btn btn-warning w-100">
                            <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                        </button>
                    </form>

                    <button class="btn btn-outline-secondary" type="button">
                        <i class="far fa-heart me-2"></i>Add to Wishlist
                    </button>
                </div>

                <!-- Additional Info -->
                <div class="mt-4">
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas fa-truck text-primary me-2"></i>
                        <span>Free shipping on orders over $50</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas fa-undo text-primary me-2"></i>
                        <span>30-day return policy</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-shield-alt text-primary me-2"></i>
                        <span>2-year warranty</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Phần sản phẩm cùng loại - Full width -->
    <section class="bg-light py-5">
        <div class="container-fluid px-0">
            <h2 class="text-center mb-5 display-5 fw-light">SẢN PHẨM TƯƠNG TỰ</h2>

            <div class="row g-0">
                @foreach ($relatedProducts->take(5) as $product)
                    <div class="col" style="flex: 0 0 20%; max-width: 20%;">
                        <div class="card h-100 border-0 rounded-0 shadow-sm mx-2">
                            <span class="position-absolute top-0 end-0 m-2 bg-warning text-white px-2 py-1 small rounded-pill">-25%</span>

                            <div class="ratio ratio-1x1 position-relative overflow-hidden">
                                <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('storage/default-image.png') }}"
                                    class="card-img-top object-fit-cover" alt="{{ $product->name }}">
                                <div class="position-absolute bottom-0 start-0 end-0 text-center p-2"
                                    style="transform: translateY(100%); transition: all 0.3s ease;">
                                    <button class="btn btn-dark btn-sm rounded-pill px-3">XEM NHANH</button>
                                </div>
                            </div>

                            <div class="card-body">
                                <small class="text-muted text-uppercase">{{ $product->category->name ?? 'Luxury' }}</small>
                                <a class="product-name" href="{{ route('products.show', $product->id) }}">
                                    <h5 class="card-title fs-6 mt-1 mb-2 text-truncate">{{ $product->name }}</h5>
                                </a>
                                <div class="mb-2">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-half text-warning"></i>
                                    <small class="text-muted">(4.5)</small>
                                </div>

                                <div>
                                    <span class="fw-bold text-warning">${{ number_format($product->price * 0.75, 2) }}</span>
                                    <span class="text-decoration-line-through text-muted ms-2">${{ number_format($product->price, 2) }}</span>
                                </div>
                            </div>

                            <div class="card-footer bg-transparent border-0 pt-0">
                                <div class="d-flex justify-content-between">
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-inline-flex flex-grow-1 me-1">
                                        @csrf
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="btn btn-outline-warning btn-sm rounded-pill w-100">
                                            <i class="bi bi-cart-plus"></i> Thêm
                                        </button>
                                    </form>
                                    <button class="btn btn-outline-secondary btn-sm rounded-circle">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
