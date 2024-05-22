@extends('web.index')
@section('title', 'Chỉnh sửa tài khoản')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/css/account.css') }}">
@stop
{{-- content of page --}}
@section('content')
    <div class="box-my-account">
        <div class="line-header-menu-page">
            <a href="{{ route('home') }}" class="title-header-menu-page">Trang chủ</a>
            <span style="margin: 0 5px;">/</span>
            <a href="{{ route('my-account') }}" class="title-header-menu-page">Tài khoản của tôi</a>
            <span style="margin: 0 5px;">/</span>
            <a href="{{ route('order-history') }}" class="title-header-menu-page">Lịch sử đơn hàng</a>
        </div>
        <div class="box-content-my-account">
            <div class="box-left-account">
                <a href="{{ route('my-account') }}" class="link-page-account">Tài khoản của tôi</a>
                <a href="{{ route('edit-account') }}" class="link-page-account">Chỉnh sửa tài khoản</a>
                <a href="{{ route('address-account') }}" class="link-page-account">Địa chỉ</a>
                <p class="title-menu-child-account">Lịch sử đơn hàng ></p>
                <a href="{{ route('logout') }}" class="link-page-account">Đăng xuất</a>
            </div>
            <div class="box-right-account">
                <div class="line-title-my-account">
                    <p class="title-account">LỊCH SỬ ĐƠN HÀNG</p>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        @forelse ($orders as $order)
                            <div class="mb-8">
                                <div class="border-bottom mb-3 pb-3 d-lg-flex align-items-center justify-content-between ">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="mb-0">Đơn hàng</h4>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a class="fs-5"
                                            href="{{ route('order-detail', ['tracking_code' => $order->tracking_code]) }}"><strong>#{{ $order->tracking_code }}</strong></a>
                                    </div>
                                </div>
                                @foreach ($order->orderDetails as $detail)
                                    <div class="row justify-content-between align-items-center">
                                        <!-- Img -->
                                        <div class="col-lg-3 col-12 d-grid">
                                            <img height="120" width="200"
                                                src="{{ $detail->productInfo->color->image }}" alt=""
                                                class="img-4by3-xl rounded">
                                        </div>
                                        <div class="col-lg-8 col-12">
                                            <div class="d-md-flex flex-row-reverse">
                                                <div class="ms-md-4 mt-2 mt-lg-0 text-end">
                                                    <!-- Tên sp -->
                                                    <h5 class="mb-1">
                                                        {{ $detail->productInfo->color->product->name ?? 'N/A' }}
                                                    </h5>
                                                    <!-- Màu sắc -->
                                                    <span>
                                                        Màu:
                                                        <span class="text-dark">
                                                            {{ $detail->productInfo->color->name ?? 'N/A' }}
                                                        </span>
                                                    </span>
                                                    <br />
                                                    <!-- Kích cỡ -->
                                                    <span>
                                                        Kích cỡ:
                                                        <span class="text-dark">
                                                            {{ $detail->productInfo->name ?? 'N/A' }}
                                                        </span>
                                                    </span>
                                                    <br />
                                                    <!-- Số lượng -->
                                                    <span>
                                                        Số lượng:
                                                        <span class="text-dark">
                                                            {{ $detail->quantity ?? 'N/A' }}
                                                        </span>
                                                    </span>
                                                    <!-- Giá tiền -->
                                                    <div class="mt-3">
                                                        <h5>{{ number_format($detail->price, 0, ',', '.') }} đ
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-3" style="border-style: dotted">
                                    </div>
                                @endforeach
                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- Img -->
                                    <div>
                                        <h5 class="fw-bold">{{ count($order->orderDetails) }} sản phẩm</h5>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold">Thành tiền:
                                            {{ number_format($order->grand_total, 0, ',', '.') }} đ
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                        @empty
                            <p class="content-item-account">Không có mục nào trong danh sách này.</p>
                        @endforelse
                    </div>
                </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
@stop

@section('script_page')

@stop
