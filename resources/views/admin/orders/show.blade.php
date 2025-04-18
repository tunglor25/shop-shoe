@extends('admin.layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

<div class="container-fluid" >
    <div class="d-sm-flex align-items-center justify-content-between mb-4 pt-4">
        <h1 class="h3 mb-0 text-gold" style="font-family: 'Playfair Display', serif;">
            <i class="fas fa-file-invoice me-2"></i> CHI TIẾT ĐƠN HÀNG #{{ $order->order_code }}
        </h1>
        <a href="{{ route('admin.orders.index') }}" class="d-none d-sm-inline-block btn btn-outline-gold shadow-sm">
            <i class="fas fa-arrow-left me-2"></i> QUAY LẠI
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="luxury-card mb-4" style="background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%); border: 1px solid rgba(212,175,55,0.3); border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                <div class="card-header py-3" style="border-bottom: 1px solid rgba(212,175,55,0.3);">
                    <h6 class="m-0 text-gold" style="font-family: 'Playfair Display', serif;">
                        <i class="fas fa-box-open me-2"></i> SẢN PHẨM
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0" style="background: linear-gradient(135deg, #0a0a0a 0%, #121212 100%); border: 1px solid rgba(212,175,55,0.3);">
                            <thead>
                                <tr style="background: rgba(212,175,55,0.1);">
                                    <th class="text-gold border-gold">Sản phẩm</th>
                                    <th class="text-gold border-gold">Đơn giá</th>
                                    <th class="text-gold border-gold">Số lượng</th>
                                    <th class="text-gold border-gold">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->items as $item)
                                <tr style="border-bottom: 1px solid rgba(212,175,55,0.1);">
                                    <td class="border-gold">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $item->product->image_url }}" width="60" height="60"
                                                class="rounded me-3 border border-gold">
                                            <div>
                                                <h6 class="mb-0 text-light">{{ $item->product->name }}</h6>
                                                <small class="text-gold-soft">SKU: {{ $item->product->sku }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-gold border-gold">{{ number_format($item->price) }}đ</td>
                                    <td class="text-light border-gold">{{ $item->quantity }}</td>
                                    <td class="text-gold border-gold">{{ number_format($item->price * $item->quantity) }}đ</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" class="text-light border-gold">Tổng cộng</th>
                                    <th class="text-gold border-gold">{{ number_format($order->total_amount) }}đ</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="luxury-card mb-4" style="background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%); border: 1px solid rgba(212,175,55,0.3); border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                <div class="card-header py-3" style="border-bottom: 1px solid rgba(212,175,55,0.3);">
                    <h6 class="m-0 text-gold" style="font-family: 'Playfair Display', serif;">
                        <i class="fas fa-info-circle me-2"></i> THÔNG TIN ĐƠN HÀNG
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <div class="d-flex align-items-center mb-2">
                            <label class="form-label text-gold mb-0">
                                <i class="fas fa-info-circle me-2"></i> TRẠNG THÁI ĐƠN HÀNG
                            </label>
                            <span class="badge bg-dark text-gold-soft ms-2 border border-gold">
                                <i class="fas fa-lock me-1"></i> ĐÃ KHÓA
                            </span>
                        </div>

                        <div class="position-relative">
                            <div class="form-control bg-dark border-gold text-gold-soft"
                                 style="padding: 0.75rem 1rem; cursor: not-allowed; opacity: 0.8;">
                                {{ $statuses[$order->status]['text'] }}
                            </div>
                            <div class="position-absolute end-0 top-0 h-100 d-flex align-items-center pe-3">
                                <i class="fas fa-lock text-gold-soft"></i>
                            </div>
                        </div>

                        <small class="text-gold-soft mt-2 d-block">
                            <i class="fas fa-exclamation-circle me-1"></i> Đơn hàng đã kết thúc, không thể thay đổi trạng thái.
                        </small>
                    </div>

                    <div class="divider mb-4" style="border-top: 1px solid rgba(212,175,55,0.3);"></div>

                    <h6 class="text-gold mb-3" style="font-family: 'Playfair Display', serif;">
                        <i class="fas fa-user me-2"></i> THÔNG TIN KHÁCH HÀNG
                    </h6>
                    <div class="info-grid mb-4">
                        <div class="info-item">
                            <i class="fas fa-user-tag text-gold-soft me-2"></i>
                            <span class="text-light">Tên:</span>
                            <span class="text-gold">{{ $order->customer_name }}</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-envelope text-gold-soft me-2"></i>
                            <span class="text-light">Email:</span>
                            <span class="text-gold">{{ $order->customer_email }}</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-phone text-gold-soft me-2"></i>
                            <span class="text-light">Điện thoại:</span>
                            <span class="text-gold">{{ $order->customer_phone }}</span>
                        </div>
                    </div>

                    <h6 class="text-gold mb-3" style="font-family: 'Playfair Display', serif;">
                        <i class="fas fa-truck me-2"></i> ĐỊA CHỈ GIAO HÀNG
                    </h6>
                    <p class="text-light mb-4">{{ $order->shipping_address }}</p>

                    <h6 class="text-gold mb-3" style="font-family: 'Playfair Display', serif;">
                        <i class="fas fa-credit-card me-2"></i> PHƯƠNG THỨC THANH TOÁN
                    </h6>
                    <p class="text-light mb-4">
                        {{ $order->payment_method == 'cash' ? 'Thanh toán khi nhận hàng (COD)' : 'Chuyển khoản ngân hàng' }}
                    </p>

                    <h6 class="text-gold mb-3" style="font-family: 'Playfair Display', serif;">
                        <i class="fas fa-sticky-note me-2"></i> GHI CHÚ
                    </h6>
                    <p class="text-light">{{ $order->notes ?? 'Không có ghi chú' }}</p>
                </div>
            </div>
        </div>
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
        background: rgba(212, 175, 55, 0.1) !important;
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
    .info-grid {
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
    .badge {
        padding: 0.35em 0.65em;
        font-weight: 500;
        letter-spacing: 0.5px;
    }

    /* Table Styling */
    .table {
        color: #fff;
    }

    .table th {
        font-weight: 600;
    }

    /* Custom styling for the select dropdown */
    .form-select {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-image: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .form-select:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }

    .form-select:focus {
        border-color: #d4af37 !important;
        box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.25) !important;
    }

    /* Custom scrollbar for dropdown */
    .form-select option {
        padding: 8px 12px;
        background-color: #121212;
    }

    .form-select option:hover {
        background-color: #d4af37 !important;
        color: #121212 !important;
    }
</style>

<script>
    // Thêm cảnh báo khi chọn các trạng thái quan trọng
    document.querySelector('select[name="status"]')?.addEventListener('change', function(e) {
        const selectedOption = this.options[this.selectedIndex];
        if (selectedOption.dataset.warning && !confirm(selectedOption.dataset.warning)) {
            this.value = '{{ $order->status }}'; // Reset về giá trị ban đầu
            return false;
        }
    });
</script>
@endsection
