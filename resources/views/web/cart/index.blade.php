@extends('web.index')
@section('title','Giỏ hàng')

@section('style_page')
    <link rel="stylesheet" href="{{asset('assets/css/cart.css')}}">
@stop
{{--content of page--}}
@section('content')
    <div class="primary-focus responsive box-cart">
        <div id="primary" class="primary-content">
            <div class="wrapper" id="checkout-bs-nav">
                <ol class="stepper">
                    <li class="stepper__item stepper__current__state" aria-current="step">
                        <span class="stepper__title">Cart</span>
                    </li>
                    <li class="stepper__item">
                        <span class="stepper__title">Checkout</span>
                    </li>
                    <li class="stepper__item">
                        <span class="stepper__title">Complete</span>
                    </li>
                </ol>
            </div>
            <div class="title-hold">
                <h1 class="title-big-cart">Shopping Cart</h1>
                <a href="{{route('home')}}" style="color: #303030;font-size: 12px">
                    < Continue Shopping
                </a>
            </div>
            {{--            view khi cart rỗng--}}
            {{--            <div class="cart-empty">--}}
            {{--                <div id="empty-cart-icon">--}}
            {{--                    <img src="{{asset('assets/image/icon-empty-cart.svg')}}" alt="">--}}
            {{--                </div>--}}
            {{--                <p class="text-empty">Your cart is empty!</p>--}}
            {{--            </div>--}}

            <div class="cart-empty">
                <table id="cart-table" class="item-list" role="presentation table">
                    <tbody>
                    <tr class="cart-row bfx-product">
                        <td class="cart-row-product-name">
                            <div class="name">
                                <a href="">Women's
                                    Z/1 Adjustable Strap Classic Sandal</a>
                            </div>
                        </td>
                        <td class="item-image">
                            <a href=""
                               title="Women's Z/1 Adjustable Strap Classic Sandal">
                                <img
                                    src="https://s7d4.scene7.com/is/image/WolverineWorldWide/CHAW-JCH109140-022521-S22-000?$dw-cartthm$"
                                    class="bfx-product-image">
                            </a>
                        </td>
                        <td class="item-name bfx-product-name">
                            <div class="clear"></div>
                            <div class="item-details ">
                                <div class="attribute">
                                    <span class="value " tabindex="0">
                                    <span class="value bfx-product-color">
                                        Color: Burnt Umber
                                    </span>
                                    </span>
                                </div>
                                <span class="value " tabindex="0">
                                    Size:
                                </span>
                                <span class="value " tabindex="0">
                                <span class="value bfx-product-size">
                                    10
                                </span>
                                </span>
                                <span class="value " tabindex="0">
                                    Medium
                                <span class="visually-hidden label bfx-product-attributes-label" aria-hidden="true">
                                    Width
                                </span>
                                <span class="visually-hidden value bfx-product-attributes-value" aria-hidden="true">
                                    Medium
                                </span>
                                </span>
                                <div class="sku" tabindex="0">
                                    <span class="attribute-label">Item #: </span><span class="value bfx-sku">195020166246</span>
                                </div>
                                <div class="item-edit-details">
                                    <a class="item-edit-details"
                                       href=""
                                       aria-label="Edit Women's Z/1 Adjustable Strap Classic Sandal">
                                        Edit
                                    </a>
                                    <a href="" class="button-text remove-item mx-1" title="Remove">
                                        <span class="remove-button-text">Remove</span>
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="item-price">
                            <p class="item-style">Each</p>
                            <span class="price-sales bfx-price bfx-list-price" tabindex="0">$105.00</span>
                            <div class="box-cart-mobile">
                                <p class="item-style mt-1">Quantity</p>
                                <div class="quantity-wrapper">
                                    <button class="quantity-minus"><img
                                            src="{{asset('assets/image/cartqty-minus-new.png')}}"
                                            alt="Remove Quantity"></button>
                                    <input type="number" class="cart_lineitem_quantity quantity-number"
                                           id="cart_lineitem_quantity_24105W"
                                           name="dwfrm_cart_shipments_i0_items_i0_quantity" size="4" maxlength="3"
                                           value="3">
                                    <button class="quantity-plus"><img
                                            src="{{asset('assets/image/cartqty-plus-new.png')}}"
                                            alt="Add Quantity"></button>
                                </div>
                                <p class="item-style mt-2">Subtotal</p>
                                <span class="price-total bfx-price bfx-product-subtotal">
                                <span class="price-sales bfx-price bfx-list-price" tabindex="0">
                                    $315.00
                                </span>
                                </span>
                            </div>
                        </td>
                        <td class="item-quantity bfx-product-qty ">
                            <p class="item-style">Quantity</p>
                            <div class="quantity-wrapper">
                                <button class="quantity-minus"><img
                                        src="{{asset('assets/image/cartqty-minus-new.png')}}"
                                        alt="Remove Quantity"></button>
                                <input type="number" class="cart_lineitem_quantity quantity-number"
                                       id="cart_lineitem_quantity_24105W"
                                       name="dwfrm_cart_shipments_i0_items_i0_quantity" size="4" maxlength="3"
                                       value="3">
                                <button class="quantity-plus"><img
                                        src="{{asset('assets/image/cartqty-plus-new.png')}}"
                                        alt="Add Quantity"></button>
                            </div>
                        </td>
                        <td class="item-total">
                            <p class="item-style">Subtotal</p>
                            <span class="price-total bfx-price bfx-product-subtotal">
                            <span class="price-sales bfx-price bfx-list-price" tabindex="0">
                                $315.00
                            </span>
                            </span>
                        </td>
                    </tr>
                    <tr class="cart-row bfx-product">
                        <td class="cart-row-product-name">
                            <div class="name">
                                <a href="">Women's
                                    Z/1 Adjustable Strap Classic Sandal</a>
                            </div>
                        </td>
                        <td class="item-image">
                            <a href=""
                               title="Women's Z/1 Adjustable Strap Classic Sandal">
                                <img
                                    src="https://s7d4.scene7.com/is/image/WolverineWorldWide/CHAW-JCH109140-022521-S22-000?$dw-cartthm$"
                                    class="bfx-product-image">
                            </a>
                        </td>
                        <td class="item-name bfx-product-name">
                            <div class="clear"></div>
                            <div class="item-details ">
                                <div class="attribute">
                                    <span class="value " tabindex="0">
                                    <span class="value bfx-product-color">
                                        Color: Burnt Umber
                                    </span>
                                    </span>
                                </div>
                                <span class="value " tabindex="0">
                                    Size:
                                </span>
                                <span class="value " tabindex="0">
                                <span class="value bfx-product-size">
                                    10
                                </span>
                                </span>
                                <span class="value " tabindex="0">
                                    Medium
                                <span class="visually-hidden label bfx-product-attributes-label" aria-hidden="true">
                                    Width
                                </span>
                                <span class="visually-hidden value bfx-product-attributes-value" aria-hidden="true">
                                    Medium
                                </span>
                                </span>
                                <div class="sku" tabindex="0">
                                    <span class="attribute-label">Item #: </span><span class="value bfx-sku">195020166246</span>
                                </div>
                                <div class="item-edit-details">
                                    <a class="item-edit-details"
                                       href=""
                                       aria-label="Edit Women's Z/1 Adjustable Strap Classic Sandal">
                                        Edit
                                    </a>
                                    <a href="" class="button-text remove-item mx-1" title="Remove">
                                        <span class="remove-button-text">Remove</span>
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="item-price">
                            <p class="item-style">Each</p>
                            <span class="price-sales bfx-price bfx-list-price" tabindex="0">$105.00</span>
                            <div class="box-cart-mobile">
                                <p class="item-style mt-1">Quantity</p>
                                <div class="quantity-wrapper">
                                    <button class="quantity-minus"><img
                                            src="{{asset('assets/image/cartqty-minus-new.png')}}"
                                            alt="Remove Quantity"></button>
                                    <input type="number" class="cart_lineitem_quantity quantity-number"
                                           id="cart_lineitem_quantity_24105W"
                                           name="dwfrm_cart_shipments_i0_items_i0_quantity" size="4" maxlength="3"
                                           value="3">
                                    <button class="quantity-plus"><img
                                            src="{{asset('assets/image/cartqty-plus-new.png')}}"
                                            alt="Add Quantity"></button>
                                </div>
                                <p class="item-style mt-2">Subtotal</p>
                                <span class="price-total bfx-price bfx-product-subtotal">
                                <span class="price-sales bfx-price bfx-list-price" tabindex="0">
                                    $315.00
                                </span>
                                </span>
                            </div>
                        </td>
                        <td class="item-quantity bfx-product-qty ">
                            <p class="item-style">Quantity</p>
                            <div class="quantity-wrapper">
                                <button class="quantity-minus"><img
                                        src="{{asset('assets/image/cartqty-minus-new.png')}}"
                                        alt="Remove Quantity"></button>
                                <input type="number" class="cart_lineitem_quantity quantity-number"
                                       id="cart_lineitem_quantity_24105W"
                                       name="dwfrm_cart_shipments_i0_items_i0_quantity" size="4" maxlength="3"
                                       value="3">
                                <button class="quantity-plus"><img
                                        src="{{asset('assets/image/cartqty-plus-new.png')}}"
                                        alt="Add Quantity"></button>
                            </div>
                        </td>
                        <td class="item-total">
                            <p class="item-style">Subtotal</p>
                            <span class="price-total bfx-price bfx-product-subtotal">
                            <span class="price-sales bfx-price bfx-list-price" tabindex="0">
                                $315.00
                            </span>
                            </span>
                        </td>
                    </tr>

                    </tbody>
                </table>
                <div class="accordion accordion-code" id="accordionExample">
                    <div class="accordion-item accordion-item-infor">
                        <h2 class="accordion-header">
                            <button class="accordion-button accordion-button-code collapsed btn-infor-more" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="flase" aria-controls="collapseOne">
                                Có mã khuyến mãi?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body accordion-body-apply-code mb-3">
                                <div class="box-apply-code">
                                    <input type="text" class="input-code-apply">
                                    <button class="btn-apply-code">Áp dụng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div id="secondary" class="nav">
            <a href="" class="btn-checkout-cart checkout-cart-active">
                Checkout
            </a>
            <div class="cart-orders-total-box">
                <h3 class="text-summary">Order Summary</h3>
                <table class="order-totals-table">
                    <tbody>
                    <tr class="order-subtotal">
                        <td>Subtotal</td>
                        <td class="textalign-right">$0.00</td>
                    </tr>
                    <tr class="order-shipping" tabindex="0">
                        <td>
                            Shipping
                        </td>
                        <td class="textalign-right">
                            TBD
                        </td>
                    </tr>
                    <tr class="order-sales-tax" tabindex="0">
                        <td>
                            Sales Tax
                        </td>
                        <td class="textalign-right">
                            TBD
                        </td>
                    </tr>
                    <tr class="order-total" tabindex="0">
                        <td>Estimated Total</td>
                        <td class="textalign-right">$0.00</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <a href="" class="btn-checkout-cart">
                Checkout
            </a>

        </div>
    </div>
    <div class="primary-focus responsive box-cart mt-0 mb-5 flex-column">
        <h1 class="title-you-like">Có thể bạn thích</h1>
        <div class="swiper alsoSwiper m-0" id="primary">
            <div class="swiper-wrapper">
                <a href="{{ route('detail-product') }}" class="swiper-slide">
                    <img src="{{ asset('assets/image/sp1.png') }}" alt="" class="w-100">
                    <div class="name-product-also">WOMEN'S ZX/2® CLASSIC SANDAL</div>
                    <div class="d-flex align-items-center">
                        <div class="price-product-also-sale">$305.00</div>
                        <div class="price-product-also">$105.00</div>
                    </div>

                </a>
                <a href="{{ route('detail-product') }}" class="swiper-slide">
                    <img src="{{ asset('assets/image/sp1.png') }}" alt="" class="w-100">
                    <div class="name-product-also">WOMEN'S ZX/2® CLASSIC SANDAL
                    </div>
                    <div class="price-product-also">$105.00</div>
                </a>
                <a href="{{ route('detail-product') }}" class="swiper-slide">
                    <img src="{{ asset('assets/image/sp1.png') }}" alt="" class="w-100">
                    <div class="name-product-also">WOMEN'S ZX/2® CLASSIC SANDAL
                    </div>
                    <div class="price-product-also">$105.00</div>
                </a>
                <a href="{{ route('detail-product') }}" class="swiper-slide">
                    <img src="{{ asset('assets/image/sp1.png') }}" alt="" class="w-100">
                    <div class="name-product-also">WOMEN'S ZX/2® CLASSIC SANDAL
                    </div>
                    <div class="price-product-also">$105.00</div>
                </a>
            </div>
        </div>
    </div>
@stop
@section('script_page')
    <script>
        var swiper = new Swiper(".alsoSwiper", {
            spaceBetween: 30,
            autoplay: {
                delay: 5000,
            },
            breakpoints: {
                768: {
                    slidesPerView: 3.5,
                    navigation: false,
                },
                300: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                },
            },
        });
    </script>
@stop
