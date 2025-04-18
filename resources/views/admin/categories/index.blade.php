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

    <div class="row">
        <div class="col-12">
            <div class="luxury-card mb-4" style="background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%); border: 1px solid rgba(212,175,55,0.3); border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                <div class="card-header py-3" style="border-bottom: 1px solid rgba(212,175,55,0.3);">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="m-0 text-gold" style="font-family: 'Playfair Display', serif;">
                            <i class="fas fa-tags me-2"></i>  DANH SÁCH DANH MỤC
                        </h5>
                        <a href="{{ route('admin.products.create') }}" class="btn btn-gold btn-sm">
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
                                    <th class="text-gold border-gold">ẢNH</th>
                                    <th class="text-gold border-gold">TRẠNG THÁI</th>
                                    <th class="text-gold border-gold">CHỨC NĂNG</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr style="border-bottom: 1px solid rgba(212,175,55,0.1);">
                                    <td class="text-light border-gold">{{ $category->id }}</td>
                                    <td class="text-light border-gold">{{ $category->name }}</td>
                                    <td class="border-gold">
                                        <img src="{{ asset('storage/' . $category->image) }}" width="60"
                                             class="rounded border border-gold" style="object-fit: cover; height: 60px;">
                                    </td>
                                    <td class="border-gold">
                                        @if ($category->status == 1)
                                            <span class="badge bg-gold text-dark">HOẠT ĐỘNG</span>
                                        @else
                                            <span class="badge bg-danger" style="background: rgba(220,53,69,0.2) !important; color: #dc3545; border: 1px solid #dc3545;">KHÓA</span>
                                        @endif
                                    </td>
                                    <td class="border-gold">
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.categories.show', $category->id) }}"
                                               class="btn btn-sm btn-outline-gold" title="Xem chi tiết">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                               class="btn btn-sm btn-outline-gold" title="Sửa">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline">
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

                    {{ $categories->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
