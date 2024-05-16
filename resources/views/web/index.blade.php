<!doctype html>
<html lang="vi">

<head>
    <meta name="google-site-verification" content="googleeacc2166ce777ac3.html" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title')</title>
    <link href="{{ asset('assets/image/logo.png') }}" rel="icon">
    <link href="{{ asset('assets/image/logo.png') }}" rel="apple-touch-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @yield('style_page')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

    @include('web.partials.header')
    @yield('menu-contact')
    <main class="main">
        @yield('content')
    </main>
    @yield('contact-us')
    @include('web.partials.footer')


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @yield('script_page')
    <script src="{{ asset('assets/js/index.js') }}"></script>

    <script>
        function populateModalContent(data) {
            var cartContent = $('#cartContent').find('.box-product-cart')
            cartContent.empty()

            var cartIsEmpty = `
                <div class="d-flex justify-content-center mt-5">
                    GIỎ HÀNG CỦA BẠN ĐANG TRỐNG
                </div>`


            if (data.error != 0) {
                $('#cartHeader').empty()
                cartContent.append(cartIsEmpty)
                return
            }

            if (data.carts.length <= 0) {
                $('#cartHeader').empty()
                cartContent.append(cartIsEmpty)
                return
            }

            let carts = data.carts
            let total = formatMoney(data.total)

            let couponCode = data.coupon

            var cartHeader = $('#cartHeader')
            cartHeader.empty()

            var cartHeaderContent = `
                <p class="title-top">CHÚC MỪNG!</p>
                <p class="content-top">BẠN ĐÃ ĐỦ ĐIỀU KIỆN ĐỂ ĐƯỢC FREE SHIP!</p>
                <div class="line-row-top"></div>
                <div class="d-flex justify-content-between align-items-center pb-2"
                    style="border-bottom: 1px solid #dcdcdc; padding: 0 15px;">
                    <span style="margin-right:5px">${total}</span>
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
                </div>`

            cartContent.append(cartHeaderContent)

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
                <div class="item-product-cart" id="cart-item-${productInfo}">
                    <div class="mini-cart-name">
                        <a href="${productDetailUrl}">${productName}</a>
                    </div>
                    <div class="mini-cart-product-block">
                        <div class="mini-cart-image">
                            <a href="${productDetailUrl}"><img src="${thumbnail}" alt=""></a>
                        </div>
                        <div class="mini-cart-product-details">
                            <div class="mini-cart-attributes">
                                <div class="attribute">
                                    <span class="value" tabindex="${index}">${color}</span>
                                </div>
                                <div class="attribute">
                                    <span class="value" tabindex="${index}" aria-label="Size">${size}</span>
                                </div>
                            </div>
                            <div class="item-sku-number">Item #${productId} </div>
                            <div class="mini-cart-action">
                                <span class="item-edit-details-checkout"></span>
                                <a class="spc-edit-product" href="#">Edit</a>
                                <span class="action-divider">|</span>
                                <a href="#" class="mini-cart-product-remove" title="Remove" aria-label="Search-Show">Remove</a>
                            </div>
                            <div class="mini-cart-messaging"></div>
                        </div>
                    </div>
                    <div class="mini-cart-pricing">
                        <div class="mini-cart-price-each">
                            <div class="label" aria-label="Each" aria-labelledby="mini-cartprice-value-label-${index}">
                                Each
                            </div>
                            <span id="mini-cart-price-value-label-${index}" class="mini-cart-price bfx-price" data-price="${price}">
                                ${price}
                            </span>
                        </div>
                        <div class="quantity-main-wrapper">
                            <div class="label" aria-labelledby="mini-cartprice-value-label-${index}">
                                Quantity
                            </div>
                            <div class="quantity-wrapper">
                                <span>
                                    <button type="button" class="quantity-minus btn-quantity-sp" data-field="quantity" 
                                        onclick="updateQuantity('${productInfo}', -1)">
                                        <img src="{{ asset('assets/image/cartqty-minus-new.png') }}" alt="Remove Quantity" class="offers-icon">
                                    </button>
                                </span>
                                <input type="number" class="value input-quantity-sp" readonly id="mini-cart-quantity-value-${productInfo}" value="${quantity}">
                                <span>
                                    <button type="button" class="quantity-plus btn-quantity-sp" data-field="quantity" 
                                        onclick="updateQuantity('${productInfo}', 1)">
                                        <img src="{{ asset('assets/image/cartqty-plus-new.png') }}" alt="Add Quantity" class="offers-icon">
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="mini-cart-price-subtotal">
                            <div class="label">Subtotal</div>
                            <div class="mini-cart-price-each">
                                <span class="mini-cart-price">${subTotal}</span>
                            </div>
                        </div>
                    </div>
                </div>`

                cartContent.append(cartItemContent)
            });

            var cartCouponContent = `
            <div class="accordion accordion-flush accordion-flush-discount" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed accordion-button-discount" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                            aria-controls="flush-collapseOne">
                            Thêm khuyến mãi hoặc giảm giá
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body accordion-body-discount">
                            <input id="coupon-value" type="text" class="input-discount" placeholder="Nhập mã giảm giá" value="${couponCode}">
                            <button class="btn-up-code" onclick="handleCoupon()">Áp dụng</button>
                        </div>
                    </div>
                </div>
            </div>`

            cartContent.append(cartCouponContent)

            var cartAction = `
            <div class="MiniCart__Padding24">
                <h3 class="MiniCart__FooterTotal">
                    <span class="MiniCart__FooterTotalTitle">
                        Total
                    </span>
                    <span class="MiniCart__FooterTotalPrice">
                        ${total}
                    </span>
                </h3>
                <button class="mini-cart-link-checkout cta-primary">
                    Checkout
                </button>
                <div class="MiniCart__FooterViewCart">
                    <button class="mini-cart-link-checkout cta-primary">
                        <a href="{{ route('cart') }}" style="color: white">
                            View Cart
                        </a>
                    </button>
                </div>
            </div>`

            cartContent.append(cartAction)
        }

        function formatMoney(amount) {
            return amount.toLocaleString('vi-VN', {
                style: 'currency',
                currency: 'VND'
            });
        }

        function fetchDataCart() {
            fetch('{{ route('get.cart.data') }}') // Replace with the actual route to your controller method
                .then(response => response.json())
                .then(data => {
                    // Handle the response data and populate the modal content
                    populateModalContent(data);
                })
                .catch(error => {
                    // Handle the error case
                    console.error(error);
                });

            setTimeout(function() {
                $('#spinner').hide();
                $('#cartContent').show();
            }, 1000);
        }
    </script>

    <script>
        function handleCoupon() {
            var couponInput = $('#coupon-value').val();

            // Check if the new quantity is a positive value
            if (typeof couponInput === 'string' && couponInput !== '') {
                // Make an AJAX request to update the cart item quantity
                $.ajax({
                    url: '{{ route('update.cart.coupon') }}',
                    method: 'PUT',
                    dataType: 'json',
                    data: {
                        coupon: couponInput
                    },
                    success: function(response) {
                        if (response.error == 0) {
                            toastr.success(response.message)
                            fetchDataCart();
                        }
                    },
                    error: function(error) {
                        if (error.responseJSON.error == -1) {
                            toastr.error(error.responseJSON.message)
                        }
                    }
                });
            } else {
                toastr.error("Mã giảm giá không hợp lệ")
            }
        }

        function updateQuantity(productInfo, quantityChange) {
            var quantityInput = $('#mini-cart-quantity-value-' + productInfo);
            var currentQuantity = parseInt(quantityInput.val());
            var newQuantity = currentQuantity + quantityChange;

            // Check if the new quantity is a positive value
            if (newQuantity > 0) {
                // Make an AJAX request to update the cart item quantity
                $.ajax({
                    url: '{{ route('update.cart.quantity') }}',
                    method: 'PUT',
                    dataType: 'json',
                    data: {
                        product_info: productInfo,
                        quantity: newQuantity
                    },
                    success: function(response) {
                        if (response.error == 0) {
                            toastr.success(response.message)
                            quantityInput.val(newQuantity);
                            fetchDataCart();
                        }
                    },
                    error: function(error) {
                        if (error.responseJSON.error == -1) {
                            toastr.error(error.responseJSON.message)
                        }
                    }
                });
            } else if (newQuantity == 0) {
                //Remove cart
                if (confirm('Bạn muốn xóa sản phẩm này khỏi giỏ hàng?')) {
                    $.ajax({
                        url: '{{ route('remove.product.cart') }}',
                        method: 'DELETE',
                        dataType: 'json',
                        data: {
                            product_info: productInfo,
                        },
                        success: function(response) {
                            if (response.error == 0) {
                                toastr.success(response.message)
                                $('#cart-item-' + productInfo).remove()
                                fetchDataCart();
                            }
                        },
                        error: function(error) {
                            if (error.responseJSON.error == -1) {
                                toastr.error(error.responseJSON.message)
                            }
                        }
                    });
                }

            } else {
                toastr.error("Some thing went wrong");
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            //HANDLE CART OPEN REFRESH
            $('#offcanvasRightCart').on('shown.bs.offcanvas', function() {
                // Fetch cart data
                fetchDataCart();
            });

            //HANDLE CART CLOSE RETURN SPINNER
            $('#offcanvasRightCart').on('hidden.bs.offcanvas', function() {
                $('#spinner').show();
                $('#cartContent').hide();
            });
        });
    </script>
</body>

</html>
