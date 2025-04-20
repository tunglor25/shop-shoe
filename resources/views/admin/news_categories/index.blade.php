@extends('admin.layouts.app')

@section('title')
    {{ $title }}
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
                <li class="breadcrumb-item active text-gold" aria-current="page">{{ $title }}</li>
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
        <i class="fas fa-tags me-2"></i>  {{ $title }}
    </h1>

    @if (session('success'))
        <div class="alert alert-gold mb-4" style="background: rgba(212,175,55,0.2); border-left: 4px solid #d4af37; color: #d4af37;">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger mb-4" style="background: rgba(220,53,69,0.2); border-left: 4px solid #dc3545; color: #dc3545;">
            <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="luxury-card mb-4" style="background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%); border: 1px solid rgba(212,175,55,0.3); border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                <div class="card-header py-3" style="border-bottom: 1px solid rgba(212,175,55,0.3);">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="m-0 text-gold" style="font-family: 'Playfair Display', serif;">
                            <i class="fas fa-list me-2"></i> DANH SÁCH DANH MỤC
                        </h5>
                        <a href="{{ route('admin.news-categories.create') }}" class="btn btn-gold btn-sm">
                            <i class="fas fa-plus me-1"></i> TẠO MỚI
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0" style="background: linear-gradient(135deg, #0a0a0a 0%, #121212 100%); border: 1px solid rgba(212,175,55,0.3);">
                            <thead>
                                <tr style="background: rgba(212,175,55,0.1);">
                                    <th class="text-gold border-gold">ID</th>
                                    <th class="text-gold border-gold">TÊN DANH MỤC</th>
                                    <th class="text-gold border-gold">SLUG</th>
                                    <th class="text-gold border-gold">DANH MỤC CHA</th>
                                    <th class="text-gold border-gold">THỨ TỰ</th>
                                    <th class="text-gold border-gold">TRẠNG THÁI</th>
                                    <th class="text-gold border-gold">CHỨC NĂNG</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr style="border-bottom: 1px solid rgba(212,175,55,0.1);">
                                    <td class="text-light border-gold">{{ $category->id }}</td>
                                    <td class="text-light border-gold">
                                        {{ $category->name }}
                                        @if($category->children->count() > 0)
                                            <span class="badge bg-gold text-dark ms-2">{{ $category->children->count() }} con</span>
                                        @endif
                                    </td>
                                    <td class="text-light border-gold">{{ $category->slug }}</td>
                                    <td class="text-light border-gold">{{ $category->parent->name ?? '-' }}</td>
                                    <td class="text-light border-gold">{{ $category->order }}</td>
                                    <td class="border-gold">
                                        @if ($category->status)
                                            <span class="badge bg-gold text-dark">ACTIVE</span>
                                        @else
                                            <span class="badge bg-danger">INACTIVE</span>
                                        @endif
                                    </td>
                                    <td class="border-gold">
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.news-categories.edit', $category->id) }}"
                                               class="btn btn-sm btn-outline-gold" title="Sửa">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.news-categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Bạn chắc chắn muốn xóa danh mục này?')" title="Xóa">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Luxury VIP Style */
.text-gold {
    color: #d4af37 !important;
}

.text-gold-soft {
    color: rgba(212, 175, 55, 0.8) !important;
}

.bg-gold {
    background-color: #d4af37 !important;
}

.btn-gold {
    background-color: #d4af37;
    color: #121212;
    border: none;
    transition: all 0.3s;
}

.btn-gold:hover {
    background-color: #c9a227;
    color: #121212;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(212, 175, 55, 0.3);
}

.btn-outline-gold {
    color: #d4af37;
    border-color: #d4af37;
    background: transparent;
}

.btn-outline-gold:hover {
    background-color: rgba(212, 175, 55, 0.1);
    color: #d4af37;
}

.border-gold {
    border-color: rgba(212, 175, 55, 0.3) !important;
}

.luxury-card {
    transition: transform 0.3s, box-shadow 0.3s;
}

.luxury-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.4) !important;
}

/* Form controls */
.form-control.bg-dark:focus, .form-select.bg-dark:focus {
    background-color: #1a1a1a !important;
    border-color: #d4af37 !important;
    box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.25);
    color: #fff !important;
}

/* Badges */
.badge.bg-gold {
    font-weight: 500;
    letter-spacing: 0.5px;
}

/* Pagination */
.page-item.active .page-link {
    background-color: #d4af37;
    border-color: #d4af37;
    color: #121212;
}

.page-link {
    color: #d4af37;
    background-color: transparent;
    border-color: rgba(212, 175, 55, 0.3);
}

.page-link:hover {
    color: #c9a227;
    background-color: rgba(212, 175, 55, 0.1);
    border-color: rgba(212, 175, 55, 0.3);
}
</style>
@endsection
