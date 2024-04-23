@extends('web.index')
@section('title','Chi tiết sản phẩm')

@section('style_page')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/css/lightgallery.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/detail-product.css')}}">
@stop
{{--content of page--}}
@section('content')
    <div class="line-header-page-item">
        <a href="/" class="title-header-menu-page">Trang chủ</a>
        <span style="margin: 0 5px;">/</span>
        <a href="" class="title-header-menu-page">Men</a>
        <span style="margin: 0 5px;">/</span>
        <a href="" class="title-header-menu-page">Sandanls</a>
    </div>
    <div class="box-detail-product">
        <div class="box-detail-product-left">
            <div class="box-img-product">
                <div class="swiper swiperImageSmall">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{asset('assets/image/detail-sp1.png')}}" class="w-100" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{asset('assets/image/detail-sp1.png')}}" class="w-100" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{asset('assets/image/detail-sp1.png')}}" class="w-100" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{asset('assets/image/detail-sp1.png')}}" class="w-100" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{asset('assets/image/detail-sp1.png')}}" class="w-100" />
                        </div>
                    </div>
                </div>
                <div class="swiper swiperImageBig">
                    <div class="swiper-wrapper" id="lightgallery">
                        <div class="swiper-slide position-relative"
                             data-src="{{asset('assets/image/detail-sp1.png')}}">
                            <p class="title-attention"><span style="font-weight: bold;">Hurry! </span>313 other #ChacoNation
                                members are viewing this.</p>
                            <p class="title-sale-product">NEW</p>
                            <img src="{{asset('assets/image/detail-sp1.png')}}"
                                 data-src="{{asset('assets/image/detail-sp1.png')}}" data-lg-size="1600-1067"
                                 class="w-100" />
                            <div class="btn-search-zoom-img"><img src="{{asset('assets/image/detail-sp1.png')}}"
                                                                  style="width: 16px;margin-right: 5px;"> CLICK TO ENLARGE</div>
                        </div>
                        <div class="swiper-slide position-relative"
                             data-src="{{asset('assets/image/detail-sp1.png')}}">
                            <p class="title-attention"><span style="font-weight: bold;">Hurry! </span>313 other #ChacoNation
                                members are viewing this.</p>
                            <p class="title-sale-product">NEW</p>
                            <img src="{{asset('assets/image/detail-sp1.png')}}"
                                 data-src="{{asset('assets/image/detail-sp1.png')}}" data-lg-size="1600-1067"
                                 class="w-100" />
                            <div class="btn-search-zoom-img"><img src="{{asset('assets/image/detail-sp1.png')}}"
                                                                  style="width: 16px;margin-right: 5px;"> CLICK TO ENLARGE</div>
                        </div>
                        <div class="swiper-slide position-relative"
                             data-src="{{asset('assets/image/detail-sp1.png')}}">
                            <p class="title-attention"><span style="font-weight: bold;">Hurry! </span>313 other #ChacoNation
                                members are viewing this.</p>
                            <p class="title-sale-product">NEW</p>
                            <img src="{{asset('assets/image/detail-sp1.png')}}"
                                 data-src="{{asset('assets/image/detail-sp1.png')}}" data-lg-size="1600-1067"
                                 class="w-100" />
                            <div class="btn-search-zoom-img"><img src="{{asset('assets/image/detail-sp1.png')}}"
                                                                  style="width: 16px;margin-right: 5px;"> CLICK TO ENLARGE</div>
                        </div>
                        <div class="swiper-slide position-relative"
                             data-src="{{asset('assets/image/detail-sp1.png')}}">
                            <p class="title-attention"><span style="font-weight: bold;">Hurry! </span>313 other #ChacoNation
                                members are viewing this.</p>
                            <p class="title-sale-product">NEW</p>
                            <img src="{{asset('assets/image/detail-sp1.png')}}"
                                 data-src="{{asset('assets/image/detail-sp1.png')}}" data-lg-size="1600-1067"
                                 class="w-100" />
                            <div class="btn-search-zoom-img"><img src="{{asset('assets/image/search-sm.png')}}"
                                                                  style="width: 16px;margin-right: 5px;"> CLICK TO ENLARGE</div>
                        </div>
                        <div class="swiper-slide position-relative"
                             data-src="{{asset('assets/image/detail-sp1.png')}}">
                            <p class="title-attention"><span style="font-weight: bold;">Hurry! </span>313 other #ChacoNation
                                members are viewing this.</p>
                            <p class="title-sale-product">NEW</p>
                            <img src="{{asset('assets/image/detail-sp1.png')}}"
                                 data-src="{{asset('assets/image/detail-sp1.png')}}" data-lg-size="1600-1067"
                                 class="w-100" />
                            <div class="btn-search-zoom-img"><img src="{{asset('assets/image/search-sm.png')}}"
                                                                  style="width: 16px;margin-right: 5px;"> CLICK TO ENLARGE</div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>

            <div class="accordion" id="accordionExampleProduct" style="margin-right: 10px;">
                <div class="accordion-item accordion-item-infor">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed btn-infor-product" type="button" data-bs-toggle="collapse"
                                data-bs-target="#productDescription" aria-expanded="flase" aria-controls="productDescription">
                            Product Description

                        </button>
                    </h2>
                    <div class="box-product-description">
                        <div class="item-product-description">
                            <img src="{{asset('assets/image/adjustable.svg')}}">
                            <p class="title-description-sp">ADJUSTABLE STRAPS</p>
                            <p class="content-description-sp">Fully adjustable for a customized feel</p>
                        </div>
                        <div class="item-product-description">
                            <img src="{{asset('assets/image/comfort.svg')}}">
                            <p class="title-description-sp">ALL-DAY COMFORT</p>
                            <p class="content-description-sp">Podiatrist accepted footbed promotes arch support and healthy
                                alignment</p>
                        </div>
                        <div class="item-product-description">
                            <img src="{{asset('assets/image/noslipallgrip.svg')}}">
                            <p class="title-description-sp">NO SLIP, ALL GRIP</p>
                            <p class="content-description-sp">3.0 MM lug performance outsole for no slip traction.</p>
                        </div>
                    </div>
                    <div id="productDescription" class="accordion-collapse collapse"
                         data-bs-parent="#accordionExampleProduct">
                        <div class="accordion-body mb-3 mt-3 body-product-description">
                            <div class="description-content">
                                For over 30 years, our Classic sandals have been the ultimate choice for outdoor lovers. They
                                are simple, durable, and comfortable, with only 8 parts that adjust to your feet. You’ll enjoy
                                the podiatrist-approved footbed and the new ChacoGrip™ outsole that handles any terrain. And you
                                can always send them to ReChaco for repairs (see ReChaco.com for details).
                            </div>
                            <iframe id="marketing-video" frameborder="0" allowfullscreen=""
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    title="Chaco Z/1 or Z/2 Sandal: Which one is right for you?" width="640" height="360"
                                    src="https://www.youtube.com/embed/kumtsodQOrY?rel=0&amp;enablejsapi=1&amp;origin=https%3A%2F%2Fwww.chacos.com&amp;widgetid=1"
                                    data-gtm-yt-inspected-8080620_405="true" data-gtm-yt-inspected-31="true"></iframe>
                        </div>
                    </div>
                </div>
                <div class="accordion-item accordion-item-infor">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed btn-infor-product" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsetechnology" aria-expanded="false" aria-controls="collapsetechnology">
                            Technology
                        </button>
                    </h2>
                    <div id="collapsetechnology" class="accordion-collapse collapse"
                         data-bs-parent="#accordionExampleProduct">
                        <div class="accordion-body mb-3">
                            <div class="swiper swiperTechnilogy">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/image/adjustment.jpg')}}" class="w-100">
                                        <p class="title-slide-technilogy">GET THE PERFECT FIT </p>
                                        <p class="content-slide-technilogy">Upgraded rubber compound, Upgraded rubber compound,
                                            Upgraded rubber compound</p>
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/image/adjustment.jpg')}}" class="w-100">
                                        <p class="title-slide-technilogy">GET THE PERFECT FIT </p>
                                        <p class="content-slide-technilogy">Upgraded rubber compound, Upgraded rubber compound,
                                            Upgraded rubber compound</p>
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/image/adjustment.jpg')}}" class="w-100">
                                        <p class="title-slide-technilogy">GET THE PERFECT FIT </p>
                                        <p class="content-slide-technilogy">Upgraded rubber compound, Upgraded rubber compound,
                                            Upgraded rubber compound</p>
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/image/adjustment.jpg')}}" class="w-100">
                                        <p class="title-slide-technilogy">GET THE PERFECT FIT </p>
                                        <p class="content-slide-technilogy">Upgraded rubber compound, Upgraded rubber compound,
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
                        <button class="accordion-button collapsed btn-infor-product" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapselike" aria-expanded="false" aria-controls="collapselike">
                            #ChacoNation also likes
                        </button>
                    </h2>
                    <div id="collapselike" class="accordion-collapse collapse" data-bs-parent="#accordionExampleProduct">
                        <div class="accordion-body mb-3">
                            <div class="swiper swiperLike">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/image/adjustment.jpg')}}" class="w-100">
                                        <p class="title-slide-like">Men's Z/1 Adjustable Strap Classic Wide Width Sandal</p>
                                        <div class="d-flex mt-1">
                                            <span class="product-sale-price">$74.99</span>
                                            <span class="product-standard-price">740.99</span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/image/adjustment.jpg')}}" class="w-100">
                                        <p class="title-slide-like">Men's Z/1 Adjustable Strap Classic Wide Width Sandal</p>
                                        <div class="d-flex mt-1">
                                            <span class="product-sale-price">$74.99</span>
                                            <span class="product-standard-price">740.99</span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/image/adjustment.jpg')}}" class="w-100">
                                        <p class="title-slide-like">Men's Z/1 Adjustable Strap Classic Wide Width Sandal</p>
                                        <div class="d-flex mt-1">
                                            <span class="product-sale-price">$74.99</span>
                                            <span class="product-standard-price">740.99</span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{asset('assets/image/adjustment.jpg')}}" class="w-100">
                                        <p class="title-slide-like">Men's Z/1 Adjustable Strap Classic Wide Width Sandal</p>
                                        <div class="d-flex mt-1">
                                            <span class="product-sale-price">$74.99</span>
                                            <span class="product-standard-price">740.99</span>
                                        </div>
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
                        <button class="accordion-button collapsed btn-infor-product" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsereview" aria-expanded="false" aria-controls="collapsereview">
                            Customer Reviews <div class="d-flex star-content-more">
                                <div class="product-rate">
                                    <div class="star-rating" style="--rating:4"></div>
                                </div>
                                <div class="ts-star" style="margin-left: 5px;"> 4.5 (158)</div>
                            </div>
                        </button>
                    </h2>
                    <div id="collapsereview" class="accordion-collapse collapse" data-bs-parent="#accordionExampleProduct">
                        <div class="accordion-body mb-3">
                            <p class="title-review">REVIEWS</p>
                            <div class="box-parameter-review">
                                <div class="item-parameter-review">
                                    <p class="title-item-parameter">Rating Snapshot</p>
                                    <p class="content-item-parameter">Select a row below to filter reviews.</p>
                                    <div class="d-flex align-items-center" style="padding: 0 10px;">
                                        <span style="color: #303030;font-size: 13px;font-weight: 600;">5 start</span>
                                        <div class="line-percent">
                                            <div class="percent-content" style="width: 50%;"></div>
                                        </div>
                                        <span style="color: #303030;font-size: 13px;font-weight: 600;">516</span>
                                    </div>
                                    <div class="d-flex align-items-center" style="padding: 0 10px;">
                                        <span style="color: #303030;font-size: 13px;font-weight: 600;">4 start</span>
                                        <div class="line-percent">
                                            <div class="percent-content" style="width: 40%;"></div>
                                        </div>
                                        <span style="color: #303030;font-size: 13px;font-weight: 600;">516</span>
                                    </div>
                                    <div class="d-flex align-items-center" style="padding: 0 10px;">
                                        <span style="color: #303030;font-size: 13px;font-weight: 600;">3 start</span>
                                        <div class="line-percent">
                                            <div class="percent-content" style="width: 30%;"></div>
                                        </div>
                                        <span style="color: #303030;font-size: 13px;font-weight: 600;">516</span>
                                    </div>
                                    <div class="d-flex align-items-center" style="padding: 0 10px;">
                                        <span style="color: #303030;font-size: 13px;font-weight: 600;">2 start</span>
                                        <div class="line-percent">
                                            <div class="percent-content" style="width: 20%;"></div>
                                        </div>
                                        <span style="color: #303030;font-size: 13px;font-weight: 600;">516</span>
                                    </div>
                                    <div class="d-flex align-items-center" style="padding: 0 10px;">
                                        <span style="color: #303030;font-size: 13px;font-weight: 600;">1 start</span>
                                        <div class="line-percent">
                                            <div class="percent-content" style="width: 10%;"></div>
                                        </div>
                                        <span style="color: #303030;font-size: 13px;font-weight: 600;">516</span>
                                    </div>
                                </div>
                                <div class="item-parameter-review">
                                    <p class="title-item-parameter">Overall Rating</p>
                                    <div class="d-flex align-items-center">
                                        <p class="number-big-review">4.4</p>
                                        <div class="d-flex flex-column" style="font-size: 13px;">
                                            <div class="product-rate">
                                                <div class="star-rating" style="--rating:4"></div>
                                            </div>
                                            <div class="ts-star"> 700 Reviews</div>
                                        </div>
                                    </div>
                                    <p class="content-item-parameter">240 out of 270 (89%) reviewers recommend this product</p>
                                </div>
                                <div class="item-parameter-review">
                                    <p class="title-item-parameter">Review this Product</p>
                                    <div class="box-star-product">
                                        <div class="item-star-sp"><svg aria-hidden="true" width="15px" height="15px" fill="none"
                                                                       viewBox="0 0 34 34" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-588.000000, -409.000000)" fill="#FFFFFF"
                                                       fill-rule="nonzero" stroke="#004C59" stroke-width="1.5">
                                                        <g transform="translate(337.000000, 399.000000)">
                                                            <g transform="translate(241.000000, 0.000000)">
                                                                <g transform="translate(10.192308, 10.192308)">
                                                                    <path
                                                                        d="M16.3076923,1.76513255 L20.8381599,11.4172719 L31.0592597,12.978917 L23.6603835,20.5621906 L25.3975353,31.2117909 L16.3076923,26.1870493 L7.21784935,31.2117909 L8.95500108,20.5621906 L1.55612493,12.978917 L11.7772247,11.4172719 L16.3076923,1.76513255 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg></div>
                                        <div class="item-star-sp"><svg aria-hidden="true" width="15px" height="15px" fill="none"
                                                                       viewBox="0 0 34 34" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-588.000000, -409.000000)" fill="#FFFFFF"
                                                       fill-rule="nonzero" stroke="#004C59" stroke-width="1.5">
                                                        <g transform="translate(337.000000, 399.000000)">
                                                            <g transform="translate(241.000000, 0.000000)">
                                                                <g transform="translate(10.192308, 10.192308)">
                                                                    <path
                                                                        d="M16.3076923,1.76513255 L20.8381599,11.4172719 L31.0592597,12.978917 L23.6603835,20.5621906 L25.3975353,31.2117909 L16.3076923,26.1870493 L7.21784935,31.2117909 L8.95500108,20.5621906 L1.55612493,12.978917 L11.7772247,11.4172719 L16.3076923,1.76513255 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg></div>
                                        <div class="item-star-sp"><svg aria-hidden="true" width="15px" height="15px" fill="none"
                                                                       viewBox="0 0 34 34" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-588.000000, -409.000000)" fill="#FFFFFF"
                                                       fill-rule="nonzero" stroke="#004C59" stroke-width="1.5">
                                                        <g transform="translate(337.000000, 399.000000)">
                                                            <g transform="translate(241.000000, 0.000000)">
                                                                <g transform="translate(10.192308, 10.192308)">
                                                                    <path
                                                                        d="M16.3076923,1.76513255 L20.8381599,11.4172719 L31.0592597,12.978917 L23.6603835,20.5621906 L25.3975353,31.2117909 L16.3076923,26.1870493 L7.21784935,31.2117909 L8.95500108,20.5621906 L1.55612493,12.978917 L11.7772247,11.4172719 L16.3076923,1.76513255 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg></div>
                                        <div class="item-star-sp"><svg aria-hidden="true" width="15px" height="15px" fill="none"
                                                                       viewBox="0 0 34 34" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-588.000000, -409.000000)" fill="#FFFFFF"
                                                       fill-rule="nonzero" stroke="#004C59" stroke-width="1.5">
                                                        <g transform="translate(337.000000, 399.000000)">
                                                            <g transform="translate(241.000000, 0.000000)">
                                                                <g transform="translate(10.192308, 10.192308)">
                                                                    <path
                                                                        d="M16.3076923,1.76513255 L20.8381599,11.4172719 L31.0592597,12.978917 L23.6603835,20.5621906 L25.3975353,31.2117909 L16.3076923,26.1870493 L7.21784935,31.2117909 L8.95500108,20.5621906 L1.55612493,12.978917 L11.7772247,11.4172719 L16.3076923,1.76513255 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg></div>
                                        <div class="item-star-sp"><svg aria-hidden="true" width="15px" height="15px" fill="none"
                                                                       viewBox="0 0 34 34" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-588.000000, -409.000000)" fill="#FFFFFF"
                                                       fill-rule="nonzero" stroke="#004C59" stroke-width="1.5">
                                                        <g transform="translate(337.000000, 399.000000)">
                                                            <g transform="translate(241.000000, 0.000000)">
                                                                <g transform="translate(10.192308, 10.192308)">
                                                                    <path
                                                                        d="M16.3076923,1.76513255 L20.8381599,11.4172719 L31.0592597,12.978917 L23.6603835,20.5621906 L25.3975353,31.2117909 L16.3076923,26.1870493 L7.21784935,31.2117909 L8.95500108,20.5621906 L1.55612493,12.978917 L11.7772247,11.4172719 L16.3076923,1.76513255 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg></div>
                                    </div>
                                    <p class="content-item-parameter">Adding a review will require a valid email for verification
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="box-detail-prduct-right">
            <p class="name-product-detail">MEN'S Z/1 ADJUSTABLE STRAP CLASSIC SANDAL</p>
            <div class="d-flex justify-content-between align-items-center">
                <p class="name-price">$105.00</p>
                <div class="d-flex mb-1">
                    <div class="product-rate">
                        <div class="star-rating" style="--rating:4"></div>
                    </div>
                    <div class="ts-star" style="margin-left: 5px;"> 4.5 (158)</div>
                </div>
            </div>
            <div class="d-flex align-items-center mt-4">
                <p style="font-size: 18px;font-weight: bold;margin-bottom: 0;color: #303030;">Select a Type:</p>
                <p style="margin-bottom: 0;margin-left: 5px;font-size: 18px;">Medium</p>
            </div>
            <div class="d-flex justify-content-between w-100">
                <div class="item-select-type item-select-type-active">Medium</div>
                <div class="item-select-type">Wide</div>
            </div>
            <div class="d-flex mt-4">
                <p style="color: #303030;font-weight: bold;margin-bottom: 0;font-size: 14px;">Select a Color : </p>
                <p style="margin-bottom: 0;margin-left: 5px;font-size: 14px;">Tetra Moss</p>
            </div>
            <p class="price-item-color">$105.00 - $110.00</p>
            <div class="box-color-product mt-1">
                <div class="item-color-product item-color-active" onclick="toggleColorActive(this)"></div>
                <div class="item-color-product" onclick="toggleColorActive(this)"></div>
                <div class="item-color-product" onclick="toggleColorActive(this)"></div>
                <div class="item-color-product" onclick="toggleColorActive(this)"></div>
                <div class="item-color-product" onclick="toggleColorActive(this)"></div>
                <div class="item-color-product" onclick="toggleColorActive(this)"></div>
            </div>
            <div class="d-flex mt-2">
                <p style="color: #303030;font-weight: bold;margin-bottom: 0;font-size: 14px;">Select a Width & Size :</p>
                <p style="margin-bottom: 0;margin-left: 5px;font-size: 14px;">15 M</p>
            </div>
            <div class="box-w-S">M</div>
            <div class="box-size-product mt-3">
                <div class="item-size-product item-size-active" onclick="toggleSizeActive(this)">7</div>
                <div class="item-size-product" onclick="toggleSizeActive(this)">8</div>
                <div class="item-size-product" onclick="toggleSizeActive(this)">9</div>
                <div class="item-size-product" onclick="toggleSizeActive(this)">10</div>
                <div class="item-size-product" onclick="toggleSizeActive(this)">11</div>
                <div class="item-size-product" onclick="toggleSizeActive(this)">12</div>
            </div>
            <div class="d-flex justify-content-between w-100 mt-5 mb-5">
                <button class="btn-add-to-card">ADD TO CART</button>
                <div class="btn-heart-now">
                    <img src="{{asset('assets/image/heart.svg')}}" style="width: 45%;">
                </div>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item accordion-item-infor">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed btn-infor-more" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="flase" aria-controls="collapseOne">
                            <img
                                src="https://www.chacos.com/on/demandware.static/Sites-chacos_us-Site/-/default/images/svg/icon-truck.svg"
                                style="margin-right: 10px;">
                            Shipping
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body mb-3">
                            <p style="color: #004c59;margin-bottom: 0;">FREE EXPRESS SHIPPING ON $120+</p>
                            <p style="font-size: 14px;margin-bottom: 0;">Order today to receive by <span
                                    style="color: #f65024;">Sat, 4/6</span></p>
                            <a href="#" style="color: #004c59;font-size: 14px;font-weight: bold;">See more details.</a>
                        </div>
                    </div>
                </div>
                <div class="accordion-item accordion-item-infor" style="border-bottom: 1px solid #dcdcdc;">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed btn-infor-more" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <img
                                src="https://www.chacos.com/on/demandware.static/Sites-chacos_us-Site/-/default/images/svg/icon-return.svg"
                                style="margin-right: 10px;">
                            Returns
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body mb-3">
                            <p style="font-size: 14px;margin-bottom: 0;">We are happy to offer free returns and exchanges.</p>
                            <a href="#" style="color: #004c59;font-size: 14px;font-weight: bold;">See more details.</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-customize">
                <img src="{{asset('assets/image/color.png')}}" style="width: 20px;"><span
                    style="font-size: 18px;color: #303030;font-weight: 600; margin-left: 6px;">CUSTOMIZE</span>
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
    <script src="{{asset('assets/js/detail-product.js')}}"></script>
    <script>
        function toggleColorActive(item) {
            document.querySelectorAll('.item-color-product').forEach(function(el) {
                el.classList.remove('item-color-active');
            });
            item.classList.toggle('item-color-active');

        }

        function toggleSizeActive(item) {
            document.querySelectorAll('.item-size-product').forEach(function(el) {
                el.classList.remove('item-size-active');
            });
            item.classList.toggle('item-size-active');

        }
    </script>
@stop
