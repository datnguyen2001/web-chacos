<div class="box-header">
    <div class="header-top">
        <div class="box-big-header-top">
            <a href="{{ route('easy-free-returns') }}" class="title-header-top title-header-left">Easy & Free Returns</a>
            <div class="box-item-header-top">
                <span class="title-header-top box-help-header position-relative">Help</span>
                <ul class="dropdown-menu dropdown-menu-help">
                    <li><a class="dropdown-item-help dropdown-item" href="#"><img
                                src="https://www.chacos.com/on/demandware.static/Sites-chacos_us-Site/-/default/dwcb60ea97/images/Icon-clock.png"
                                class="mr-2"><span style="padding-left: 5px;">ORDER STATUS</span></a></li>
                    <li><a class="dropdown-item-help dropdown-item" href="#"><img
                                src="https://www.chacos.com/on/demandware.static/Sites-chacos_us-Site/-/default/dw3af3c900/images/Icon-chat-new.png"
                                class="mr-2"><span style="padding-left: 5px;">CHAT</span></a></li>
                    <li><a class="dropdown-item-help dropdown-item" href="#"><img
                                src="https://www.chacos.com/on/demandware.static/Sites-chacos_us-Site/-/default/dwdda501f6/images/Icon-service-new.png"
                                class="mr-2"><span style="padding-left: 5px;">CUSTOMER SERVICE</span></a></li>
                    <li><a class="dropdown-item-help dropdown-item" href="{{ route('easy-free-returns') }}"><img
                                src="https://www.chacos.com/on/demandware.static/Sites-chacos_us-Site/-/default/dw5cc964b9/images/Icon-return-new.png"
                                class="mr-2"><span style="padding-left: 5px;">EXCHANGE & RETURN</span></a></li>
                    <li><a class="dropdown-item-help dropdown-item" href="#"><img
                                src="https://www.chacos.com/on/demandware.static/Sites-chacos_us-Site/-/default/dw5baa338f/images/Icon-truck-new.png"
                                class="mr-2"><span style="padding-left: 5px;">SHIPPING INFO</span></a></li>
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
                            <span style="padding-left: 5px;">ACCOUNT SIGN IN</span>
                        </a>
                    </li>
                </ul>
                <a href="{{ route('wishlist') }}">
                    <img src="{{ asset('assets/image/heart.png') }}" class="icon-header">
                </a>
                <div class="position-relative" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSale"
                    aria-controls="offcanvasRight">
                    <img src="{{ asset('assets/image/Icon.png') }}" class="icon-header">
                    <div class="circle">1</div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-center">
        <div class="box-big-header-center">
            <div class="d-flex align-items-center">
                <a href="{{ route('home') }}"><img src="{{ asset('assets/image/logo.png') }}" class="img-logo"></a>
                <div class="title-header-center menu-big-1">NEW</div>
                <div class="box-item-menu-header box-item-small-1">
                    <div class="item-menu-header-col">
                        <p class="title-big-menu-item">MEN</p>
                        <div class="d-flex flex-column">
                            <a href="{{ route('category') }}" class="name-small-item-menu">1 Strap</a>
                            <a href="" class="name-small-item-menu">1 Strap</a>
                            <a href="" class="name-small-item-menu">1 Strap</a>
                        </div>
                    </div>
                    <div class="item-menu-header-col">
                        <p class="title-big-menu-item">MEN</p>
                        <div class="d-flex flex-column">
                            <a href="" class="name-small-item-menu">1 Strap</a>
                            <a href="" class="name-small-item-menu">1 Strap</a>
                            <a href="" class="name-small-item-menu">1 Strap</a>
                        </div>
                    </div>
                    <div class="item-menu-header-col">
                        <div class="d-flex flex-column">
                            <img src="{{ asset('assets/image/nav-header.png') }}" class="w-75">
                            <a href="" class="item-link-mav-header">Shop Collab</a>
                        </div>
                    </div>
                </div>

                <div class="title-header-center menu-big-2">WOMEN</div>
                <div class="box-item-menu-header box-item-small-2">
                    <div class="item-menu-header-col">
                        <p class="title-big-menu-item">MEN</p>
                        <div class="d-flex flex-column">
                            <a href="" class="name-small-item-menu">1 Strap</a>
                            <a href="" class="name-small-item-menu">1 Strap</a>
                            <a href="" class="name-small-item-menu">1 Strap</a>
                        </div>
                    </div>
                    <div class="item-menu-header-col">
                        <p class="title-big-menu-item">MEN</p>
                        <div class="d-flex flex-column">
                            <a href="" class="name-small-item-menu">1 Strap</a>
                            <a href="" class="name-small-item-menu">1 Strap</a>
                            <a href="" class="name-small-item-menu">1 Strap</a>
                        </div>
                    </div>
                    <div class="item-menu-header-col">
                        <p class="title-big-menu-item">MEN</p>
                        <div class="d-flex flex-column">
                            <a href="" class="name-small-item-menu">1 Strap</a>
                            <a href="" class="name-small-item-menu">1 Strap</a>
                            <a href="" class="name-small-item-menu">1 Strap</a>
                        </div>
                    </div>
                </div>
                <div class="title-header-center">MEN</div>
                <div class="title-header-center">KIDS</div>
                <div class="title-header-center">GEAR</div>
                <div class="title-header-center">SALE</div>
                <div class="title-header-center">INSIDE CHACO</div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <div class="position-relative box-search-header">
                    <input type="text" class="input-search-header" id="searchInputs" placeholder="Search">
                    <img src="{{ asset('assets/image/search-sm.png') }}" class="btn-search-header">
                </div>
                <img src="{{ asset('assets/image/shopping-cart.png') }}" class="icon-cart"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightCart"
                    aria-controls="offcanvasRightCart">
            </div>
        </div>
    </div>

    @foreach ($coupons as $coupon)
        <div class="header-bottom">
            <span class="title-header-bottom">{{ $coupon->details }}</span>
            <a href="#" class="title-link-header-bottom">Use Code: <span
                    class="name-code">{{ $coupon->code }}</span> »</a>
        </div>
    @endforeach
</div>
<!-- search -->
<div id="overlay-search" class="overlay"></div>
<div class="box-active-search-header" id="search-box-focus">
    <div class="box-search-header position-relative" style="background-color: #004c59;border: 1px solid #004c59;">
        <input type="text" class="input-search-header" id="searchInputActive" placeholder="Search">
        <svg class="search-icon" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"
            width="26px" height="22px" style="margin-left: 3px;">
            <path
                d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z">
            </path>
        </svg>
    </div>
    <div class="box-content-search-header">
        <div class="box-content-search-header-left">

        </div>
        <div class="box-content-search-header-right">
            <p class="title-suggest-search">Popular Searches</p>
            <div class="d-flex flex-column mb-3">
                <a href="" class="item-search-suggest">bohdi</a>
                <a href="" class="item-search-suggest">crocs</a>
            </div>
        </div>
    </div>
</div>

<div class="box-header-mobile">
    <img src="{{ asset('assets/image/menu.svg') }}" class="icon-menu-header-mobile" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasMenu" aria-controls="offcanvasExample">
    <img src="{{ asset('assets/image/search-sm.png') }}" class="icon-search-header-mobile"
        data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearchRight" aria-controls="offcanvasSearchRight">
    <img src="{{ asset('assets/image/logo.png') }}" class="img-logo">
    <div class="position-relative" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSale"
        aria-controls="offcanvasRight">
        <img src="{{ asset('assets/image/flag.svg') }}" class="icon-header">
        <div class="circle-mobile">1</div>
    </div>
    <img src="{{ asset('assets/image/shopping-cart.png') }}" class="icon-cart" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasRightCart" aria-controls="offcanvasRightCart">
</div>

<!-- model sale -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasSale" aria-labelledby="offcanvasSaleLabel">
    <div class="offcanvas-body">
        <button type="button" class="btn-close" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSale"
            aria-controls="offcanvasSale" aria-label="Close"></button>
        <div class="box-sale-style mt-0">
            <div style="color: black;font-weight: bold;text-align: center;font-size: 18px;margin: 12px 0;">Today's
                Offers
            </div>
            <div style="color: black;text-align: center;font-size: 14px;margin-bottom: 14px;">Click offer codes below
                to
                apply in checkout.</div>
            <div class="item-sale-style">
                <img src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dwc07ae136/content/seasonal-content/promos/2021/09/extole_updates_promotab_03.jpg"
                    class="w-100">
                <div class="line-sale-style">
                    No Code Necessary
                </div>
            </div>
            <div class="item-sale-style">
                <img src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dwc07ae136/content/seasonal-content/promos/2021/09/extole_updates_promotab_03.jpg"
                    class="w-100">
                <div class="line-sale-style">
                    No Code Necessary
                </div>
            </div>
            <div class="item-sale-style">
                <img src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dwc07ae136/content/seasonal-content/promos/2021/09/extole_updates_promotab_03.jpg"
                    class="w-100">
                <div class="line-sale-style">
                    No Code Necessary
                </div>
            </div>
            <div class="item-sale-style">
                <img src="https://www.chacos.com/on/demandware.static/-/Sites-chacos_us-Library/default/dwc07ae136/content/seasonal-content/promos/2021/09/extole_updates_promotab_03.jpg"
                    class="w-100">
                <div class="line-sale-style">
                    No Code Necessary
                </div>
            </div>

        </div>
    </div>
</div>

<!-- model menu -->
<div class="offcanvas offcanvas-start offcanvas-mobile-menu" tabindex="-1" id="offcanvasMenu"
    aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body p-0">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        NEW
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse bg-item-menu" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">

                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed line-menu-1-mobile" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                    aria-expanded="false" aria-controls="flush-collapseOne">
                                    SHOP NEW
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse box-item-2-menu"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">

                                <a href="" class="line-menu-2-mobile">SHOP MENU 1</a>
                                <a href="" class="line-menu-2-mobile">SHOP MENU 2</a>

                            </div>
                        </div>

                    </div>
                    <a href="" class="line-menu-1-mobile">SHOP NOW</a>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                        NEW 2
                    </button>
                </h2>
                <div id="collapse2" class="accordion-collapse collapse bg-item-menu" aria-labelledby="heading2"
                    data-bs-parent="#accordionExample">

                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-heading1">
                                <button class="accordion-button collapsed line-menu-1-mobile" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapse1" aria-expanded="false"
                                    aria-controls="flush-collapse1">
                                    SHOP NEW
                                </button>
                            </h2>
                            <div id="flush-collapse1" class="accordion-collapse collapse box-item-2-menu"
                                aria-labelledby="flush-heading1" data-bs-parent="#accordionFlushExample">

                                <a href="" class="line-menu-2-mobile">SHOP MENU 1</a>
                                <a href="" class="line-menu-2-mobile">SHOP MENU 2</a>

                            </div>
                        </div>

                    </div>
                    <a href="" class="line-menu-1-mobile">SHOP NOW 2</a>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                        NEW 3
                    </button>
                </h2>
                <div id="collapse3" class="accordion-collapse collapse bg-item-menu" aria-labelledby="heading3"
                    data-bs-parent="#accordionExample">

                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headings1">
                                <button class="accordion-button collapsed line-menu-1-mobile" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-headings1" aria-expanded="false"
                                    aria-controls="flush-headings1">
                                    SHOP NEW 3
                                </button>
                            </h2>
                            <div id="flush-headings1" class="accordion-collapse collapse box-item-2-menu"
                                aria-labelledby="flush-headings1" data-bs-parent="#accordionFlushExample">

                                <a href="" class="line-menu-2-mobile">SHOP MENU 1</a>
                                <a href="" class="line-menu-2-mobile">SHOP MENU 2</a>

                            </div>
                        </div>

                    </div>
                    <a href="" class="line-menu-1-mobile">SHOP NOW 3</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- model search -->
<div class="offcanvas offcanvas-end w-100 border-0" tabindex="-1" id="offcanvasSearchRight"
    aria-labelledby="offcanvasSearchRightLabel">
    <div class="offcanvas-header p-0 d-flex justify-content-between align-items-center">
        <div class="position-relative w-100">
            <input type="text" class="input-search-menu-mobile" placeholder="Search for products">
            <img src="{{ asset('assets/image/search.svg') }}" class="icon-search-menu-mobile">
        </div>
        <img src="{{ asset('assets/image/xmark.svg') }}" data-bs-dismiss="offcanvas" aria-label="Close"
            style="width: 23px;margin-left: 13px;margin-right: 13px;">
    </div>
    <div class="offcanvas-body" style="padding: 24px;">
        <p style="font-weight: 600;color: black;margin-bottom: 10px;">Popular Searches</p>
        <div class="d-flex flex-column">
            <a href="" class="item-search-hot">bohdi</a>
            <a href="" class="item-search-hot">crocs</a>
        </div>
    </div>
</div>

<!-- Modal Cart -->
<div class="offcanvas offcanvas-end offcanvas-end-cart" tabindex="-1" id="offcanvasRightCart"
    aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header offcanvas-header-cart">
        <h5 class="offcanvas-title offcanvas-title-cart" id="offcanvasRightLabel">ITEMS IN YOUR CART</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body body-cart">
        <p class="title-top">CONGRATULATIONS!</p>
        <p class="content-top">You Qualify for Free Standard Shipping!</p>
        <div class="line-row-top"></div>
        <div class="d-flex justify-content-between align-items-center pb-2"
            style="border-bottom: 1px solid #dcdcdc; padding: 0 15px;">
            <span>300.000 VND</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 22 22">
                <g id="Icon_Check_Status" data-name="Icon Check Status" transform="translate(1 1)">
                    <circle id="Ellipse_38" data-name="Ellipse 38" cx="10" cy="10" r="10"
                        fill="#47c979" stroke="#47c979" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2"></circle>
                    <g id="Icon_check" data-name="Icon check" transform="translate(6 7)">
                        <path id="check" d="M13,6,6.813,13,4,9.818" transform="translate(-4 -6)" fill="#47c979"
                            stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                    </g>
                </g>
            </svg>
        </div>
        <div class="box-product-cart">
            <div class="item-product-cart">
                <div class="mini-cart-name"><a href="#">Z/1
                        Adjustable Strap Classic Sandal</a></div>
                <div class="mini-cart-product-block">
                    <div class="mini-cart-image"><a
                            href="https://www.chacos.com/on/demandware.store/Sites-chacos_us-Site/default/Product-Show?pid=195020165102">
                            <img src="https://s7d4.scene7.com/is/image/WolverineWorldWide/CHAM-JCH108835-031523-S24-000?$dw-checkoutcartthm$&amp;fmt=jpeg"
                                alt="">
                        </a></div>
                    <div class="mini-cart-product-details">
                        <div class="mini-cart-attributes">
                            <div class="attribute"><span class="value " tabindex="0">Color: Deco Nutshell</span>
                            </div>
                            <div class="attribute"><span class="value " tabindex="0" aria-label="Size">Size: 8
                                    M</span></div>
                        </div>
                        <div class="item-sku-number">Item #195020165102 </div>
                        <div class="mini-cart-action"><span class="item-edit-details-checkout"></span><a
                                class="spc-edit-product" href="#">Edit</a><span
                                class="action-divider">|</span><a href="#" class="mini-cart-product-remove"
                                title="Remove" aria-label="Search-Show">Remove</a></div>
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
                                    data-field="quantity"><img src="{{ asset('asset/img/cartqty-minus-new.png') }}"
                                        alt="Remove Quantity" class="offers-icon"></button>
                            </span>
                            <input type="number" class="value input-quantity-sp" readonly
                                id="mini-cart-quantity-value-0" value="1">
                            <span>
                                <button type="button" class="quantity-plus btn-quantity-sp"
                                    data-field="quantity"><img src="{{ asset('assets/image/cartqty-plus-new.png') }}"
                                        alt="Add Quantity" class="offers-icon"></button>
                            </span>
                        </div>
                    </div>
                    <div class="mini-cart-price-subtotal">
                        <div class="label">Subtotal</div>
                        <div class="mini-cart-price-each"><span class="mini-cart-price">$105.00</span></div>
                    </div>
                </div>
            </div>

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
                    <button class="mini-cart-link-checkout cta-primary">View
                        Cart</button>
                </div>
            </div>
        </div>
    </div>
</div>
