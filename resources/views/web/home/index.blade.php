@extends('web.index')
@section('title', 'Trang chủ')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
@stop
{{-- content of page --}}
@section('content')

    {{-- BANNER --}}
    @if ($banner)
        @php
            $banner = json_decode($banner->value);
        @endphp
        <div class="box-banner">
            <div class="position-relative">
                <video data-responsive="" class="w-100" autoplay="" playsinline="" muted="" loop=""
                    fetchpriority="high" src="{{ $banner->banner }}"></video>
                <img src="{{ asset('assets/image/wavy-overlay.png') }}" class="img-song">
            </div>
            <div class="overlays-home">
                <div class="wrapper">
                    <img src="{{ $banner->image }}" alt=" " class="hero-product-overlay">
                    <div class="hero-content mx-2 d-flex align-items-end">
                        <div>
                            <p class="mb-0 text-hero-one">{{ $banner->title ?? '' }}</p>
                            <p class="mb-0 text-hero-two">{{ $banner->content ?? '' }}</p>
                        </div>
                        <a href="{{ $banner->button_href ?? '#' }}"
                            class="btn-link-buy btn-pc-link-buy">{{ $banner->button_title ?? '' }}</a>
                    </div>
                </div>
                <a href="{{ $banner->button_href ?? '#' }}"
                    class="btn-link-buy btn-mobile-link-buy">{{ $banner->button_title ?? '' }}</a>
            </div>
        </div>
    @endif
    {{-- BANNER --}}

    {{-- SALE ALONG --}}
    @if ($sale_along)
        @php
            $sale_along = json_decode($sale_along->value);
            $words = explode(' ', $sale_along->title);
            $firstWord = $words[0];
            $otherWords = implode(' ', array_slice($words, 1));
        @endphp
        <div class="box-shop-style box-mobile-style" style="{{ $banner ? 'margin-top: -40px' : 'margin-top: 100px' }}">
            <div class="title-shop-style">{{ $firstWord }} <span style="color: #f65024;">{{ $otherWords }}</span>
            </div>
            <div class="swiper productSwiper productStyleSwiper">
                <div class="swiper-wrapper">
                    @foreach ($sale_along->list as $item)
                        <a href="#" class="swiper-slide box-item-product">
                            <img src="{{ $item }}" class="img-product-style2">
                        </a>
                    @endforeach
                </div>
                <div class="swiper-pagination swiper-pagination-product"></div>
            </div>
        </div>
    @endif
    {{-- SALE ALONG --}}

    {{-- SHOP BY STYLE --}}
    @if ($shop_by_style)
        @php
            $shop_by_style = json_decode($shop_by_style->value);
        @endphp
        <div class="box-along-sale">
            <article class="ag-full-width home-common" id="home-cards">
                <div class="ag-site-width">
                    <picture>
                        <img src="{{ asset('assets/image/home-cards-d.png') }}" width="1920" height="1130"
                            class="bg-image" />
                        <img src="{{ asset('assets/image/home-cards-m.png') }}" class="img-cards-m">
                    </picture>
                    <h2 class="title">
                        <span>{{ $shop_by_style->title1 }}</span><br />{{ $shop_by_style->title2 }}
                        {{-- <br class="sm-only" /> --}}
                    </h2>
                    <div class="swiper AlongSaleSwiper">
                        <div class="swiper-wrapper">
                            @foreach ($shop_by_style->list as $item)
                                <div class="swiper-slide">
                                    <img src="{{ $item->image }}" />
                                    <h2>{{ $item->title }}</h2>
                                    <p class="text-wrap" style="width: 20rem;">
                                        {{ $item->description }}
                                    </p>
                                    <a href="https://www.chacos.com/US/en/sale/" class="btn">SHOP SALE</a>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination sm-only"></div>
                    </div>

                </div>
            </article>
        </div>
    @endif
    {{-- SHOP BY STYLE --}}

    {{-- FAVORITES --}}
    @if ($favorites)
        @php
            $favorites = json_decode($favorites->value);
            $words = explode(' ', $favorites->hashtag);
            $firstWord = $words[0];
            $otherWords = implode(' ', array_slice($words, 1));
        @endphp
        <div class="box-shop-style box-m-top" style="background-color: white;padding-bottom: 0">
            <div class="d-flex align-items-center">
                <div class="title-shop-style mx-2">#{{ $firstWord }} <span
                        style="color: #f65024;">{{ $otherWords }}</span></div>
                <img src="{{ asset('assets/image/vector-favorites.png') }}" class="icon-vector-favorites">
                {{-- <div class="d-flex box-more-style-shop">
                <a href="" class="link-cate-home">Shop Women's »</a>
                <a href="" class="link-cate-home">Shop Men's »</a>
                <a href="" class="link-cate-home">Shop Kids' »</a>
            </div> --}}
            </div>

            {{-- PRODUCT --}}
            <div class="swiper productSwiper">
                <div class="swiper-wrapper">
                    <a href="{{ route('detail-product') }}" class="swiper-slide box-item-product">
                        <img src="{{ asset('assets/image/z-sandals.png') }}" class="img-product-style">
                        <div class="title-product-bottom">
                            <div>
                                <p class="title-sp-favo">CUSTOMIZABLE Z</p>
                                <div class="reviews">
                                    <div class="stars">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw3178a4e0/content/seasonal-content/homepage/2024/03/27/product-star-half.svg"
                                            alt="Half filled star">
                                    </div>
                                    <p class="review-number">(304)</p>
                                </div>
                            </div>
                            <p class="price-favo">$130.00</p>
                        </div>
                    </a>
                    <a href="{{ route('detail-product') }}" class="swiper-slide box-item-product">
                        <img src="{{ asset('assets/image/z-sandals.png') }}" class="img-product-style">
                        <div class="title-product-bottom">
                            <div>
                                <p class="title-sp-favo">CUSTOMIZABLE Z</p>
                                <div class="reviews">
                                    <div class="stars">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw3178a4e0/content/seasonal-content/homepage/2024/03/27/product-star-half.svg"
                                            alt="Half filled star">
                                    </div>
                                    <p class="review-number">(304)</p>
                                </div>
                            </div>
                            <p class="price-favo">$130.00</p>
                        </div>
                    </a>
                    <a href="{{ route('detail-product') }}" class="swiper-slide box-item-product">
                        <img src="{{ asset('assets/image/z-sandals.png') }}" class="img-product-style">
                        <div class="title-product-bottom">
                            <div>
                                <p class="title-sp-favo">CUSTOMIZABLE Z</p>
                                <div class="reviews">
                                    <div class="stars">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw3178a4e0/content/seasonal-content/homepage/2024/03/27/product-star-half.svg"
                                            alt="Half filled star">
                                    </div>
                                    <p class="review-number">(304)</p>
                                </div>
                            </div>
                            <p class="price-favo">$130.00</p>
                        </div>
                    </a>
                    <a href="{{ route('detail-product') }}" class="swiper-slide box-item-product">
                        <img src="{{ asset('assets/image/z-sandals.png') }}" class="img-product-style">
                        <div class="title-product-bottom">
                            <div>
                                <p class="title-sp-favo">CUSTOMIZABLE Z</p>
                                <div class="reviews">
                                    <div class="stars">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw3178a4e0/content/seasonal-content/homepage/2024/03/27/product-star-half.svg"
                                            alt="Half filled star">
                                    </div>
                                    <p class="review-number">(304)</p>
                                </div>
                            </div>
                            <p class="price-favo">$130.00</p>
                        </div>
                    </a>
                    <a href="{{ route('detail-product') }}" class="swiper-slide box-item-product">
                        <img src="{{ asset('assets/image/z-sandals.png') }}" class="img-product-style">
                        <div class="title-product-bottom">
                            <div>
                                <p class="title-sp-favo">CUSTOMIZABLE Z</p>
                                <div class="reviews">
                                    <div class="stars">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw3178a4e0/content/seasonal-content/homepage/2024/03/27/product-star-half.svg"
                                            alt="Half filled star">
                                    </div>
                                    <p class="review-number">(304)</p>
                                </div>
                            </div>
                            <p class="price-favo">$130.00</p>
                        </div>
                    </a>
                    <a href="{{ route('detail-product') }}" class="swiper-slide box-item-product">
                        <img src="{{ asset('assets/image/z-sandals.png') }}" class="img-product-style">
                        <div class="title-product-bottom">
                            <div>
                                <p class="title-sp-favo">CUSTOMIZABLE Z</p>
                                <div class="reviews">
                                    <div class="stars">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw3178a4e0/content/seasonal-content/homepage/2024/03/27/product-star-half.svg"
                                            alt="Half filled star">
                                    </div>
                                    <p class="review-number">(304)</p>
                                </div>
                            </div>
                            <p class="price-favo">$130.00</p>
                        </div>
                    </a>
                    <a href="{{ route('detail-product') }}" class="swiper-slide box-item-product">
                        <img src="{{ asset('assets/image/z-sandals.png') }}" class="img-product-style">
                        <div class="title-product-bottom">
                            <div>
                                <p class="title-sp-favo">CUSTOMIZABLE Z</p>
                                <div class="reviews">
                                    <div class="stars">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg"
                                            alt="Full star">
                                        <img class="product-star"
                                            src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw3178a4e0/content/seasonal-content/homepage/2024/03/27/product-star-half.svg"
                                            alt="Half filled star">
                                    </div>
                                    <p class="review-number">(304)</p>
                                </div>
                            </div>
                            <p class="price-favo">$130.00</p>
                        </div>
                    </a>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination swiper-pagination-product"></div>
            </div>
            {{-- PRODUCT --}}

            <div class="box-more-style-shop-mobile">
                <a href="#" class="btn-link-shop">SHOP WOMEN'S</a>
                <a href="#" class="btn-link-shop">SHOP MEN'S</a>
            </div>
        </div>

        <img src="{{ $favorites->banner }}" class="img-banner-hero-home">
        <img src="{{ $favorites->banner_mobile }}" class="img-banner-mobile-hero-home">

        <div class="box-favorites">
            <div class="box-left-favo-img">
                <picture>
                    <img src="{{ $favorites->left_image }}" class="w-100">
                </picture>
            </div>
            <div class="box-right-favo">
                <img src="{{ $favorites->right_image }}" class="img-pick">
                <img src="{{ $favorites->right_image_mobile }}" class="img-pick-mobile">

                {{-- FAV PRODUCT --}}
                <div class="swiper favoritesSwiper">
                    <div class="swiper-wrapper">
                        <a href="{{ route('detail-product') }}" class="swiper-slide">
                            <img src="{{ asset('assets/image/sp1.png') }}" alt="" class="w-100">
                            <div class="name-product-favo">WOMEN'S ZX/2® CLASSIC SANDAL</div>
                            <div class="price-product-favo">$105.00</div>
                        </a>
                        <a href="{{ route('detail-product') }}" class="swiper-slide">
                            <img src="{{ asset('assets/image/sp1.png') }}" alt="" class="w-100">
                            <div class="name-product-favo">WOMEN'S ZX/2® CLASSIC SANDAL
                                WOMEN'S ZX/2® CLASSIC SANDAL
                            </div>
                            <div class="price-product-favo">$105.00</div>
                        </a>
                        <a href="{{ route('detail-product') }}" class="swiper-slide">
                            <img src="{{ asset('assets/image/sp1.png') }}" alt="" class="w-100">
                            <div class="name-product-favo">WOMEN'S ZX/2® CLASSIC SANDAL
                                WOMEN'S ZX/2® CLASSIC SANDAL
                            </div>
                            <div class="price-product-favo">$105.00</div>
                        </a>
                        <a href="{{ route('detail-product') }}" class="swiper-slide">
                            <img src="{{ asset('assets/image/sp1.png') }}" alt="" class="w-100">
                            <div class="name-product-favo">WOMEN'S ZX/2® CLASSIC SANDAL
                                WOMEN'S ZX/2® CLASSIC SANDAL
                            </div>
                            <div class="price-product-favo">$105.00</div>
                        </a>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
                {{-- FAV PRODUCT --}}
            </div>

        </div>
    @endif
    {{-- FAVORITES --}}

    <div class="box-fun-adventurous">
        <img src="{{ asset('assets/image/line-top.png') }}" class="line-video-top">
        <figure class="w-100 m-0">
            <video data-src-sm="{{ asset('assets/video/customizing-d.mp4') }}" autoplay="" playsinline=""
                muted="" loop="" src="{{ asset('assets/video/customizing-d.mp4') }}"
                class="w-100 video-desktop"></video>

            <video data-responsive="" data-src-sm="{{ asset('assets/video/customizing-m.mp4') }}" autoplay=""
                playsinline="" muted="" loop="" class="customizing-video w-100 video-mobile"
                src="{{ asset('assets/video/customizing-m.mp4') }}"></video>
        </figure>
        <img src="{{ asset('assets/image/line-bottom.png') }}" class="line-video-bottom">
        <div class="box-content-fun">
            <div class="title-content-fun">FUN ADVENTUROUS, <span style="color: #E48665;">UNIQUELY YOU.</span></div>
            <div class="d-flex flex-column">
                <a href="#" class="btn-link-fun">START CUSTOMIZING</a>
                <a href="#" class="btn-link-fun">GET INSPIRED</a>
            </div>
        </div>
    </div>

    {{-- BOX AROUND --}}
    @if ($box_around)
        @php
            $box_around = json_decode($box_around->value);
            $words = explode(' ', $box_around->title);
            $firstWord = $words[0];
            $otherWords = implode(' ', array_slice($words, 1));
        @endphp
        <div class="box-around">
            <div class="box-header-around">
                <p class="title-big-around">{{ $firstWord }} <span style="color: #E45C37;">{{ $otherWords }}</span>
                </p>
                <p class="title-small-around">{{ $box_around->content }}</p>
            </div>

            {{-- Row 1 --}}
            @if (isset($box_around->row1) && $box_around->row1)
                <div class="swiper photo-library1 mb-2">
                    <div class="swiper-wrapper">
                        @foreach ($box_around->row1 as $item)
                            <div class="swiper-slide"><img
                                    src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                                    class="w-100"></div>
                        @endforeach
                    </div>
                </div>
            @endif
            {{-- Row 2 --}}
            @if (isset($box_around->row2) && $box_around->row2)
                <div class="swiper photo-library2 mb-2">
                    <div class="swiper-wrapper">
                        @foreach ($box_around->row2 as $item)
                            <div class="swiper-slide"><img
                                    src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                                    class="w-100"></div>
                        @endforeach
                    </div>
                </div>
            @endif
            {{-- Row 3 --}}
            @if (isset($box_around->row3) && $box_around->row3)
                <div class="swiper photo-library3 mb-2">
                    <div class="swiper-wrapper">
                        @foreach ($box_around->row3 as $item)
                            <div class="swiper-slide"><img
                                    src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                                    class="w-100"></div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    @endif
    {{-- BOX AROUND --}}

    <div class="box-describe" style="{{ !$box_around ? 'margin-top: 6rem' : '' }}">
        <p class="title-describe-footer">Chaco Outdoor Sandals & Flips</p>
        <p class="content-describe-footer">Get ready for water, trail, and everything in between with Chaco sandals and
            flips. Our hiking sandals provide function and support for all your outdoor adventures. Plus, our sport
            sandals
            come in a variety of styles, colors, and fits, so you can find the perfect footwear for any occasion. Power
            your next adventure with sandals, flip flops, and shoes built to perform in style.</p>
    </div>
@stop
@section('script_page')
    <script src="{{ asset('assets/js/home.js') }}"></script>
@stop
