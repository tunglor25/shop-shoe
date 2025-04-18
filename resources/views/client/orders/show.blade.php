@extends('client.layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

<div class="container py-5" >
    <h1 class="text-center mb-5 text-gold" style="font-family: 'Playfair Display', serif;">
        <i class="fas fa-file-invoice me-2"></i> CHI TIẾT ĐƠN HÀNG #{{ $order->id }}
    </h1>

    @if(session('success'))
        <div class="alert alert-gold mb-4" style="background: rgba(212,175,55,0.2); border-left: 4px solid #d4af37; color: #d4af37;">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger mb-4" style="background: rgba(220,53,69,0.2); border-left: 4px solid #dc3545; color: #dc3545;">
            <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
        </div>
    @endif

    <div class="luxury-card mb-5" style="background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%); border: 1px solid rgba(212,175,55,0.3); border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
        <div class="card-body p-4">
            <h5 class="text-gold mb-4" style="position: relative; font-family: 'Playfair Display', serif;">
                <span class="bg-dark px-2" style="z-index: 1; position: relative;">THÔNG TIN ĐƠN HÀNG</span>
                <span class="gold-line" style="position: absolute; bottom: 8px; left: 0; width: 100%; height: 1px; background: linear-gradient(90deg, rgba(212,175,55,0.3) 0%, rgba(212,175,55,1) 50%, rgba(212,175,55,0.3) 100%); z-index: 0;"></span>
            </h5>

            <div class="order-info-grid mb-4">
                <div class="info-item">
                    <i class="fas fa-info-circle text-gold-soft me-2"></i>
                    <span class="text-light">Trạng thái:</span>
                    <span class="badge bg-gold text-dark">{{ ucfirst($order->status) }}</span>
                </div>
                <div class="info-item">
                    <i class="fas fa-coins text-gold-soft me-2"></i>
                    <span class="text-light">Tổng tiền:</span>
                    <span class="text-gold">{{ number_format($order->total, 0, ',', '.') }} VND</span>
                </div>
                <div class="info-item">
                    <i class="fas fa-calendar-alt text-gold-soft me-2"></i>
                    <span class="text-light">Ngày đặt:</span>
                    <span class="text-gold">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                </div>
            </div>

            <h5 class="text-gold mb-4" style="position: relative; font-family: 'Playfair Display', serif;">
                <span class="bg-dark px-2" style="z-index: 1; position: relative;">DANH SÁCH SẢN PHẨM</span>
                <span class="gold-line" style="position: absolute; bottom: 8px; left: 0; width: 100%; height: 1px; background: linear-gradient(90deg, rgba(212,175,55,0.3) 0%, rgba(212,175,55,1) 50%, rgba(212,175,55,0.3) 100%); z-index: 0;"></span>
            </h5>

            <div class="product-list">
                @foreach($order->items as $item)
                <div class="product-item d-flex align-items-center mb-4 pb-4" style="border-bottom: 1px solid rgba(212,175,55,0.1);">
                    <img src="{{ $item->product->image ? asset('storage/' . $item->product->image) : asset('storage/default-image.png') }}"
                         class="product-img me-4"
                         style="width: 80px; height: 80px; object-fit: cover; border: 1px solid rgba(212,175,55,0.3);">
                    <div class="flex-grow-1">
                        <h6 class="text-light mb-1">{{ $item->product->name }}</h6>
                        <div class="d-flex">
                            <div class="me-4">
                                <small class="text-gold-soft">Số lượng:</small>
                                <span class="text-gold d-block">{{ $item->quantity }}</span>
                            </div>
                            <div>
                                <small class="text-gold-soft">Giá:</small>
                                <span class="text-gold d-block">{{ number_format($item->product->price, 0, ',', '.') }} VND</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="d-flex gap-3">
        @if($order->status == 'shipped')
        <form action="{{ route('orders.confirm', $order->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-gold">
                <i class="fas fa-check-circle me-2"></i> XÁC NHẬN ĐÃ NHẬN HÀNG
            </button>
        </form>
        @elseif($order->status == 'pending')
        <form action="{{ route('orders.cancel', $order->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger" style="background: rgba(220,53,69,0.2); border-color: #dc3545; color: #dc3545;">
                <i class="fas fa-times-circle me-2"></i> HỦY ĐƠN HÀNG
            </button>
        </form>
        @endif

        <a href="{{ route('orders.index') }}" class="btn btn-outline-gold">
            <i class="fas fa-arrow-left me-2"></i> QUAY LẠI
        </a>
    </div>
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

    /* Info Grid */
    .order-info-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 0.75rem;
    }

    .info-item {
        display: flex;
        align-items: center;
        padding: 0.5rem 0;
    }

    /* Badge */
    .badge.bg-gold {
        padding: 0.35em 0.65em;
        font-weight: 500;
        letter-spacing: 0.5px;
    }

    /* Product List */
    .product-item:last-child {
        border-bottom: none !important;
        margin-bottom: 0 !important;
        padding-bottom: 0 !important;
    }
</style>
@endsection
