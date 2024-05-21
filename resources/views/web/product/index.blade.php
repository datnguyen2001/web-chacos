@extends('web.index')
@section('title', 'Chi tiết sản phẩm')

@section('style_page')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/css/lightgallery.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/detail-product.css') }}">
@stop
{{-- content of page --}}
@section('content')
    <div class="line-header-page-item">
        <a href="/" class="title-header-menu-page">Trang chủ</a>
        <span style="margin: 0 5px;">/</span>
        <a href="" class="title-header-menu-page">Men</a>
        <span style="margin: 0 5px;">/</span>
        <a class="title-header-menu-page">{{ $product->name }}</a>
    </div>
    <div class="box-detail-product mb-5">
        <div class="box-detail-product-left">
            <div class="box-img-product">
                <div class="swiper swiperImageSmall">
                    <div class="swiper-wrapper">
                        @foreach ($product_image as $img)
                            <div class="swiper-slide">
                                <img src="{{ asset($img->image) }}" class="w-100" />
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper swiperImageBig">
                    <div class="swiper-wrapper" id="lightgallery">
                        @foreach ($product_image as $img)
                            <div class="swiper-slide position-relative" data-src="{{ asset($img->image) }}">
                                {{--                            <p class="title-attention"><span style="font-weight: bold;">Hurry! </span>313 other #ChacoNation --}}
                                {{--                                members are viewing this.</p> --}}
                                {{--                            <p class="title-sale-product">NEW</p> --}}
                                <img src="{{ asset($img->image) }}" data-src="{{ asset($img->image) }}"
                                    data-lg-size="1600-1067" class="w-100" />
                                <div class="btn-search-zoom-img"><img src="{{ asset('assets/image/search-sm.png') }}"
                                        style="width: 16px;margin-right: 5px;"> CLICK TO ENLARGE</div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>

            <div class="accordion" id="accordionExampleProduct" style="margin-right: 10px;">
                <div class="accordion-item accordion-item-infor">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed btn-infor-product" type="button"
                            data-bs-toggle="collapse" data-bs-target="#productDescription" aria-expanded="flase"
                            aria-controls="productDescription">
                            Product Description

                        </button>
                    </h2>
                    {{--                    <div class="box-product-description"> --}}
                    {{--                        <div class="item-product-description"> --}}
                    {{--                            <img src="{{asset('assets/image/adjustable.svg')}}"> --}}
                    {{--                            <p class="title-description-sp">ADJUSTABLE STRAPS</p> --}}
                    {{--                            <p class="content-description-sp">Fully adjustable for a customized feel</p> --}}
                    {{--                        </div> --}}
                    {{--                        <div class="item-product-description"> --}}
                    {{--                            <img src="{{asset('assets/image/comfort.svg')}}"> --}}
                    {{--                            <p class="title-description-sp">ALL-DAY COMFORT</p> --}}
                    {{--                            <p class="content-description-sp">Podiatrist accepted footbed promotes arch support and healthy --}}
                    {{--                                alignment</p> --}}
                    {{--                        </div> --}}
                    {{--                        <div class="item-product-description"> --}}
                    {{--                            <img src="{{asset('assets/image/noslipallgrip.svg')}}"> --}}
                    {{--                            <p class="title-description-sp">NO SLIP, ALL GRIP</p> --}}
                    {{--                            <p class="content-description-sp">3.0 MM lug performance outsole for no slip traction.</p> --}}
                    {{--                        </div> --}}
                    {{--                    </div> --}}
                    <div id="productDescription" class="accordion-collapse collapse"
                        data-bs-parent="#accordionExampleProduct">
                        <div class="accordion-body mb-3 mt-3 body-product-description">
                            <div class="description-content">
                                {!! $product->description !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item accordion-item-infor">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed btn-infor-product" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapsetechnology" aria-expanded="false"
                            aria-controls="collapsetechnology">
                            Technology
                        </button>
                    </h2>
                    <div id="collapsetechnology" class="accordion-collapse collapse"
                        data-bs-parent="#accordionExampleProduct">
                        <div class="accordion-body mb-3">
                            <div class="swiper swiperTechnilogy">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ asset('assets/image/adjustment.jpg') }}" class="w-100">
                                        <p class="title-slide-technilogy">GET THE PERFECT FIT </p>
                                        <p class="content-slide-technilogy">Upgraded rubber compound, Upgraded rubber
                                            compound,
                                            Upgraded rubber compound</p>
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('assets/image/adjustment.jpg') }}" class="w-100">
                                        <p class="title-slide-technilogy">GET THE PERFECT FIT </p>
                                        <p class="content-slide-technilogy">Upgraded rubber compound, Upgraded rubber
                                            compound,
                                            Upgraded rubber compound</p>
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('assets/image/adjustment.jpg') }}" class="w-100">
                                        <p class="title-slide-technilogy">GET THE PERFECT FIT </p>
                                        <p class="content-slide-technilogy">Upgraded rubber compound, Upgraded rubber
                                            compound,
                                            Upgraded rubber compound</p>
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('assets/image/adjustment.jpg') }}" class="w-100">
                                        <p class="title-slide-technilogy">GET THE PERFECT FIT </p>
                                        <p class="content-slide-technilogy">Upgraded rubber compound, Upgraded rubber
                                            compound,
                                            Upgraded rubber compound</p>
                                    </div>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item accordion-item-infor">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed btn-infor-product" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapselike" aria-expanded="false"
                            aria-controls="collapselike">
                            #ChacoNation also likes
                        </button>
                    </h2>
                    <div id="collapselike" class="accordion-collapse collapse" data-bs-parent="#accordionExampleProduct">
                        <div class="accordion-body mb-3">
                            <div class="swiper swiperLike">
                                <div class="swiper-wrapper">
                                    @foreach ($product_more as $more)
                                        <div class="swiper-slide">
                                            <img src="{{ asset($more->image) }}" class="w-100">
                                            <p class="title-slide-like">{{ $more->name }}</p>
                                            <div class="d-flex mt-1">
                                                @if ($more->color->promotional_price != 0 || $more->color->promotional_price != null)
                                                    <span
                                                        class="product-sale-price">{{ number_format($more->color->promotional_price) }}
                                                        đ</span>
                                                    <span
                                                        class="product-standard-price">{{ number_format($more->color->price) }}
                                                        đ</span>
                                                @else
                                                    <span
                                                        class="product-sale-price">{{ number_format($more->color->price) }}
                                                        đ</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item accordion-item-infor">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed btn-infor-product" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapsereview" aria-expanded="false"
                            aria-controls="collapsereview">
                            Customer Reviews <div class="d-flex star-content-more">
                                <div class="product-rate">
                                    <div class="star-rating" style="--rating:{{ @$product->star ?? 0 }}"></div>
                                </div>
                                <div class="ts-star" style="margin-left: 5px;"> {{ @$product->star }}
                                    ({{ count($star) ?? 0 }})</div>
                            </div>
                        </button>
                    </h2>
                    <div id="collapsereview" class="accordion-collapse collapse"
                        data-bs-parent="#accordionExampleProduct">
                        <div class="accordion-body mb-3">
                            <p class="title-review">REVIEWS</p>
                            <div class="box-parameter-review">
                                <div class="item-parameter-review">
                                    <p class="title-item-parameter">Rating Snapshot</p>
                                    {{--                                    <p class="content-item-parameter">Select a row below to filter reviews.</p> --}}
                                    <div class="d-flex align-items-center" style="padding: 0 10px;">
                                        <span style="color: #303030;font-size: 14px;font-weight: 600;">5 start</span>
                                        <div class="line-percent">
                                            <div class="percent-content" style="width: {{ $percent_5 }}%;"></div>
                                        </div>
                                        <span
                                            style="color: #303030;font-size: 14px;font-weight: 600;">{{ $star_five ?? 0 }}</span>
                                    </div>
                                    <div class="d-flex align-items-center" style="padding: 0 10px;">
                                        <span style="color: #303030;font-size: 14px;font-weight: 600;">4 start</span>
                                        <div class="line-percent">
                                            <div class="percent-content" style="width: {{ $percent_4 }}%;"></div>
                                        </div>
                                        <span
                                            style="color: #303030;font-size: 14px;font-weight: 600;">{{ $star_four ?? 0 }}</span>
                                    </div>
                                    <div class="d-flex align-items-center" style="padding: 0 10px;">
                                        <span style="color: #303030;font-size: 14px;font-weight: 600;">3 start</span>
                                        <div class="line-percent">
                                            <div class="percent-content" style="width: {{ $percent_3 }}%;"></div>
                                        </div>
                                        <span
                                            style="color: #303030;font-size: 14px;font-weight: 600;">{{ $star_three ?? 0 }}</span>
                                    </div>
                                    <div class="d-flex align-items-center" style="padding: 0 10px;">
                                        <span style="color: #303030;font-size: 14px;font-weight: 600;">2 start</span>
                                        <div class="line-percent">
                                            <div class="percent-content" style="width: {{ $percent_2 }}%;"></div>
                                        </div>
                                        <span
                                            style="color: #303030;font-size: 14px;font-weight: 600;">{{ $star_two ?? 0 }}</span>
                                    </div>
                                    <div class="d-flex align-items-center" style="padding: 0 10px;">
                                        <span style="color: #303030;font-size: 14px;font-weight: 600;">1 start</span>
                                        <div class="line-percent">
                                            <div class="percent-content" style="width: {{ $percent_1 }}%;"></div>
                                        </div>
                                        <span
                                            style="color: #303030;font-size: 14px;font-weight: 600;">{{ $star_one ?? 0 }}</span>
                                    </div>
                                </div>
                                <div class="item-parameter-review">
                                    <p class="title-item-parameter">Overall Rating</p>
                                    <div class="d-flex align-items-center">
                                        <p class="number-big-review">{{ @$product->star }}</p>
                                        <div class="d-flex flex-column" style="font-size: 13px;">
                                            <div class="product-rate">
                                                <div class="star-rating" style="--rating:4"></div>
                                            </div>
                                            <div class="ts-star"> {{ count($star) ?? 0 }} Reviews</div>
                                        </div>
                                    </div>
                                    {{--                                    <p class="content-item-parameter">240 out of 270 (89%) reviewers recommend this product</p> --}}
                                </div>
                                <div class="item-parameter-review">
                                    <p class="title-item-parameter">Review this Product</p>
                                    <a class="btn-write-review" data-bs-toggle="modal"
                                        data-bs-target="#staticReview">Write a product review</a>
                                    {{--                                    <div class="box-star-product"> --}}
                                    {{--                                        <div class="item-star-sp"><svg aria-hidden="true" width="15px" height="15px" fill="none" --}}
                                    {{--                                                                       viewBox="0 0 34 34" version="1.1" xmlns="http://www.w3.org/2000/svg"> --}}
                                    {{--                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> --}}
                                    {{--                                                    <g transform="translate(-588.000000, -409.000000)" fill="#FFFFFF" --}}
                                    {{--                                                       fill-rule="nonzero" stroke="#004C59" stroke-width="1.5"> --}}
                                    {{--                                                        <g transform="translate(337.000000, 399.000000)"> --}}
                                    {{--                                                            <g transform="translate(241.000000, 0.000000)"> --}}
                                    {{--                                                                <g transform="translate(10.192308, 10.192308)"> --}}
                                    {{--                                                                    <path --}}
                                    {{--                                                                        d="M16.3076923,1.76513255 L20.8381599,11.4172719 L31.0592597,12.978917 L23.6603835,20.5621906 L25.3975353,31.2117909 L16.3076923,26.1870493 L7.21784935,31.2117909 L8.95500108,20.5621906 L1.55612493,12.978917 L11.7772247,11.4172719 L16.3076923,1.76513255 Z"> --}}
                                    {{--                                                                    </path> --}}
                                    {{--                                                                </g> --}}
                                    {{--                                                            </g> --}}
                                    {{--                                                        </g> --}}
                                    {{--                                                    </g> --}}
                                    {{--                                                </g> --}}
                                    {{--                                            </svg></div> --}}
                                    {{--                                        <div class="item-star-sp"><svg aria-hidden="true" width="15px" height="15px" fill="none" --}}
                                    {{--                                                                       viewBox="0 0 34 34" version="1.1" xmlns="http://www.w3.org/2000/svg"> --}}
                                    {{--                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> --}}
                                    {{--                                                    <g transform="translate(-588.000000, -409.000000)" fill="#FFFFFF" --}}
                                    {{--                                                       fill-rule="nonzero" stroke="#004C59" stroke-width="1.5"> --}}
                                    {{--                                                        <g transform="translate(337.000000, 399.000000)"> --}}
                                    {{--                                                            <g transform="translate(241.000000, 0.000000)"> --}}
                                    {{--                                                                <g transform="translate(10.192308, 10.192308)"> --}}
                                    {{--                                                                    <path --}}
                                    {{--                                                                        d="M16.3076923,1.76513255 L20.8381599,11.4172719 L31.0592597,12.978917 L23.6603835,20.5621906 L25.3975353,31.2117909 L16.3076923,26.1870493 L7.21784935,31.2117909 L8.95500108,20.5621906 L1.55612493,12.978917 L11.7772247,11.4172719 L16.3076923,1.76513255 Z"> --}}
                                    {{--                                                                    </path> --}}
                                    {{--                                                                </g> --}}
                                    {{--                                                            </g> --}}
                                    {{--                                                        </g> --}}
                                    {{--                                                    </g> --}}
                                    {{--                                                </g> --}}
                                    {{--                                            </svg></div> --}}
                                    {{--                                        <div class="item-star-sp"><svg aria-hidden="true" width="15px" height="15px" fill="none" --}}
                                    {{--                                                                       viewBox="0 0 34 34" version="1.1" xmlns="http://www.w3.org/2000/svg"> --}}
                                    {{--                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> --}}
                                    {{--                                                    <g transform="translate(-588.000000, -409.000000)" fill="#FFFFFF" --}}
                                    {{--                                                       fill-rule="nonzero" stroke="#004C59" stroke-width="1.5"> --}}
                                    {{--                                                        <g transform="translate(337.000000, 399.000000)"> --}}
                                    {{--                                                            <g transform="translate(241.000000, 0.000000)"> --}}
                                    {{--                                                                <g transform="translate(10.192308, 10.192308)"> --}}
                                    {{--                                                                    <path --}}
                                    {{--                                                                        d="M16.3076923,1.76513255 L20.8381599,11.4172719 L31.0592597,12.978917 L23.6603835,20.5621906 L25.3975353,31.2117909 L16.3076923,26.1870493 L7.21784935,31.2117909 L8.95500108,20.5621906 L1.55612493,12.978917 L11.7772247,11.4172719 L16.3076923,1.76513255 Z"> --}}
                                    {{--                                                                    </path> --}}
                                    {{--                                                                </g> --}}
                                    {{--                                                            </g> --}}
                                    {{--                                                        </g> --}}
                                    {{--                                                    </g> --}}
                                    {{--                                                </g> --}}
                                    {{--                                            </svg></div> --}}
                                    {{--                                        <div class="item-star-sp"><svg aria-hidden="true" width="15px" height="15px" fill="none" --}}
                                    {{--                                                                       viewBox="0 0 34 34" version="1.1" xmlns="http://www.w3.org/2000/svg"> --}}
                                    {{--                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> --}}
                                    {{--                                                    <g transform="translate(-588.000000, -409.000000)" fill="#FFFFFF" --}}
                                    {{--                                                       fill-rule="nonzero" stroke="#004C59" stroke-width="1.5"> --}}
                                    {{--                                                        <g transform="translate(337.000000, 399.000000)"> --}}
                                    {{--                                                            <g transform="translate(241.000000, 0.000000)"> --}}
                                    {{--                                                                <g transform="translate(10.192308, 10.192308)"> --}}
                                    {{--                                                                    <path --}}
                                    {{--                                                                        d="M16.3076923,1.76513255 L20.8381599,11.4172719 L31.0592597,12.978917 L23.6603835,20.5621906 L25.3975353,31.2117909 L16.3076923,26.1870493 L7.21784935,31.2117909 L8.95500108,20.5621906 L1.55612493,12.978917 L11.7772247,11.4172719 L16.3076923,1.76513255 Z"> --}}
                                    {{--                                                                    </path> --}}
                                    {{--                                                                </g> --}}
                                    {{--                                                            </g> --}}
                                    {{--                                                        </g> --}}
                                    {{--                                                    </g> --}}
                                    {{--                                                </g> --}}
                                    {{--                                            </svg></div> --}}
                                    {{--                                        <div class="item-star-sp"><svg aria-hidden="true" width="15px" height="15px" fill="none" --}}
                                    {{--                                                                       viewBox="0 0 34 34" version="1.1" xmlns="http://www.w3.org/2000/svg"> --}}
                                    {{--                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> --}}
                                    {{--                                                    <g transform="translate(-588.000000, -409.000000)" fill="#FFFFFF" --}}
                                    {{--                                                       fill-rule="nonzero" stroke="#004C59" stroke-width="1.5"> --}}
                                    {{--                                                        <g transform="translate(337.000000, 399.000000)"> --}}
                                    {{--                                                            <g transform="translate(241.000000, 0.000000)"> --}}
                                    {{--                                                                <g transform="translate(10.192308, 10.192308)"> --}}
                                    {{--                                                                    <path --}}
                                    {{--                                                                        d="M16.3076923,1.76513255 L20.8381599,11.4172719 L31.0592597,12.978917 L23.6603835,20.5621906 L25.3975353,31.2117909 L16.3076923,26.1870493 L7.21784935,31.2117909 L8.95500108,20.5621906 L1.55612493,12.978917 L11.7772247,11.4172719 L16.3076923,1.76513255 Z"> --}}
                                    {{--                                                                    </path> --}}
                                    {{--                                                                </g> --}}
                                    {{--                                                            </g> --}}
                                    {{--                                                        </g> --}}
                                    {{--                                                    </g> --}}
                                    {{--                                                </g> --}}
                                    {{--                                            </svg></div> --}}
                                    {{--                                    </div> --}}
                                </div>
                            </div>
                            <div class="content-review">

                            </div>
                            <div class="d-flex justify-content-center align-items-center line-see-more">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="box-detail-prduct-right">
            <p class="name-product-detail">{{ $product->name }}</p>
            <div class="d-flex justify-content-between align-items-center flex-wrap-reverse">
                <div class="d-flex align-items-center">
                    @if ($product_color[0]->promotional_price != 0 || $product_color[0]->promotional_price != null)
                        <p class="name-price text-promotional_price" style="color: red;margin-right: 10px">
                            {{ number_format($product_color[0]->promotional_price) }} đ</p>
                        <p class="name-price text-price" style="text-decoration: line-through;">
                            {{ number_format($product_color[0]->price) }} đ</p>
                    @else
                        <p class="name-price text-price" style="margin-right: 10px">
                            {{ number_format($product_color[0]->price) }} đ</p>
                        <p class="name-price text-promotional_price"></p>
                    @endif
                </div>
                <div class="d-flex mb-1 ">
                    <div class="product-rate">
                        <div class="star-rating" style="--rating:{{ @$product->star }}"></div>
                    </div>
                    <div class="ts-star" style="margin-left: 5px;"> {{ @$product->star }} ({{ count($star) ?? 0 }})
                    </div>
                </div>
            </div>
            @if ($product->type != 0)
                <div class="d-flex align-items-center mt-4">
                    <p class="title-bold">Type:</p>
                    <p class="title-light">{{ $product->type == 1 ? 'Medium' : 'Wide' }}</p>
                </div>
                <div class="d-flex justify-content-between w-100">
                    @if ($product->type == 1)
                        <div class="item-select-type item-select-type-active">Medium</div>
                    @else
                        <div class="item-select-type item-select-type-active">Wide</div>
                    @endif
                </div>
            @endif
            <div class="d-flex mt-4">
                <p style="color: #303030;font-weight: bold;margin-bottom: 0;font-size: 14px;">Select a Color : </p>
                <p class="text-color" style="margin-bottom: 0;margin-left: 5px;font-size: 14px;">
                    {{ $product_color[0]->name }}</p>
            </div>
            {{--            <p class="price-item-color">$105.00 - $110.00</p> --}}
            <div class="box-color-product mt-1">
                @foreach ($product_color as $key => $pro_color)
                    <div class="item-color-product @if ($key == 0) item-color-active @endif"
                        data-value="{{ $pro_color->id }}" data-name="{{ $pro_color->name }}"
                        onclick="toggleColorActive(this)">
                        <img src="{{ asset($pro_color->image) }}" class="w-100" style="height: 97%;object-fit: cover">
                    </div>
                @endforeach
            </div>
            <div class="d-flex mt-2">
                <p style="color: #303030;font-weight: bold;margin-bottom: 0;font-size: 14px;">Select a Width & Size :</p>
                <p class="text-size" style="margin-bottom: 0;margin-left: 5px;font-size: 14px;">
                    {{ $product_size[0]->name }} M</p>
            </div>
            <div class="box-w-S">M</div>
            <div class="box-size-product mt-3">
                @foreach ($product_size as $index => $pro_size)
                    <div class="item-size-product @if ($index == 0) item-size-active @endif"
                        data-value="{{ $pro_size->id }}" data-name="{{ $pro_size->name }}"
                        onclick="toggleSizeActive(this)">{{ $pro_size->name }}</div>
                @endforeach
            </div>
            <div class="d-flex justify-content-between w-100 mt-5 mb-5">
                <input type="hidden" id="product_id" name="product_id" class="product_id"
                    value="{{ $product->id }}">
                <input type="hidden" id="color_id" name="color_id" class="color_id"
                    value="{{ $product_color[0]->id }}">
                <input type="hidden" id="size_id" name="size_id" class="size_id"
                    value="{{ $product_size[0]->id }}">
                <button type="button" class="btn-add-to-card">ADD TO CART</button>
                <div class="btn-heart-now">
                    <img src="{{ asset($product_wish ? 'assets/image/heart.svg' : 'assets/image/heart.svg') }}"
                        style="width: 45%;" data-value="{{ $product->id }}" onclick="toggleHeart(this)">
                </div>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item accordion-item-infor">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed btn-infor-more" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="flase"
                            aria-controls="collapseOne">
                            <img src="https://www.chacos.com/on/demandware.static/Sites-chacos_us-Site/-/default/images/svg/icon-truck.svg"
                                style="margin-right: 10px;">
                            Shipping
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body mb-3">
                            <p style="color: #004c59;margin-bottom: 0;">FREE EXPRESS SHIPPING</p>
                            <p style="font-size: 14px;margin-bottom: 0;">Order today to receive</p>
                            <a href="{{ route('shipping-info') }}"
                                style="color: #004c59;font-size: 14px;font-weight: bold;">See more details.</a>
                        </div>
                    </div>
                </div>
                <div class="accordion-item accordion-item-infor" style="border-bottom: 1px solid #dcdcdc;">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed btn-infor-more" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                            aria-controls="collapseTwo">
                            <img src="https://www.chacos.com/on/demandware.static/Sites-chacos_us-Site/-/default/images/svg/icon-return.svg"
                                style="margin-right: 10px;">
                            Returns
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body mb-3">
                            <p style="font-size: 14px;margin-bottom: 0;">We are happy to offer free returns and exchanges.
                            </p>
                            <a href="{{ route('easy-free-returns') }}"
                                style="color: #004c59;font-size: 14px;font-weight: bold;">See more details.</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-customize">
                <img src="{{ asset('assets/image/color.png') }}" style="width: 20px;"><span
                    style="font-size: 18px;color: #303030;font-weight: 600; margin-left: 6px;">CUSTOMIZE</span>
            </div>
        </div>
    </div>

    <!-- Modal review -->
    <div class="modal fade" id="staticReview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex ">
                        <img src="{{ asset($product->image) }}" style="width: 52px;height: 52px;object-fit: cover">
                        <p class="mx-2">{{ $product->name }}</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('save-review') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body" style="height: 450px;overflow: auto">
                        <input type="text" value="{{ $product->id }}" name="product_id" hidden>
                        <div class="mb-3">
                            <p class="title-review-modal">Full name</p>
                            <input type="text" required class="input-review" name="name" value="">
                        </div>
                        <div class="mb-3">
                            <p class="title-review-modal">Content</p>
                            <textarea class="input-review" required name="content" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <p class="title-review-modal">Attach photo</p>
                            <span style="font-size: 12px;color: #cdcdcd;margin-bottom: 10px;display: block">Reviews with
                                photos unrelated to the product may be deleted without notice.</span>
                            <input type="file" name="file[]" id="fileInput" multiple>
                            <div id="imageContainer"></div>
                        </div>
                        <div class="mb-3">
                            <p class="title-review-modal">Satisfaction</p>
                            <select name="star" class="form-select select-review">
                                <option value="5">5 sao</option>
                                <option value="4">4 sao</option>
                                <option value="3">3 sao</option>
                                <option value="2">2 sao</option>
                                <option value="1">1 sao</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-review">Write a review</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop

@section('script_page')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/dist/js/lightgallery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lg-thumbnail/1.1.0/lg-thumbnail.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lg-fullscreen/1.1.0/lg-fullscreen.min.js"></script>
    <script src="{{ asset('assets/js/detail-product.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function toggleColorActive(item) {
            document.querySelectorAll('.item-color-product').forEach(function(el) {
                el.classList.remove('item-color-active');
            });
            item.classList.toggle('item-color-active');
            $('input[name="color_id"]').val(item.getAttribute('data-value'));
            $('.text-color').html(item.getAttribute('data-name'));
            $.ajax({
                url: window.location.origin + '/select-color',
                data: {
                    'color_id': item.getAttribute('data-value')
                },
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    if (data.status) {
                        $(".box-size-product").html(data.prop);
                        let attr = $('.item-size-active').attr('data-name');
                        let attr_id = $('.item-size-active').attr('data-value');
                        $('input[name="size_id"]').val(attr_id);
                        $('.text-size').html(attr + ' M')
                        $('.text-promotional_price').html(data.price != 0?data.price+ ' đ':'');
                        $('.text-price').html(data.cost != 0?data.cost + ' đ':'');
                    }
                }
            })
        }

        function toggleSizeActive(item) {
            document.querySelectorAll('.item-size-product').forEach(function(el) {
                el.classList.remove('item-size-active');
            });
            item.classList.toggle('item-size-active');
            $('input[name="size_id"]').val(item.getAttribute('data-value'));
            $('.text-size').html(item.getAttribute('data-name') + ' M')
        }
    </script>

    <script>
        $(document).ready(function() {
            $('.btn-add-to-card').click(function() {
                var productInfo = $('#size_id').val()
                var quantity = 1

                if (productInfo == 0) {
                    toastr.error('Something went wrong!! Try again.')
                    return
                }

                // ADD TO CART
                $.ajax({
                    url: '{{ route('add.to.cart') }}',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        product_info: productInfo,
                        quantity: quantity
                    },
                    success: function(response) {
                        if (response.error == 0) {
                            toastr.success(response.message)

                            //SHOW CART CANVAS
                            $('#offcanvasRightCart').offcanvas('show');
                        }
                    },
                    error: function(error) {
                        if (error.responseJSON.error == -1) {
                            toastr.error(error.responseJSON.message)
                        }
                    }
                });
            });
        });
    </script>
@stop
