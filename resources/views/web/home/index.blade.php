@extends('web.index')
@section('title','Trang chủ')

@section('style_page')
    <link rel="stylesheet" href="{{asset('assets/css/home.css')}}">
@stop
{{--content of page--}}
@section('content')
    <div class="box-banner">
        <div class="position-relative">
            <video data-responsive="" class="w-100" autoplay="" playsinline="" muted="" loop="" fetchpriority="high" src="{{asset('assets/video/home-hero.mp4')}}"></video>
            <img src="{{asset('assets/image/wavy-overlay.png')}}" class="img-song">
        </div>
        <div class="overlays-home">
            <div class="wrapper">
                <img
                    src="{{asset('assets/image/hero-product.png')}}"
                    alt=" " class="hero-product-overlay">
                <div class="hero-content mx-2 d-flex align-items-end">
                    <div>
                    <p class="mb-0 text-hero-one">THE All-NEW</p>
                    <p class="mb-0 text-hero-two">RAPID PRO</p>
                    </div>
                    <a href="#" class="btn-link-buy btn-pc-link-buy">MUA NGAY</a>
                </div>
            </div>
            <a href="#" class="btn-link-buy btn-mobile-link-buy">MUA NGAY</a>
        </div>
    </div>

    <div class="box-shop-style box-mobile-style" style="margin-top: -40px">
        <div class="title-shop-style">What's <span style="color: #f65024;">YOUR STYLE?</span></div>
        <div class="swiper productSwiper productStyleSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide box-item-product">
                    <img src="{{asset('assets/image/shoes.png')}}" class="img-product-style2">
                </div>
                <div class="swiper-slide box-item-product">
                    <img src="{{asset('assets/image/shoes.png')}}" class="img-product-style2">
                </div>
                <div class="swiper-slide box-item-product">
                    <img src="{{asset('assets/image/shoes.png')}}" class="img-product-style2">
                </div>
                <div class="swiper-slide box-item-product">
                    <img src="{{asset('assets/image/shoes.png')}}" class="img-product-style2">
                </div>
                <div class="swiper-slide box-item-product">
                    <img src="{{asset('assets/image/shoes.png')}}" class="img-product-style2">
                </div>
                <div class="swiper-slide box-item-product">
                    <img src="{{asset('assets/image/shoes.png')}}" class="img-product-style2">
                </div>
                <div class="swiper-slide box-item-product">
                    <img src="{{asset('assets/image/shoes.png')}}" class="img-product-style2">
                </div>
            </div>
            <div class="swiper-pagination swiper-pagination-product"></div>
        </div>
    </div>

    <div class="box-along-sale">
        <article class="ag-full-width home-common" id="home-cards">
            <div class="ag-site-width">
                <picture>
                    <img
                        src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw1ba170d8/content/seasonal-content/homepage/2024/03/27/home-cards-20240327.png"
                        width="1920"
                        height="1130"
                        alt=" "
                        class="bg-image"
                    />
                </picture>
                <h2 class="title">
                    <span>How you want to live</span><br />begins with what you put<br
                        class="sm-only"
                    />
                    on your feet.
                </h2>
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img
                                src="{{asset('assets/image/35-years-35-and-under.gif')}}"
                            />
                            <h2>Extra 35% Off Sale</h2>
                            <p>
                                Ending our birthday month with a bang!<br />
                                Take an extra 35% off sale items. Now through 4/27.<br />
                                Use code 35YEARS at checkout.
                            </p>
                            <a href="https://www.chacos.com/US/en/sale/" class="btn"
                            >SHOP SALE</a
                            >
                        </div>
                        <div class="swiper-slide">
                            <picture>
                                <img
                                    src="{{asset('assets/image/come-hang-out.png')}}"
                                />
                            </picture>
                            <h2>Come Hang Out</h2>
                            <p>
                                We're hitting the road again in 2024 and can't<br
                                    class="lg-only"
                                />
                                wait<br class="sm-only" />
                                to get together and celebrate our 35th<br class="lg-only" />
                                birthday at<br class="sm-only" />
                                the Chaco For Life Tour!
                            </p>
                            <a
                                href="https://www.chacos.com/US/en/chaco-for-life/"
                                class="btn"
                            >FOLLOW ALONG</a
                            >
                        </div>
                        <div class="swiper-slide">
                            <picture>
                                <img
                                    src="{{asset('assets/image/go-to-townes_1.png')}}"
                                />
                            </picture>
                            <h2>Go To Townes</h2>
                            <p>
                                Comfy enough to go, go, go from day one, the<br />
                                Townes is an instant classic and your next go-to<br />
                                sandal for the everyday.
                            </p>
                            <a
                                href="https://www.chacos.com/US/en/townes-collection/"
                                class="btn"
                            >SHOP TOWNES</a
                            >
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination sm-only"></div>
            </div>
        </article>
    </div>

    <div class="box-shop-style box-m-top" style="background-color: white;padding-bottom: 0">
        <div class="d-flex align-items-center">
            <div class="title-shop-style mx-2">#CHACONATION  <span style="color: #f65024;">FAVORITES</span></div>
            <img src="{{asset('assets/image/vector-favorites.png')}}" class="icon-vector-favorites">
            <div class="d-flex box-more-style-shop">
                <a href="" class="link-cate-home">Shop Women's »</a>
                <a href="" class="link-cate-home">Shop Men's »</a>
                <a href="" class="link-cate-home">Shop Kids' »</a>
            </div>
        </div>

        <div class="swiper productSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide box-item-product">
                    <img src="{{asset('assets/image/z-sandals.png')}}" class="img-product-style">
                    <div class="title-product-bottom">
                        <div>
                            <p class="title-sp-favo">CUSTOMIZABLE Z</p>
                            <div class="reviews">
                                <div class="stars">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw3178a4e0/content/seasonal-content/homepage/2024/03/27/product-star-half.svg" alt="Half filled star">
                                </div>
                                <p class="review-number">(304)</p>
                            </div>
                        </div>
                        <p class="price-favo">$130.00</p>
                    </div>
                </div>
                <div class="swiper-slide box-item-product">
                    <img src="{{asset('assets/image/z-sandals.png')}}" class="img-product-style">
                    <div class="title-product-bottom">
                        <div>
                            <p class="title-sp-favo">CUSTOMIZABLE Z</p>
                            <div class="reviews">
                                <div class="stars">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw3178a4e0/content/seasonal-content/homepage/2024/03/27/product-star-half.svg" alt="Half filled star">
                                </div>
                                <p class="review-number">(304)</p>
                            </div>
                        </div>
                        <p class="price-favo">$130.00</p>
                    </div>
                </div>
                <div class="swiper-slide box-item-product">
                    <img src="{{asset('assets/image/z-sandals.png')}}" class="img-product-style">
                    <div class="title-product-bottom">
                        <div>
                            <p class="title-sp-favo">CUSTOMIZABLE Z</p>
                            <div class="reviews">
                                <div class="stars">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw3178a4e0/content/seasonal-content/homepage/2024/03/27/product-star-half.svg" alt="Half filled star">
                                </div>
                                <p class="review-number">(304)</p>
                            </div>
                        </div>
                        <p class="price-favo">$130.00</p>
                    </div>
                </div>
                <div class="swiper-slide box-item-product">
                    <img src="{{asset('assets/image/z-sandals.png')}}" class="img-product-style">
                    <div class="title-product-bottom">
                        <div>
                            <p class="title-sp-favo">CUSTOMIZABLE Z</p>
                            <div class="reviews">
                                <div class="stars">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw3178a4e0/content/seasonal-content/homepage/2024/03/27/product-star-half.svg" alt="Half filled star">
                                </div>
                                <p class="review-number">(304)</p>
                            </div>
                        </div>
                        <p class="price-favo">$130.00</p>
                    </div>
                </div>
                <div class="swiper-slide box-item-product">
                    <img src="{{asset('assets/image/z-sandals.png')}}" class="img-product-style">
                    <div class="title-product-bottom">
                        <div>
                            <p class="title-sp-favo">CUSTOMIZABLE Z</p>
                            <div class="reviews">
                                <div class="stars">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw3178a4e0/content/seasonal-content/homepage/2024/03/27/product-star-half.svg" alt="Half filled star">
                                </div>
                                <p class="review-number">(304)</p>
                            </div>
                        </div>
                        <p class="price-favo">$130.00</p>
                    </div>
                </div>
                <div class="swiper-slide box-item-product">
                    <img src="{{asset('assets/image/z-sandals.png')}}" class="img-product-style">
                    <div class="title-product-bottom">
                        <div>
                            <p class="title-sp-favo">CUSTOMIZABLE Z</p>
                            <div class="reviews">
                                <div class="stars">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw3178a4e0/content/seasonal-content/homepage/2024/03/27/product-star-half.svg" alt="Half filled star">
                                </div>
                                <p class="review-number">(304)</p>
                            </div>
                        </div>
                        <p class="price-favo">$130.00</p>
                    </div>
                </div>
                <div class="swiper-slide box-item-product">
                    <img src="{{asset('assets/image/z-sandals.png')}}" class="img-product-style">
                    <div class="title-product-bottom">
                        <div>
                            <p class="title-sp-favo">CUSTOMIZABLE Z</p>
                            <div class="reviews">
                                <div class="stars">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw9a1046c8/content/seasonal-content/homepage/2024/03/27/product-star.svg" alt="Full star">
                                    <img class="product-star" src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw3178a4e0/content/seasonal-content/homepage/2024/03/27/product-star-half.svg" alt="Half filled star">
                                </div>
                                <p class="review-number">(304)</p>
                            </div>
                        </div>
                        <p class="price-favo">$130.00</p>
                    </div>
                </div>
            </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
            <div class="swiper-pagination swiper-pagination-product"></div>
        </div>
    </div>

    <img src="{{asset('assets/image/banner1.png')}}" class="img-banner-hero-home">

    <div class="box-favorites">
        <div class="box-left-favo-img">
            <picture>
                <img
                    src="{{asset('assets/image/home-favorites-20240218.gif')}}"
                    class="w-100">
            </picture>
        </div>
        <div class="box-right-favo">
            <img src="{{asset('assets/image/pick.png')}}" class="img-pick">
            <div class="swiper favoritesSwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{asset('assets/image/sp1.png')}}" alt="" class="w-100">
                        <div class="name-product-favo">WOMEN'S ZX/2® CLASSIC SANDAL</div>
                        <div class="price-product-favo">$105.00</div>
                    </div>
                    <div class="swiper-slide">
                        <img src="{{asset('assets/image/sp1.png')}}" alt="" class="w-100">
                        <div class="name-product-favo">WOMEN'S ZX/2® CLASSIC SANDAL
                            WOMEN'S ZX/2® CLASSIC SANDAL
                        </div>
                        <div class="price-product-favo">$105.00</div>
                    </div>
                    <div class="swiper-slide">
                        <img src="{{asset('assets/image/sp1.png')}}" alt="" class="w-100">
                        <div class="name-product-favo">WOMEN'S ZX/2® CLASSIC SANDAL
                            WOMEN'S ZX/2® CLASSIC SANDAL
                        </div>
                        <div class="price-product-favo">$105.00</div>
                    </div>
                    <div class="swiper-slide">
                        <img src="{{asset('assets/image/sp1.png')}}" alt="" class="w-100">
                        <div class="name-product-favo">WOMEN'S ZX/2® CLASSIC SANDAL
                            WOMEN'S ZX/2® CLASSIC SANDAL
                        </div>
                        <div class="price-product-favo">$105.00</div>
                    </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>

    </div>

    <div class="box-fun-adventurous">
        <img src="{{asset('assets/image/line-top.png')}}" class="line-video-top">
        <figure class="w-100 m-0">
            <video data-src-sm="{{asset('assets/video/customizing-d.mp4')}}"
                   data-poster-sm="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dwa163a259/content/seasonal-content/landing-pages/chacos-for-life/images/customizing-m.png"
                   data-src-lg="https://chacos-for-life.s3.amazonaws.com/customizing-d.mp4"
                   data-poster-lg="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw615a2a62/content/seasonal-content/landing-pages/chacos-for-life/images/customizing.png"
                   autoplay="" playsinline="" muted="" loop=""
                   poster="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw615a2a62/content/seasonal-content/landing-pages/chacos-for-life/images/customizing.png"
                   src="https://chacos-for-life.s3.amazonaws.com/customizing-d.mp4" class="w-100 video-desktop"></video>

            <video data-responsive="" data-src-sm="{{asset('assets/video/customizing-d.mp4')}}"
                   data-poster-sm="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dwa163a259/content/seasonal-content/landing-pages/chacos-for-life/images/customizing-m.png"
                   data-src-lg="https://chacos-for-life.s3.amazonaws.com/customizing-d.mp4"
                   data-poster-lg="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dw615a2a62/content/seasonal-content/landing-pages/chacos-for-life/images/customizing.png"
                   autoplay="" playsinline="" muted="" loop="" class="customizing-video w-100 video-mobile"
                   poster="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dwa163a259/content/seasonal-content/landing-pages/chacos-for-life/images/customizing-m.png"
                   src="https://chacos-for-life.s3.amazonaws.com/customizing-m.mp4"></video>
        </figure>
        <img src="{{asset('assets/image/line-bottom.png')}}" class="line-video-bottom">
        <div class="box-content-fun">
            <div class="title-content-fun">FUN ADVENTUROUS, <span style="color: #E48665;">UNIQUELY YOU.</span></div>
            <div class="d-flex flex-column">
                <a href="#" class="btn-link-fun">START CUSTOMIZING</a>
                <a href="#" class="btn-link-fun">GET INSPIRED</a>
            </div>
        </div>
    </div>

    <div class="box-around">
        <div class="box-header-around">
            <p class="title-big-around">Around the <span style="color: #E45C37;">Chacosphere</span></p>
            <p class="title-small-around">Join the #ChacoNation on Instagram</p>
        </div>

        <div class="swiper photo-library1 mb-2">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
            </div>
        </div>
        <div class="swiper photo-library2 mb-2">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
            </div>
        </div>
        <div class="swiper photo-library3 mb-2">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
                <div class="swiper-slide"><img
                        src="https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg"
                        class="w-100"></div>
            </div>
        </div>


    </div>

    <div class="box-describe">
        <p class="title-describe-footer">Chaco Outdoor Sandals & Flips</p>
        <p class="content-describe-footer">Get ready for water, trail, and everything in between with Chaco sandals and
            flips. Our hiking sandals provide function and support for all your outdoor adventures. Plus, our sport
            sandals
            come in a variety of styles, colors, and fits, so you can find the perfect footwear for any occasion. Power
            your next adventure with sandals, flip flops, and shoes built to perform in style.</p>
    </div>
@stop
@section('script_page')
    <script src="{{asset('assets/js/home.js')}}"></script>
@stop
