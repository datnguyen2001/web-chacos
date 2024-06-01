<div class="box-header">
    <div class="header-top">
        <div class="box-big-header-top">
            <a href="{{ route('easy-free-returns') }}" class="title-header-top title-header-left">Trả lại dễ dàng và miễn
                phí</a>
            <div class="box-item-header-top">
                <span class="title-header-top box-help-header position-relative">Trợ giúp</span>
                <ul class="dropdown-menu dropdown-menu-help">
                    <li><a class="dropdown-item-help dropdown-item" href="{{ route('order-history') }}"><img
                                src="{{ asset('assets/image/Icon-clock.png') }}" class="mr-2"><span
                                style="padding-left: 5px;">Trạng thái đơn hàng</span></a></li>
                    <li><a class="dropdown-item-help dropdown-item" href="#"><img
                                src="{{ asset('assets/image/Icon-chat-new.png') }}" class="mr-2"><span
                                style="padding-left: 5px;">CHAT</span></a></li>
                    <li><a class="dropdown-item-help dropdown-item" href="#"><img
                                src="{{ asset('assets/image/Icon-service-new.png') }}" class="mr-2"><span
                                style="padding-left: 5px;">Dịch vụ khách hàng</span></a></li>
                    <li><a class="dropdown-item-help dropdown-item" href="{{ route('easy-free-returns') }}"><img
                                src="{{ asset('assets/image/Icon-return-new.png') }}" class="mr-2"><span
                                style="padding-left: 5px;">ĐỔI & TRẢ LẠI</span></a></li>
                    <li><a class="dropdown-item-help dropdown-item" href="#"><img
                                src="{{ asset('assets/image/Icon-truck-new.png') }}" class="mr-2"><span
                                style="padding-left: 5px;">THÔNG TIN VẬN CHUYỂN</span></a></li>
                    <li>
                        <a class="dropdown-item-help dropdown-item d-flex align-items-baseline"
                            href="{{ Auth::check() ? route('my-account') : route('login') }}">
                            <svg id="Icon_user_member_account" data-name="Icon user member account"
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 20 20">
                                <rect id="Rectangle" width="16" height="16" fill="#eee" opacity="0"></rect>
                                <g id="Group_1540" data-name="Group 1540">
                                    <path id="Path_78" data-name="Path 78"
                                        d="M20,21V19a4,4,0,0,0-4-4H8a4,4,0,0,0-4,4v2" transform="translate(-2 -2.223)"
                                        fill="none" stroke="#004c59" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"></path>
                                    <circle id="Ellipse" cx="4" cy="4" r="4"
                                        transform="translate(6 2)" fill="none" stroke="#004c59"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle>
                                </g>
                            </svg>
                            <span
                                style="padding-left: 5px;">{{ Auth::check() ? 'QUẢN LÝ TÀI KHOẢN' : 'ĐĂNG NHẬP' }}</span>
                        </a>
                    </li>
                </ul>
                <a href="{{ route('wishlist') }}">
                    <img src="{{ asset('assets/image/heart.png') }}" class="icon-header">
                </a>
                <div class="position-relative" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSale"
                    aria-controls="offcanvasRight">
                    <img src="{{ asset('assets/image/Icon.png') }}" class="icon-header">
                    <div class="circle">{{count(@$today_offer)}}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-center">
        <div class="box-big-header-center">
            @php
                function renderMenuSection($categories, $menuName, $menuBelong, $isDesktop = true)
                {
                    if ($isDesktop) {
                        $itemClass = 'item-menu-header-col text-black';
                    } else {
                        $itemClass = 'item-menu-1-mobile';
                    }

                    foreach ($categories as $cate) {
                        $menuBelongs = array_merge(
                            explode(',', $cate->menu_belong),
                            $cate->children->pluck('menu_belong')->flatten()->toArray(),
                        );
                        $isBelong = in_array($menuBelong, $menuBelongs);

                        if (
                            ($isBelong || in_array($menuBelong, explode(',', $cate->menu_belong))) &&
                            $cate->parent_id == 0
                        ) {
                            echo '<a href="' .
                                route('category', ['slug' => $cate->slug]) .
                                '" class="' .
                                $itemClass .
                                '">' .
                                $cate->name .
                                '</a>';
                        }
                    }
                }
            @endphp

            <div class="d-flex align-items-center">
                <a href="{{ route('home') }}"><img src="{{ asset('assets/image/logo.png') }}" class="img-logo"></a>

                @foreach ($menu as $key => $m)
                    <div class="title-header-center menu-big-1">{{ $m->name }}</div>
                    <div class="box-item-menu-header box-item-small-1">
                        @php renderMenuSection($categories, 'New', $m->id); @endphp
                        @if ($m->thumbnail)
                            <div class="item-menu-header-col">
                                <div class="d-flex flex-column">
                                    <img src="{{ $m->thumbnail }}" class="w-75">
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <div class="position-relative box-search-header">
                    <input type="text" class="input-search-header" id="searchInputs" placeholder="Tìm kiếm">
                    <img src="{{ asset('assets/image/search-sm.png') }}" class="btn-search-header">
                </div>
                <img src="{{ asset('assets/image/shopping-cart.png') }}" class="icon-cart" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRightCart" aria-controls="offcanvasRightCart">
            </div>
        </div>
    </div>

    @foreach ($coupons as $coupon)
        <div class="header-bottom header-bottom-active">
            <span class="title-header-bottom">{{ $coupon->details }}</span>
            <a href="#" class="title-link-header-bottom">Sử dụng mã giảm giá: <span
                    class="name-code">{{ $coupon->code }}</span> »</a>
        </div>
    @endforeach
</div>
<!-- search -->
<div id="overlay-search" class="overlay"></div>
<div class="box-active-search-header" id="search-box-focus">
    <form method="get" action="{{ route('search') }}">
        <div class="box-search-header position-relative" style="background-color: #004c59;border: 1px solid #004c59;">
            <input type="text" class="input-search-header" name="key_search" id="searchInputActive"
                placeholder="Search">
            <button type="submit" style="background: transparent;width: 26px;border: none;padding: 0"
                id="searchButton">
                <svg class="search-icon" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"
                    width="26px" height="22px" style="margin-left: 3px">
                    <path
                        d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z">
                    </path>
                </svg>
            </button>
        </div>
    </form>
    <div class="box-content-search-header">
        <div class="box-content-search-header-left">

        </div>
        <div class="box-content-search-header-right">
            <p class="title-suggest-search">Tìm kiếm gần đây</p>
            <div class="d-flex flex-column mb-3" id="searchSuggestions">

            </div>
            @if (count($key_search) > 0)
                <p class="title-suggest-search">Tìm kiếm phổ biến</p>
                <div class="d-flex flex-column mb-3">
                    @foreach ($key_search as $key)
                        <a href="{{ $key->url }}" class="item-search-suggest">{{ $key->name }}</a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>

<div class="box-header-mobile">
    <img src="{{ asset('assets/image/menu.svg') }}" class="icon-menu-header-mobile" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasMenu" aria-controls="offcanvasExample">
    <img src="{{ asset('assets/image/search-sm.png') }}" class="icon-search-header-mobile"
        data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearchRight" aria-controls="offcanvasSearchRight">
    <a href="{{route('home')}}">
        <img src="{{ asset('assets/image/logo.png') }}" class="img-logo">
    </a>
    <div class="position-relative" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSale"
        aria-controls="offcanvasRight">
        <img src="{{ asset('assets/image/flag.svg') }}" class="icon-header">
        <div class="circle-mobile">{{count(@$today_offer)}}</div>
    </div>
    <img src="{{ asset('assets/image/shopping-cart.png') }}" class="icon-cart" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasRightCart" aria-controls="offcanvasRightCart">
</div>

<!-- model sale -->
<div class="offcanvas offcanvas-end offcanvasSale" tabindex="-1" id="offcanvasSale"
    aria-labelledby="offcanvasSaleLabel">
    <div class="offcanvas-body">
        <button type="button" class="btn-close" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSale"
            aria-controls="offcanvasSale" aria-label="Close"></button>
        <div class="box-sale-style mt-0">
            <div style="color: black;font-weight: bold;text-align: center;font-size: 18px;margin: 12px 0;">
                Đề nghị hôm nay
            </div>
            <div style="color: black;text-align: center;font-size: 14px;margin-bottom: 14px;">
                Nhấp vào mã ưu đãi bên dưới để áp dụng khi thanh toán
            </div>
            @if (count($today_offer) > 0)
                @foreach ($today_offer as $today)
                    <a href="{{ $today->url }}" class="item-sale-style">
                        <img src="{{ asset($today->image) }}" class="w-100">
                        <div class="line-sale-style">
                            {{ $today->title }}
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
</div>

<!-- model menu -->
<div class="offcanvas offcanvas-start offcanvas-mobile-menu" tabindex="-1" id="offcanvasMenu"
    aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body p-0">
        <div class="accordion" id="accordionExample">
            @foreach ($menu as $key => $m)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $key }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $key }}" aria-expanded="false"
                            aria-controls="collapse{{ $key }}">
                            {{ $m->name }}
                        </button>
                    </h2>
                    <div id="collapse{{ $key }}" class="accordion-collapse bg-item-menu collapse"
                        aria-labelledby="heading{{ $key }}" data-bs-parent="#accordionExample">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            @php
                                renderMenuSection($categories, $m->name, $m->id, false);
                            @endphp
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


<!-- model search -->
<div class="offcanvas offcanvas-end w-100 border-0" tabindex="-1" id="offcanvasSearchRight"
    aria-labelledby="offcanvasSearchRightLabel">
    <div class="offcanvas-header p-0 d-flex justify-content-between align-items-center">
        <form method="get" action="{{ route('search') }}" class="w-100">
            <div class="position-relative w-100">
                <input type="text" class="input-search-menu-mobile" id="searchInputActiveMobile"
                    name="key_search" placeholder="Search for products">
                <button type="submit" style="background: transparent;border: none;position: absolute;right: 0">
                    <img src="{{ asset('assets/image/search.svg') }}" class="icon-search-menu-mobile"
                        id="searchButtonMobile">
                </button>
            </div>
        </form>
        <img src="{{ asset('assets/image/xmark.svg') }}" data-bs-dismiss="offcanvas" aria-label="Close"
            style="width: 23px;margin-left: 13px;margin-right: 13px;">
    </div>
    <div class="offcanvas-body" style="padding: 24px;">
        <p class="title-suggest-search">Tìm kiếm gần đây</p>
        <div class="d-flex flex-column mb-3" id="searchSuggestionsMobile">

        </div>
        @if (count($key_search) > 0)
            <p style="font-weight: 600;color: black;margin-bottom: 10px;">Tìm kiếm phổ biến</p>
            <div class="d-flex flex-column">
                @foreach ($key_search as $key)
                    <a href="{{ $key->url }}" class="item-search-hot">{{ $key->name }}</a>
                @endforeach
            </div>
        @endif
        <div class="box-content-search-header-mobile">

        </div>
    </div>
</div>

<!-- Modal Cart -->
<div class="offcanvas offcanvas-end offcanvas-end-cart" tabindex="-1" id="offcanvasRightCart"
    aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header offcanvas-header-cart">
        <h5 class="offcanvas-title offcanvas-title-cart" id="offcanvasRightLabel">SẢN PHẨM TRONG GIỎ HÀNG CỦA BẠN</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body body-cart">
        <div id="spinner" class="text-center mt-3">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div id="cartContent" style="display: none">
            <div id="cartHeader">
                <p class="title-top">CHÚC MỪNG!</p>
                <p class="content-top">BẠN ĐÃ ĐỦ ĐIỀU KIỆN ĐỂ ĐƯỢC FREE SHIP!</p>
                <div class="line-row-top"></div>
                <div class="d-flex justify-content-between align-items-center pb-2"
                    style="border-bottom: 1px solid #dcdcdc; padding: 0 15px;">
                    <span style="margin-right:5px">300.000 VND</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 22 22">
                        <g id="Icon_Check_Status" data-name="Icon Check Status" transform="translate(1 1)">
                            <circle id="Ellipse_38" data-name="Ellipse 38" cx="10" cy="10" r="10"
                                fill="#47c979" stroke="#47c979" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"></circle>
                            <g id="Icon_check" data-name="Icon check" transform="translate(6 7)">
                                <path id="check" d="M13,6,6.813,13,4,9.818" transform="translate(-4 -6)"
                                    fill="#47c979" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"></path>
                            </g>
                        </g>
                    </svg>
                </div>
            </div>
            <div class="box-product-cart">
                <div class="item-product-cart">
                    <div class="mini-cart-name">
                        <a href="#">Z/1 Adjustable Strap Classic Sandal</a>
                    </div>
                    <div class="mini-cart-product-block">
                        <div class="mini-cart-image">
                            <a
                                href="https://www.chacos.com/on/demandware.store/Sites-chacos_us-Site/default/Product-Show?pid=195020165102">
                                <img src="https://s7d4.scene7.com/is/image/WolverineWorldWide/CHAM-JCH108835-031523-S24-000?$dw-checkoutcartthm$&amp;fmt=jpeg"
                                    alt="">
                            </a>
                        </div>
                        <div class="mini-cart-product-details">
                            <div class="mini-cart-attributes">
                                <div class="attribute">
                                    <span class="value" tabindex="0">Color: Deco Nutshell</span>
                                </div>
                                <div class="attribute">
                                    <span class="value" tabindex="0" aria-label="Size">Size: 8 M</span>
                                </div>
                            </div>
                            <div class="item-sku-number">Item #195020165102 </div>
                            <div class="mini-cart-action">
                                <span class="item-edit-details-checkout"></span>
                                <a class="spc-edit-product" href="#">Edit</a>
                                <span class="action-divider">|</span>
                                <a href="#" class="mini-cart-product-remove" title="Remove"
                                    aria-label="Search-Show">Remove</a>
                            </div>
                            <div class="mini-cart-messaging"></div>
                        </div>
                    </div>
                    <div class="mini-cart-pricing">
                        <div class="mini-cart-price-each">
                            <div class="label" aria-label="Each" aria-labelledby="mini-cartprice-value-label-0">Each
                            </div><span id="mini-cart-price-value-label-0" class="mini-cart-price bfx-price"
                                data-price="$105.00">$105.00</span>
                        </div>
                        <div class="quantity-main-wrapper">
                            <div class="label " aria-labelledby="mini-cartprice-value-label-0">Quantity
                            </div>
                            <div class="quantity-wrapper ">
                                <span>
                                    <button type="button" class="quantity-minus btn-quantity-sp"
                                        data-field="quantity"><img
                                            src="{{ asset('assets/image/cartqty-minus-new.png') }}"
                                            alt="Remove Quantity" class="offers-icon"></button>
                                </span>
                                <input type="number" class="value input-quantity-sp" readonly
                                    id="mini-cart-quantity-value-0" value="1">
                                <span>
                                    <button type="button" class="quantity-plus btn-quantity-sp"
                                        data-field="quantity"><img
                                            src="{{ asset('assets/image/cartqty-plus-new.png') }}" alt="Add Quantity"
                                            class="offers-icon"></button>
                                </span>
                            </div>
                        </div>
                        <div class="mini-cart-price-subtotal">
                            <div class="label">Subtotal</div>
                            <div class="mini-cart-price-each"><span class="mini-cart-price">$105.00</span></div>
                        </div>
                    </div>
                </div>

                {{-- COUPON --}}
                <div class="accordion accordion-flush accordion-flush-discount" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed accordion-button-discount" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                Add a Promotion or Discount
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body accordion-body-discount">
                                <input type="text" class="input-discount" placeholder="Promo Code">
                                <button class="btn-up-code">Áp dụng</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="MiniCart__Padding24">
                    <h3 class="MiniCart__FooterTotal"><span class="MiniCart__FooterTotalTitle">Subtotal</span><span
                            class="MiniCart__FooterTotalPrice">$105.00</span></h3>
                    <button class="mini-cart-link-checkout cta-primary">Checkout</button>
                    <div class="MiniCart__FooterViewCart">
                        <button class="mini-cart-link-checkout cta-primary"><a href="{{ route('cart') }}"
                                style="color: white">View Cart</a> </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
