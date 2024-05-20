<!doctype html>
<html lang="vi">

<head>
    <meta name="google-site-verification" content="googleeacc2166ce777ac3.html" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Mua hàng</title>
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

    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/checkout.css') }}">
</head>

<body>
    <div class="box-checkout">
        <div id="single-page-checkout-wrapper" class="row">
            <div id="spc-primary" class="col-xs-12 col-lg-7 col-md-6">
                <header class="spc-header">
                    <a href="{{ route('home') }}" class="spc-store-logo button-text spc-button-link"><img
                            src="{{ asset('assets/image/logo.png') }}">
                    </a>
                    <div class="spc-header-right">
                        <div class="spc-secure-checkout"><i class="fa-solid fa-lock"></i><span class="spc-badge-text"
                                tabindex="0">Secure Checkout</span></div>
                    </div>
                </header>
                <div class="wrapper option-1 option-1-1 " id="checkout-bs-nav">
                    <ol class="stepper">
                        <li class="stepper__item stepper__visited__state">
                            <a href="{{ route('cart') }}" class="stepper__title">
                                <span class="stepper__title">Giỏ hàng</span>
                            </a>
                        </li>
                        <li class="stepper__item stepper__current__state" aria-current="step">
                            <span class="stepper__title">
                                Mua hàng
                            </span>
                        </li>
                        <li class="stepper__item ">
                            <span class="stepper__title">
                                Hoàn thành
                            </span>
                        </li>
                    </ol>
                </div>
                <h2 class="spc-section-welcome">Chào mừng trở lại,<span class="spc-customer-name">
                        {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}!</span></h2>
                <div class="spc-loader-wrapper">
                    <div class="spc-section-heading row between-xs middle-xs container-fluid">
                        <h2 class="spc-section-heading-title">
                            Thông tin giao hàng    
                        </h2><span class="spc-section-heading-step">Bước 1 / 2</span>
                    </div>
                    @if ($addresses)
                        <div class="tt-select">
                            <select>
                                @foreach ($addresses as $key => $add)
                                    <option {{ $key == 0 ? 'selected' : '' }} value="{{ $add->id }}">
                                        {{ $add->address . ' | ' . $add->city }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="box-line-info">
                        <div class="label-float">
                            <input type="text" placeholder=" " required />
                            <label>TÊN</label>
                        </div>
                        <div class="label-float">
                            <input type="text" placeholder=" " required />
                            <label>HỌ</label>
                        </div>
                    </div>
                    <div class="box-line-info">
                        <div class="label-float">
                            <input type="text" placeholder=" " required />
                            <label>ĐỊA CHỈ</label>
                        </div>
                        <div class="label-float">
                            <input type="text" placeholder=" " />
                            <label>ĐỊA CHỈ PHỤ</label>
                        </div>
                    </div>
                    <div class="box-line-info">
                        <div class="label-float">
                            <input type="text" placeholder=" " required />
                            <label>THÀNH PHỐ</label>
                        </div>
                        <div class="label-float">
                            <input type="text" placeholder=" " required />
                            <label>SỐ ĐIỆN THOẠI</label>
                        </div>
                    </div>
                    <button
                        class="spc-continue-to-billing spc-button cta-primary shrink spc-button-fill spc-button-primary">
                        Tiếp tục thanh toán
                    </button>
                </div>
                <div class="spc-loader-wrapper">
                    <section class="spc-section spc-section__billing-empty" id="billing-section">
                        <div class="spc-section-heading row between-xs middle-xs container-fluid">
                            <h2 class="spc-section-heading-title">
                                Thông tin đơn hàng
                            </h2>
                            <span class="spc-section-heading-step">Bước 2 / 2</span>
                        </div>
                    </section>
                </div>
            </div>
            <div class="order-summary-container col-lg-5 col-md-6 col-xs-12">
                <div id="spc-secondary" class="order-summary">
                    <div class="order-summary-header" role="presentation">
                        <div class="order-summary-header-title">
                            <h2>Chi tiết đơn hàng</h2>
                        </div>
                        <div id="backToCartLink">
                            <a class="back-to-cart-anchor" href="{{ route('cart') }}">
                                Trở lại giỏ hàng
                            </a>
                            <a href="{{ route('cart') }}"
                                class="MiniCart__HeaderActions--cart icon-mini-cart position-relative"
                                title="View Cart">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                    viewBox="0 0 22 22">
                                    <g id="Cart" transform="translate(116.598 0.066)">
                                        <rect id="Rectangle" width="22" height="22"
                                            transform="translate(-116.598 -0.066)" fill="none" />
                                        <g id="Chaco_Cart" data-name="Chaco Cart"
                                            transform="translate(-116.598 -0.066)">
                                            <path id="Path_25" data-name="Path 25"
                                                d="M228.046,397.523a2.023,2.023,0,1,1-2.023-2.023,2.023,2.023,0,0,1,2.023,2.023"
                                                transform="translate(-219.55 -377.901)" fill="#004b58" />
                                            <path id="Path_26" data-name="Path 26"
                                                d="M410.046,397.523a2.023,2.023,0,1,1-2.023-2.023,2.023,2.023,0,0,1,2.023,2.023"
                                                transform="translate(-390.579 -377.901)" fill="#004b58" />
                                            <path id="Path_27" data-name="Path 27"
                                                d="M154.8,102.907h9.755a.4.4,0,0,0,.36-.234l4.046-8.5a.445.445,0,0,0-.015-.412.4.4,0,0,0-.341-.2H152.548l-.89-1.85a1.255,1.255,0,0,0-.448-.512,1.17,1.17,0,0,0-.637-.189H147v2.551h2.832l.38.787,3,6.3-1.853,3.606a2.665,2.665,0,0,0,.043,2.513,2.408,2.408,0,0,0,2.073,1.254h12.542v-2.551H153.475Z"
                                                transform="translate(-147.001 -91)" fill="#004b58" />
                                        </g>
                                    </g>
                                </svg>

                                <span class="mini-cart-quantity-bag">{{ count($carts) }}</span>
                            </a>
                        </div>
                    </div>
                    <div class="order-summary-content">
                        <div class="transitioner">
                            <div class="spc-loader-wrapper spc-loader-wrapper-sp">
                                <ul class="product-list">
                                    @foreach ($carts as $cart)
                                        <li class="product-item">
                                            <a href="{{ route('detail-product', ['slug' => $cart['slug']]) }}"
                                                class="product-item-name">
                                                <h3 class="spc-product-name">
                                                    {{ $cart['product'] }}
                                                </h3>
                                            </a>
                                            <div class="row product-item-container">
                                                <div class="product-image col-sm-6 col-xs-6">
                                                    <a href="{{ route('detail-product', ['slug' => $cart['slug']]) }}"
                                                        class="product-item-name">
                                                        <picture>
                                                            <img src="{{ $cart['thumbnail'] }}"
                                                                alt="{{ $cart['product'] }}">
                                                        </picture>
                                                    </a>
                                                </div>
                                                <div class="product-info container-fluid col-sm-6 col-xs-6">
                                                    <div class="row">
                                                        <div class="col-xs-12 full-xs">
                                                            <p tabindex="0">Màu sắc: {{ $cart['color'] }}</p>
                                                            <p>Kích cỡ: {{ $cart['size'] }}</p>
                                                            <p>Item #{{ $cart['id'] }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pt-20 productcarddetails-title">
                                                <div class="col-xs-4 col-sm-4 col-4 full-xs product-price-container">
                                                    <p>Mỗi SP</p>
                                                </div>
                                                <div
                                                    class="col-xs-4 col-sm-4 col-4 full-xs product-price-container text-center">
                                                    <p>Số lượng</p>
                                                </div>
                                                <div
                                                    class="col-xs-4 col-sm-4 col-4 full-xs product-price-container text-end">
                                                    <p>Tạm tính</p>
                                                </div>
                                            </div>
                                            <div class="row productcarddetails-value">
                                                <div class="col-xs-4 col-sm-4 col-4 full-xs product-price-container">
                                                    <div class="product-price">
                                                        {{ number_format($cart['price'], 0, ',', '.') }} đ
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-xs-4 col-sm-4 col-4 full-xs product-quantity-value text-center">
                                                    <p>{{ $cart['quantity'] }}</p>
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-4 full-xs product-price-container">
                                                    <div class="product-price-summary">
                                                        <div class="product-price-summary">
                                                            {{ number_format($cart['sub_total'], 0, '.', ',') }} đ
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row"></div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="totals-table">
                                @if ($couponCode)
                                    <table>
                                        <tr>
                                            <td>Mã giảm giá</td>
                                            <td class="text-end">
                                                {{ $couponCode }}
                                            </td>
                                        </tr>
                                    </table>
                                @endif
                                <table class="{{ $couponCode ? 'mt-0' : '' }}">
                                    <tr>
                                        <td>Tiêu chuẩn<br><span style="font-size: 13px;font-weight: 400">Giao hàng bởi Chaco</span></td>
                                        <td class="free-shipping text-end">Miễn phí</td>
                                    </tr>
                                </table>
                                <table class="mt-0">
                                    <tr>
                                        <td class="spc-sales-tax">Thuế</td>
                                        <td class="spc-sales-tax text-end">
                                            {{ number_format(0, 0, '.', ',') }} đ
                                        </td>
                                    </tr>
                                </table>
                                <table class="order-total">
                                    <tr>
                                        <td>Tổng tiền ({{ count($carts) }} Sản phẩm):</td>
                                        <td class="text-end">
                                            {{ number_format($total, 0, '.', ',') }} đ
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="spc-content-checkout-customer-help" class="spc-content-checkout-customer-help">
                        <div id="checkout-customer-help">

                            <div class="cart-banner-box">
                                <h2>Cần giúp đỡ?</h2>
                                <p><span class="visually-hidden">Call,</span> 1-888-211-1908</p>
                                <p>
                                    <span aria-hidden="true">Mon-Fri 8am-9pm ET, Sat–Sun 9am-6pm ET</span>
                                    <span class="visually-hidden">Monday through Friday from 8am to 9pm eastern time,
                                        and Saturday through Sunday from 9am to 6pm</span>
                                </p>
                                <div class="action-hold">
                                    <ul>
                                        <li>
                                            <a data-pipe="|" href="" target="_blank">Shipping
                                                Information</a>
                                        </li>
                                        <li>
                                            <a data-pipe="|" href="" target="_blank"> Free
                                                Returns</a>
                                        </li>
                                        <li>
                                            <a href="" target="_blank">Privacy
                                                Policy</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    <script>
        var x, i, j, selElmnt, a, b, c;
        x = document.getElementsByClassName("tt-select");

        for (i = 0; i < x.length; i++) {
            selElmnt = x[i].getElementsByTagName("select")[0];
            a = document.createElement("DIV");
            a.setAttribute("class", "select-selected");
            a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
            x[i].appendChild(a);
            b = document.createElement("DIV");
            b.setAttribute("class", "select-items select-hide");
            for (j = 0; j < selElmnt.length; j++) {
                /*for each option in the original select element,
                create a new DIV that will act as an option item:*/
                c = document.createElement("DIV");
                c.innerHTML = selElmnt.options[j].innerHTML;
                c.addEventListener("click", function(e) {
                    var y, i, k, s, h;
                    s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                    h = this.parentNode.previousSibling;
                    for (i = 0; i < s.length; i++) {
                        if (s.options[i].innerHTML == this.innerHTML) {
                            s.selectedIndex = i;
                            h.innerHTML = this.innerHTML;
                            y = this.parentNode.getElementsByClassName("same-as-selected");
                            for (k = 0; k < y.length; k++) {
                                y[k].removeAttribute("class");
                            }
                            this.setAttribute("class", "same-as-selected");
                            break;
                        }
                    }
                    h.click();
                });
                b.appendChild(c);
            }
            x[i].appendChild(b);
            a.addEventListener("click", function(e) {
                e.stopPropagation();
                closeAllSelect(this);
                this.nextSibling.classList.toggle("select-hide");
                this.classList.toggle("select-arrow-active");
            });
        }

        function closeAllSelect(elmnt) {
            var x, y, i, arrNo = [];
            x = document.getElementsByClassName("select-items");
            y = document.getElementsByClassName("select-selected");
            for (i = 0; i < y.length; i++) {
                if (elmnt == y[i]) {
                    arrNo.push(i)
                } else {
                    y[i].classList.remove("select-arrow-active");
                }
            }
            for (i = 0; i < x.length; i++) {
                if (arrNo.indexOf(i)) {
                    x[i].classList.add("select-hide");
                }
            }
        }
        document.addEventListener("click", closeAllSelect);
    </script>
</body>

</html>
