@extends('client.layouts.app')

@section('title')
    {{ $title }}
@endsection

{{-- thông báo chưa dăng nhập  --}}




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

    {{-- chỗ 3 cái j đó --}}
    <div class="row" id="row-1667427079" style="padding: 30px;">

        <div id="col-1657938850" class="col medium-4 small-12 large-4" data-animate="fadeInUp" data-animate-transform="true"
            data-animate-transition="true" data-animated="true">
            <div class="col-inner">
                <div class="marketing-tiles__item"
                    style="display: flex; align-items: center; gap: 15px; border-radius: 12px; padding: 20px; background: rgba(30, 30, 30, 0.7); backdrop-filter: blur(5px); border: 1px solid rgba(212, 175, 55, 0.3); box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2), inset 0 0 0 1px rgba(212, 175, 55, 0.1); transition: all 0.3s ease;">
                    <div class="marketing-tiles__item-icon__wrapper"
                        style="width: 60px; height: 60px; background: linear-gradient(135deg, rgba(212, 175, 55, 0.9) 0%, rgba(212, 175, 55, 0.7) 100%); border: 2px solid rgba(212, 175, 55, 0.5); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 0 15px rgba(212, 175, 55, 0.3);">
                        <svg role="none" focusable="false" aria-hidden="true" class="marketing-tiles__item-icon"
                            style="width: 28px; height: 28px; fill: #1a1a1a;">
                            <use xlink:href="#icon--shipping">
                                <svg id="icon--shipping" viewBox="0 0 102 56">
                                    <path
                                        d="M0 22.5h32v-3H0zM8 35.5h24v-3H8zM16 48.5h16v-3H16zM88 0c-7.2 0-13.2 5.5-13.9 12.5H38v43h53V27.7c6.3-1.4 11-7 11-13.7 0-7.7-6.3-14-14-14zM69.5 15.5h4.6c.2 1.4.5 2.7 1 4h-5.6v-4zm-28.5 0h18.5v4H41v-4zm47 37H41v-30h18.5v6l5-5.2 5 5.2v-6h7.4C79.5 25.8 83.5 28 88 28v24.5zM88 25c-6.1 0-11-4.9-11-11S81.9 3 88 3s11 4.9 11 11-4.9 11-11 11z">
                                    </path>
                                    <path d="M88 13.5h-6.5v3H91V7h-3z"></path>
                                </svg>
                            </use>
                        </svg>
                    </div>
                    <div style="flex: 1;">
                        <h3 class="marketing-tiles__item-title"
                            style="font-size: 1.2rem; color: #d4af37; font-weight: 600; text-shadow: 0 1px 2px rgba(0,0,0,0.3); margin-bottom: 5px;">
                            GIAO HÀNG MIỄN PHÍ HỎA TỐC</h3>
                        <div class="marketing-tiles__item-description text-align-left"
                            style="font-size: 0.95rem; color: rgba(255,255,255,0.8); letter-spacing: 0.5px;">Miễn phí vận
                            chuyển toàn quốc</div>
                    </div>
                </div>
            </div>
        </div>

        <div id="col-915315364" class="col medium-4 small-12 large-4" data-animate="fadeInUp" data-animate-transform="true"
            data-animate-transition="true" data-animated="true">
            <div class="col-inner">
                <div class="marketing-tiles__item"
                    style="display: flex; align-items: center; gap: 15px; padding: 20px; border-radius: 12px; background: rgba(30, 30, 30, 0.7); backdrop-filter: blur(5px); border: 1px solid rgba(212, 175, 55, 0.3); box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2), inset 0 0 0 1px rgba(212, 175, 55, 0.1); transition: all 0.3s ease;">
                    <div class="marketing-tiles__item-icon__wrapper"
                        style="width: 60px; height: 60px; background: linear-gradient(135deg, rgba(212, 175, 55, 0.9) 0%, rgba(212, 175, 55, 0.7) 100%); border: 2px solid rgba(212, 175, 55, 0.5); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 0 15px rgba(212, 175, 55, 0.3);">
                        <svg role="none" focusable="false" aria-hidden="true" class="marketing-tiles__item-icon"
                            style="width: 28px; height: 28px; fill: #1a1a1a;">
                            <use xlink:href="#icon--return">
                                <svg id="icon--return" viewBox="0 0 63 71">
                                    <path
                                        d="M15 25.4v27h33v-27H15zm3 3h10v2H18v-2zm27 21H18v-16h10v4l3.5-3.3 3.5 3.3v-4h10v16zm0-19H35v-2h10v2z">
                                    </path>
                                    <path
                                        d="M33.5 7.5l6-5.2-2-2.3-9.9 8.6L36.1 19l2.3-1.9-5.4-6.6c15 .8 27 13.3 27 28.5 0 15.7-12.8 28.5-28.5 28.5S3 54.6 3 38.9H0c0 17.4 14.1 31.5 31.5 31.5S63 56.3 63 38.9C63 22.2 49.9 8.5 33.5 7.5">
                                    </path>
                                </svg>
                            </use>
                        </svg>
                    </div>
                    <div style="flex: 1;">
                        <h3 class="marketing-tiles__item-title"
                            style="font-size: 1.2rem; color: #d4af37; font-weight: 600; text-shadow: 0 1px 2px rgba(0,0,0,0.3); margin-bottom: 5px;">
                            MIỄN PHÍ TRẢ HÀNG</h3>
                        <div class="marketing-tiles__item-description text-align-left"
                            style="font-size: 0.95rem; color: rgba(255,255,255,0.8); letter-spacing: 0.5px;">Điều khoản và
                            điều kiện áp dụng</div>
                    </div>
                </div>
            </div>
        </div>

        <div id="col-632321182" class="col medium-4 small-12 large-4" data-animate="fadeInUp" data-animate-transform="true"
            data-animate-transition="true" data-animated="true">
            <div class="col-inner">
                <div class="marketing-tiles__item"
                    style="display: flex; align-items: center; gap: 15px; padding: 20px; border-radius: 12px; background: rgba(30, 30, 30, 0.7); backdrop-filter: blur(5px); border: 1px solid rgba(212, 175, 55, 0.3); box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2), inset 0 0 0 1px rgba(212, 175, 55, 0.1); transition: all 0.3s ease;">
                    <a href="https://www.facebook.com/profile.php?id=100030885612700&amp;ref=xav_ig_profile_web"
                        target="_blank" class="icon button circle is-outline facebook" aria-label="Follow on Facebook"
                        rel="noopener nofollow"
                        style="text-decoration: none; width: 60px; height: 60px; border-radius: 50%; display: flex; justify-content: center; align-items: center; background: linear-gradient(135deg, rgba(212, 175, 55, 0.9) 0%, rgba(212, 175, 55, 0.7) 100%); box-shadow: 0 0 15px rgba(212, 175, 55, 0.3); border: 2px solid rgba(212, 175, 55, 0.5);">
                        <i class="icon-facebook" style="font-size: 28px; color: #1a1a1a;"></i>
                    </a>
                    <div style="flex: 1;">
                        <h3 class="marketing-tiles__item-title"
                            style="font-size: 1.2rem; color: #d4af37; font-weight: 600; text-shadow: 0 1px 2px rgba(0,0,0,0.3); margin-bottom: 5px;">
                            CẬP NHẬT TIN TỨC</h3>
                        <p class="marketing-tiles__item-description"
                            style="font-size: 0.95rem; color: rgba(255,255,255,0.8); letter-spacing: 0.5px;">Theo dõi chúng
                            tôi trên các kênh truyền thông</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- chỗ sản phẩm của ctegory nào đó --}}
    <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 20px;">
        <div class="parent1" style="position: relative;">
            <!-- Category Image - Now sized to match product cards -->
            @foreach ($categories as $cate)
                @if (trim($cate->name) == 'Dien thaoi')
                    <div class="div1"
                        style="width: 280px; margin-bottom: 30px; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);">
                        <img src="{{ $cate->image ? asset('storage/' . $cate->image) : asset('storage/default-image.png') }}"
                            alt="{{ $cate->name }}" style="width: 100%; height: auto; display: block;">
                    </div>
                @endif
            @endforeach

            <!-- Product Slider (unchanged from previous version) -->
            <div class="div2-wrapper" style="position: relative;">
                <button class="flickity-button prev" type="button" aria-label="Previous"
                    style="position: absolute; left: -50px; top: 50%; transform: translateY(-50%); width: 50px; height: 50px; background: linear-gradient(135deg, rgba(212, 175, 55, 0.9) 0%, rgba(212, 175, 55, 0.7) 100%); border: none; border-radius: 50%; cursor: pointer; z-index: 10; box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3); display: flex; align-items: center; justify-content: center;">
                    <svg class="flickity-button-icon" viewBox="0 0 100 100" style="width: 24px; height: 24px; fill: white;">
                        <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"></path>
                    </svg>
                </button>

                <div class="div2-container" style="overflow: hidden; padding: 10px 0;">
                    <div class="product-slider"
                        style="display: flex; gap: 20px; scroll-snap-type: x mandatory; overflow-x: auto; padding-bottom: 20px;">
                        @foreach ($products as $product)
                            <div class="div2" style="min-width: 280px; scroll-snap-align: start;">
                                <div class="card"
                                    style="border: none; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05); transition: all 0.3s ease; background: white;">
                                    <div style="position: relative; overflow: hidden; height: 200px;">
                                        <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('storage/default-image.png') }}"
                                            class="card-img-top" alt="Product Image"
                                            style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                                        <div
                                            style="position: absolute; top: 15px; right: 15px; background: rgba(212, 175, 55, 0.9); color: white; padding: 5px 10px; border-radius: 4px; font-size: 12px; font-weight: bold;">
                                            NEW</div>
                                    </div>
                                    <div class="card-body" style="padding: 20px;">
                                        <a class="product-name" href="{{ route('products.show', $product->id) }}"
                                            style="text-decoration: none;">
                                            <h5 class="card-title"
                                                style="font-size: 1.1rem; color: #333; font-weight: 600; margin-bottom: 10px; line-height: 1.3;">
                                                <?= $product['name'] ?></h5>
                                        </a>
                                        <p class="card-text"
                                            style="font-size: 0.9rem; color: #666; margin-bottom: 15px; line-height: 1.4;">
                                            <?= $product['description'] ?></p>
                                        <div class="d-flex justify-content-between align-items-center"
                                            style="margin-bottom: 15px;">
                                            <span class="h5 mb-0"
                                                style="color: #d4af37; font-weight: 700;">$<?= $product['price'] ?></span>
                                            <div style="display: flex; align-items: center;">
                                                <div style="color: #d4af37; margin-right: 5px;">
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-half"></i>
                                                </div>
                                                <small style="color: #999;">(4.5)</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between"
                                        style="background: white; border-top: 1px solid rgba(0,0,0,0.05); padding: 15px 20px;">
                                        <button class="btn btn-sm"
                                            style="background: linear-gradient(135deg, rgba(212, 175, 55, 0.9) 0%, rgba(212, 175, 55, 0.7) 100%); color: white; border: none; border-radius: 6px; padding: 8px 15px; font-weight: 500;">Add
                                            to Cart</button>
                                        <button class="btn btn-outline-secondary btn-sm"
                                            style="border: 1px solid #d4af37; color: #d4af37; border-radius: 6px; padding: 8px 10px;"><i
                                                class="bi bi-heart"></i></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button class="flickity-button next" type="button" aria-label="Next"
                    style="position: absolute; right: -50px; top: 50%; transform: translateY(-50%); width: 50px; height: 50px; background: linear-gradient(135deg, rgba(212, 175, 55, 0.9) 0%, rgba(212, 175, 55, 0.7) 100%); border: none; border-radius: 50%; cursor: pointer; z-index: 10; box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3); display: flex; align-items: center; justify-content: center;">
                    <svg class="flickity-button-icon" viewBox="0 0 100 100"
                        style="width: 24px; height: 24px; fill: white;">
                        <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"
                            transform="translate(100, 100) rotate(180)"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="luxury-slider-container" style=" padding: 40px 0; ">

        <!-- Tab Navigation -->
        <div class="luxury-tabs"
            style="display: flex; justify-content: center; margin-bottom: 30px; border-bottom: 1px solid rgba(212, 175, 55, 0.3);">
            <button class="tab-button active" data-tab="most-viewed"
                style="padding: 12px 30px; background: transparent; border: none; color: #d4af37; font-weight: 600; font-size: 1.1rem; position: relative; cursor: pointer;">
                SẢN PHẨM XEM NHIỀU
                <div class="tab-indicator"
                    style="position: absolute; bottom: -1px; left: 0; width: 100%; height: 3px; background: #d4af37;">
                </div>
            </button>
            <button class="tab-button" data-tab="mens-shoes"
                style="padding: 12px 30px; background: transparent; border: none; color: #d4af37; font-weight: 600; font-size: 1.1rem; position: relative; cursor: pointer;">
                GIÀY NAM CAO CẤP
                <div class="tab-indicator"
                    style="position: absolute; bottom: -1px; left: 0; width: 100%; height: 3px; background: transparent;">
                </div>
            </button>
        </div>

        <!-- Most Viewed Products Tab -->
        <div class="tab-content active" id="most-viewed" style="padding: 0 60px;">
            <div class="luxury-slider" style="position: relative;">
                <div class="slider-track"
                    style="display: flex; gap: 25px; overflow-x: auto; scroll-snap-type: x mandatory; padding-bottom: 20px;">
                    @foreach ($mostViewedProducts as $product)
                        <div class="luxury-product-card"
                            style="min-width: 280px; scroll-snap-align: start; backdrop-filter: blur(5px); border-radius: 12px; overflow: hidden; border: 1px solid rgba(212, 175, 55, 0.3); box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); transition: all 0.3s ease;">
                            <div style="position: relative; height: 250px; overflow: hidden;">
                                <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('storage/default-image.png') }}"
                                    alt="{{ $product->name }}"
                                    style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                                @if ($product->created_at->diffInDays() < 7)
                                    <div
                                        style="position: absolute; top: 15px; right: 15px; background: rgba(212, 175, 55, 0.9); color: white; padding: 5px 10px; border-radius: 4px; font-size: 12px; font-weight: bold;">
                                        NEW</div>
                                @endif
                                <div
                                    style="position: absolute; bottom: 15px; left: 15px; background: rgba(0,0,0,0.7); color: #d4af37; padding: 3px 8px; border-radius: 4px; font-size: 12px;">
                                    <i class="bi bi-eye-fill"></i> {{ $product->views }} lượt xem
                                </div>
                            </div>
                            <div style="padding: 20px;">
                                <h3 style="font-size: 1.1rem; color: #d4af37; font-weight: 600; margin-bottom: 10px;">
                                    <a href="{{ route('products.show', $product->id) }}"
                                        style="color: inherit; text-decoration: none;">{{ $product->name }}</a>
                                </h3>
                                <div
                                    style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                                    <span
                                        style="color: #d4af37; font-weight: 700; font-size: 1.2rem;">{{ number_format($product->price) }}₫</span>
                                    <div style="color: #d4af37;">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                    </div>
                                </div>
                                <div style="display: flex; justify-content: space-between;">
                                    <button
                                        style="padding: 8px 15px; background: linear-gradient(135deg, rgba(212, 175, 55, 0.9) 0%, rgba(212, 175, 55, 0.7) 100%); color: #1a1a1a; border: none; border-radius: 6px; font-weight: 600; flex: 1; margin-right: 10px;">Thêm
                                        vào giỏ</button>
                                    <button
                                        style="padding: 8px; border: 1px solid #d4af37; color: #d4af37; background: transparent; border-radius: 6px; width: 40px; display: flex; align-items: center; justify-content: center;">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button class="slider-nav prev"
                    style="position: absolute; left: -50px; top: 50%; transform: translateY(-50%); width: 50px; height: 50px; background: linear-gradient(135deg, rgba(212, 175, 55, 0.9) 0%, rgba(212, 175, 55, 0.7) 100%); border: none; border-radius: 50%; cursor: pointer; z-index: 10; box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3); display: flex; align-items: center; justify-content: center;">
                    <svg viewBox="0 0 100 100" style="width: 24px; height: 24px; fill: #1a1a1a;">
                        <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"></path>
                    </svg>
                </button>
                <button class="slider-nav next"
                    style="position: absolute; right: -50px; top: 50%; transform: translateY(-50%); width: 50px; height: 50px; background: linear-gradient(135deg, rgba(212, 175, 55, 0.9) 0%, rgba(212, 175, 55, 0.7) 100%); border: none; border-radius: 50%; cursor: pointer; z-index: 10; box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3); display: flex; align-items: center; justify-content: center;">
                    <svg viewBox="0 0 100 100" style="width: 24px; height: 24px; fill: #1a1a1a;">
                        <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"
                            transform="translate(100, 100) rotate(180)"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Men's Shoes Tab -->
        <div class="tab-content" id="mens-shoes" style="padding: 0 60px; display: none;">
            <div class="luxury-slider" style="position: relative;">
                <div class="slider-track"
                    style="display: flex; gap: 25px; overflow-x: auto; scroll-snap-type: x mandatory; padding-bottom: 20px;">
                    @foreach ($mensShoes as $product)
                        <div class="luxury-product-card"
                            style="min-width: 280px; scroll-snap-align: start; backdrop-filter: blur(5px); border-radius: 12px; overflow: hidden; border: 1px solid rgba(212, 175, 55, 0.3); box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); transition: all 0.3s ease;">
                            <div style="position: relative; height: 250px; overflow: hidden;">
                                <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('storage/default-image.png') }}"
                                    alt="{{ $product->name }}"
                                    style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                                @if ($product->created_at->diffInDays() < 7)
                                    <div
                                        style="position: absolute; top: 15px; right: 15px; background: rgba(212, 175, 55, 0.9); color: white; padding: 5px 10px; border-radius: 4px; font-size: 12px; font-weight: bold;">
                                        NEW</div>
                                @endif
                            </div>
                            <div style="padding: 20px;">
                                <h3 style="font-size: 1.1rem; color: #d4af37; font-weight: 600; margin-bottom: 10px;">
                                    <a href="{{ route('products.show', $product->id) }}"
                                        style="color: inherit; text-decoration: none;">{{ $product->name }}</a>
                                </h3>
                                <div
                                    style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                                    <span
                                        style="color: #d4af37; font-weight: 700; font-size: 1.2rem;">{{ number_format($product->price) }}₫</span>
                                    <div style="color: #d4af37;">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                    </div>
                                </div>
                                <div style="display: flex; justify-content: space-between;">
                                    <button
                                        style="padding: 8px 15px; background: linear-gradient(135deg, rgba(212, 175, 55, 0.9) 0%, rgba(212, 175, 55, 0.7) 100%); color: #1a1a1a; border: none; border-radius: 6px; font-weight: 600; flex: 1; margin-right: 10px;">Thêm
                                        vào giỏ</button>
                                    <button
                                        style="padding: 8px; border: 1px solid #d4af37; color: #d4af37; background: transparent; border-radius: 6px; width: 40px; display: flex; align-items: center; justify-content: center;">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button class="slider-nav prev"
                    style="position: absolute; left: -50px; top: 50%; transform: translateY(-50%); width: 50px; height: 50px; background: linear-gradient(135deg, rgba(212, 175, 55, 0.9) 0%, rgba(212, 175, 55, 0.7) 100%); border: none; border-radius: 50%; cursor: pointer; z-index: 10; box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3); display: flex; align-items: center; justify-content: center;">
                    <svg viewBox="0 0 100 100" style="width: 24px; height: 24px; fill: #1a1a1a;">
                        <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"></path>
                    </svg>
                </button>
                <button class="slider-nav next"
                    style="position: absolute; right: -50px; top: 50%; transform: translateY(-50%); width: 50px; height: 50px; background: linear-gradient(135deg, rgba(212, 175, 55, 0.9) 0%, rgba(212, 175, 55, 0.7) 100%); border: none; border-radius: 50%; cursor: pointer; z-index: 10; box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3); display: flex; align-items: center; justify-content: center;">
                    <svg viewBox="0 0 100 100" style="width: 24px; height: 24px; fill: #1a1a1a;">
                        <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"
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

    document.addEventListener('DOMContentLoaded', function() {
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');

        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons and contents
                tabButtons.forEach(btn => {
                    btn.classList.remove('active');
                    btn.querySelector('.tab-indicator').style.background =
                        'transparent';
                    btn.style.color = '#d4af37';
                });
                tabContents.forEach(content => content.style.display = 'none');

                // Add active class to clicked button and show corresponding content
                this.classList.add('active');
                this.querySelector('.tab-indicator').style.background = '#d4af37';
                this.style.color = '#d4af37';
                document.getElementById(this.dataset.tab).style.display = 'block';
            });
        });

        // Initialize slider navigation
        document.querySelectorAll('.slider-nav').forEach(button => {
            button.addEventListener('click', function() {
                const isNext = this.classList.contains('next');
                const sliderTrack = this.closest('.luxury-slider').querySelector(
                    '.slider-track');
                const scrollAmount = sliderTrack.querySelector('.luxury-product-card')
                    .offsetWidth + 25;

                sliderTrack.scrollBy({
                    left: isNext ? scrollAmount : -scrollAmount,
                    behavior: 'smooth'
                });
            });
        });
    });
</script>
