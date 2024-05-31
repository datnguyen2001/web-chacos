@extends('web.index')
@section('title', 'Danh mục')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/css/category.css') }}">
@stop
{{-- content of page --}}
@section('content')
    <div class="line-header-menu-page">
        <a href="{{ route('home') }}" class="title-header-menu-page">Trang chủ</a>
        <span style="margin: 0 5px;">/</span>
        <a class="title-header-menu-page">{{ $category->menu_belong }}</a>
        <span style="margin: 0 5px;">/</span>
        <a class="title-header-menu-page">{{ $category->name }}</a>
    </div>
    <input type="text" class="key_search" value="" hidden>
    @if (isset($product_hot) && count($product_hot) > 0)
        <div class="box-slide-category">
            <p class="title-category-slide text-uppercase">FEATURED {{ $category->menu_belong }} {{ $category->name }}</p>
            <div class="swiper categorySwiper">
                <div class="swiper-wrapper">
                    @foreach ($product_hot as $item)
                        <div class="swiper-slide slide-col-item-category">
                            <div class="line-add-cart-slide ">
                                <img src="{{ asset('assets/image/add-to-cart.png') }}">
                                <span class="title-quick">Quick Add</span>
                            </div>
                            <div class="position-relative">
                                {{--                        <span class="tag-hot">NEW ARRIVAL</span> --}}
                                <img src="{{ asset($item->image) }}" class="w-100 img-big-slide-sp">
                                <div class="box-wishlist">
                                    <div class="item-wishlist">
                                        Wishlist
                                    </div>
                                </div>
                                <img
                                    src="@if($item->wish) {{asset('assets/image/heart-solid.svg')}} @else {{asset('assets/image/heart.svg')}} @endif"
                                    class="icon-heart" data-value="{{$item->id}}" onclick="toggleHeart(this)"
                                    onmouseover="toggleWishlist(this)" onmouseout="hideWishlist(this)">

                            </div>
                            <div>
                                <a class="link-color">{{ count($item->color) }} colors</a>
                                <div class="box-option-color-style p-0">
                                    <div class="swiper swiperOptionColor">
                                        <div class="swiper-wrapper">
                                            @foreach ($item->color as $color)
                                                <div class="swiper-slide slide-item-option-style"><img
                                                        src="{{ asset($color->image) }}" class="img-option-color">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="swiper-button-next btn-option-color-next"></div>
                                    <div class="swiper-button-prev btn-option-color-prev"></div>
                                </div>
                                <a href="{{ route('detail-product', $item->slug) }}"
                                    class="title-sp">{{ $item->name }}</a>
                                <div class="d-flex align-items-center">
                                    <p class="title-price-sp" style="margin-right: 10px;text-decoration: line-through">
                                        {{ number_format($item->color[0]->price) }}
                                        đ</p>
                                    <p class="title-price-sp" style="color: red">
                                        {{ number_format($item->color[0]->price) }} đ</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-button-next next-category"></div>
            <div class="swiper-button-prev prev-category"></div>
            <div class="swiper-pagination swiper-pagination-category"></div>
        </div>
    @endif

    <div class="box-content-sp">
        <p class="title-big-cate-sp text-uppercase">{{ $category->menu_belong }} {{ $category->name }} <span
                class="count-cate-sp">{{ $count_product }} sản phẩm</span></p>
        <div class="box-line-filter-mobie">
            <div class="filter-mobile-left" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilterMobile"
                aria-controls="offcanvasFilterMobile">
                <span style="font-weight: bold; color: #1d4b58;">FILTER</span>
                <img src="{{ asset('assets/image/chevron.svg') }}" style="width: 12px;">
            </div>
            <div class="select-wrapper filter-mobile-right">
                <label for="sort-select-mobile" class="select-label">SORT BY</label>
                <select id="sort-select-mobile" class="form-select form-select-lg mb-3 sort-select-mobile"
                        style="font-weight: bold; color: #1d4b58;">
                    <option value="1">Newest</option>
                    <option value="2">Low Price</option>
                    <option value="3">High Price</option>
                </select>
            </div>
        </div>
        <div class="box-content">
            <div class="box-filter">
                <div class="select-wrapper">
                    <label for="sort-select" class="select-label">SORT BY</label>
                    <select id="sort-select" class="form-select form-select-lg mb-3 sort-select" >
                        <option value="1">Newest</option>
                        <option value="2">Low Price</option>
                        <option value="3">High Price</option>
                    </select>
                </div>

                <div class="content-filter">
                    <div class="title-filter">
                        Find the right product for you. Choose your size, color and more.
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
                                    <p class="title-filter-item">Size</p>
                                    <div class="box-item-filter-small">
                                        @foreach($sizes as $k => $item_sizes)
                                        <button class="btn-size-item size-item" onclick="toggleActive(this)" data-value="{{$item_sizes->name}}">{{$item_sizes->name}}</button>
                                        @endforeach
                                    </div>

                                    <p class="title-filter-item">Width</p>
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
                    @if (isset($product) && count($product) > 0)
                        @php
                            $advertising_index = 0;
                        @endphp
                        @foreach ($product as $index => $pro)
                            @if($index == 6 || $index == 20 || $index == 29 || $index == 40 || $index == 50)
                                @if(isset($product_advertising[$advertising_index]))
                                <a href="{{$product_advertising[$advertising_index]->url}}" class="w-100">
                                    <img src="{{asset($product_advertising[$advertising_index]->image)}}" class="w-100 h-100" style="object-fit: cover">
                                </a>
                                @php
                                    $advertising_index = $advertising_index+1;
                                @endphp
                                    @endif
                            @endif
                            <div class="item-sp-filter">
                                <div class="line-add-cart">
                                    <img src="{{ asset('assets/image/add-to-cart.png') }}" alt="">
                                    <span class="title-quick">Quick Add</span>
                                </div>
                                <div class="position-relative img-big-sp">
                                    {{--                        <span class="tag-hot">NEW ARRIVAL</span> --}}
                                    <img src="{{ asset($pro->image) }}" class="w-100 img-big-option">
                                    <div class="box-wishlist">
                                        <div class="item-wishlist">
                                            Wishlist
                                        </div>
                                    </div>
                                    <img
                                        src="@if($pro->wish) {{asset('assets/image/heart-solid.svg')}} @else {{asset('assets/image/heart.svg')}} @endif"
                                        class="icon-heart" data-value="{{$pro->id}}" onclick="toggleHeart(this)"
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
                                        @if($pro->color[0]->promotional_price != 0 || $pro->color[0]->promotional_price != null)
                                            <p class="title-price-sp"
                                               style="color: red;margin-right: 10px;">{{number_format($pro->color[0]->promotional_price)}}
                                                đ</p>
                                            <p class="title-price-sp"
                                               style="text-decoration: line-through">{{number_format($pro->color[0]->price)}}
                                                đ</p>
                                        @else
                                            <p class="title-price-sp"
                                               style="color: red;margin-right: 10px;">{{number_format($pro->color[0]->price)}}
                                                đ</p>
                                        @endif
                                    </div>
                                    <div class="d-flex mb-1">
                                        <div class="product-rate">
                                            <div class="star-rating" style="--rating:{{$pro->star}}"></div>
                                        </div>
                                        <div class="ts-star">{{$pro->star}} ({{$pro->count_star??0}})</div>
                                    </div>
{{--                                    <img src="{{ asset('assets/image/customize.png') }}" class="w-100">--}}
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                @if(count($product)==20)
                    {{--            <div class="w-100 d-flex justify-content-end">--}}
                    {{--                <div class="line-load-more">--}}
                    {{--                    <button class="btn-load-more">LOAD MORE</button>--}}
                    {{--                </div>--}}
                    {{--            </div>--}}
                    <div class="d-flex justify-content-center mt-3">
                        {{ $product->appends(request()->all())->links('web.partials.pagination') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="box-introduce">
        <p class="title-introduce">{{ @$category->title }}</p>
        <p class="content-introduce">{{ @$category->describe }}</p>
    </div>

    <div class="offcanvas offcanvas-start" style="width: 60%" data-bs-scroll="true" tabindex="-1" id="offcanvasFilterMobile" aria-labelledby="offcanvasFilterMobile">
        <div class="offcanvas-header position-relative p-0">
            <div class="name-filter w-100">
                FILTER <span class="count-filter-sp">({{ $count_product }} sản phẩm)</span>
            </div>
            <button type="button" class="btn-close position-absolute" style="right: 10px;top: 10px" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div class="accordion accordion-flush" id="accordionFilter">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-filterOne">
                        <button class="accordion-button collapsed accordion-button-filter" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-filter1" aria-expanded="false"
                                aria-controls="flush-filter1">
                            SIZE/WIDTH
                        </button>
                    </h2>
                    <div id="flush-filter1" class="accordion-collapse collapse show" aria-labelledby="flush-filter1"
                         data-bs-parent="#accordionFilter">
                        <div class="accordion-body body-item-filter">
                            <p class="title-filter-item">Size</p>
                            <div class="box-item-filter-small">
                                @foreach($sizes as $k => $item_sizes)
                                    <button class="btn-size-item size-item" onclick="toggleActive(this)" data-value="{{$item_sizes->name}}">{{$item_sizes->name}}</button>
                                @endforeach
                            </div>

                            <p class="title-filter-item">Width</p>
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
                            STYLE
                        </button>
                    </h2>
                    <div id="flush-filter2" class="accordion-collapse collapse" aria-labelledby="flush-filter2"
                         data-bs-parent="#accordionFilter">
                        <div class="accordion-body body-item-filter">
                            <div class="d-flex flex-column">
                                @foreach($styles as $k => $item_style )
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
                            COLOR
                        </button>
                    </h2>
                    <div id="flush-filter4" class="accordion-collapse collapse" aria-labelledby="flush-filter4"
                         data-bs-parent="#accordionFilter">
                        <div class="accordion-body body-item-filter">
                            <div class="d-flex flex-column">
                                @foreach($colors as $k => $item_color)
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
                            PRICE
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
