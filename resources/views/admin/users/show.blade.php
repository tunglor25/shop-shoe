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
            <li class="breadcrumb-item"><a href="#" class="text-gold-soft"><i class="fas fa-home me-1"></i> Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}" class="text-gold-soft">Quản lý người dùng</a></li>
            <li class="breadcrumb-item active text-gold" aria-current="page">Chi tiết người dùng</li>
        </ol>
    </nav>

    <h1 class="h2 mt-4 mb-4 text-gold" style="font-family: 'Playfair Display', serif;">
        <i class="fas fa-user-circle me-2"></i> THÔNG TIN NGƯỜI DÙNG
    </h1>

    @if (session('success'))
        <div class="alert alert-gold mb-4" style="background: rgba(212,175,55,0.2); border-left: 4px solid #d4af37; color: #d4af37;">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="luxury-card mb-4" style="background: #121212; border: 1px solid rgba(212,175,55,0.3); border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
                <div class="card-header py-3" style="border-bottom: 1px solid rgba(212,175,55,0.3); background: #0a0a0a;">
                    <h5 class="m-0 text-gold" style="font-family: 'Playfair Display', serif;">
                        <i class="fas fa-id-card me-2"></i> THÔNG TIN CHI TIẾT
                    </h5>
                </div>

                <div class="card-body" style="background: #121212;">
                    <div class="row">
                        <!-- Avatar Section -->
                        <div class="col-md-4 text-center mb-4 mb-md-0">
                            <div class="mb-3">
                                @if($user->avatar)
                                    <img src="{{ asset('storage/' . $user->avatar) }}"
                                         class="rounded-circle border border-gold"
                                         style="width: 200px; height: 200px; object-fit: cover; box-shadow: 0 0 20px rgba(212,175,55,0.3);">
                                @else
                                    <div class="rounded-circle border border-gold d-flex align-items-center justify-content-center mx-auto"
                                         style="width: 200px; height: 200px; background: rgba(212,175,55,0.1); box-shadow: 0 0 20px rgba(212,175,55,0.2);">
                                        <i class="fas fa-user text-gold" style="font-size: 80px;"></i>
                                    </div>
                                @endif
                            </div>

                            <h4 class="text-gold mb-1" style="text-shadow: 0 0 10px rgba(212,175,55,0.3);">{{ $user->full_name }}</h4>
                            <p class="text-light mb-3">{{ '@'.$user->username }}</p>

                            <div class="mb-3">
                                @if($user->status == 'active')
                                    <span class="badge bg-success" style="background: rgba(25,135,84,0.2) !important; color: #198754; border: 1px solid #198754; box-shadow: 0 0 10px rgba(25,135,84,0.2);">
                                        <i class="fas fa-check-circle me-1"></i> HOẠT ĐỘNG
                                    </span>
                                @else
                                    <span class="badge bg-danger" style="background: rgba(220,53,69,0.2) !important; color: #dc3545; border: 1px solid #dc3545; box-shadow: 0 0 10px rgba(220,53,69,0.2);">
                                        <i class="fas fa-ban me-1"></i> ĐÃ CHẶN
                                    </span>
                                @endif
                            </div>

                            @if($user->id !== auth()->id())
                                <form action="{{ route('admin.users.toggle-ban', $user->id) }}" method="POST" class="mt-2">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-sm {{ $user->status == 'active' ? 'btn-outline-danger' : 'btn-outline-success' }}"
                                            style="box-shadow: 0 0 10px rgba({{ $user->status == 'active' ? '220,53,69' : '25,135,84' }},0.3);">
                                        <i class="fas {{ $user->status == 'active' ? 'fa-lock' : 'fa-unlock' }} me-1"></i>
                                        {{ $user->status == 'active' ? 'Chặn tài khoản' : 'Bỏ chặn' }}
                                    </button>
                                </form>
                            @endif
                        </div>

                        <!-- Info Section -->
                        <div class="col-md-8">
                            <div class="table-responsive">
                                <table class="table-dark table mb-0 bs-table-bg" style="background: #0a0a0a; border: 1px solid rgba(212,175,55,0.3);">
                                    <tbody>
                                        <tr style="border-bottom: 1px solid rgba(212,175,55,0.1);">
                                            <td class="text-gold" style="width: 30%; border-right: 1px solid rgba(212,175,55,0.1);">ID:</td>
                                            <td class="text-light">{{ $user->id }}</td>
                                        </tr>
                                        <tr style="border-bottom: 1px solid rgba(212,175,55,0.1);">
                                            <td class="text-gold" style="border-right: 1px solid rgba(212,175,55,0.1);">Email:</td>
                                            <td class="text-light">{{ $user->email }}</td>
                                        </tr>
                                        <tr style="border-bottom: 1px solid rgba(212,175,55,0.1);">
                                            <td class="text-gold" style="border-right: 1px solid rgba(212,175,55,0.1);">Số điện thoại:</td>
                                            <td class="text-light">{{ $user->phone ?? 'Chưa cập nhật' }}</td>
                                        </tr>
                                        <tr style="border-bottom: 1px solid rgba(212,175,55,0.1);">
                                            <td class="text-gold" style="border-right: 1px solid rgba(212,175,55,0.1);">Giới tính:</td>
                                            <td class="text-light">
                                                @switch($user->gender)
                                                    @case('M') Nam @break
                                                    @case('F') Nữ @break
                                                    @case('O') Khác @break
                                                    @default Chưa xác định
                                                @endswitch
                                            </td>
                                        </tr>
                                        <tr style="border-bottom: 1px solid rgba(212,175,55,0.1);">
                                            <td class="text-gold" style="border-right: 1px solid rgba(212,175,55,0.1);">Vai trò:</td>
                                            <td class="text-light">
                                                <span class="badge bg-gold text-dark" style="box-shadow: 0 0 10px rgba(212,175,55,0.3);">
                                                    {{ $user->role == 'admin' ? 'QUẢN TRỊ VIÊN' : 'NGƯỜI DÙNG' }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr style="border-bottom: 1px solid rgba(212,175,55,0.1);">
                                            <td class="text-gold" style="border-right: 1px solid rgba(212,175,55,0.1);">Ngày tạo:</td>
                                            <td class="text-light">{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-gold" style="border-right: 1px solid rgba(212,175,55,0.1);">Địa chỉ giao hàng:</td>
                                            <td class="text-light">{{ $user->shipping_address ?? 'Chưa cập nhật' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-gold" style="box-shadow: 0 0 10px rgba(212,175,55,0.3);">
                            <i class="fas fa-arrow-left me-2"></i> QUAY LẠI DANH SÁCH
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom Gold Color */
    body {
        background-color: #121212;
    }
    .bs-table-bg {
        background: linear-gradient(135deg, #0a0a0a 0%, #121212 100%);
    }
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
    /* Button Styles */
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
    .btn-outline-danger {
        border: 1px solid #dc3545;
        color: #dc3545;
        background: transparent;
    }
    .btn-outline-danger:hover {
        background: rgba(220, 53, 69, 0.1);
    }
    .btn-outline-success {
        border: 1px solid #198754;
        color: #198754;
        background: transparent;
    }
    .btn-outline-success:hover {
        background: rgba(25, 135, 84, 0.1);
    }
    /* Badge Styles */
    .badge {
        padding: 0.35em 0.65em;
        font-weight: 500;
    }
    /* Table Styles */
    .table {
        color: #fff;
        background: #0a0a0a !important;
    }
    .table td, .table th {
        border-top: 1px solid rgba(212,175,55,0.1);
    }
    /* Card Styles */
    .luxury-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .luxury-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.5) !important;
    }
</style>
@endsection
