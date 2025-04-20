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
        <i class="fas fa-comments me-2"></i> {{ $title }}
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
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="m-0 text-gold" style="font-family: 'Playfair Display', serif;">
                            <i class="fas fa-comments me-2"></i> DANH SÁCH BÌNH LUẬN
                        </h5>
                        <div class="dropdown">
                            <button class="btn btn-gold dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-filter me-1"></i> Lọc
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="filterDropdown" style="background: #1a1a1a; border: 1px solid rgba(212,175,55,0.3);">
                                <li><a class="dropdown-item text-light" href="{{ request()->fullUrlWithQuery(['status' => '']) }}">Tất cả</a></li>
                                <li><a class="dropdown-item text-light" href="{{ request()->fullUrlWithQuery(['status' => 'active']) }}">Đang hiển thị</a></li>
                                <li><a class="dropdown-item text-light" href="{{ request()->fullUrlWithQuery(['status' => 'hidden']) }}">Đã ẩn</a></li>
                                <li><a class="dropdown-item text-light" href="{{ request()->fullUrlWithQuery(['has_replies' => 'true']) }}">Có phản hồi</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0" style="background: linear-gradient(135deg, #0a0a0a 0%, #121212 100%); border: 1px solid rgba(212,175,55,0.3);">
                            <thead>
                                <tr style="background: rgba(212,175,55,0.1);">
                                    <th class="text-gold border-gold">ID</th>
                                    <th class="text-gold border-gold">NỘI DUNG</th>
                                    <th class="text-gold border-gold">NGƯỜI DÙNG</th>
                                    <th class="text-gold border-gold">SẢN PHẨM</th>
                                    <th class="text-gold border-gold">PHẢN HỒI</th>
                                    <th class="text-gold border-gold">NGÀY TẠO</th>
                                    <th class="text-gold border-gold">TRẠNG THÁI</th>
                                    <th class="text-gold border-gold">CHỨC NĂNG</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment)
                                <tr style="border-bottom: 1px solid rgba(212,175,55,0.1);">
                                    <td class="text-light border-gold">{{ $comment->id }}</td>
                                    <td class="text-light border-gold" style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        {{ $comment->content }}
                                    </td>
                                    <td class="border-gold">
                                        <div class="d-flex align-items-center">
                                            @if($comment->user && $comment->user->avatar)
                                                <img src="{{ asset('storage/' . $comment->user->avatar) }}" width="30" height="30"
                                                     class="rounded-circle border border-gold me-2" style="object-fit: cover;">
                                            @else
                                                <div class="rounded-circle border border-gold d-flex align-items-center justify-content-center me-2"
                                                     style="width: 30px; height: 30px; background: rgba(212,175,55,0.1);">
                                                    <i class="fas fa-user text-gold" style="font-size: 0.8rem;"></i>
                                                </div>
                                            @endif
                                            <span class="text-light">{{ $comment->user->full_name ?? 'Người dùng đã xóa' }}</span>
                                        </div>
                                    </td>
                                    <td class="text-light border-gold">
                                        <a href="{{ route('products.show', $comment->product_id) }}" class="text-gold" target="_blank">
                                            {{ $comment->product->name ?? 'Sản phẩm đã xóa' }}
                                        </a>
                                    </td>
                                    <td class="text-light border-gold">
                                        @if($comment->replies_count > 0)
                                            <span class="badge bg-primary" style="background: rgba(13,110,253,0.2) !important; color: #0d6efd; border: 1px solid #0d6efd;">
                                                {{ $comment->replies_count }} phản hồi
                                            </span>
                                        @else
                                            <span class="badge bg-secondary" style="background: rgba(108,117,125,0.2) !important; color: #6c757d; border: 1px solid #6c757d;">
                                                Không có
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-light border-gold">{{ $comment->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="border-gold">
                                        @if ($comment->status == 'active')
                                            <span class="badge bg-success" style="background: rgba(25,135,84,0.2) !important; color: #198754; border: 1px solid #198754;">
                                                HIỂN THỊ
                                            </span>
                                        @else
                                            <span class="badge bg-danger" style="background: rgba(220,53,69,0.2) !important; color: #dc3545; border: 1px solid #dc3545;">
                                                ĐÃ ẨN
                                            </span>
                                        @endif
                                    </td>
                                    <td class="border-gold">
                                        <div class="d-flex gap-2">
                                            <button type="button" class="btn btn-sm btn-outline-gold" data-bs-toggle="modal"
                                                    data-bs-target="#commentModal{{ $comment->id }}" title="Xem chi tiết">
                                                <i class="fas fa-eye"></i>
                                            </button>

                                            <form action="{{ route('admin.comments.toggle-status', $comment->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm {{ $comment->status == 'active' ? 'btn-outline-danger' : 'btn-outline-success' }}"
                                                        title="{{ $comment->status == 'active' ? 'Ẩn bình luận' : 'Hiện bình luận' }}">
                                                    <i class="fas {{ $comment->status == 'active' ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                                </button>
                                            </form>

                                            <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Xóa vĩnh viễn"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal xem chi tiết bình luận -->
                                <div class="modal fade" id="commentModal{{ $comment->id }}" tabindex="-1" aria-labelledby="commentModalLabel{{ $comment->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content" style="background: #1a1a1a; border: 1px solid rgba(212,175,55,0.5);">
                                            <div class="modal-header" style="border-bottom: 1px solid rgba(212,175,55,0.3);">
                                                <h5 class="modal-title text-gold" id="commentModalLabel{{ $comment->id }}">
                                                    Chi tiết bình luận #{{ $comment->id }}
                                                </h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-4">
                                                    <h6 class="text-gold mb-3">Thông tin cơ bản</h6>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="text-light"><strong>Người dùng:</strong> {{ $comment->user->full_name ?? 'Người dùng đã xóa' }}</p>
                                                            <p class="text-light"><strong>Email:</strong> {{ $comment->user->email ?? 'N/A' }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="text-light"><strong>Sản phẩm:</strong> {{ $comment->product->name ?? 'Sản phẩm đã xóa' }}</p>
                                                            <p class="text-light"><strong>Ngày đăng:</strong> {{ $comment->created_at->format('d/m/Y H:i') }}</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-4">
                                                    <h6 class="text-gold mb-3">Nội dung bình luận</h6>
                                                    <div class="p-3 rounded" style="background: rgba(0,0,0,0.3); border: 1px solid rgba(212,175,55,0.2);">
                                                        <p class="text-light mb-0">{{ $comment->content }}</p>
                                                    </div>
                                                </div>

                                                @if($comment->replies_count > 0)
                                                <div>
                                                    <h6 class="text-gold mb-3">Phản hồi ({{ $comment->replies_count }})</h6>
                                                    <div class="replies-container" style="max-height: 300px; overflow-y: auto;">
                                                        @foreach($comment->replies as $reply)
                                                        <div class="card mb-2" style="background: rgba(0,0,0,0.2); border-left: 3px solid rgba(212,175,55,0.5);">
                                                            <div class="card-body p-3">
                                                                <div class="d-flex justify-content-between mb-2">
                                                                    <div class="d-flex align-items-center">
                                                                        @if($reply->user && $reply->user->avatar)
                                                                            <img src="{{ asset('storage/' . $reply->user->avatar) }}" width="30" height="30"
                                                                                 class="rounded-circle border border-gold me-2" style="object-fit: cover;">
                                                                        @else
                                                                            <div class="rounded-circle border border-gold d-flex align-items-center justify-content-center me-2"
                                                                                 style="width: 30px; height: 30px; background: rgba(212,175,55,0.1);">
                                                                                <i class="fas fa-user text-gold" style="font-size: 0.8rem;"></i>
                                                                            </div>
                                                                        @endif
                                                                        <span class="text-light">{{ $reply->user->name ?? 'Người dùng đã xóa' }}</span>
                                                                    </div>
                                                                    <small class="text-muted">{{ $reply->created_at->format('d/m/Y H:i') }}</small>
                                                                </div>
                                                                <p class="text-light mb-0">{{ $reply->content }}</p>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="modal-footer" style="border-top: 1px solid rgba(212,175,55,0.3);">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $comments->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
