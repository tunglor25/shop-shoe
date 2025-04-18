<div id="luxury-carousel">
    @once
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Luxury Carousel Styles */
        #luxuryCarousel {
            position: relative;
            overflow: hidden;
            width: 100%;
            height: 600px; /* Increased height for more impact */
        }

        .carousel-inner {
            height: 100%;
            border-radius: 0;
        }

        .carousel-item {
            height: 100%;
            transition: transform 1s ease-in-out;
        }

        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            filter: brightness(0.8); /* Darken images slightly for better text visibility */
        }

        /* Luxury Caption Styles */
        .carousel-caption {
            bottom: 25%;
            left: 10%;
            right: auto;
            text-align: left;
            width: 40%;
            padding: 20px;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            border-left: 4px solid #d4af37; /* Gold accent */
            transition: all 0.5s ease;
        }

        .carousel-caption h3 {
            font-size: 2.5rem;
            font-weight: 300;
            letter-spacing: 2px;
            margin-bottom: 1rem;
            color: #fff;
            text-transform: uppercase;
        }

        .carousel-caption p {
            font-size: 1.2rem;
            line-height: 1.6;
            color: #e0e0e0;
        }

        /* Navigation Controls */
        .carousel-control-prev,
        .carousel-control-next {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .carousel-control-prev { left: 30px; }
        .carousel-control-next { right: 30px; }

        #luxuryCarousel:hover .carousel-control-prev,
        #luxuryCarousel:hover .carousel-control-next {
            opacity: 1;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 2rem;
            height: 2rem;
        }

        /* Indicators */
        .carousel-indicators {
            bottom: 30px;
            margin: 0;
            justify-content: flex-end;
            padding-right: 30px;
        }

        .carousel-indicators button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin: 0 6px;
            background-color: rgba(255, 255, 255, 0.5);
            border: none;
        }

        .carousel-indicators .active {
            background-color: #d4af37; /* Gold color */
        }

        /* Animation Effects */
        .carousel-item.active .carousel-caption {
            animation: fadeInUp 0.8s ease forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            #luxuryCarousel {
                height: 500px;
            }

            .carousel-caption {
                width: 60%;
                bottom: 15%;
            }

            .carousel-caption h3 {
                font-size: 2rem;
            }
        }

        @media (max-width: 768px) {
            #luxuryCarousel {
                height: 400px;
            }

            .carousel-caption {
                width: 80%;
                padding: 20px;
            }

            .carousel-caption h3 {
                font-size: 1.5rem;
            }

            .carousel-caption p {
                font-size: 1rem;
            }

            /* Always show controls on mobile */
            .carousel-control-prev,
            .carousel-control-next {
                opacity: 1;
                width: 50px;
                height: 50px;
            }
        }

        @media (max-width: 576px) {
            #luxuryCarousel {
                height: 300px;
            }

            .carousel-caption {
                width: 90%;
                left: 5%;
                padding: 15px;
                bottom: 10%;
            }

            .carousel-caption h3 {
                font-size: 1.2rem;
            }

            .carousel-caption p {
                display: none; /* Hide description on very small screens */
            }
        }
    </style>
    @endonce

    <div id="luxuryCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="15000">
        <!-- Indicators -->
        <div class="carousel-indicators">
            @foreach($slides as $key => $slide)
                <button type="button" data-bs-target="#luxuryCarousel" data-bs-slide-to="{{ $key }}"
                    class="{{ $key === 0 ? 'active' : '' }}"></button>
            @endforeach
        </div>

        <!-- Slides -->
        <div class="carousel-inner">
            @foreach($slides as $key => $slide)
                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    <img src="{{ $slide->image ? asset('storage/' . $slide->image) : asset('storage/default-image.png') }}"
                         class="d-block w-100" alt="{{ $slide->name ?? 'Slide image' }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>{{ $slide->name ?? 'Luxury Title' }}</h3>
                        @if(isset($slide->description))
                            <p>{{ $slide->description }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#luxuryCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#luxuryCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Optional: Add smooth transitions between slides
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = document.querySelector('#luxuryCarousel');

        // Initialize carousel with infinite loop
        const bsCarousel = new bootstrap.Carousel(carousel, {
            interval: 15000,
            wrap: true,
            pause: false
        });

        // Add animation when slide changes
        carousel.addEventListener('slide.bs.carousel', function (e) {
            const captions = document.querySelectorAll('.carousel-caption');
            captions.forEach(caption => {
                caption.style.opacity = '0';
                caption.style.transform = 'translateY(30px)';
            });
        });

        carousel.addEventListener('slid.bs.carousel', function (e) {
            const activeCaption = document.querySelector('.carousel-item.active .carousel-caption');
            if (activeCaption) {
                activeCaption.style.opacity = '1';
                activeCaption.style.transform = 'translateY(0)';
            }
        });
    });
</script>
