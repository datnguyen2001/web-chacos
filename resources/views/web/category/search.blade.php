@extends('web.index')
@section('title', 'Tìm kiếm')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/css/category.css') }}">
@stop
{{-- content of page --}}
@section('content')

    <div class="box-content-search">
        <h1 class="search-results-header-no-hits">Kết quả tìm kiếm cho: {{ request()->get('key_search') }}</h1>
        <div id="primary" class="primary-content no-hits horizontally">
            <div class="no-hits-help left">
                <div id="noresults-help">
                    <div class="help-search">
                        <p>Rất tiếc, không tìm thấy sản phẩm nào cho tìm kiếm của bạn:
                            <strong>{{ request()->get('key_search') }}</strong>
                        </p>
                        <p>Hãy thử tìm kiếm lại bằng cách sử dụng các mẹo sau:</p>
                        <ul>
                            <li>Kiểm tra lại chính tả. Hãy thử thay đổi cách viết.
                            </li>
                            <li>Giới hạn tìm kiếm trong một hoặc
                                hai từ.
                            </li>
                            <li>Hãy ít cụ thể hơn trong cách diễn đạt của bạn. Đôi khi một thuật ngữ
                                tổng quát hơn sẽ dẫn bạn đến những sản phẩm tương tự.
                            </li>
                        </ul>
                        <form role="search" action="{{ route('search') }}" method="get" class="simple-search-form"
                            novalidate="novalidate">
                            <input type="text" class="simplesearch simple-search-input" name="key_search" value=""
                                placeholder="Search for products" autocomplete="off">
                            <button type="submit" class="submit-btn-search">
                                <svg class="search-icon" fill="#004c59" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 30 30" width="30px" height="30px">
                                    <path
                                        d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z">
                                    </path>
                                </svg>
                            </button>
                        </form>
                    </div>
                    <div class="help-cs-box">
                        <h1>Cần giúp đỡ?</h1>
                        <a href="tel:"><strong>Điện thoại:</strong><br>(888) 211-1908</a>
                        <a><strong>Trò chuyện trực tiếp:</strong><br>Trò chuyện trực tiếp ngay bây giờ</a>
                    </div>
                </div>
            </div>

            <div class="noresults">
                <div class="sbc-wrapper">
                    <h1>Hãy đưa bạn đi đúng hướng.</h1>
                    <div class="sbc-categories">
                        <a href="">
                            <img
                                src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dwb891d69c/content/core-content/noresults-help/Category - Womens.jpg">
                        </a>
                        <a href="">
                            <img
                                src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw5cef1e4d/content/core-content/noresults-help/Category - Mens.jpg">
                        </a>
                        <a href="">
                            <img
                                src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw5d85cfc8/content/core-content/noresults-help/Category - Sandals.jpg">
                        </a>
                        <a href="">
                            <img
                                src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dwf13ea7a7/content/core-content/noresults-help/Category - Slides.jpg">
                        </a>
                        <a href="">
                            <img
                                src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dwdacc2235/content/core-content/noresults-help/Category - Best Sellers.jpg">
                        </a>
                        <a href="">
                            <img
                                src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw24006c94/content/core-content/noresults-help/Category - Sale.jpg">
                        </a>
                    </div>
                </div>
            </div>

        </div>
        @if (isset($product) && count($product) > 0)
            <div class="recommended-products">
                <h1>Sản phẩm tương tự</h1>
                <div class="swiper recommendedSwiper">
                    <div class="swiper-wrapper">
                        @foreach ($product as $item)
                            <a href="{{ route('detail-product', $item->slug) }}" class="swiper-slide">
                                <img src="{{ asset($item->image) }}" alt="" class="w-100">
                                <div class="name-product-favo-recomend">{{ $item->name }}</div>
                                <div class="d-flex align-items-center">
                                    @if ($item->color->promotional_price != 0 || $item->color->promotional_price != null)
                                        <div class="price-product-favo--recomend">
                                            {{ number_format($item->color->promotional_price) }} đ</div>
                                        <div class="price-product-sale--recomend">{{ number_format($item->color->price) }} đ
                                        </div>
                                    @else
                                        <div class="price-product-favo--recomend">{{ number_format($item->color->price) }} đ
                                        </div>
                                    @endif
                                </div>

                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>

@stop

@section('script_page')
    <script>
        var swiper = new Swiper(".recommendedSwiper", {
            spaceBetween: 30,
            autoplay: {
                delay: 5000,
            },
            breakpoints: {
                992: {
                    slidesPerView: 4,

                },
                767: {
                    slidesPerView: 3,
                },
                300: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
            },
        });
    </script>

@stop
