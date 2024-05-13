@extends('admin.layout.index')
@section('title', 'Quản lý Favorites')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">

    <style>
        .switch {
            --circle-dim: 1.4em;
            font-size: 17px;
            position: relative;
            display: inline-block;
            width: 3.5em;
            height: 2em;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #f5aeae;
            transition: .4s;
            border-radius: 30px;
        }

        .slider-card {
            position: absolute;
            content: "";
            height: var(--circle-dim);
            width: var(--circle-dim);
            border-radius: 20px;
            left: 0.3em;
            bottom: 0.3em;
            transition: .4s;
            pointer-events: none;
        }

        .slider-card-face {
            position: absolute;
            inset: 0;
            backface-visibility: hidden;
            perspective: 1000px;
            border-radius: 50%;
            transition: .4s transform;
        }

        .slider-card-front {
            background-color: #DC3535;
        }

        .slider-card-back {
            background-color: #379237;
            transform: rotateY(180deg);
        }

        input:checked~.slider-card .slider-card-back {
            transform: rotateY(0);
        }

        input:checked~.slider-card .slider-card-front {
            transform: rotateY(-180deg);
        }

        input:checked~.slider-card {
            transform: translateX(1.5em);
        }

        input:checked~.slider {
            background-color: #9ed99c;
        }
    </style>
@endsection

@section('main')
    <main id="main" class="main d-flex flex-column justify-content-center">
        <div class="">
            <!-- Page Preview -->
            <h1 class="h3 mb-4 text-gray-800">"Favorites" Trang chủ</h1>
            <form class="mt-5" action="{{ route('admin.settings.favorites.update') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="hashtag" class="form-label">Hashtag:</label>
                    <input class="form-control" type="text" id="hashtag" name="hashtag"
                        value="{{ old('hashtag', $favorites->hashtag) }}" autofocus>
                </div>

                <div class="mb-3">
                    <label for="banner" class="form-label">Ảnh lớn:</label>
                    <input class="form-control" accept="image/*,.gif" type="file" id="banner" name="banner">
                    <img class="mt-3" src="{{ $favorites->banner ?? '' }}" width="400">
                </div>

                <div class="mb-3">
                    <label for="banner-mobile" class="form-label">Ảnh lớn (Cho điện thoại):</label>
                    <input class="form-control" accept="image/*,.gif" type="file" id="banner-mobile"
                        name="banner_mobile">
                    <img class="mt-3" src="{{ $favorites->banner_mobile ?? '' }}" width="400">
                </div>

                <div class="mb-3">
                    <label for="left-image" class="form-label">Ảnh hộp bên trái:</label>
                    <input class="form-control" accept="image/*,.gif" type="file" id="left-image" name="left_image">
                    <img class="mt-3" src="{{ $favorites->left_image ?? '' }}" width="400">
                </div>

                <div class="mb-3">
                    <label for="right-image" class="form-label">Ảnh hộp bên phải:</label>
                    <input class="form-control" accept="image/*,.gif" type="file" id="right-image" name="right_image">
                    <img class="mt-3" src="{{ $favorites->right_image ?? '' }}" width="400">
                </div>

                <div class="mb-3">
                    <label for="right-image-mobile" class="form-label">Ảnh hộp bên phải (Cho điện thoại):</label>
                    <input class="form-control" accept="image/*,.gif" type="file" id="right-image-mobile"
                        name="right_image_mobile">
                    <img class="mt-3" src="{{ $favorites->right_image_mobile ?? '' }}" width="400">
                </div>

                <div class="mb-3">
                    <label for="isActive" class="form-label me-3">Công khai?</label>
                    <label class="switch">
                        <input type="checkbox" id="isActive" name="isActive" value="true"
                            {{ $isActive ? 'checked' : '' }}>
                        <div class="slider"></div>
                        <div class="slider-card">
                            <div class="slider-card-face slider-card-front"></div>
                            <div class="slider-card-face slider-card-back"></div>
                        </div>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
            <hr>
        </div>

    </main>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('input[type="file"]').on('change', function(e) {
                var file = e.target.files[0];
                var reader = new FileReader();
                var previewBanner = $(this).siblings('img');

                reader.onload = function(e) {
                    previewBanner.attr('src', e.target.result);
                };

                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection
