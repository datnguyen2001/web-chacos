@extends('web.index')
@section('title', 'Danh mục')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/css/category.css') }}">
    <style>
        .box-content-sp {
            padding-top: 35px;
        }

        .title-search-line {
            font-size: 15px;
            color: #303030;
            font-weight: 500;
        }
    </style>
@stop
{{-- content of page --}}
@section('content')
    <div class="line-header-menu-page">
        <a href="{{ route('home') }}" class="title-header-menu-page">Trang chủ</a>
        <span style="margin: 0 5px;">/</span>
        <a class="title-header-menu-page">Tìm kiếm sản phẩm</a>
        <span style="margin: 0 5px;">/</span>
        <a class="title-header-menu-page">{{ $key_search }}</a>
    </div>
    <input type="text" class="key_search" value="{{ $key_search }}" hidden>
    <div class="box-content-sp">
        <span class="title-search-line">TÌM KIẾM KẾT QUẢ CHO:</span>
        <p class="title-big-cate-sp text-uppercase">{{ $key_search }} <span class="count-cate-sp">( {{ count($data) }}
                sản phẩm )</span></p>
        <div class="box-line-filter-mobie">
            <div class="filter-mobile-left" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilterMobile"
                aria-controls="offcanvasFilterMobile">
                <span style="font-weight: bold; color: #1d4b58;">LỌC</span>
                <img src="{{ asset('assets/image/chevron.svg') }}" style="width: 12px;">
            </div>
            <div class="select-wrapper filter-mobile-right">
                <label for="sort-select-mobile" class="select-label">SẮP XẾP THEO</label>
                <select id="sort-select-mobile" class="form-select form-select-lg mb-3 sort-select-mobile"
                    style="font-weight: bold; color: #1d4b58;">
                    <option value="1">Mới nhất</option>
                    <option value="2">Giá thấp</option>
                    <option value="3">Giá cao</option>
                </select>
            </div>
        </div>
        <div class="box-content">
            <div class="box-filter">
                <div class="select-wrapper">
                    <label for="sort-select" class="select-label">SẮP XẾP THEO</label>
                    <select id="sort-select" class="form-select form-select-lg mb-3 sort-select">
                        <option value="1">Mới nhất</option>
                        <option value="2">Giá thấp</option>
                        <option value="3">Giá cao</option>
                    </select>
                </div>

                <div class="content-filter">
                    <div class="title-filter">
                        Tìm sản phẩm phù hợp với bạn. Chọn kích thước, màu sắc của bạn và nhiều hơn nữa.
                    </div>
                    <div class="name-filter">
                        FILTER <span class="count-filter-sp">({{ $count_product }} sản phẩm)</span>
                    </div>

                    <div class="accordion accordion-flush" id="accordionFilter">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-filterOne">
                                <button class="accordion-button collapsed accordion-button-filter" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-filter1" aria-expanded="false"
                                        aria-controls="flush-filter1">
                                    SIZE/WIDTH
                                </button>
                            </h2>
                            <div id="flush-filter1" class="accordion-collapse collapse" aria-labelledby="flush-filter1"
                                 data-bs-parent="#accordionFilter">
                                <div class="accordion-body body-item-filter">
                                    <p class="title-filter-item">Kích cỡ</p>
                                    <div class="box-item-filter-small">
                                        @foreach($sizes as $k => $item_sizes)
                                            <button class="btn-size-item size-item" onclick="toggleActive(this)" data-value="{{$item_sizes->name}}">{{$item_sizes->name}}</button>
                                        @endforeach
                                    </div>

                                    <p class="title-filter-item">Chiều rộng</p>
                                    <div class="d-flex flex-column">
                                        <div class="mb-1">
                                            <input id="input-filter" class="input-filter input-filter-0 type_width" type="checkbox" value="1">
                                            <label for="input-filter" class="title-input-filter">Medium
                                            </label>
                                        </div>
                                        <div class="mb-1">
                                            <input id="input-filter-w" class="input-filter input-filter-0 type_width" type="checkbox" value="2">
                                            <label for="input-filter-w" class="title-input-filter">Wide
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-filter-2">
                                <button class="accordion-button collapsed accordion-button-filter" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-filter2" aria-expanded="false"
                                        aria-controls="flush-filter2">
                                    STYLE
                                </button>
                            </h2>
                            <div id="flush-filter2" class="accordion-collapse collapse" aria-labelledby="flush-filter2"
                                 data-bs-parent="#accordionFilter">
                                <div class="accordion-body body-item-filter">
                                    <div class="d-flex flex-column">
                                        @foreach($styles as $k => $item_style )
                                            <div class="mb-1">
                                                <input id="input-filter-1" class="input-filter input-filter-1 style_id" type="checkbox" value="{{$item_style->style}}">
                                                <label for="input-filter-1" class="title-input-filter">{{$item_style->style}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-filter-4">
                                <button class="accordion-button collapsed accordion-button-filter" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-filter4" aria-expanded="false"
                                        aria-controls="flush-filter4">
                                    COLOR
                                </button>
                            </h2>
                            <div id="flush-filter4" class="accordion-collapse collapse" aria-labelledby="flush-filter4"
                                 data-bs-parent="#accordionFilter">
                                <div class="accordion-body body-item-filter">
                                    <div class="d-flex flex-column">
                                        @foreach($colors as $k => $item_color)
                                            <div class="mb-1">
                                                <input id="input-filter-2 " class="input-filter input-filter-2 color_id" type="checkbox" value="{{$item_color->name}}">
                                                <label for="input-filter-2" class="title-input-filter">{{$item_color->name}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-filter-5">
                                <button class="accordion-button collapsed accordion-button-filter" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-filter5" aria-expanded="false"
                                        aria-controls="flush-filter5">
                                    PRICE
                                </button>
                            </h2>
                            <div id="flush-filter5" class="accordion-collapse collapse" aria-labelledby="flush-filter5"
                                 data-bs-parent="#accordionFilter">
                                <div class="accordion-body body-item-filter">
                                    <div class="d-flex flex-column">
                                        <div class="mb-1">
                                            <input id="input-filter-3" class="input-filter input-filter-3 price_id" type="checkbox" value="1">
                                            <label for="input-filter-3" class="title-input-filter">0đ - 300.000đ
                                            </label>
                                        </div>
                                        <div class="mb-1">
                                            <input id="input-filter-4" class="input-filter input-filter-3 price_id" type="checkbox" value="2">
                                            <label for="input-filter-4" class="title-input-filter">300.000đ - 600.000đ
                                            </label>
                                        </div>
                                        <div class="mb-1">
                                            <input id="input-filter-5" class="input-filter input-filter-3 price_id" type="checkbox" value="3">
                                            <label for="input-filter-5" class="title-input-filter">600.000đ - 1.000.000đ
                                            </label>
                                        </div>
                                        <div class="mb-1">
                                            <input id="input-filter-6" class="input-filter input-filter-3 price_id" type="checkbox" value="4">
                                            <label for="input-filter-6" class="title-input-filter">1.000.000đ - 3.000.000đ
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="box_sp_filter box-sp d-inline-block">
                <div class="box-sp w-100 mt-0">
                    @if (isset($data) && count($data) > 0)
                        @foreach ($data as $pro)
                            <div class="item-sp-filter">
                                <div class="line-add-cart">
                                    <img src="{{ asset('assets/image/add-to-cart.png') }}" alt="">
                                    <span class="title-quick">Thêm nhanh</span>
                                </div>
                                <div class="position-relative img-big-sp">
                                    {{--                        <span class="tag-hot">NEW ARRIVAL</span> --}}
                                    <img src="{{ asset($pro->image) }}" class="w-100 img-big-option">
                                    <div class="box-wishlist">
                                        <div class="item-wishlist">
                                            Danh sách yêu thích
                                        </div>
                                    </div>
                                    <img src="@if ($pro->wish) {{ asset('assets/image/heart-solid.svg') }} @else {{ asset('assets/image/heart.svg') }} @endif"
                                        class="icon-heart" data-value="{{ $pro->id }}" onclick="toggleHeart(this)"
                                        onmouseover="toggleWishlist(this)" onmouseout="hideWishlist(this)">
                                </div>
                                <div>
                                    <a class="link-color">{{ count($pro->color) }} colors</a>
                                    <div class="box-option-color-style">
                                        <div class="swiper swiperOptionColor">
                                            <div class="swiper-wrapper">
                                                @foreach ($pro->color as $color_pro)
                                                    <div class="swiper-slide"><img src="{{ asset($color_pro->image) }}"
                                                            class="img-option-color">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="swiper-button-next btn-option-color-next"></div>
                                        <div class="swiper-button-prev btn-option-color-prev"></div>
                                    </div>
                                    <a href="{{ route('detail-product', $pro->slug) }}"
                                        class="title-sp">{{ $pro->name }}</a>
                                    <div class="d-flex align-items-center mb-1">
                                        @if ($pro->color[0]->promotional_price != 0 || $pro->color[0]->promotional_price != null)
                                            <p class="title-price-sp" style="color: red;margin-right: 10px;">
                                                {{ number_format($pro->color[0]->promotional_price) }}
                                                đ</p>
                                            <p class="title-price-sp" style="text-decoration: line-through">
                                                {{ number_format($pro->color[0]->price) }}
                                                đ</p>
                                        @else
                                            <p class="title-price-sp" style="color: red;margin-right: 10px;">
                                                {{ number_format($pro->color[0]->price) }}
                                                đ</p>
                                        @endif
                                    </div>
                                    <div class="d-flex mb-1">
                                        <div class="product-rate">
                                            <div class="star-rating" style="--rating:{{ $pro->star }}"></div>
                                        </div>
                                        <div class="ts-star">{{ $pro->star }} ({{ $pro->count_star ?? 0 }})</div>
                                    </div>
                                    {{--                                    <img src="{{ asset('assets/image/customize.png') }}" class="w-100"> --}}
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                @if (count($data) == 20)
                    <div class="d-flex justify-content-center mt-3">
                        {{ $data->appends(request()->all())->links('web.partials.pagination') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-start" style="width: 60%" data-bs-scroll="true" tabindex="-1"
        id="offcanvasFilterMobile" aria-labelledby="offcanvasFilterMobile">
        <div class="offcanvas-header position-relative p-0">
            <div class="name-filter w-100">
                LỌC <span class="count-filter-sp">({{ count($data) }} sản phẩm)</span>
            </div>
            <button type="button" class="btn-close position-absolute" style="right: 10px;top: 10px"
                data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div class="accordion accordion-flush" id="accordionFilter">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-filterOne">
                        <button class="accordion-button collapsed accordion-button-filter" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-filter1" aria-expanded="false"
                            aria-controls="flush-filter1">
                            KÍCH CỠ / RỘNG
                        </button>
                    </h2>
                    <div id="flush-filter1" class="accordion-collapse collapse show" aria-labelledby="flush-filter1"
                        data-bs-parent="#accordionFilter">
                        <div class="accordion-body body-item-filter">
                            <p class="title-filter-item">Kích cỡ</p>
                            <div class="box-item-filter-small">
                                @foreach ($sizes as $k => $item_sizes)
                                    <button class="btn-size-item size-item" onclick="toggleActive(this)"
                                        data-value="{{ $item_sizes->name }}">{{ $item_sizes->name }}</button>
                                @endforeach
                            </div>

                            <p class="title-filter-item">Chiều rộng</p>
                            <div class="d-flex flex-column">
                                <div class="mb-1">
                                    <input id="input-filter" class="input-filter input-filter-mobile-0 type_width" type="checkbox" value="1">
                                    <label for="input-filter" class="title-input-filter">Medium
                                    </label>
                                </div>
                                <div class="mb-1">
                                    <input id="input-filter-w" class="input-filter input-filter-mobile-0 type_width" type="checkbox" value="2">
                                    <label for="input-filter-w" class="title-input-filter">Wide
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-filter-2">
                        <button class="accordion-button collapsed accordion-button-filter" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-filter2" aria-expanded="false"
                            aria-controls="flush-filter2">
                            KÍCH CỠ
                        </button>
                    </h2>
                    <div id="flush-filter2" class="accordion-collapse collapse" aria-labelledby="flush-filter2"
                        data-bs-parent="#accordionFilter">
                        <div class="accordion-body body-item-filter">
                            <div class="d-flex flex-column">
                                @foreach ($styles as $k => $item_style)
                                    <div class="mb-1">
                                        <input id="input-filter-1" class="input-filter input-filter-mobile-1 style_id" type="checkbox" value="{{$item_style->style}}">
                                        <label for="input-filter-1" class="title-input-filter">{{$item_style->style}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-filter-4">
                        <button class="accordion-button collapsed accordion-button-filter" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-filter4" aria-expanded="false"
                            aria-controls="flush-filter4">
                            MÀU SẮC
                        </button>
                    </h2>
                    <div id="flush-filter4" class="accordion-collapse collapse" aria-labelledby="flush-filter4"
                        data-bs-parent="#accordionFilter">
                        <div class="accordion-body body-item-filter">
                            <div class="d-flex flex-column">
                                @foreach ($colors as $k => $item_color)
                                    <div class="mb-1">
                                        <input id="input-filter-2 " class="input-filter input-filter-mobile-2 color_id" type="checkbox" value="{{$item_color->name}}">
                                        <label for="input-filter-2" class="title-input-filter">{{$item_color->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-filter-5">
                        <button class="accordion-button collapsed accordion-button-filter" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-filter5" aria-expanded="false"
                            aria-controls="flush-filter5">
                            GIÁ TIỀN
                        </button>
                    </h2>
                    <div id="flush-filter5" class="accordion-collapse collapse" aria-labelledby="flush-filter5"
                        data-bs-parent="#accordionFilter">
                        <div class="accordion-body body-item-filter">
                            <div class="d-flex flex-column">
                                <div class="mb-1">
                                    <input id="input-filter-3" class="input-filter input-filter-mobile-3 price_id" type="checkbox" value="1">
                                    <label for="input-filter-3" class="title-input-filter">0đ - 300.000đ
                                    </label>
                                </div>
                                <div class="mb-1">
                                    <input id="input-filter-4" class="input-filter input-filter-mobile-3 price_id" type="checkbox" value="2">
                                    <label for="input-filter-4" class="title-input-filter">300.000đ - 600.000đ
                                    </label>
                                </div>
                                <div class="mb-1">
                                    <input id="input-filter-5" class="input-filter input-filter-mobile-3 price_id" type="checkbox" value="3">
                                    <label for="input-filter-5" class="title-input-filter">600.000đ - 1.000.000đ
                                    </label>
                                </div>
                                <div class="mb-1">
                                    <input id="input-filter-6" class="input-filter input-filter-mobile-3 price_id" type="checkbox" value="4">
                                    <label for="input-filter-6" class="title-input-filter">1.000.000đ - 3.000.000đ
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script_page')
    <script src="{{ asset('assets/js/category.js') }}"></script>
    <script>
        function toggleActive(item) {
            document.querySelectorAll('.size-item').forEach(function(el) {
                el.classList.remove('active-filter');
            });
            item.classList.toggle('active-filter');

        }
    </script>
@stop
