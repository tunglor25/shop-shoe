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
                <li class="breadcrumb-item"><a href="#" class="text-gold-soft"><i class="fas fa-home me-1"></i> Trang chủ</a></li>
                <li class="breadcrumb-item active text-gold" aria-current="page">{{ $title }}</li>
            </ol>
            <form action="" method="GET" class="d-flex">
                <input class="form-control me-2 bg-dark border-gold text-light" type="text" placeholder="Tìm kiếm..."
                       value="{{ request('search') }}" name="search" style="min-width: 250px;">
                @csrf
                <button class="btn btn-gold" type="submit">
                    <i class="fas fa-search me-1"></i> Tìm
                </button>
            </form>
        </div>
    </nav>

    <h1 class="h2 mt-4 mb-4 text-gold" style="font-family: 'Playfair Display', serif;">
        <i class="fas fa-users me-2"></i> {{ $title }}
    </h1>

    @if (session('success'))
        <div class="alert alert-gold mb-4" style="background: rgba(212,175,55,0.2); border-left: 4px solid #d4af37; color: #d4af37;">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger mb-4">
            <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="luxury-card mb-4" style="background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%); border: 1px solid rgba(212,175,55,0.3); border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                <div class="card-header py-3" style="border-bottom: 1px solid rgba(212,175,55,0.3);">
                    <h5 class="m-0 text-gold" style="font-family: 'Playfair Display', serif;">
                        <i class="fas fa-users me-2"></i> DANH SÁCH NGƯỜI DÙNG
                    </h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0" style="background: linear-gradient(135deg, #0a0a0a 0%, #121212 100%); border: 1px solid rgba(212,175,55,0.3);">
                            <thead>
                                <tr style="background: rgba(212,175,55,0.1);">
                                    <th class="text-gold border-gold">ID</th>
                                    <th class="text-gold border-gold">TÊN ĐĂNG NHẬP</th>
                                    <th class="text-gold border-gold">HỌ TÊN</th>
                                    <th class="text-gold border-gold">ẢNH ĐẠI DIỆN</th>
                                    <th class="text-gold border-gold">EMAIL</th>
                                    <th class="text-gold border-gold">TRẠNG THÁI</th>
                                    <th class="text-gold border-gold">CHỨC NĂNG</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr style="border-bottom: 1px solid rgba(212,175,55,0.1);">
                                    <td class="text-light border-gold">{{ $user->id }}</td>
                                    <td class="text-light border-gold">{{ $user->username }}</td>
                                    <td class="text-light border-gold">{{ $user->full_name }}</td>
                                    <td class="border-gold">
                                        @if($user->avatar)
                                            <img src="{{ asset('storage/' . $user->avatar) }}" width="50" height="50"
                                                 class="rounded-circle border border-gold" style="object-fit: cover;">
                                        @else
                                            <div class="rounded-circle border border-gold d-flex align-items-center justify-content-center"
                                                 style="width: 50px; height: 50px; background: rgba(212,175,55,0.1);">
                                                <i class="fas fa-user text-gold"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="text-light border-gold">{{ $user->email }}</td>
                                    <td class="border-gold">
                                        @if ($user->status == 'active')
                                            <span class="badge bg-success" style="background: rgba(25,135,84,0.2) !important; color: #198754; border: 1px solid #198754;">
                                                HOẠT ĐỘNG
                                            </span>
                                        @elseif($user->status == 'banned')
                                            <span class="badge bg-danger" style="background: rgba(220,53,69,0.2) !important; color: #dc3545; border: 1px solid #dc3545;">
                                                ĐÃ CHẶN
                                            </span>
                                        @else
                                            <span class="badge bg-secondary" style="background: rgba(108,117,125,0.2) !important; color: #6c757d; border: 1px solid #6c757d;">
                                                KHÔNG HOẠT ĐỘNG
                                            </span>
                                        @endif
                                    </td>
                                    <td class="border-gold">
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.users.show', $user->id) }}"
                                               class="btn btn-sm btn-outline-gold" title="Xem chi tiết">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            @if($user->id !== auth()->id())
                                                <form action="{{ route('admin.users.toggle-ban', $user->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-sm {{ $user->status == 'banned' ? 'btn-outline-success' : 'btn-outline-danger' }}"
                                                            title="{{ $user->status == 'banned' ? 'Bỏ chặn' : 'Chặn tài khoản' }}">
                                                        <i class="fas {{ $user->status == 'banned' ? 'fa-unlock' : 'fa-ban' }}"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $users->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
