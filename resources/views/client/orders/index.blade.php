@extends('client.layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

<div class="container py-5">
    <h1 class="text-center mb-5 text-gold" style="font-family: 'Playfair Display', serif;">
        <i class="fas fa-receipt me-2"></i> DANH SÁCH ĐƠN HÀNG
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

    <div class="row">
        @foreach($orders as $order)
        <div class="col-lg-6 mb-4">
            <div class="luxury-card" style="background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%); border: 1px solid rgba(212,175,55,0.3); border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h5 class="text-gold mb-0" style="font-family: 'Playfair Display', serif;">
                            <i class="fas fa-hashtag text-gold-soft me-2"></i> ĐƠN HÀNG #{{ $order->id }}
                        </h5>
                        <span class="badge bg-gold text-dark">{{ ucfirst($order->status) }}</span>
                    </div>

                    <div class="order-info-grid mb-4">
                        <div class="info-item">
                            <i class="fas fa-calendar-alt text-gold-soft me-2"></i>
                            <span class="text-light">Ngày đặt:</span>
                            <span class="text-gold">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-coins text-gold-soft me-2"></i>
                            <span class="text-light">Tổng tiền:</span>
                            <span class="text-gold">{{ number_format($order->total_amount, 0, ',', '.') }} VND</span>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-outline-gold">
                            <i class="fas fa-eye me-2"></i> XEM CHI TIẾT
                        </a>

                        @if($order->status == 'shipped')
                        <form action="{{ route('orders.confirm', $order->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-gold">
                                <i class="fas fa-check-circle me-2"></i> XÁC NHẬN ĐÃ NHẬN
                            </button>
                        </form>
                        @elseif($order->status == 'pending')
                        <form action="{{ route('orders.cancel', $order->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger" style="background: rgba(220,53,69,0.2); border-color: #dc3545; color: #dc3545;">
                                <i class="fas fa-times-circle me-2"></i> HỦY ĐƠN HÀNG
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- <div class="d-flex justify-content-center mt-5">
        {{ $orders->links('vendor.pagination.custom') }}
    </div> --}}
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

    /* Pagination */
    .pagination .page-item .page-link {
        background: #121212;
        color: #d4af37;
        border: 1px solid rgba(212,175,55,0.3);
    }

    .pagination .page-item.active .page-link {
        background: #d4af37;
        color: #121212;
        border-color: #d4af37;
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
</style>
@endsection
