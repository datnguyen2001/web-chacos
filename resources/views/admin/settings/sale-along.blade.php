@extends('admin.layout.index')
@section('title', 'Quản lý Sale Along')

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
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">"Sale along" Trang chủ</h1>

            <hr>

            <div class="box-along-sale" style="margin-top: 7rem;">
                <article class="ag-full-width home-common" id="home-cards">
                    <div class="ag-site-width" style=" margin-bottom: 1rem">
                        <picture>
                            <img src="{{ asset('assets/image/home-cards-d.png') }}" width="1920" height="1130"
                                class="bg-image" />
                            <img src="{{ asset('assets/image/home-cards-m.png') }}" class="img-cards-m">
                        </picture>
                        <h2 class="title">
                            <span>How you want to live</span><br />begins with what you put<br class="sm-only" />
                            on your feet.
                        </h2>
                        <div class="swiper AlongSaleSwiper" style="margin-top: 1rem">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/image/35-years-35-and-under.gif') }}" style="width: 35em"/>
                                    <h2>Extra 35% Off Sale</h2>
                                    <p>
                                        Ending our birthday month with a bang!<br />
                                        Take an extra 35% off sale items. Now through 4/27.<br />
                                        Use code 35YEARS at checkout.
                                    </p>
                                    <a href="https://www.chacos.com/US/en/sale/" class="btn">SHOP SALE</a>
                                </div>
                                <div class="swiper-slide">
                                    <picture>
                                        <img src="{{ asset('assets/image/come-hang-out.png') }}" style="width: 36em"/>
                                    </picture>
                                    <h2>Come Hang Out</h2>
                                    <p>
                                        We're hitting the road again in 2024 and can't<br class="lg-only" />
                                        wait<br class="sm-only" />
                                        to get together and celebrate our 35th<br class="lg-only" />
                                        birthday at<br class="sm-only" />
                                        the Chaco For Life Tour!
                                    </p>
                                    <a href="https://www.chacos.com/US/en/chaco-for-life/" class="btn">FOLLOW ALONG</a>
                                </div>
                                <div class="swiper-slide">
                                    <picture>
                                        <img src="{{ asset('assets/image/go-to-townes_1.png') }}" style="width: 36em"/>
                                    </picture>
                                    <h2>Go To Townes</h2>
                                    <p>
                                        Comfy enough to go, go, go from day one, the<br />
                                        Townes is an instant classic and your next go-to<br />
                                        sandal for the everyday.
                                    </p>
                                    <a href="https://www.chacos.com/US/en/townes-collection/" class="btn">SHOP TOWNES</a>
                                </div>
                            </div>
                            <div class="swiper-pagination sm-only"></div>
                        </div>

                    </div>
                </article>
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

@endsection
