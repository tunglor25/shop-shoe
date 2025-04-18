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
            <i class="fas fa-edit me-2"></i> {{ $title }}
        </h1>

        @if (session('success'))
            <div class="alert alert-gold mb-4"
                style="background: rgba(212,175,55,0.2); border-left: 4px solid #d4af37; color: #d4af37;">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="luxury-card"
                    style="background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%); border: 1px solid rgba(212,175,55,0.3); border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                    <div class="card-body p-4">
                        <form action="{{ route('admin.slides.update', $slide->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- slide Name -->
                            <div class="mb-4 row">
                                <label for="name" class="col-md-4 col-lg-3 col-form-label text-gold">
                                    <i class="fas fa-tag me-2"></i> Tên slide
                                </label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control bg-dark border-gold text-light" name="name"
                                        id="name" value="{{ old('name', $slide->name) }}" />
                                    @error('name')
                                        <div class="text-gold-soft mt-2"><i
                                                class="fas fa-exclamation-circle me-2"></i>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Image -->
                            <div class="mb-4 row">
                                <label for="image" class="col-md-4 col-lg-3 col-form-label text-gold">
                                    <i class="fas fa-image me-2"></i> Ảnh slide
                                </label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="file" class="form-control bg-dark border-gold text-light" name="image"
                                        id="image" />
                                    <div class="mt-3">
                                        <img src="{{ asset('storage/' . $slide->image) }}" width="150"
                                            class="rounded border border-gold" style="object-fit: cover;">
                                    </div>
                                    @error('image')
                                        <div class="text-gold-soft mt-2"><i
                                                class="fas fa-exclamation-circle me-2"></i>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="mb-4 row">
                                <label class="col-md-4 col-lg-3 col-form-label text-gold">
                                    <i class="fas fa-power-off me-2"></i> Trạng thái
                                </label>
                                <div class="col-md-8 col-lg-9 d-flex align-items-center">
                                    <div class="form-check me-4">
                                        <input class="form-check-input bg-dark border-gold" type="radio" value="1"
                                            name="status" id="status_active" {{ $slide->status == 1 ? 'checked' : '' }} />
                                        <label class="form-check-label text-light" for="status_active">
                                            Hoạt động
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input bg-dark border-gold" type="radio" value="0"
                                            name="status" id="status_inactive"
                                            {{ $slide->status == 0 ? 'checked' : '' }} />
                                        <label class="form-check-label text-light" for="status_inactive">
                                            Khóa
                                        </label>
                                    </div>
                                    @error('status')
                                        <div class="text-gold-soft mt-2"><i
                                                class="fas fa-exclamation-circle me-2"></i>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="mb-3 row">
                                <div class="col-md-8 col-lg-9 offset-md-4 offset-lg-3">
                                    <button type="submit" class="btn btn-gold me-3">
                                        <i class="fas fa-save me-2"></i> Lưu lại
                                    </button>
                                    <a href="{{ route('admin.slides.index') }}" class="btn btn-outline-gold">
                                        <i class="fas fa-arrow-left me-2"></i> Quay lại
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('scripts')
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description', {
            enterMode: CKEDITOR.ENTER_BR,
            shiftEnterMode: CKEDITOR.ENTER_P,
            autoParagraph: false,
            uiColor: '#121212',
            contentsCss: 'body {color: #fff; background-color: #121212;}',
            toolbar: [{
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Underline', 'Strike']
                },
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', '-', 'Blockquote']
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink']
                },
                {
                    name: 'tools',
                    items: ['Maximize']
                },
                {
                    name: 'styles',
                    items: ['Styles', 'Format', 'Font', 'FontSize']
                },
                {
                    name: 'colors',
                    items: ['TextColor', 'BGColor']
                }
            ]
        });
    </script>
@endsection

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

    /* Form Control */
    .form-control,
    .form-select,
    .form-check-input {
        background-color: #121212 !important;
        border: 1px solid rgba(212, 175, 55, 0.3) !important;
        color: #fff !important;
    }

    .form-control:focus,
    .form-select:focus {
        background-color: #121212 !important;
        border-color: #d4af37 !important;
        box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.25) !important;
        color: #fff !important;
    }

    /* Radio Button Customization */
    .form-check-input:checked {
        background-color: #d4af37 !important;
        border-color: #d4af37 !important;
    }

    /* CKEditor Customization */
    .cke_chrome {
        border: 1px solid rgba(212, 175, 55, 0.3) !important;
        box-shadow: none !important;
    }

    .cke_top {
        background: #1a1a1a !important;
        border-bottom: 1px solid rgba(212, 175, 55, 0.3) !important;
    }

    .cke_bottom {
        background: #1a1a1a !important;
        border-top: 1px solid rgba(212, 175, 55, 0.3) !important;
    }
</style>
@endsection
