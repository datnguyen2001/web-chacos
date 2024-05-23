@php
    use App\Enums\OrderDeliveryStatus;
@endphp
@extends('web.index')
@section('title', 'Chỉnh sửa tài khoản')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/css/account.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <style>
        .icon-shape {
            height: 2.5rem;
            line-height: 2.5rem;
            width: 2.5rem;
            z-index: 1;
            align-items: center;
            display: inline-flex;
            justify-content: center;
            text-align: center;
            vertical-align: middle;
        }
    </style>
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
                                            <th>Sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <!-- tbody -->
                                    <tbody>
                                        @foreach ($order->orderDetails as $detail)
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-inherit">
                                                        <div class="d-lg-flex">
                                                            <div>
                                                                <img width="200"
                                                                    src="{{ $detail->productInfo->color->image }}"
                                                                    alt="" class="img-4by3-md rounded">
                                                            </div>
                                                            <div class="ms-lg-4 mt-2 mt-lg-0">
                                                                <h5 class="mb-0">
                                                                    {{ $detail->productInfo->color->product->name ?? 'N/A' }}
                                                                </h5>
                                                                <span class="text-body">
                                                                    Màu:
                                                                    <span>
                                                                        {{ $detail->productInfo->color->name ?? 'N/A' }}
                                                                    </span>
                                                                </span>
                                                                <br />
                                                                <span class="text-body">
                                                                    Kích cỡ:
                                                                    <span>
                                                                        {{ $detail->productInfo->name ?? 'N/A' }}
                                                                    </span>
                                                                </span>
                                                                <br />
                                                                <span class="text-body">
                                                                    Item:
                                                                    <span>
                                                                        #{{ $detail->productInfo->color->product->id ?? 'N/A' }}
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td>{{ $detail->quantity }}</td>
                                                <td>{{ number_format($detail->price, 0, ',', '.') }} đ</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td class="border-bottom-0 pb-0"></td>
                                            <td colspan="1" class="fw-medium text-dark border-bottom-0 pb-0">
                                                <!-- text -->
                                                Tạm tính :
                                            </td>
                                            <td class="fw-medium text-dark border-bottom-0 pb-0 text-end">
                                                <!-- text -->
                                                {{ number_format($order->grand_total, 0, ',', '.') }} đ
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-bottom-0 pb-0"></td>
                                            <td colspan="1" class="fw-medium text-dark border-bottom-0 pb-0">
                                                <!-- text -->
                                                Phí ship:
                                            </td>
                                            <td class="fw-medium text-dark border-bottom-0 pb-0 text-end">
                                                <!-- text -->
                                                {{ number_format($order->shipping_status, 0, ',', '.') }} đ
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-bottom-0 pb-0"></td>
                                            <td colspan="1" class="fw-medium text-dark border-bottom-0 pb-0">
                                                <!-- text -->
                                                Thuế:
                                            </td>
                                            <td class="fw-medium text-dark border-bottom-0 pb-0 text-end">
                                                <!-- text -->
                                                {{ number_format($order->tax, 0, ',', '.') }} đ
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="1" class="fw-semibold text-dark ">
                                                <!-- text -->
                                                Tổng cộng
                                            </td>
                                            <td class="fw-semibold text-dark text-end">
                                                <!-- text -->
                                                {{ number_format($order->grand_total + $order->shipping_status + $order->tax, 0, ',', '.') }}
                                                đ
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- card -->
                        <div class="card my-4">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="d-md-flex justify-content-between align-items-center mb-5">
                                    <div>
                                        <!-- text -->
                                        <h4 class="mb-3 mb-md-0">Trạng thái đơn hàng</h4>
                                    </div>
                                    @if ($order->delivery_status != OrderDeliveryStatus::CANCEL && !$order->cancelled_at && !$order->cancelled_reason)
                                        <div>
                                            <!-- button -->
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#cancelOrderModal"
                                                class="btn btn-light-danger btn-sm text-danger ms-2">Hủy đặt hàng
                                            </a>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <!-- List group -->
                                    <ul class="list-group list-group-flush list-timeline-activity">
                                        @if ($order->delivery_status == OrderDeliveryStatus::CANCEL && $order->cancelled_at && $order->cancelled_reason)
                                            <li class="list-group-item px-0 pt-0 border-0 mb-4">
                                                <div class="row">
                                                    <!-- col -->
                                                    <div class="col-auto">
                                                        <div
                                                            class="icon-shape icon-xl rounded-circle bg-danger text-white position-relative">
                                                            <i class="fa fa-xmark"></i>
                                                        </div>
                                                    </div>
                                                    <!-- col -->
                                                    <div class="col ms-n2 mt-1">
                                                        <h4 class="mb-3">Đơn hàng đã hủy</h4>
                                                        <h5 class="mb-0">Lý do: {{ $order->cancelled_reason }}</h5>
                                                        <span
                                                            class="fs-6 text-muted">{{ date('H:i d/m/Y', strtotime($order->cancelled_at)) }}</span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                        @if ($order->delivery_status >= OrderDeliveryStatus::PENDING && !$order->cancelled_at)
                                            <li class="list-group-item px-0 pt-0 border-0 mb-4">
                                                <div class="row">
                                                    <!-- col -->
                                                    <div class="col-auto">
                                                        <div
                                                            class="icon-shape icon-xl rounded-circle bg-success text-white position-relative">
                                                            <i class="fa fa-cart-shopping"></i>
                                                        </div>
                                                    </div>
                                                    <!-- col -->
                                                    <div class="col ms-n2 mt-1">
                                                        <h4 class="mb-3">Đã tạo đơn hàng</h4>
                                                        <span
                                                            class="fs-6 text-muted">{{ date('H:i d/m/Y', strtotime($order->created_at)) }}</span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                        <!-- List group -->
                                        @if ($order->delivery_status >= OrderDeliveryStatus::ACCEPTED && !$order->cancelled_at && $order->accepted_at)
                                            <li class="list-group-item px-0 pt-0  border-0 mb-4">
                                                <div class="row">
                                                    <!-- col -->
                                                    <div class="col-auto">
                                                        <div
                                                            class="icon-shape icon-md rounded-circle bg-success text-white position-relative z-1">
                                                            <i class="fa fa-bag-shopping"></i>
                                                        </div>
                                                    </div>
                                                    <!-- col -->
                                                    <div class="col ms-n2 mt-1">
                                                        <h4 class="mb-3">Đơn hàng được chấp nhận</h4>
                                                        <span
                                                            class="fs-6 text-muted">{{ date('H:i d/m/Y', strtotime($order->accepted_at)) }}</span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                        <!-- List group -->
                                        @if ($order->delivery_status >= OrderDeliveryStatus::DELIVERED && !$order->cancelled_at && $order->delivered_at)
                                            <li class="list-group-item px-0 pt-0  border-0 mb-4">
                                                <div class="row">
                                                    <!-- col -->
                                                    <div class="col-auto">
                                                        <div
                                                            class="icon-shape icon-md rounded-circle bg-success text-white position-relative z-1">
                                                            <i class="fa fa-truck-fast"></i>
                                                        </div>
                                                    </div>
                                                    <!-- col -->
                                                    <div class="col ms-n2 mt-1">
                                                        <h4 class="mb-3">Đơn hàng đã được giao</h4>
                                                        <span
                                                            class="fs-6 text-muted">{{ date('H:i d/m/Y', strtotime($order->delivery_at)) }}</span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                        <!-- List group -->
                                        @if ($order->delivery_status >= OrderDeliveryStatus::COMPLETE && !$order->cancelled_at && $order->completed_at)
                                            <li class="list-group-item px-0 pt-0  border-0">
                                                <div class="row">
                                                    <!-- col -->
                                                    <div class="col-auto">
                                                        <div
                                                            class="icon-shape icon-md rounded-circle bg-success text-white position-relative z-1">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                    </div>
                                                    <!-- col -->
                                                    <div class="col ms-n2 mt-1">
                                                        <h4 class="mb-0">Đơn hàng hoàn thành </h4>
                                                        <span
                                                            class="fs-6 text-muted">{{ date('H:i d/m/Y', strtotime($order->completed_at)) }}</span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
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
                                    <h4 class="mb-0">Khách hàng</h4>
                                </div>
                                @php
                                    $shippingInfo = json_decode($order->shipping_address);
                                @endphp
                                <div class="d-flex align-items-center">
                                    <div class="ms-3">
                                        <!-- title -->
                                        <h4 class="mb-0">
                                            {{ $shippingInfo->first_name . ' ' . $shippingInfo->last_name }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <!-- card body -->
                            <div class="card-body border-top">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <!-- text -->
                                    <h4 class="mb-0">Thông tin liên lạc</h4>
                                </div>
                                <div>
                                    <!-- text -->
                                    <div class="d-flex align-items-center"><i
                                            class="fe fe-phone text-muted fs-4"></i><span class="ms-2">SĐT:
                                            {{ $shippingInfo->phone }}</span></div>
                                </div>
                            </div>
                            <!-- card body -->
                            <div class="card-body border-top">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="mb-0">Địa chỉ nhận hàng</h4>
                                </div>
                                <div>
                                    <!-- address -->
                                    <p class="mb-0">{{ $shippingInfo->address }}
                                        {{ $shippingInfo->address_2 ? '(' . $shippingInfo->address_2 . ')' : '' }}<br>
                                        {{ $shippingInfo->city }},<br>
                                        {{ $shippingInfo->phone }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cancelOrderModal" tabindex="-1" aria-labelledby="cancelOrderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="{{ route('order-cancel', ['tracking_code' => $tracking_code]) }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cancelOrderModalLabel">Bạn có chắc chắn muốn hủy đơn hàng này?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating">
                            <textarea required name="reason" class="form-control" placeholder="Nhập lý do" id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Hãy cho chúng tôi biết lý do</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('script_page')

@stop
