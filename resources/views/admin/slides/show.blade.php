@extends('admin.layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <div class="container-fluid py-4">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent">
                <li class="breadcrumb-item"><a href="#" class="text-gold-soft"><i class="fas fa-home me-1"></i> Home</a>
                </li>
                <li class="breadcrumb-item active text-gold" aria-current="page">{{ $title }}</li>
            </ol>
        </nav>

        <h1 class="h2 mt-4 mb-4 text-gold" style="font-family: 'Playfair Display', serif;">
            <i class="fas fa-info-circle me-2"></i> {{ $title }}
        </h1>

        <div class="row">
            <div class="col-12">
                <div class="luxury-card"
                    style="background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%); border: 1px solid rgba(212,175,55,0.3); border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                    <div class="card-header py-3" style="border-bottom: 1px solid rgba(212,175,55,0.3);">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="m-0 text-gold" style="font-family: 'Playfair Display', serif;">
                                <i class="fas fa-tags me-2"></i> THÔNG TIN SLIDE
                            </h5>
                            <a href="{{ route('admin.slides.create') }}" class="btn btn-gold btn-sm">
                                <i class="fas fa-plus me-1"></i> TẠO MỚI
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0"
                                style="background: linear-gradient(135deg, #0a0a0a 0%, #121212 100%); border: 1px solid rgba(212,175,55,0.3);">
                                <thead>
                                    <tr style="background: rgba(212,175,55,0.1);">
                                        <th class="text-gold border-gold">TRƯỜNG DỮ LIỆU</th>
                                        <th class="text-gold border-gold">GIÁ TRỊ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($slide->getAttributes() as $field => $value)
                                        <tr style="border-bottom: 1px solid rgba(212,175,55,0.1);">
                                            <td class="text-gold border-gold">{{ strtoupper($field) }}</td>
                                            <td class="text-light border-gold">
                                                @switch($field)
                                                    @case('image')
                                                        <img src="{{ asset('storage/' . $value) }}" width="150"
                                                            class="rounded border border-gold" style="object-fit: cover;">
                                                    @break

                                                    @case('status')
                                                        @if ($value)
                                                            <span class="badge bg-gold text-dark">HOẠT ĐỘNG</span>
                                                        @else
                                                            <span class="badge bg-danger"
                                                                style="background: rgba(220,53,69,0.2) !important; color: #dc3545; border: 1px solid #dc3545;">KHÓA</span>
                                                        @endif
                                                    @break

                                                    @default
                                                        {!! $value !!}
                                                @endswitch
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('admin.slides.index') }}" class="btn btn-outline-gold">
                                    <i class="fas fa-arrow-left me-2"></i> QUAY LẠI DANH SÁCH
                                </a>
                                <div class="btn-group">
                                    <a href="{{ route('admin.slides.edit', $slide->id) }}" class="btn btn-gold me-2">
                                        <i class="fas fa-edit me-2"></i> CHỈNH SỬA
                                    </a>
                                    <form action="{{ route('admin.slides.destroy', $slide->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger"
                                            onclick="return confirm('Bạn chắc chắn muốn xóa slide này?')">
                                            <i class="fas fa-trash me-2"></i> XÓA
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
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
            background-color: rgba(91, 75, 24, 0.1) !important;
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

        /* Outline Danger Button */
        .btn-outline-danger {
            border: 1px solid #dc3545;
            color: #dc3545;
            background: transparent;
            transition: all 0.3s ease;
        }

        .btn-outline-danger:hover {
            background: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }

        /* Table Styling */
        .table {
            color: #fff;
        }

        .table th {
            font-weight: 600;
            white-space: nowrap;
        }

        .table td,
        .table th {
            vertical-align: middle;
            padding: 1rem;
        }

        /* Badge */
        .badge {
            padding: 0.35em 0.65em;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        /* Scrollbar for description */
        .text-light::-webkit-scrollbar {
            width: 8px;
        }

        .text-light::-webkit-scrollbar-track {
            background: #1a1a1a;
        }

        .text-light::-webkit-scrollbar-thumb {
            background: #d4af37;
            border-radius: 4px;
        }
    </style>
@endsection
