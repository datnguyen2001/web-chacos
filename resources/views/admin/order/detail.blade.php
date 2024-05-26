@php
    use App\Enums\OrderDeliveryStatus;
@endphp
@extends('admin.layout.index')
@section('title', 'Order ' . $tracking_code)

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css" />

    <style>
        .container-xxl {
            max-width: 1560px;
        }

        .avatar {
            width: 40px;
            min-width: 40px;
            height: 40px;
        }

        .avatar.no-thumbnail {
            background-color: #E0E0E0;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .row-deck>.col,
        .row-deck>[class*='col-'] {
            display: flex;
            align-items: stretch;
        }

        .row-deck>.col .card,
        .row-deck>[class*='col-'] .card {
            flex: 1 1 auto;
        }

        .card .card-header {
            background-color: transparent;
            border-bottom: none;
        }

        .product-cart .checkout-coupon-total.checkout-coupon-total-2 .checkout-total {
            width: 30%;
        }

        .product-cart .checkout-coupon-total .checkout-total {
            width: 50%;
            border-left: 1px solid #f0f0f0;
        }

        .product-cart .checkout-coupon-total.checkout-coupon-total-2 .checkout-total .single-total {
            justify-content: space-between;
        }

        .product-cart .checkout-coupon-total .checkout-total .single-total {
            display: flex;
            padding: 0 8px;
        }

        .product-cart .checkout-coupon-total .checkout-total .single-total .value {
            font-weight: 300;
            font-size: 14px;
            line-height: 32px;
            margin-right: 16px;
        }

        .product-cart .checkout-coupon-total.checkout-coupon-total-2 .checkout-total .single-total .price {
            width: auto;
        }

        .product-cart .checkout-coupon-total .checkout-total .single-total .price {
            font-weight: 500;
            font-size: 16px;
            line-height: 32px;
        }

        .product-cart .checkout-coupon-total .checkout-total .single-total.total-payable {
            border-top: 1px solid #f0f0f0;
        }

        .product-cart .checkout-coupon-total .checkout-total .single-total.total-payable .value {
            font-weight: 500;
        }

        .product-cart .checkout-coupon-total.checkout-coupon-total-2 .checkout-total .single-total .price {
            width: auto;
        }

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
@endsection

@section('main')
    <main id="main" class="main d-flex flex-column justify-content-center">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="text-black fw-bold mb-0">Chi tiết đơn hàng: #{{ $tracking_code }}</h3>
                        @if (
                            $order->delivery_status != OrderDeliveryStatus::CANCEL &&
                                $order->delivery_status != OrderDeliveryStatus::COMPLETE &&
                                !$order->cancelled_at &&
                                !$order->cancelled_reason &&
                                !$order->completed_at)
                            <a type="button" data-bs-toggle="modal" data-bs-target="#confirmChangeOrderStatus" class="btn btn-outline-success">
                                @if ($order->delivery_status == OrderDeliveryStatus::PENDING)
                                    Xác nhận đơn hàng
                                @elseif ($order->delivery_status == OrderDeliveryStatus::ACCEPTED)
                                    Xác nhận vận chuyển
                                @elseif ($order->delivery_status == OrderDeliveryStatus::DELIVERED)
                                    Hoàn thành đơn hàng
                                @endif
                            </a>
                        @endif
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row g-3 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
                <div class="col">
                    <div class="alert-success alert mb-0">
                        <div class="d-flex align-items-center">
                            <div class="avatar rounded no-thumbnail bg-success text-light"><i
                                    class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i></div>
                            <div class="flex-fill ms-3 text-truncate">
                                <div class="h6 mb-0">Đơn hàng được tạo lúc</div>
                                <span class="small">
                                    {{ date('H:i d/m/Y', strtotime($order->created_at)) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="alert-danger alert mb-0">
                        <div class="d-flex align-items-center">
                            <div class="avatar rounded no-thumbnail bg-danger text-light"><i class="fa fa-user fa-lg"
                                    aria-hidden="true"></i></div>
                            <div class="flex-fill ms-3 text-truncate">
                                <div class="h6 mb-0">Tên người nhận</div>
                                <span
                                    class="small">{{ $shipping_address->first_name . ' ' . $shipping_address->last_name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="alert-warning alert mb-0">
                        <div class="d-flex align-items-center">
                            <div class="avatar rounded no-thumbnail bg-warning text-light"><i class="fa fa-envelope fa-lg"
                                    aria-hidden="true"></i></div>
                            <div class="flex-fill ms-3 text-truncate">
                                <div class="h6 mb-0">Email liên hệ</div>
                                <span class="small">{{ $order->users->email }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="alert-info alert mb-0">
                        <div class="d-flex align-items-center">
                            <div class="avatar rounded no-thumbnail bg-info text-light"><i class="fa fa-phone-square fa-lg"
                                    aria-hidden="true"></i></div>
                            <div class="flex-fill ms-3 text-truncate">
                                <div class="h6 mb-0">Số điện thoại</div>
                                <span class="small">{{ $shipping_address->phone }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row g-3 row-deck">
                <div class="col">
                    <div class="card auth-detailblock">
                        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold ">Địa chỉ giao hàng</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label col-6 col-sm-5">Địa chỉ:</label>
                                    <span><strong>{{ $shipping_address->address }}</strong></span>
                                </div>
                                <div class="col-12">
                                    <label class="form-label col-6 col-sm-5">Địa chỉ phụ:</label>
                                    <span><strong>{{ $shipping_address->address_2 != '' ? $shipping_address->address_2 : 'N/A' }}</strong></span>
                                </div>
                                <div class="col-12">
                                    <label class="form-label col-6 col-sm-5">Thành phố:</label>
                                    <span><strong>{{ $shipping_address->city }}</strong></span>
                                </div>
                                <div class="col-12">
                                    <label class="form-label col-6 col-sm-5">Số điện thoại:</label>
                                    <span><strong>{{ $shipping_address->phone }}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row g-3 mb-3">
                <div class="col-xl-12 col-xxl-8">
                    <div class="card">
                        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold ">Chi tiết đơn hàng</h6>
                        </div>
                        <div class="card-body">
                            <div class="product-cart">
                                <div class="checkout-table table-responsive" style="overflow: hidden">
                                    <div id="myCartTable_wrapper">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="myCartTable" class="table align-middle">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="text-center">
                                                                Ảnh sản phẩm
                                                            </th>
                                                            <th class="text-center">
                                                                Tên sản phẩm
                                                            </th>
                                                            <th class="text-center">
                                                                Số lượng
                                                            </th>
                                                            <th class="text-center">
                                                                Giá tiền
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($order->orderDetails as $detail)
                                                            <tr>
                                                                <td class="text-center">
                                                                    <img src="{{ $detail->productInfo->color->image }}"
                                                                        class="rounded lg" alt="Product" width="200"
                                                                        height="80">
                                                                </td>
                                                                <td>
                                                                    <a
                                                                        href="{{ route('detail-product', ['slug' => $detail->productInfo->color->product->slug]) }}">
                                                                        <h6 class="title">
                                                                            {{ $detail->productInfo->color->product->name ?? 'N/A' }}
                                                                        </h6>
                                                                    </a>
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
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $detail->quantity }}
                                                                </td>
                                                                <td class="text-center">
                                                                    <p class="price">
                                                                        {{ number_format($detail->price, 0, ',', '.') }} đ
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div
                                    class="checkout-coupon-total checkout-coupon-total-2 d-flex flex-wrap justify-content-end">
                                    <div class="checkout-total">
                                        <div class="single-total">
                                            <p class="value">
                                                Tạm tính :
                                            </p>
                                            <p class="price">
                                                {{ number_format($order->grand_total, 0, ',', '.') }} đ</p>
                                        </div>
                                        <div class="single-total">
                                            <p class="value">
                                                Phí ship:
                                            </p>
                                            <p class="price">
                                                {{ number_format($order->shipping_status, 0, ',', '.') }} đ
                                            </p>
                                        </div>
                                        <div class="single-total">
                                            <p class="value">Thuế:</p>
                                            <p class="price">{{ number_format($order->tax, 0, ',', '.') }} đ</p>
                                        </div>
                                        <div class="single-total total-payable">
                                            <p class="value">
                                                Tổng cộng:
                                            </p>
                                            <p class="price">
                                                {{ number_format($order->grand_total + $order->shipping_status + $order->tax, 0, ',', '.') }}
                                                đ
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-xxl-4">
                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold ">Trạng thái đơn hàng</h6>
                        </div>
                        <!-- card body -->
                        <div class="card-body">
                            <div class="d-md-flex justify-content-between align-items-center mb-5">
                                <div>
                                    <!-- text -->
                                    <h4 class="mb-3 mb-md-0">Trạng thái đơn hàng</h4>
                                </div>
                                @if ($order->delivery_status != OrderDeliveryStatus::CANCEL && !$order->cancelled_at && !$order->cancelled_reason && $order->delivery_status < OrderDeliveryStatus::DELIVERED)
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
                                                        class="fs-6 text-muted">{{ date('H:i d/m/Y', strtotime($order->delivered_at)) }}</span>
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
            </div> <!-- Row end  -->
        </div>

        <div class="modal fade" id="cancelOrderModal" tabindex="-1" aria-labelledby="cancelOrderModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form method="POST" action="{{ route('order-cancel', ['tracking_code' => $tracking_code]) }}">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="cancelOrderModalLabel">Bạn có chắc chắn muốn hủy đơn hàng này?
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
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

        <div class="modal fade" id="confirmChangeOrderStatus" tabindex="-1"
            aria-labelledby="confirmChangeOrderStatusLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('change-order-status', ['tracking_code' => $tracking_code]) }}">
                    @method("PUT")
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmChangeOrderStatusLabel">Bạn muốn thay đổi
                                trạng thái đơn hàng này?
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#myCartTable').DataTable({
                order: [],
                paging: false,
                info: false
            });
        });
    </script>
@endsection
