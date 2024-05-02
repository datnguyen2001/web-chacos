@extends('admin.layout.index')
@section('title', 'Quản lý Shop By Style')

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
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
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">"Shop by style" Trang chủ</h1>

            <hr>

            <div class="box-shop-style box-mobile-style">
                <div class="title-shop-style">What's <span style="color: #f65024;">YOUR STYLE?</span></div>
                <div class="swiper productSwiper productStyleSwiper">
                    <div class="swiper-wrapper">
                        <a type="button" class="swiper-slide box-item-product">
                            <img src="{{ asset('assets/image/shoes.png') }}" class="img-product-style2">
                        </a>
                        <a type="button" class="swiper-slide box-item-product">
                            <img src="{{ asset('assets/image/shoes.png') }}" class="img-product-style2">
                        </a>
                        <a type="button" class="swiper-slide box-item-product">
                            <img src="{{ asset('assets/image/shoes.png') }}" class="img-product-style2">
                        </a>
                        <a type="button" class="swiper-slide box-item-product">
                            <img src="{{ asset('assets/image/shoes.png') }}" class="img-product-style2">
                        </a>
                        <a type="button" class="swiper-slide box-item-product">
                            <img src="{{ asset('assets/image/shoes.png') }}" class="img-product-style2">
                        </a>
                        <a type="button" class="swiper-slide box-item-product">
                            <img src="{{ asset('assets/image/shoes.png') }}" class="img-product-style2">
                        </a>
                        <a type="button" class="swiper-slide box-item-product">
                            <img src="{{ asset('assets/image/shoes.png') }}" class="img-product-style2">
                        </a>
                    </div>
                    <div class="swiper-pagination swiper-pagination-product"></div>
                </div>
            </div>
            {{-- <form action="{{ route('admin.settings.banner.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="mainBanner" class="form-label">Video của banner:</label>
                    <input class="form-control" accept=".mp4" max-size="10240000" type="file" id="mainBanner"
                        name="banner">
                </div>

                <div class="mb-3">
                    <label for="imageOverlay" class="form-label">Lớp ảnh phủ:</label>
                    <input class="form-control" accept=".png" max-size="10240000" type="file" id="imageOverlay"
                        name="image">
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề (Chữ bé):</label>
                    <input class="form-control" type="text" id="title" name="title"
                        value="{{ old('title', $banner->title ?? '') }}">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Nội dung (Chữ to):</label>
                    <input class="form-control" type="text" id="content" name="content"
                        value="{{ old('content', $banner->content ?? '') }}">
                </div>

                <div class="mb-3">
                    <label for="button_title" class="form-label">Tiêu đề nút bấm:</label>
                    <input class="form-control" type="text" id="button_title" name="button_title"
                        value="{{ old('button_title', $banner->button_title ?? '') }}">
                </div>

                <div class="mb-3">
                    <label for="button_href" class="form-label">Nút điều hướng:</label>
                    <input class="form-control" type="text" id="button_href" name="button_href"
                        value="{{ old('button_href', $banner->button_href ?? '') }}">
                </div>

                <div class="mb-3">
                    <label for="isActive" class="form-label me-3">Is active?</label>
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
            </form> --}}
        </div>

    </main>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/js/home.js') }}"></script>
@endsection
