@extends('admin.layouts.app')

@section('title')
    {{ $title ?? 'Quản lý đơn hàng' }}
@endsection

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/styleTable.css') }}">

<div class="container-fluid py-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb mb-0 bg-transparent">
                <li class="breadcrumb-item"><a href="#" class="text-gold-soft"><i class="fas fa-home me-1"></i> Home</a></li>
                <li class="breadcrumb-item active text-gold" aria-current="page">Quản lý đơn hàng</li>
            </ol>
            <form action="" method="GET" class="d-flex">
                <input class="form-control me-2 bg-dark border-gold text-light" type="text" placeholder="Search..."
                       value="{{ request('search') }}" name="search" style="min-width: 250px;">
                @csrf
                <button class="btn btn-gold" type="submit">
                    <i class="fas fa-search me-1"></i> Search
                </button>
            </form>
        </div>
    </nav>

    <h1 class="h2 mt-4 mb-4 text-gold" style="font-family: 'Playfair Display', serif;">
        <i class="fas fa-shopping-bag me-2"></i> Quản lý đơn hàng
    </h1>

    @if (session('success'))
        <div class="alert alert-gold mb-4" style="background: rgba(212,175,55,0.2); border-left: 4px solid #d4af37; color: #d4af37;">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="luxury-card mb-4" style="background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%); border: 1px solid rgba(212,175,55,0.3); border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                <div class="card-header py-3" style="border-bottom: 1px solid rgba(212,175,55,0.3);">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="m-0 text-gold" style="font-family: 'Playfair Display', serif;">
                            <i class="fas fa-list me-2"></i> DANH SÁCH ĐƠN HÀNG
                        </h5>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0" style="background: linear-gradient(135deg, #0a0a0a 0%, #121212 100%); border: 1px solid rgba(212,175,55,0.3);">
                            <thead>
                                <tr style="background: rgba(212,175,55,0.1);">
                                    <th class="text-gold border-gold">MÃ ĐƠN</th>
                                    <th class="text-gold border-gold">KHÁCH HÀNG</th>
                                    <th class="text-gold border-gold">TỔNG TIỀN</th>
                                    <th class="text-gold border-gold">TRẠNG THÁI</th>
                                    <th class="text-gold border-gold">NGÀY TẠO</th>
                                    <th class="text-gold border-gold">HÀNH ĐỘNG</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr style="border-bottom: 1px solid rgba(212,175,55,0.1);">
                                    <td class="text-light border-gold">{{ $order->order_code }}</td>
                                    <td class="text-light border-gold">{{ $order->customer_name }}</td>
                                    <td class="text-success border-gold">{{ number_format($order->total_amount) }}đ</td>
                                    <td class="border-gold">
                                        @php
                                            $statusInfo = $statuses[$order->status] ?? [
                                                'text' => 'Không xác định',
                                                'class' => 'bg-dark text-white',
                                            ];
                                        @endphp
                                        <span class="badge {{ $statusInfo['class'] }}" style="border: 1px solid rgba(212,175,55,0.3);">
                                            {{ $statusInfo['text'] }}
                                        </span>
                                    </td>
                                    <td class="text-light border-gold">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="border-gold">
                                        <div class="d-flex gap-2 justify-content-center">
                                            <a href="{{ route('admin.orders.show', $order) }}"
                                               class="btn btn-sm btn-outline-gold" title="Xem chi tiết">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.orders.edit', $order) }}"
                                               class="btn btn-sm btn-outline-gold" title="Cập nhật">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $orders->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .text-gold {
        color: #d4af37 !important;
    }
    .border-gold {
        border-color: rgba(212,175,55,0.3) !important;
    }
    .btn-gold {
        background-color: #d4af37;
        color: #121212;
        border: none;
    }
    .btn-outline-gold {
        color: #d4af37;
        border-color: #d4af37;
    }
    .btn-outline-gold:hover {
        background-color: #d4af37;
        color: #121212;
    }
    .badge.bg-success {
        background-color: rgba(40,167,69,0.2) !important;
        color: #28a745;
        border: 1px solid #28a745;
    }
    .badge.bg-warning {
        background-color: rgba(255,193,7,0.2) !important;
        color: #ffc107;
        border: 1px solid #ffc107;
    }
    .badge.bg-danger {
        background-color: rgba(220,53,69,0.2) !important;
        color: #dc3545;
        border: 1px solid #dc3545;
    }
</style>
@endpush
