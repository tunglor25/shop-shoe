@extends('admin.layouts.app')

@section('title')
    Chỉnh sửa danh mục tin tức
@endsection

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

<div class="container-fluid py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 bg-transparent">
            <li class="breadcrumb-item"><a href="#" class="text-gold-soft"><i class="fas fa-home me-1"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.news-categories.index') }}" class="text-gold-soft">Danh mục tin tức</a></li>
            <li class="breadcrumb-item active text-gold" aria-current="page">Chỉnh sửa</li>
        </ol>
    </nav>

    <h1 class="h2 mt-4 mb-4 text-gold" style="font-family: 'Playfair Display', serif;">
        <i class="fas fa-edit me-2"></i> Chỉnh sửa danh mục
    </h1>

    <div class="row">
        <div class="col-12">
            <div class="luxury-card mb-4" style="background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%); border: 1px solid rgba(212,175,55,0.3); border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                <div class="card-header py-3" style="border-bottom: 1px solid rgba(212,175,55,0.3);">
                    <h5 class="m-0 text-gold" style="font-family: 'Playfair Display', serif;">
                        <i class="fas fa-tags me-2"></i> CHỈNH SỬA DANH MỤC
                    </h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.news-categories.update', $newsCategory->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label text-gold">Tên danh mục <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control bg-dark border-gold text-light" id="name" name="name" value="{{ $newsCategory->name }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="slug" class="form-label text-gold">Slug <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-dark border-gold text-light" id="slug" name="slug" value="{{ $newsCategory->slug }}" required>
                                        <button class="btn btn-outline-gold" type="button" id="reset-slug">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="parent_id" class="form-label text-gold">Danh mục cha</label>
                                    <select class="form-select bg-dark border-gold text-light" id="parent_id" name="parent_id">
                                        <option value="">-- Không có --</option>
                                        @foreach($parentCategories as $parent)
                                            <option value="{{ $parent->id }}" {{ $newsCategory->parent_id == $parent->id ? 'selected' : '' }}>{{ $parent->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="order" class="form-label text-gold">Thứ tự</label>
                                    <input type="number" class="form-control bg-dark border-gold text-light" id="order" name="order" value="{{ $newsCategory->order }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label text-gold">Mô tả</label>
                                    <textarea class="form-control bg-dark border-gold text-light" id="description" name="description" rows="3">{{ $newsCategory->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-gold">Trạng thái</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="status" name="status" {{ $newsCategory->status ? 'checked' : '' }}>
                                        <label class="form-check-label text-light" for="status">Hoạt động</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('admin.news-categories.index') }}" class="btn btn-outline-light me-3">
                                <i class="fas fa-times me-1"></i> Hủy bỏ
                            </a>
                            <button type="submit" class="btn btn-gold">
                                <i class="fas fa-save me-1"></i> Cập nhật
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Tự động tạo slug khi nhập tên
    document.getElementById('name').addEventListener('input', function() {
        let name = this.value;
        let slugInput = document.getElementById('slug');

        if (!slugInput.manuallyEdited) {
            slugInput.value = slugify(name);
        }
    });

    // Đánh dấu slug đã chỉnh sửa thủ công
    document.getElementById('slug').addEventListener('input', function() {
        this.manuallyEdited = true;
    });

    // Nút reset slug
    document.getElementById('reset-slug').addEventListener('click', function() {
        let name = document.getElementById('name').value;
        let slugInput = document.getElementById('slug');
        slugInput.value = slugify(name);
        slugInput.manuallyEdited = false;
    });

    // Hàm chuyển đổi tên thành slug
    function slugify(text) {
        return text.toString().toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/đ/g, 'd').replace(/Đ/g, 'D')
            .replace(/\s+/g, '-')
            .replace(/[^\w\-]+/g, '')
            .replace(/\-\-+/g, '-')
            .replace(/^-+/, '')
            .replace(/-+$/, '');
    }
</script>
@endsection
