@extends('web.index')
@section('title','Danh mục')

@section('style_page')
    <link rel="stylesheet" href="{{asset('assets/css/category.css')}}">
@stop
{{--content of page--}}
@section('content')
    <div class="line-header-menu-page">
        <a href="{{route('home')}}" class="title-header-menu-page">Trang chủ</a>
        <span style="margin: 0 5px;">/</span>
        <a class="title-header-menu-page">{{$category->menu_belong}}</a>
        <span style="margin: 0 5px;">/</span>
        <a class="title-header-menu-page">{{$category->name}}</a>
    </div>

    @if(isset($product_hot) && count($product_hot) > 0)
        <div class="box-slide-category">
            <p class="title-category-slide text-uppercase">FEATURED {{$category->menu_belong}} {{$category->name}}</p>
            <div class="swiper categorySwiper">
                <div class="swiper-wrapper">
                    @foreach($product_hot as $item)
                        <div class="swiper-slide slide-col-item-category">
                            <div class="line-add-cart-slide ">
                                <img src="{{asset('assets/image/add-to-cart.png')}}">
                                <span class="title-quick">Quick Add</span>
                            </div>
                            <div class="position-relative">
                                {{--                        <span class="tag-hot">NEW ARRIVAL</span>--}}
                                <img src="{{asset($item->image)}}" class="w-100 img-big-slide-sp">
                                <div class="box-wishlist">
                                    <div class="item-wishlist">
                                        Wishlist
                                    </div>
                                </div>
                                <img
                                    src="@if($item->wish) {{asset('assets/image/heart-solid.svg')}} @else {{asset('assets/image/heart.svg')}} @endif"
                                    class="icon-heart" onclick="toggleHeart(this)"
                                    onmouseover="toggleWishlist(this)" onmouseout="hideWishlist(this)">

                            </div>
                            <div>
                                <a class="link-color">{{count($item->color)}} colors</a>
                                <div class="box-option-color-style p-0">
                                    <div class="swiper swiperOptionColor">
                                        <div class="swiper-wrapper">
                                            @foreach($item->color as $color)
                                                <div class="swiper-slide slide-item-option-style"><img
                                                        src="{{asset($color->image)}}" class="img-option-color">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="swiper-button-next btn-option-color-next"></div>
                                    <div class="swiper-button-prev btn-option-color-prev"></div>
                                </div>
                                <a href="{{route('detail-product',$item->slug)}}" class="title-sp">{{$item->name}}</a>
                                <div class="d-flex align-items-center">
                                    <p class="title-price-sp"
                                       style="margin-right: 10px;text-decoration: line-through">{{number_format($item->color[0]->price)}}
                                        đ</p>
                                    <p class="title-price-sp"
                                       style="color: red">{{number_format($item->color[0]->price)}} đ</p>
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
        <p class="title-big-cate-sp text-uppercase">{{$category->menu_belong}} {{$category->name}} <span
                class="count-cate-sp">{{$count_product}} sản phẩm</span></p>
        <div class="box-line-filter-mobie">
            <div class="filter-mobile-left" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilterMobile"
                 aria-controls="offcanvasFilterMobile">
                <span style="font-weight: bold; color: #1d4b58;">FILTER</span>
                <img src="{{asset('assets/image/chevron.svg')}}" style="width: 12px;">
            </div>
            <div class="select-wrapper filter-mobile-right">
                <label for="sort-select" class="select-label">SORT BY</label>
                <select id="sort-select" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                        style="font-weight: bold; color: #1d4b58;">
                    <option value="1">Best Seller</option>
                    <option value="2">Newest</option>
                    <option value="3">High Price</option>
                </select>
            </div>
        </div>
        <div class="box-content">
            <div class="box-filter">
                <div class="select-wrapper">
                    <label for="sort-select" class="select-label">SORT BY</label>
                    <select id="sort-select" class="form-select form-select-lg mb-3"
                            aria-label=".form-select-lg example">
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
                        FILTER <span class="count-filter-sp">({{$count_product}} sản phẩm)</span>
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
                                        <button class="btn-size-item size-item" onclick="toggleActive(this)">5</button>
                                        <button class="btn-size-item size-item" onclick="toggleActive(this)">6</button>
                                        <button class="btn-size-item size-item" onclick="toggleActive(this)">7</button>
                                        <button class="btn-size-item size-item" onclick="toggleActive(this)">8</button>
                                        <button class="btn-size-item size-item" onclick="toggleActive(this)">9</button>
                                        <button class="btn-size-item size-item" onclick="toggleActive(this)">10</button>
                                    </div>

                                    <p class="title-filter-item">Width</p>
                                    <div class="d-flex flex-column">
                                        <div class="mb-1">
                                            <input id="input-filter" class="input-filter" type="checkbox" value="1">
                                            <label for="input-filter" class="title-input-filter">Medium <span
                                                    style="color: #6F6F6F;">(211)</span>
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
                                        <div class="mb-1">
                                            <input id="input-filter-1" class="input-filter" type="checkbox" value="1">
                                            <label for="input-filter-1" class="title-input-filter">Flip Flops <span
                                                    style="color: #6F6F6F;">(10)</span>
                                            </label>
                                        </div>
                                        <div class="mb-1">
                                            <input id="input-filter-2" class="input-filter" type="checkbox" value="1">
                                            <label for="input-filter-2" class="title-input-filter">Sandals <span
                                                    style="color: #6F6F6F;">(54)</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-filter-3">
                                <button class="accordion-button collapsed accordion-button-filter" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-filter3" aria-expanded="false"
                                        aria-controls="flush-filter3">
                                    COLLECTION
                                </button>
                            </h2>
                            <div id="flush-filter3" class="accordion-collapse collapse" aria-labelledby="flush-filter3"
                                 data-bs-parent="#accordionFilter">
                                <div class="accordion-body body-item-filter">
                                    <div class="d-flex flex-column">
                                        <div class="mb-1">
                                            <input id="input-filter-1" class="input-filter" type="checkbox" value="1">
                                            <label for="input-filter-1" class="title-input-filter">Flip Flops <span
                                                    style="color: #6F6F6F;">(10)</span>
                                            </label>
                                        </div>
                                        <div class="mb-1">
                                            <input id="input-filter-2" class="input-filter" type="checkbox" value="1">
                                            <label for="input-filter-2" class="title-input-filter">Sandals <span
                                                    style="color: #6F6F6F;">(54)</span>
                                            </label>
                                        </div>
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
                                        <div class="mb-1">
                                            <input id="input-filter-1" class="input-filter" type="checkbox" value="1">
                                            <label for="input-filter-1" class="title-input-filter">Flip Flops <span
                                                    style="color: #6F6F6F;">(10)</span>
                                            </label>
                                        </div>
                                        <div class="mb-1">
                                            <input id="input-filter-2" class="input-filter" type="checkbox" value="1">
                                            <label for="input-filter-2" class="title-input-filter">Sandals <span
                                                    style="color: #6F6F6F;">(54)</span>
                                            </label>
                                        </div>
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
                                            <input id="input-filter-1" class="input-filter" type="checkbox" value="1">
                                            <label for="input-filter-1" class="title-input-filter">Flip Flops <span
                                                    style="color: #6F6F6F;">(10)</span>
                                            </label>
                                        </div>
                                        <div class="mb-1">
                                            <input id="input-filter-2" class="input-filter" type="checkbox" value="1">
                                            <label for="input-filter-2" class="title-input-filter">Sandals <span
                                                    style="color: #6F6F6F;">(54)</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="box-sp">
                @if(isset($product) && count($product)>0)
                    @foreach($product as $pro)
                        <div class="item-sp-filter">
                            <div class="line-add-cart">
                                <img src="{{asset('assets/image/add-to-cart.png')}}" alt="">
                                <span class="title-quick">Quick Add</span>
                            </div>
                            <div class="position-relative img-big-sp">
                                {{--                        <span class="tag-hot">NEW ARRIVAL</span>--}}
                                <img src="{{asset($pro->image)}}" class="w-100 img-big-option">
                                <div class="box-wishlist">
                                    <div class="item-wishlist">
                                        Wishlist
                                    </div>
                                </div>
                                <img
                                    src="@if($pro->wish) {{asset('assets/image/heart-solid.svg')}} @else {{asset('assets/image/heart.svg')}} @endif"
                                    class="icon-heart" onclick="toggleHeart(this)"
                                    onmouseover="toggleWishlist(this)" onmouseout="hideWishlist(this)">
                            </div>
                            <div>
                                <a class="link-color">{{count($pro->color)}} colors</a>
                                <div class="box-option-color-style">
                                    <div class="swiper swiperOptionColor">
                                        <div class="swiper-wrapper">
                                            @foreach($pro->color as $color_pro)
                                                <div class="swiper-slide"><img src="{{asset($color_pro->image)}}"
                                                                               class="img-option-color">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="swiper-button-next btn-option-color-next"></div>
                                    <div class="swiper-button-prev btn-option-color-prev"></div>
                                </div>
                                <a href="{{route('detail-product',$pro->slug)}}" class="title-sp">{{$pro->name}}</a>
                                <div class="d-flex align-items-center mb-1">
                                    <p class="title-price-sp"
                                       style="margin-right: 10px;text-decoration: line-through">{{number_format($pro->color[0]->price)}}
                                        đ</p>
                                    <p class="title-price-sp"
                                       style="color: red">{{number_format($pro->color[0]->price)}} đ</p>
                                </div>
                                <div class="d-flex mb-1">
                                    <div class="product-rate">
                                        <div class="star-rating" style="--rating:4"></div>
                                    </div>
                                    <div class="ts-star">4.5 (1058)</div>
                                </div>
                                <img src="{{asset('assets/image/customize.png')}}" class="w-100">
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        @if(count($product)==20)
{{--            <div class="w-100 d-flex justify-content-end">--}}
{{--                <div class="line-load-more">--}}
{{--                    <button class="btn-load-more">LOAD MORE</button>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="d-flex justify-content-center">
                {{ $product->appends(request()->all())->links('web.partials.pagination') }}
            </div>
        @endif

    </div>

    <div class="box-introduce">
        <p class="title-introduce">{{@$category->title}}</p>
        <p class="content-introduce">{{@$category->describe}}</p>
    </div>
@stop

@section('script_page')
    <script src="{{asset('assets/js/category.js')}}"></script>
    <script>
        function toggleHeart(heart) {
            if (heart.src.includes('heart-solid.svg')) {
                heart.src = window.location.origin + '/assets/image/heart.svg';
            } else {
                heart.src = window.location.origin + '/assets/image/heart-solid.svg';
            }
        }

        function toggleActive(item) {
            document.querySelectorAll('.size-item').forEach(function (el) {
                el.classList.remove('active-filter');
            });
            item.classList.toggle('active-filter');

        }

        function toggleWishlist(element) {
            var wishlist = element.parentElement.querySelector('.box-wishlist');
            wishlist.style.display = "flex";
        }

        function hideWishlist(element) {
            var wishlist = element.parentElement.querySelector('.box-wishlist');
            wishlist.style.display = "none";
        }
    </script>
@stop
