@if ($paginator->hasPages())
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link border-gold text-gold-soft" aria-hidden="true">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link border-gold text-gold" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            aria-label="Previous">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link border-gold text-gold-soft">{{ $element }}</span>
                        </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active" aria-current="page">
                                    <span class="page-link bg-gold border-gold text-dark">{{ $page }}</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link border-gold text-gold"
                                        href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link border-gold text-gold" href="{{ $paginator->nextPageUrl() }}" rel="next"
                            aria-label="Next">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link border-gold text-gold-soft" aria-hidden="true">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>

    <style>
        /* Màu vàng chủ đạo */
        .text-gold {
            color: #d4af37 !important;
            text-shadow: 0 0 5px rgba(212, 175, 55, 0.6), 0 0 10px rgba(212, 175, 55, 0.5), 0 0 15px rgba(212, 175, 55, 0.4);
        }

        .text-gold-soft {
            color: rgba(212, 175, 55, 0.7) !important;
        }

        .bg-gold {
            background-color: #d4af37 !important;
            box-shadow: 0 0 10px rgba(212, 175, 55, 0.5), 0 0 15px rgba(212, 175, 55, 0.6);
        }

        .border-gold {
            border-color: rgba(212, 175, 55, 0.3) !important;
            background-color: #121212 !important;
        }

        /* Phân trang */
        .pagination {
            --bs-pagination-padding-x: 1rem;
            --bs-pagination-padding-y: 0.5rem;
            --bs-pagination-font-size: 1rem;
        }

        .page-link {
            margin: 0 0.25rem;
            border-radius: 5px !important;
            min-width: 40px;
            text-align: center;
            transition: all 0.3s ease;
            font-family: 'Playfair Display', serif;
            font-weight: 500;
        }

        /* Hiệu ứng lấp lánh và hoạt ảnh cho nút phân trang */
        .page-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(212, 175, 55, 0.3);
            animation: shine 1.5s infinite;
        }

        .page-item.active .page-link {
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(212, 175, 55, 0.4);
            background: linear-gradient(45deg, rgba(212, 175, 55, 0.8), rgba(0, 0, 0, 0.8));
        }

        .page-item.disabled .page-link {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Hiệu ứng lấp lánh */
        @keyframes shine {
            0% {
                box-shadow: 0 0 10px rgba(212, 175, 55, 0.8);
            }
            50% {
                box-shadow: 0 0 20px rgba(212, 175, 55, 0.6);
            }
            100% {
                box-shadow: 0 0 10px rgba(212, 175, 55, 0.8);
            }
        }
    </style>
@endif
