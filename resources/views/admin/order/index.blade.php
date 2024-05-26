@php
    use App\Enums\OrderDeliveryStatus;
@endphp
@extends('admin.layout.index')
@section('title', 'Order management')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css" />
@endsection

@section('main')
    <main id="main" class="main d-flex flex-column justify-content-center">
        <div class="">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Quản lý đơn đặt hàng</h1>

            <hr>

            <table class="table" id="tableListOrders">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Ngày nhận đơn</th>
                        <th scope="col" class="text-center">Mã đơn hàng</th>
                        <th scope="col" class="text-center">Khách hàng</th>
                        <th scope="col" class="text-center">Trạng thái đơn hàng</th>
                        <th scope="col" class="text-center">Tổng thu</th>
                        <th scope="col" class="text-center">Ngày hoàn thành</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $o)
                        <tr id="order-{{ $o->id }}">
                            <td class="text-center">
                                {{ date('H:i d/m/Y', strtotime($o->created_at)) }}
                            </td>
                            <td class="text-center">
                                <a target="_blank"
                                    href="{{ route('admin.order.detail', ['tracking_code' => $o->tracking_code]) }}">
                                    #{{ $o->tracking_code }}
                                </a>
                            </td>
                            <td class="text-center">
                                {{ $o->users->first_name . ' ' . $o->users->last_name }}
                            </td>
                            <td class="text-center">
                                @switch($o->delivery_status)
                                    @case(OrderDeliveryStatus::CANCEL)
                                        @if ($o->cancelled_at && $o->cancelled_reason)
                                            <span class="badge rounded-pill bg-danger">Đã hủy: {{ $o->cancelled_reason }}</span>
                                        @endif
                                    @break

                                    @case(OrderDeliveryStatus::PENDING)
                                        @if (!$o->cancelled_at && !$o->accepted_at && !$o->completed_at && !$o->delivered_at)
                                            <span class="badge rounded-pill bg-warning text-dark">Chờ xử lý</span>
                                        @endif
                                    @break

                                    @case(OrderDeliveryStatus::ACCEPTED)
                                        @if (!$o->cancelled_at && $o->accepted_at && !$o->completed_at && !$o->delivered_at)
                                            <span class="badge rounded-pill bg-info text-dark">Đã chấp nhận</span>
                                        @endif
                                    @break

                                    @case(OrderDeliveryStatus::DELIVERED)
                                        @if (!$o->cancelled_at && $o->accepted_at && $o->delivered_at && !$o->completed_at)
                                            <span class="badge rounded-pill bg-primary">Đang giao hàng</span>
                                        @endif
                                    @break

                                    @case(OrderDeliveryStatus::COMPLETE)
                                        @if (!$o->cancelled_at && $o->accepted_at && $o->delivered_at && $o->completed_at)
                                            <span class="badge rounded-pill bg-success">Đã hoàn thành</span>
                                        @endif
                                    @break

                                    @default
                                        <span class="badge rounded-pill bg-dark">Không rõ</span>
                                @endswitch
                            </td>
                            <td class="text-center">
                                {{ number_format($o->grand_total, 0, ',', '.') }} đ
                            </td>
                            <td class="text-center">
                                @if ($o->complete_at)
                                    {{ date('H:i d/m/Y', strtotime($o->complete_at)) }}
                                @else
                                    <i>NULL</i>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>
@endsection
@section('script')
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#tableListOrders').DataTable({
                order: []
            });
        });
    </script>
@endsection
