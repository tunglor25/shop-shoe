@extends('client.layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg overflow-hidden" style="border-radius: 15px;">
                    <div class="row g-0">
                        <!-- Payment Information Column -->
                        <div class="col-md-7">
                            <div class="p-4 p-lg-5" style="background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%);">
                                <div class="d-flex align-items-center mb-4">
                                    <h2 class="text-gold mb-0" style="font-family: 'Playfair Display', serif;">THANH TOÁN
                                    </h2>
                                    <div class="ms-auto">
                                        <span
                                            class="badge bg-dark text-gold border border-gold px-3 py-2 rounded-pill">THÀNH
                                            VIÊN VIP</span>
                                    </div>
                                </div>

                                <form action="{{ route('checkout.place') }}" method="POST" class="needs-validation"
                                    novalidate>
                                    @csrf

                                    <!-- Personal Information -->
                                    <div class="mb-4">
                                        <h5 class="text-gold mb-3" style="position: relative;">
                                            <span class="bg-dark px-2" style="z-index: 1; position: relative;">Thông tin cá
                                                nhân</span>
                                            <span class="gold-line"
                                                style="position: absolute; bottom: 8px; left: 0; width: 100%; height: 1px; background: linear-gradient(90deg, rgba(212,175,55,0.3) 0%, rgba(212,175,55,1) 50%, rgba(212,175,55,0.3) 100%); z-index: 0;"></span>
                                        </h5>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="customer_name" class="form-label text-light">Họ và tên</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-dark border-gold text-gold"><i
                                                            class="fas fa-user"></i></span>
                                                    <input type="text"
                                                        class="form-control bg-dark border-gold text-light"
                                                        id="customer_name" name="customer_name"
                                                        value="{{ old('customer_name', Auth::user()->name) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="customer_phone" class="form-label text-light">Số điện
                                                    thoại</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-dark border-gold text-gold"><i
                                                            class="fas fa-phone"></i></span>
                                                    <input type="text"
                                                        class="form-control bg-dark border-gold text-light"
                                                        id="customer_phone" name="customer_phone"
                                                        value="{{ old('customer_phone') }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="customer_email" class="form-label text-light">Email</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-dark border-gold text-gold"><i
                                                        class="fas fa-envelope"></i></span>
                                                <input type="email" class="form-control bg-dark border-gold text-light"
                                                    id="customer_email" name="customer_email"
                                                    value="{{ old('customer_email', Auth::user()->email) }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Shipping Information -->
                                    <div class="mb-4">
                                        <h5 class="text-gold mb-3" style="position: relative;">
                                            <span class="bg-dark px-2" style="z-index: 1; position: relative;">Thông tin
                                                giao hàng</span>
                                            <span class="gold-line"
                                                style="position: absolute; bottom: 8px; left: 0; width: 100%; height: 1px; background: linear-gradient(90deg, rgba(212,175,55,0.3) 0%, rgba(212,175,55,1) 50%, rgba(212,175,55,0.3) 100%); z-index: 0;"></span>
                                        </h5>

                                        <div class="mb-3">
                                            <label for="shipping_address" class="form-label text-light">Địa chỉ giao
                                                hàng</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-dark border-gold text-gold"><i
                                                        class="fas fa-map-marker-alt"></i></span>
                                                <textarea class="form-control bg-dark border-gold text-light" id="shipping_address" name="shipping_address"
                                                    rows="2" required>{{ old('shipping_address') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="billing_address" class="form-label text-light">Địa chỉ thanh toán
                                                (nếu khác)</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-dark border-gold text-gold"><i
                                                        class="fas fa-file-invoice-dollar"></i></span>
                                                <textarea class="form-control bg-dark border-gold text-light" id="billing_address" name="billing_address"
                                                    rows="2">{{ old('billing_address') }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Payment Method -->
                                    <div class="mb-4">
                                        <h5 class="text-gold mb-3" style="position: relative;">
                                            <span class="bg-dark px-2" style="z-index: 1; position: relative;">Phương thức
                                                thanh toán</span>
                                            <span class="gold-line"
                                                style="position: absolute; bottom: 8px; left: 0; width: 100%; height: 1px; background: linear-gradient(90deg, rgba(212,175,55,0.3) 0%, rgba(212,175,55,1) 50%, rgba(212,175,55,0.3) 100%); z-index: 0;"></span>
                                        </h5>

                                        <div class="payment-method-selector">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="radio" name="payment_method"
                                                    id="cash" value="cash" checked>
                                                <label class="form-check-label text-light d-flex align-items-center"
                                                    for="cash">
                                                    <span class="payment-icon me-2"><i
                                                            class="fas fa-money-bill-wave text-gold"></i></span>
                                                    <span>
                                                        <span class="d-block">Thanh toán khi nhận hàng (COD)</span>
                                                        <small class="text-gold-soft">Thanh toán khi bạn nhận được
                                                            hàng</small>
                                                    </span>
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_method"
                                                    id="bank_transfer" value="bank_transfer">
                                                <label class="form-check-label text-light d-flex align-items-center"
                                                    for="bank_transfer">
                                                    <span class="payment-icon me-2"><i
                                                            class="fas fa-university text-gold"></i></span>
                                                    <span>
                                                        <span class="d-block">Chuyển khoản ngân hàng</span>
                                                        <small class="text-gold-soft">Chuyển khoản trực tiếp vào tài khoản
                                                            của chúng tôi</small>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Order Notes -->
                                    <div class="mb-4">
                                        <label for="notes" class="form-label text-light">Ghi chú đơn hàng</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-dark border-gold text-gold"><i
                                                    class="fas fa-edit"></i></span>
                                            <textarea class="form-control bg-dark border-gold text-light" id="notes" name="notes" rows="2"
                                                placeholder="Yêu cầu đặc biệt cho đơn hàng của bạn...">{{ old('notes') }}</textarea>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-gold w-100 py-3 mt-2">
                                        <span class="position-relative">
                                            <span class="gold-text">ĐẶT HÀNG</span>
                                            <span class="gold-glow"></span>
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Order Summary Column -->
                        <div class="col-md-5" style="background: linear-gradient(135deg, #0a0a0a 0%, #121212 100%);">
                            <div class="p-4 p-lg-5 h-100 d-flex flex-column">
                                <h3 class="text-gold mb-4" style="font-family: 'Playfair Display', serif;">TÓM TẮT ĐƠN
                                    HÀNG</h3>

                                <div class="flex-grow-1">
                                    <div class="order-items mb-4">
                                        @foreach ($cartItems as $item)
                                        <div class="order-item d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom border-gold">
                                            <div class="d-flex align-items-center">
                                                <div class="me-3 position-relative">
                                                    <img src="{{ $item->product->image ? asset('storage/' . $item->product->image) : asset('storage/default-image.png') }}"
                                                         class="product-image"
                                                         style="width: 60px; height: 60px; object-fit: cover; border: 1px solid rgba(212,175,55,0.3);">
                                                    <span class="badge bg-gold text-dark rounded-circle position-absolute top-0 start-100 translate-middle">
                                                        {{ $item->quantity }}
                                                    </span>
                                                </div>
                                                <div>
                                                    <h6 class="text-light mb-0">{{ $item->product->name }}</h6>
                                                    <small class="text-gold">{{ number_format($item->product->price) }}đ</small>
                                                </div>
                                            </div>
                                            <div class="text-gold">
                                                {{ number_format($item->product->price * $item->quantity) }}đ
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>

                                    <div class="order-totals mb-4">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-light">Tạm tính</span>
                                            <span class="text-light">{{ number_format($total) }}đ</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-light">Phí vận chuyển</span>
                                            <span class="text-gold">MIỄN PHÍ</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-light">Thuế</span>
                                            <span class="text-light">0đ</span>
                                        </div>
                                        <div class="d-flex justify-content-between border-top border-gold pt-3 mt-3">
                                            <span class="text-light fw-bold">Tổng cộng</span>
                                            <span class="text-gold fw-bold">{{ number_format($total) }}đ</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="security-badge mt-auto pt-4 border-top border-gold">
                                    <div class="d-flex align-items-center text-gold">
                                        <i class="fas fa-lock fa-2x me-3"></i>
                                        <div>
                                            <small class="d-block text-light">Thanh toán an toàn</small>
                                            <small class="d-block text-gold-soft">Mã hóa SSL 256-bit</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        :root {
            --primary: #0a1d37;
            --secondary: #ffd700;
            --accent: #00c2ff;
            --text: #f8f8f8;
            --glass: rgba(255, 255, 255, 0.05);
        }

        container {
            background: linear-gradient(135deg, #0a0e1a 0%, #1a1a2e 100%);
        }

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

        /* Metallic Effect */
        .card {
            border: 1px solid rgba(212, 175, 55, 0.2);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        /* Input Focus Effects */
        .form-control:focus,
        .form-select:focus {
            border-color: #d4af37 !important;
            box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.25) !important;
            background-color: #1a1a1a !important;
            color: #fff !important;

        }

        /* Radio Button Customization */
        .form-check-input:checked {
            background-color: #d4af37 !important;
            border-color: #d4af37 !important;

        }

        /* Payment Method Icons */
        .payment-icon {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(212, 175, 55, 0.1);
            border-radius: 50%;
        }

        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #1a1a1a;
        }

        ::-webkit-scrollbar-thumb {
            background: #d4af37;
            border-radius: 4px;
        }

        /* Animation for Luxury Feel */
        @keyframes goldPulse {
            0% {
                box-shadow: 0 0 10px rgba(212, 175, 55, 0.5);
            }

            50% {
                box-shadow: 0 0 20px rgba(212, 175, 55, 0.8);
            }

            100% {
                box-shadow: 0 0 10px rgba(212, 175, 55, 0.5);
            }
        }

        .gold-pulse {
            animation: goldPulse 3s infinite;
        }
    </style>

    <!-- Include Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Include Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <script>
        // Add some interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            // Add gold pulse effect to payment method when selected
            const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
            paymentMethods.forEach(method => {
                method.addEventListener('change', function() {
                    if (this.checked) {
                        const label = this.closest('.form-check').querySelector(
                            '.form-check-label');
                        label.classList.add('gold-pulse');

                        // Remove pulse from other labels
                        paymentMethods.forEach(m => {
                            if (m !== this) {
                                m.closest('.form-check').querySelector('.form-check-label')
                                    .classList.remove('gold-pulse');
                            }
                        });
                    }
                });
            });

            // Initialize first payment method as active
            if (paymentMethods.length > 0) {
                paymentMethods[0].dispatchEvent(new Event('change'));
            }
        });
    </script>
@endsection
