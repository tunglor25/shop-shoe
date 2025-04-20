@extends('admin.layouts.app')

@section('title', 'Tạo Tin tức Mới')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

<div class="container-fluid py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 bg-transparent">
            <li class="breadcrumb-item"><a href="#" class="text-gold-soft"><i class="fas fa-home me-1"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.news.index') }}" class="text-gold-soft">Tin tức</a></li>
            <li class="breadcrumb-item active text-gold" aria-current="page">Tạo mới</li>
        </ol>
    </nav>

    <h1 class="h2 mt-4 mb-4 text-gold" style="font-family: 'Playfair Display', serif;">
        <i class="fas fa-plus-circle me-2"></i> Tạo Tin tức Mới
    </h1>

    <div class="row">
        <div class="col-12">
            <div class="luxury-card mb-4" style="background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%); border: 1px solid rgba(212,175,55,0.3); border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                <div class="card-header py-3" style="border-bottom: 1px solid rgba(212,175,55,0.3);">
                    <h5 class="m-0 text-gold" style="font-family: 'Playfair Display', serif;">
                        <i class="fas fa-newspaper me-2"></i> THÔNG TIN TIN TỨC
                    </h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label text-gold">Tiêu đề <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control bg-dark border-gold text-light" id="title" name="title" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="slug" class="form-label text-gold">Slug <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-dark border-gold text-light" id="slug" name="slug" required>
                                        <button class="btn btn-outline-gold" type="button" id="reset-slug">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="news_category_id" class="form-label text-gold">Danh mục <span class="text-danger">*</span></label>
                                    <select class="form-select bg-dark border-gold text-light" id="news_category_id" name="news_category_id" required>
                                        <option value="">-- Chọn danh mục --</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="published_at" class="form-label text-gold">Ngày đăng</label>
                                    <input type="datetime-local" class="form-control bg-dark border-gold text-light" id="published_at" name="published_at">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="image" class="form-label text-gold">Hình ảnh</label>
                                    <input type="file" class="form-control bg-dark border-gold text-light" id="image" name="image" accept="image/*">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-gold">Nổi bật</label>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1">
                                                <label class="form-check-label text-light" for="is_featured">Đánh dấu nổi bật</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-gold">Trạng thái</label>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="status" name="status" value="1" checked>
                                                <label class="form-check-label text-light" for="status">Hiển thị</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="summary" class="form-label text-gold">Tóm tắt</label>
                                    <textarea class="form-control bg-dark border-gold text-light" id="summary" name="summary" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="content" class="form-label text-gold">Nội dung <span class="text-danger">*</span></label>
                                    <textarea class="form-control bg-dark border-gold text-light" id="content" name="content" rows="10" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('admin.news.index') }}" class="btn btn-outline-light me-3">
                                <i class="fas fa-times me-1"></i> Hủy bỏ
                            </a>
                            <button type="submit" class="btn btn-gold">
                                <i class="fas fa-save me-1"></i> Lưu lại
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        // Summernote editor
        $('#content').summernote({
            height: 300,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        // Auto generate slug from title
        $('#title').on('input', function() {
            let title = $(this).val();
            if (!$('#slug').data('manual')) {
                $('#slug').val(slugify(title));
            }
        });

        // Mark slug as manually edited
        $('#slug').on('input', function() {
            $(this).data('manual', true);
        });

        // Reset slug button
        $('#reset-slug').click(function() {
            let title = $('#title').val();
            $('#slug').val(slugify(title)).data('manual', false);
        });

        // Slugify function
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
    });
</script>
@endsection
