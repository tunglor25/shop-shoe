@extends('client.layouts.app')

@section('content')
    {{-- add bootstrap5 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <div class="container py-5">
        @if ($cartItems->isEmpty())
            <div class="luxury-empty-card text-center p-5"
                style="background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%); border: 1px solid rgba(212,175,55,0.3); border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
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
                    <div class="luxury-card"
                        style="background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%); border: 1px solid rgba(212,175,55,0.3); border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.3); overflow: hidden;">
                        <div class="luxury-card-header p-4" style="border-bottom: 1px solid rgba(212,175,55,0.3);">
                            <h5 class="mb-0 text-gold" style="font-family: 'Playfair Display', serif;">
                                <i class="bi bi-bag-heart me-2"></i> SẢN PHẨM CỦA BẠN
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table mb-0"
                                    style="background: linear-gradient(135deg, #000000 0%, #0a0a0a 100%); border: 1px solid rgba(212,175,55,0.3);">
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
                                                            <small class="text-gold-soft">SKU:
                                                                {{ $item->product->sku }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-gold border-gold">
                                                    {{ number_format($item->product->price) }}đ</td>
                                                <td class="border-gold">
                                                    <form action="{{ route('cart.update', $item) }}" method="POST"
                                                        class="d-flex align-items-center">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="number" name="quantity" value="{{ $item->quantity }}"
                                                            min="1" max="{{ $item->product->stock }}"
                                                            class="quantity-input me-2"
                                                            style="width: 60px; background: rgba(0,0,0,0.3); border: 1px solid rgba(212,175,55,0.3); color: #fff;">
                                                        <button type="submit"
                                                            class="btn btn-sm btn-outline-gold py-1 px-2">
                                                            <i class="bi bi-arrow-clockwise"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td class="fw-bold text-gold border-gold">
                                                    {{ number_format($item->product->price * $item->quantity) }}đ</td>
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
                    <div class="luxury-card"
                        style="background: linear-gradient(135deg, #0a0a0a 0%, #121212 100%); border: 1px solid rgba(212,175,55,0.3); border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
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

                            <!-- New Payment Button -->
                            <div class="luxury-payment-btn mb-3" onclick="window.location.href='{{ route('checkout') }}'">
                                <div class="left-side">
                                    <div class="card">
                                        <div class="card-line"></div>
                                        <div class="buttons"></div>
                                    </div>
                                    <div class="post">
                                        <div class="post-line"></div>
                                        <div class="screen">
                                            <div class="dollar">đ</div>
                                        </div>
                                        <div class="numbers"></div>
                                        <div class="numbers-line2"></div>
                                    </div>
                                </div>
                                <div class="right-side">
                                    <div class="new">THANH TOÁN</div>
                                    <svg viewBox="0 0 451.846 451.847" height="512" width="512" xmlns="http://www.w3.org/2000/svg" class="arrow"><path fill="#d4af37" data-old_color="#000000" class="active-path" data-original="#000000" d="M345.441 248.292L151.154 442.573c-12.359 12.365-32.397 12.365-44.75 0-12.354-12.354-12.354-32.391 0-44.744L278.318 225.92 106.409 54.017c-12.354-12.359-12.354-32.394 0-44.748 12.354-12.359 32.391-12.359 44.75 0l194.287 194.284c6.177 6.18 9.262 14.271 9.262 22.366 0 8.099-3.091 16.196-9.267 22.373z"></path></svg>
                                </div>
                            </div>

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

        .table {
            background-color: black;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(212, 175, 55, 0.3);
        }

        /* New Payment Button Styles */
        .luxury-payment-btn {
            background-color: #121212;
            display: flex;
            width: 100%;
            height: 80px;
            position: relative;
            border-radius: 6px;
            transition: 0.3s ease-in-out;
            cursor: pointer;
            overflow: hidden;
            border: 1px solid rgba(212, 175, 55, 0.3);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .luxury-payment-btn:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 20px rgba(212, 175, 55, 0.4);
        }

        .luxury-payment-btn .left-side {
            background-color: #d4af37;
            width: 80px;
            height: 80px;
            border-radius: 4px 0 0 4px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: 0.3s;
            flex-shrink: 0;
            overflow: hidden;
        }

        .luxury-payment-btn:hover .left-side {
            width: 100%;
        }

        .luxury-payment-btn .right-side {
            width: calc(100% - 80px);
            display: flex;
            align-items: center;
            overflow: hidden;
            justify-content: space-between;
            white-space: nowrap;
            transition: 0.3s;
            background-color: #1a1a1a;
            padding-left: 20px;
            color: #d4af37;
            font-family: 'Playfair Display', serif;
            font-weight: 600;
        }

        .luxury-payment-btn:hover .right-side {
            background-color: #121212;
        }

        .luxury-payment-btn .arrow {
            width: 20px;
            height: 20px;
            margin-right: 20px;
            transition: 0.3s;
        }

        .luxury-payment-btn:hover .arrow {
            transform: translateX(5px);
        }

        .luxury-payment-btn .new {
            font-size: 1.2rem;
            font-family: 'Playfair Display', serif;
            margin-left: 10px;
        }

        .luxury-payment-btn .card {
            width: 50px;
            height: 32px;
            background-color: #f1e5ac;
            border-radius: 4px;
            position: absolute;
            display: flex;
            z-index: 10;
            flex-direction: column;
            align-items: center;
            box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
        }

        .luxury-payment-btn .card-line {
            width: 45px;
            height: 10px;
            background-color: #d4af37;
            border-radius: 2px;
            margin-top: 5px;
        }

        .luxury-payment-btn .buttons {
            width: 6px;
            height: 6px;
            background-color: #a78a2e;
            box-shadow: 0 -8px 0 0 #a78a2e, 0 8px 0 0 #a78a2e;
            border-radius: 50%;
            margin-top: 5px;
            transform: rotate(90deg);
            margin: 8px 0 0 -25px;
        }

        .luxury-payment-btn:hover .card {
            animation: slide-top 1.2s cubic-bezier(0.645, 0.045, 0.355, 1) both;
        }

        .luxury-payment-btn:hover .post {
            animation: slide-post 1s cubic-bezier(0.165, 0.84, 0.44, 1) both;
        }

        @keyframes slide-top {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-50px) rotate(90deg);
            }
            60% {
                transform: translateY(-50px) rotate(90deg);
            }
            100% {
                transform: translateY(-5px) rotate(90deg);
            }
        }

        .luxury-payment-btn .post {
            width: 50px;
            height: 60px;
            background-color: #e0e0e0;
            position: absolute;
            z-index: 11;
            bottom: 8px;
            top: 80px;
            border-radius: 4px;
            overflow: hidden;
        }

        .luxury-payment-btn .post-line {
            width: 40px;
            height: 7px;
            background-color: #444;
            position: absolute;
            border-radius: 0 0 2px 2px;
            right: 5px;
            top: 5px;
        }

        .luxury-payment-btn .post-line:before {
            content: "";
            position: absolute;
            width: 40px;
            height: 7px;
            background-color: #666;
            top: -7px;
        }

        .luxury-payment-btn .screen {
            width: 40px;
            height: 18px;
            background-color: #f8f8f8;
            position: absolute;
            top: 18px;
            right: 5px;
            border-radius: 2px;
        }

        .luxury-payment-btn .numbers {
            width: 10px;
            height: 10px;
            background-color: #777;
            box-shadow: 0 -15px 0 0 #777, 0 15px 0 0 #777;
            border-radius: 2px;
            position: absolute;
            transform: rotate(90deg);
            left: 20px;
            top: 42px;
        }

        .luxury-payment-btn .numbers-line2 {
            width: 10px;
            height: 10px;
            background-color: #999;
            box-shadow: 0 -15px 0 0 #999, 0 15px 0 0 #999;
            border-radius: 2px;
            position: absolute;
            transform: rotate(90deg);
            left: 20px;
            top: 55px;
        }

        @keyframes slide-post {
            50% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(-50px);
            }
        }

        .luxury-payment-btn .dollar {
            position: absolute;
            font-size: 14px;
            font-family: 'Playfair Display', serif;
            width: 100%;
            left: 0;
            top: 2px;
            color: #a78a2e;
            text-align: center;
            font-weight: bold;
        }

        .luxury-payment-btn:hover .dollar {
            animation: fade-in-fwd 0.3s 1s backwards;
        }

        @keyframes fade-in-fwd {
            0% {
                opacity: 0;
                transform: translateY(-5px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
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
