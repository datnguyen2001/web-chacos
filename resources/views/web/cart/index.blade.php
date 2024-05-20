@extends('web.index')
@section('title', 'Giỏ hàng')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
@stop
{{-- content of page --}}
@section('content')
    <div class="primary-focus responsive box-cart" style="margin-top: 8rem" id="cart-items">
        <div id="primary" class="primary-content">
            <div class="wrapper" id="checkout-bs-nav">
                <ol class="stepper">
                    <li class="stepper__item stepper__current__state" aria-current="step">
                        <span class="stepper__title">Giỏ hàng</span>
                    </li>
                    <li class="stepper__item">
                        <span class="stepper__title">Thanh toán</span>
                    </li>
                    <li class="stepper__item">
                        <span class="stepper__title">Hoàn thành</span>
                    </li>
                </ol>
            </div>
            <div class="title-hold">
                <h1 class="title-big-cart">Giỏ hàng</h1>
                <a href="{{ route('home') }}" style="color: #303030;font-size: 12px">
                    < Tiếp tục mua sắm </a>
            </div>

            <div class="cart-empty">
                <div id="cart-items-spinner" class="text-center mt-3">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <div class="cart-content">
                </div>
            </div>

        </div>
        <div id="secondary" class="nav">
            <a href="#" class="btn-checkout-cart checkout-cart-active">
                Thanh toán
            </a>
            <div id="cart-total-spinner" class="w-100 text-center my-3">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div class="cart-orders-total-box cart-content">
                <h3 class="text-summary">Đơn hàng</h3>
                <table class="order-totals-table">
                    <tbody id="cart-total-table-content">
                    </tbody>
                </table>
            </div>
            <a href="#" class="btn-checkout-cart">
                Thanh toán
            </a>

        </div>
    </div>

    {{-- Relate product --}}
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
@endsection

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

    <script>
        function populateCartContent(data) {
            var cartItems = $('.cart-empty').find('.cart-content')
            cartItems.empty()

            var cartIsEmpty = `
                    <div id="empty-cart-icon" class="w-100 d-flex justify-content-center">
                        <img src="{{ asset('assets/image/icon-empty-cart.svg') }}" alt="">
                    </div>
                    <p class="text-empty">Giỏ hàng của bạn đang trống!</p>`

            if (data.error != 0) {
                cartItems.append(cartIsEmpty)
                return
            }

            if (data.carts.length <= 0) {
                cartItems.append(cartIsEmpty)
                return
            }

            let carts = data.carts
            let total = formatMoney(data.total)

            var cartTotalTableContent = $('#cart-total-table-content')
            cartTotalTableContent.empty()

            let couponCode = data.coupon

            let cartTable = `
                    <table id="cart-table" class="item-list" role="presentation table">
                        <tbody id="cart-table-content">
                        </tbody>
                    </table>`

            cartItems.append(cartTable)

            var cartTableContent = $('#cart-table').find('#cart-table-content')
            cartTableContent.empty()

            carts.forEach(function(cart, index) {
                // productInfo -> id để lưu vào cart cookie
                // productId   -> id của sản phẩm
                var productInfo = cart.info
                var productId = cart.id
                var productName = cart.product
                var productSlug = cart.slug
                var color = cart.color
                var thumbnail = cart.thumbnail
                var size = cart.size
                var quantity = cart.quantity
                var price = formatMoney(cart.price)
                var subTotal = formatMoney(cart.sub_total)

                let productDetailUrl = `{{ route('detail-product', ['slug' => ':slug']) }}`
                productDetailUrl = productDetailUrl.replace(':slug', productSlug)

                var cartItemContent = `
                        <tr class="cart-row bfx-product">
                            <td class="cart-row-product-name">
                                <div class="name">
                                    <a href="${productDetailUrl}">
                                        ${productName}
                                    </a>
                                </div>
                            </td>
                            <td class="item-image">
                                <a href="${productDetailUrl}"
                                    title="${productName}">
                                    <img src="${thumbnail}" class="bfx-product-image">
                                </a>
                            </td>
                            <td class="item-name bfx-product-name">
                                <div class="clear"></div>
                                <div class="item-details ">
                                    <div class="attribute">
                                        <span class="value " tabindex="0">
                                            <span class="value bfx-product-color">
                                                Màu: ${color}
                                            </span>
                                        </span>
                                    </div>
                                    <span class="value " tabindex="0">
                                        Kích cỡ:
                                    </span>
                                    <span class="value " tabindex="0">
                                        <span class="value bfx-product-size">
                                            ${size}
                                        </span>
                                    </span>
                                    <div class="sku" tabindex="0">
                                        <span class="attribute-label">Item #: </span>
                                        <span class="value bfx-sku">${productId}</span>
                                    </div>
                                    <div class="item-edit-details">
                                        <a type="button" onclick="removeProductCart('${productInfo}')"
                                            class="button-text remove-item mx-1" title="Remove">
                                            <span class="remove-button-text">Xóa</span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="item-price">
                                <p class="item-style">Mỗi SP</p>
                                <span class="price-sales bfx-price bfx-list-price" tabindex="0">${price}</span>
                                <div class="box-cart-mobile">
                                    <p class="item-style mt-1">Số lượng</p>
                                    <div class="quantity-wrapper">
                                        <button type="button" class="quantity-minus"
                                            onclick="updateQuantity('${productInfo}', -1)">
                                            <img src="{{ asset('assets/image/cartqty-minus-new.png') }}" alt="Remove Quantity">
                                        </button>
                                        <input type="number" class="cart_lineitem_quantity quantity-number"
                                            id="mini-cart-quantity-value-${productInfo}"
                                            name="dwfrm_cart_shipments_i0_items_i0_quantity" size="4"
                                            maxlength="3" value="${quantity}" readonly>
                                        <button type="button" class="quantity-plus"
                                            onclick="updateQuantity('${productInfo}', 1)">
                                            <img src="{{ asset('assets/image/cartqty-plus-new.png') }}" alt="Add Quantity">
                                        </button>
                                    </div>
                                    <p class="item-style mt-2">Tạm tính</p>
                                    <span class="price-total bfx-price bfx-product-subtotal">
                                        <span class="price-sales bfx-price bfx-list-price" tabindex="0">
                                            ${subTotal}
                                        </span>
                                    </span>
                                </div>
                            </td>
                            <td class="item-quantity bfx-product-qty ">
                                <p class="item-style">Số lượng</p>
                                <div class="quantity-wrapper">
                                    <button type="button" class="quantity-minus"
                                        onclick="updateQuantity('${productInfo}', -1)">
                                        <img src="{{ asset('assets/image/cartqty-minus-new.png') }}" alt="Remove Quantity">
                                    </button>
                                    <input type="number" class="cart_lineitem_quantity quantity-number" 
                                        id="mini-cart-quantity-value-${productInfo}"
                                        name="dwfrm_cart_shipments_i0_items_i0_quantity" size="4"
                                        maxlength="3" value="${quantity}" readonly>
                                    <button type="button" class="quantity-plus"
                                        onclick="updateQuantity('${productInfo}', 1)">
                                        <img src="{{ asset('assets/image/cartqty-plus-new.png') }}" alt="Add Quantity">
                                    </button>
                                </div>
                            </td>
                            <td class="item-total">
                                <p class="item-style">Tạm tính</p>
                                <span class="price-total bfx-price bfx-product-subtotal">
                                    <span class="price-sales bfx-price bfx-list-price" tabindex="0">
                                        ${subTotal}
                                    </span>
                                </span>
                            </td>
                        </tr>`

                cartTableContent.append(cartItemContent)
            });

            var cartCouponContent = `
                    <div class="accordion accordion-code" id="accordionExample">
                        <div class="accordion-item accordion-item-infor">
                            <h2 class="accordion-header">
                                <button class="accordion-button accordion-button-code collapsed btn-infor-more"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                    aria-expanded="flase" aria-controls="collapseOne">
                                    Có mã khuyến mãi?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body accordion-body-apply-code mb-3">
                                    <div class="box-apply-code">
                                        <input id="coupon-value" type="text" class="input-code-apply" value=${couponCode}>
                                        <button class="btn-apply-code" onclick="handleCoupon()">Áp dụng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`

            cartItems.append(cartCouponContent)

            var cartTotalContent = `
                    <tr class="order-subtotal">
                        <td>Tạm tính tổng cộng</td>
                        <td class="textalign-right">${total}</td>
                    </tr>
                    <tr class="order-shipping" tabindex="0">
                        <td>
                            Phí ship
                        </td>
                        <td class="textalign-right">
                            0 đ
                        </td>
                    </tr>
                    <tr class="order-sales-tax" tabindex="0">
                        <td>
                            Thuế
                        </td>
                        <td class="textalign-right">
                            0 đ
                        </td>
                    </tr>
                    <tr class="order-total" tabindex="0">
                        <td>Thành tiền</td>
                        <td class="textalign-right">${total}</td>
                    </tr>`

            cartTotalTableContent.append(cartTotalContent)
        }


        function fetchCartItems() {
            fetch('{{ route("get.cart.data") }}') // Replace with the actual route to your controller method
                .then(response => response.json())
                .then(data => {
                    // Handle the response data and populate the modal content
                    populateCartContent(data)
                })
                .catch(error => {
                    // Handle the error case
                    console.error(error)
                });

            setTimeout(function() {
                $('#cart-items-spinner').hide()
                $('#cart-total-spinner').hide()
                $('.cart-content').show()
            }, 1000)
        }
    </script>

    <script>
        //Load cart page
        $(document).ready(function() {
            fetchCartItems()
        });
    </script>

@endsection
