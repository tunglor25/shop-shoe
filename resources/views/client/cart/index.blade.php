@extends('client.layouts.app')

@section('content')
{{-- add bootstrap5 --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

<div class="container py-5" >
    @if ($cartItems->isEmpty())
        <div class="luxury-empty-card text-center p-5" style="background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%); border: 1px solid rgba(212,175,55,0.3); border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
            <div class="empty-cart">
                <i class="bi bi-cart-x" style="font-size: 5rem; color: #d4af37;"></i>
                <h3 class="text-gold mt-4" style="font-family: 'Playfair Display', serif;">GIỎ HÀNG TRỐNG</h3>
                <p class="text-gold-soft mb-4">Chưa có sản phẩm nào trong giỏ hàng của bạn</p>
                <a href="{{ route('home') }}" class="btn btn-gold py-3 px-5">
                    <span class="position-relative">
                        <span class="gold-text">TIẾP TỤC MUA SẮM</span>
                        <span class="gold-glow"></span>
                    </span>
                </a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="luxury-card" style="background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%); border: 1px solid rgba(212,175,55,0.3); border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.3); overflow: hidden;">
                    <div class="luxury-card-header p-4" style="border-bottom: 1px solid rgba(212,175,55,0.3);">
                        <h5 class="mb-0 text-gold" style="font-family: 'Playfair Display', serif;">
                            <i class="bi bi-bag-heart me-2"></i> SẢN PHẨM CỦA BẠN
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0" style="background: linear-gradient(135deg, #000000 0%, #0a0a0a 100%); border: 1px solid rgba(212,175,55,0.3);">
                                <thead>
                                    <tr>
                                        <th class="text-gold border-gold">Sản phẩm</th>
                                        <th class="text-gold border-gold">Giá</th>
                                        <th class="text-gold border-gold">Số lượng</th>
                                        <th class="text-gold border-gold">Tổng</th>
                                        <th class="border-gold"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                    <tr>
                                        <td class="border-gold">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $item->product->image ? asset('storage/' . $item->product->image) : asset('storage/default-image.png') }}"
                                                     class="product-img me-3"
                                                     style="width: 80px; height: 80px; object-fit: cover; border: 1px solid rgba(212,175,55,0.3);">
                                                <div>
                                                    <h6 class="mb-1 text-light">{{ $item->product->name }}</h6>
                                                    <small class="text-gold-soft">SKU: {{ $item->product->sku }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-gold border-gold">{{ number_format($item->product->price) }}đ</td>
                                        <td class="border-gold">
                                            <form action="{{ route('cart.update', $item) }}" method="POST" class="d-flex align-items-center">
                                                @csrf
                                                @method('PUT')
                                                <input type="number" name="quantity" value="{{ $item->quantity }}"
                                                    min="1" max="{{ $item->product->stock }}"
                                                    class="quantity-input me-2"
                                                    style="width: 60px; background: rgba(0,0,0,0.3); border: 1px solid rgba(212,175,55,0.3); color: #fff;">
                                                <button type="submit" class="btn btn-sm btn-outline-gold py-1 px-2">
                                                    <i class="bi bi-arrow-clockwise"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="fw-bold text-gold border-gold">{{ number_format($item->product->price * $item->quantity) }}đ</td>
                                        <td class="border-gold">
                                            <form action="{{ route('cart.remove', $item) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm remove-btn text-gold">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="luxury-card" style="background: linear-gradient(135deg, #0a0a0a 0%, #121212 100%); border: 1px solid rgba(212,175,55,0.3); border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                    <div class="luxury-card-header p-4" style="border-bottom: 1px solid rgba(212,175,55,0.3);">
                        <h5 class="mb-0 text-gold" style="font-family: 'Playfair Display', serif;">
                            <i class="bi bi-receipt me-2"></i> TỔNG ĐƠN HÀNG
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-light">Tạm tính:</span>
                            <span class="text-light">{{ number_format($total) }}đ</span>
                        </div>
                        <div class="d-flex justify-content-between mb-4">
                            <span class="text-light">Phí vận chuyển:</span>
                            <span class="text-gold">MIỄN PHÍ</span>
                        </div>
                        <div style="border-top: 1px solid rgba(212,175,55,0.3); margin: 1.5rem 0;"></div>
                        <div class="d-flex justify-content-between fw-bold mb-4">
                            <span class="text-light">Tổng cộng:</span>
                            <span class="text-gold" style="font-size: 1.25rem;">{{ number_format($total) }}đ</span>
                        </div>
                        <a href="{{ route('checkout') }}" class="btn btn-gold w-100 py-3 mb-3">
                            <span class="position-relative">
                                <i class="bi bi-credit-card me-2"></i>
                                <span class="gold-text">THANH TOÁN</span>
                                <span class="gold-glow"></span>
                            </span>
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-outline-gold w-100 py-3">
                            <i class="bi bi-arrow-left me-2"></i> TIẾP TỤC MUA SẮM
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<style>
    /* Custom Gold Color */
    .text-gold {
        color: #d4af37 !important;
    }

    .text-gold-soft {
        color: rgba(212, 175, 55, 0.7) !important;
    }

    .bg-gold {
        background-color: #d4af37 !important;
    }

    .border-gold {
        border-color: rgba(212, 175, 55, 0.3) !important;
        background-color: rgba(212, 175, 55, 0.1) !important;
    }

    /* Gold Button Effect */
    .btn-gold {
        background: linear-gradient(135deg, #d4af37 0%, #f1e5ac 50%, #d4af37 100%);
        border: none;
        color: #121212 !important;
        font-weight: 600;
        letter-spacing: 1px;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(212, 175, 55, 0.4);
    }

    .btn-gold:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(212, 175, 55, 0.6);
    }

    .btn-gold:active {
        transform: translateY(0);
    }

    .gold-text {
        position: relative;
        z-index: 2;
    }

    .gold-glow {
        position: absolute;
        top: -10px;
        left: -10px;
        right: -10px;
        bottom: -10px;
        background: radial-gradient(circle, rgba(212, 175, 55, 0.8) 0%, rgba(212, 175, 55, 0) 70%);
        z-index: 1;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .btn-gold:hover .gold-glow {
        opacity: 1;
    }

    /* Outline Gold Button */
    .btn-outline-gold {
        border: 1px solid #d4af37;
        color: #d4af37;
        background: transparent;
        transition: all 0.3s ease;
    }

    .btn-outline-gold:hover {
        background: rgba(212, 175, 55, 0.1);
        color: #d4af37;
    }

    /* Quantity Input */
    .quantity-input {
        text-align: center;
        padding: 0.375rem 0.5rem;
    }

    /* Remove Button */
    .remove-btn {
        color: #dc3545;
        transition: all 0.2s ease;
    }

    .remove-btn:hover {
        transform: scale(1.1);
    }

    /* Animation for Luxury Feel */
    @keyframes goldPulse {
        0% { box-shadow: 0 0 10px rgba(212, 175, 55, 0.5); }
        50% { box-shadow: 0 0 20px rgba(212, 175, 55, 0.8); }
        100% { box-shadow: 0 0 10px rgba(212, 175, 55, 0.5); }
    }

    .gold-pulse {
        animation: goldPulse 3s infinite;
    }
    .table{
        background-color: black;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        border: 1px solid rgba(212,175,55,0.3);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add hover effect to cart items
        const cartItems = document.querySelectorAll('tbody tr');
        cartItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.backgroundColor = 'rgba(212, 175, 55, 0.05)';
            });
            item.addEventListener('mouseleave', function() {
                this.style.backgroundColor = '';
            });
        });
    });
</script>
@endsection
