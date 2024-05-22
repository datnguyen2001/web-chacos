@extends('web.index')
@section('title', 'Chỉnh sửa tài khoản')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/css/account.css') }}">
@stop
{{-- content of page --}}
@section('content')
    <div class="box-my-account" style="max-width: 1400px">
        <div class="line-header-menu-page">
            <a href="{{ route('home') }}" class="title-header-menu-page">Trang chủ</a>
            <span style="margin: 0 5px;">/</span>
            <a href="{{ route('my-account') }}" class="title-header-menu-page">Tài khoản của tôi</a>
        </div>
        <div class="box-content-my-account" style="width: 110%">
            <div class="box-left-account">
                <a href="{{ route('my-account') }}" class="link-page-account">Tài khoản của tôi</a>
                <a href="{{ route('edit-account') }}" class="link-page-account">Chỉnh sửa tài khoản</a>
                <a href="{{ route('address-account') }}" class="link-page-account">Địa chỉ</a>
                <a href="{{ route('order-history') }}" class="link-page-account">Lịch sử đơn hàng</a>
                <a href="{{ route('logout') }}" class="link-page-account">Đăng xuất</a>
            </div>
            <div class="box-right-account" style="width: 100%">
                <div class="line-title-my-account">
                    <p class="title-account">LỊCH SỬ ĐƠN HÀNG</p>
                </div>
                <div class="row ">
                    <div class="col-xl-8 col-lg-7 col-12">
                        <!-- card -->
                        <div class="card">
                            <!-- card header -->
                            <div class="card-header border-bottom-0">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div>
                                        <!-- heading -->
                                        <h4 class="mb-1">Mã đơn hàng: <strong>{{ $tracking_code }}</strong></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <!-- Table -->
                                <table class="table mb-0 text-nowrap">
                                    <!-- Table Head -->
                                    <thead class="table-light">
                                        <tr>
                                            <th>Products</th>
                                            <th>Items</th>
                                            <th>Amounts</th>
                                        </tr>
                                    </thead>
                                    <!-- tbody -->
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-inherit">
                                                    <div class="d-lg-flex">
                                                        <div>
                                                            <img width="200" src="/storage/product/tbyN1Uu0Blvi1s1vGGJvCFR5lSiQ30WpU3xCqz7k.png"
                                                                alt="" class="img-4by3-md rounded">
                                                        </div>
                                                        <div class="ms-lg-4 mt-2 mt-lg-0">
                                                            <h5 class="mb-0">
                                                                White &amp; Red Nike Athletic Shoe
                                                            </h5>
                                                            <span class="text-body">SKU: <span>Shoe01</span></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>1</td>
                                            <td>$120.00</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-inherit">
                                                    <div class="d-lg-flex">
                                                        <!-- img -->
                                                        <div>
                                                            <img width="200" src="/storage/product/tbyN1Uu0Blvi1s1vGGJvCFR5lSiQ30WpU3xCqz7k.png"
                                                                alt="" class="img-4by3-md rounded">
                                                        </div>
                                                        <div class="ms-lg-4 mt-2 mt-lg-0">
                                                            <!-- heading -->
                                                            <h5 class="mb-0">
                                                                Wayfarer Styled Sunglasses
                                                            </h5>
                                                            <!-- body -->
                                                            <span class="text-body">SKU: <span>Glasses01</span> </span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>1</td>
                                            <td>$220.00
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-bottom-0 pb-0"></td>
                                            <td colspan="1" class="fw-medium text-dark border-bottom-0 pb-0">
                                                <!-- text -->
                                                Sub Total :
                                            </td>
                                            <td class="fw-medium text-dark border-bottom-0 pb-0 text-end">
                                                <!-- text -->
                                                $340.00
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-bottom-0 pb-0"></td>
                                            <td colspan="1" class="fw-medium text-dark border-bottom-0 pb-0">
                                                <!-- text -->
                                                Discount (GKDIS15%) :
                                            </td>
                                            <td class="fw-medium text-dark border-bottom-0 pb-0 text-end">
                                                <!-- text -->
                                                -$51.00
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-bottom-0 pb-0"></td>
                                            <td colspan="1" class="fw-medium text-dark border-bottom-0 pb-0">
                                                <!-- text -->
                                                Shipping Charge :
                                            </td>
                                            <td class="fw-medium text-dark border-bottom-0 pb-0 text-end">
                                                <!-- text -->
                                                $15.00
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-bottom-0"></td>
                                            <td colspan="1" class="fw-semibold text-dark ">
                                                <!-- text -->
                                                Tax Vat 19% (included) :
                                            </td>
                                            <td class="fw-semibold text-dark text-end">
                                                <!-- text -->
                                                $64.00
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="1" class="fw-semibold text-dark ">
                                                <!-- text -->
                                                Paid by Customer
                                            </td>
                                            <td class="fw-semibold text-dark text-end">
                                                <!-- text -->
                                                $368.00
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- card -->
                        <div class="card mt-4">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="d-md-flex justify-content-between align-items-center mb-5">
                                    <div>
                                        <!-- text -->
                                        <h4 class="mb-3 mb-md-0">Order Status</h4>
                                    </div>
                                    <div>
                                        <!-- button -->
                                        <a href="#" class="btn btn-light-primary btn-sm text-primary">Change
                                            Address</a>
                                        <a href="#" class="btn btn-light-danger btn-sm text-danger ms-2">Cancel Order
                                        </a>
                                    </div>
                                </div>
                                <div>
                                    <!-- List group -->
                                    <ul class="list-group list-group-flush list-timeline-activity">
                                        <li class="list-group-item px-0 pt-0 border-0 mb-4">
                                            <div class="row">
                                                <!-- col -->
                                                <div class="col-auto">
                                                    <div
                                                        class="icon-shape icon-md rounded-circle bg-primary text-white position-relative z-1">
                                                        <i class="fe fe-shopping-cart"></i>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col ms-n2 mt-1">
                                                    <h4 class="mb-3">Order Placed </h4>
                                                    <h5 class="mb-0">An order has been placed.</h5>
                                                    <span class="fs-6 text-muted">Wed, 15 April 2022 at 4:30 pm</span>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- List group -->
                                        <li class="list-group-item px-0 pt-0  border-0 mb-4">
                                            <div class="row">
                                                <!-- col -->
                                                <div class="col-auto">
                                                    <div
                                                        class="icon-shape icon-md rounded-circle bg-primary text-white position-relative z-1">
                                                        <i class="fe fe-shopping-bag"></i>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col ms-n2 mt-1">
                                                    <h4 class="mb-3">Packed Thu, 16 April 2022 </h4>
                                                    <h5 class="mb-0">Your Item has been picked up by courier patner</h5>
                                                    <span class="fs-6 text-muted">Wed, 15 April 2022 at 4:30 pm</span>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- List group -->
                                        <li class="list-group-item px-0 pt-0  border-0 mb-4">
                                            <div class="row">
                                                <!-- col -->
                                                <div class="col-auto">
                                                    <div
                                                        class="icon-shape icon-md rounded-circle bg-primary text-white position-relative z-1">
                                                        <i class="fe fe-box"></i>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col ms-n2 mt-1">
                                                    <h4 class="mb-3">Shipping Thu, 16 April 2022 </h4>
                                                    <h5 class="mb-1">BlueDart Logistics GEEK3214566 </h5>
                                                    <h5 class="mb-1"> Your item has been shipped.</h5>
                                                    <span class="fs-6 text-muted">Thu, 16 April 2022 at 5:00 pm</span>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- List group -->
                                        <li class="list-group-item px-0 pt-0  border-0">
                                            <div class="row">
                                                <!-- col -->
                                                <div class="col-auto">
                                                    <div
                                                        class="icon-shape icon-md rounded-circle bg-light-primary text-primary position-relative z-1">
                                                        <i class="fe fe-gift"></i>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col ms-n2 mt-1">
                                                    <h4 class="mb-0">Delivered </h4>
                                                    <h5 class="mb-1">Order has been successfully delivered </h5>
                                                    <span class="fs-6 text-muted">Thu, 17 April 2022 at 9:50am</span>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- List group -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5  col-12">
                        <!-- card -->
                        <div class="card mb-4 mt-4 mt-lg-0">
                            <!-- card body -->
                            <div class="card-body">
                                <!-- heading -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="mb-0">Customer</h4>
                                    <a href="#">View Profile</a>
                                </div>
                                <div class="d-flex align-items-center">
                                    <!-- img -->
                                    <img src="../../../assets/images/avatar/avatar-12.jpg"
                                        class="avatar-lg rounded-circle" alt="">
                                    <div class="ms-3">
                                        <!-- title -->
                                        <h4 class="mb-0">Harold Gonzalez</h4>
                                        <div>
                                            <span>Customer since April 5,2022</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card body -->
                            <div class="card-body border-top">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <!-- text -->
                                    <h4 class="mb-0">Contact</h4>
                                    <a href="#">Edit</a>
                                </div>
                                <div>
                                    <!-- text -->
                                    <div class="d-flex align-items-center mb-2"><i
                                            class="fe fe-mail text-muted fs-4"></i><a href="#"
                                            class="ms-2">haroldonzalez@gmail.com</a></div>
                                    <div class="d-flex align-items-center"><i
                                            class="fe fe-phone text-muted fs-4"></i><span class="ms-2">+(000) 123465
                                            987</span></div>
                                </div>
                            </div>
                            <!-- card body -->
                            <div class="card-body border-top">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="mb-0">Shipping Address</h4>
                                    <a href="#">Edit</a>
                                </div>
                                <div>
                                    <!-- address -->
                                    <p class="mb-0">3812 Orchard Street <br>
                                        Bloomington,<br>
                                        Minnesota 55431,<br>
                                        United States<br>
                                        +(000) 123465 987</p>
                                </div>
                            </div>
                            <!-- card body -->
                            <div class="card-body border-top">
                                <div class=" mb-3">
                                    <!-- heading -->
                                    <h4 class="mb-0">Billing Address</h4>
                                </div>
                                <div>
                                    <!-- address -->
                                    <p class="mb-0">3812 Orchard Street <br>
                                        Bloomington,<br>
                                        Minnesota 55431,<br>
                                        United States<br>
                                        +(000) 123465 987</p>
                                </div>
                            </div>
                        </div>
                        <!-- card -->
                        <div class="card">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="mb-3">
                                    <h4 class="mb-0">Payment Details</h4>
                                </div>
                                <!-- text -->
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span>Transactions:</span>
                                    <span class="text-dark">#GK444TO10000</span>
                                </div>
                                <!-- text -->
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span>Payment Method:
                                    </span>
                                    <span class="text-dark">Credit Card</span>
                                </div>
                                <!-- text -->
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span>Card Holder Name:
                                    </span>
                                    <span class="text-dark">Harold Gonzalez</span>
                                </div>
                                <!-- text -->
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span>Card Number:
                                    </span>
                                    <span class="text-dark">xxxx xxxx xxxx 6779</span>
                                </div>
                                <!-- text -->
                                <div class="d-flex align-items-center justify-content-between">
                                    <span>Total Amount:
                                    </span>
                                    <span class="text-dark fw-bold">$368.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script_page')

@stop
