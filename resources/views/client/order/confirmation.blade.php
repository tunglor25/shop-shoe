@extends('client.layouts.app')

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="luxury-card"
                    style="background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%); border: 1px solid rgba(212,175,55,0.3); border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                    <div class="luxury-card-header p-4" style="border-bottom: 1px solid rgba(212,175,55,0.3);">
                        <h5 class="mb-0 text-gold" style="font-family: 'Playfair Display', serif;">
                            <i class="fas fa-check-circle me-2"></i> ĐẶT HÀNG THÀNH CÔNG
                        </h5>
                    </div>

                    <div class="card-body p-4">
                        <div class="text-center mb-5">
                            <i class="fas fa-check-circle fa-5x text-gold mb-4"
                                style="text-shadow: 0 0 20px rgba(212,175,55,0.5);"></i>
                            <h3 class="text-gold" style="font-family: 'Playfair Display', serif;">Cảm ơn bạn đã đặt hàng!
                            </h3>
                            <p class="text-gold-soft">Mã đơn hàng của bạn: <strong
                                    class="text-gold">{{ $order->order_code }}</strong></p>
                        </div>

                        <div class="order-details mb-5">
                            <h5 class="text-gold mb-4" style="position: relative; font-family: 'Playfair Display', serif;">
                                <span class="bg-dark px-2" style="z-index: 1; position: relative;">Chi tiết đơn hàng</span>
                                <span class="gold-line"
                                    style="position: absolute; bottom: 8px; left: 0; width: 100%; height: 1px; background: linear-gradient(90deg, rgba(212,175,55,0.3) 0%, rgba(212,175,55,1) 50%, rgba(212,175,55,0.3) 100%); z-index: 0;"></span>
                            </h5>
                            <div class="table-responsive">
                                <table class="table mb-0"
                                    style="background: linear-gradient(135deg, #0a0a0a 0%, #121212 100%); border: 1px solid rgba(212,175,55,0.3);">
                                    <thead>
                                        <tr style="background: rgba(212,175,55,0.1);">
                                            <th class="text-gold border-gold">Sản phẩm</th>
                                            <th class="text-gold border-gold">Số lượng</th>
                                            <th class="text-gold border-gold">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->items as $item)
                                            <tr style="border-bottom: 1px solid rgba(212,175,55,0.1);">
                                                <td class="text-light border-gold">{{ $item->product->name }}</td>
                                                <td class="text-light border-gold">{{ $item->quantity }}</td>
                                                <td class="text-gold border-gold">
                                                    {{ number_format($item->price * $item->quantity) }}đ</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2" class="text-light border-gold">Tổng cộng</th>
                                            <th class="text-gold border-gold">{{ number_format($order->total_amount) }}đ
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <div class="shipping-info mb-5">
                            <h5 class="text-gold mb-4" style="position: relative; font-family: 'Playfair Display', serif;">
                                <span class="bg-dark px-2" style="z-index: 1; position: relative;">Thông tin giao
                                    hàng</span>
                                <span class="gold-line"
                                    style="position: absolute; bottom: 8px; left: 0; width: 100%; height: 1px; background: linear-gradient(90deg, rgba(212,175,55,0.3) 0%, rgba(212,175,55,1) 50%, rgba(212,175,55,0.3) 100%); z-index: 0;"></span>
                            </h5>
                            <div class="info-grid">
                                <div class="info-item">
                                    <i class="fas fa-user text-gold me-2"></i>
                                    <span class="text-light">Người nhận:</span>
                                    <span class="text-gold">{{ $order->customer_name }}</span>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-map-marker-alt text-gold me-2"></i>
                                    <span class="text-light">Địa chỉ:</span>
                                    <span class="text-gold">{{ $order->shipping_address }}</span>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-phone text-gold me-2"></i>
                                    <span class="text-light">SĐT:</span>
                                    <span class="text-gold">{{ $order->customer_phone }}</span>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-credit-card text-gold me-2"></i>
                                    <span class="text-light">Phương thức thanh toán:</span>
                                    <span
                                        class="text-gold">{{ $order->payment_method == 'cash' ? 'Thanh toán khi nhận hàng (COD)' : 'Chuyển khoản ngân hàng' }}</span>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-info-circle text-gold me-2"></i>
                                    <span class="text-light">Trạng thái:</span>
                                    <span class="badge bg-gold text-dark">{{ $statuses[$order->status]['text'] }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-3">
                            <a href="{{ route('orders.index', $order) }}" class="btn btn-gold py-3">
                                <span class="position-relative">
                                    <i class="fas fa-receipt me-2"></i>
                                    <span class="gold-text">XEM CHI TIẾT ĐƠN HÀNG</span>
                                    <span class="gold-glow"></span>
                                </span>
                            </a>
                            <a href="{{ route('home') }}" class="btn btn-outline-gold py-3">
                                <i class="fas fa-shopping-bag me-2"></i> TIẾP TỤC MUA SẮM
                            </a>
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

        body {
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

        /* Info Grid */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(212, 175, 55, 0.1);
        }

        /* Badge */
        .badge.bg-gold {
            padding: 0.35em 0.65em;
            font-weight: 500;
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add pulse effect to success icon
            const successIcon = document.querySelector('.fa-check-circle');
            successIcon.classList.add('gold-pulse');
        });
    </script>
@endsection
