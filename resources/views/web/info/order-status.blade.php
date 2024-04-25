@extends('web.index')
@section('title','Trang chủ')

@section('style_page')

@stop
{{--content of page--}}
@section('menu-contact')
    @include('web.partials.menu-contact')
@stop
@section('content')
    <div class="content-contact-center">
        <p class="title-page-order-status">Xem trạng thái của đơn đặt hàng bằng cách nhập số đơn đặt hàng và mã zip thanh toán bên dưới.
            <br />
            Để xem toàn bộ lịch sử đơn hàng bạn phải đăng nhập .</p>
        <p class="title-bold-page-order-status">Get the status of a single order</p>
        <div class="">
            <label for="dwfrm_ordertrack_orderNumber" class="row-label">
                <span class="required-indicator" aria-label="required field">*</span>
                <span class="field-name" id="dwfrm_ordertrack_orderNumber_label">
               Mã đơn hàng
            </span>
            </label>
            <input class="input-text required" id="dwfrm_ordertrack_orderNumber" type="text"
                   name="dwfrm_ordertrack_orderNumber" value="" maxlength="25">

            <label for="dwfrm_ordertrack_orderNumber" class="row-label">
                <span class="required-indicator" aria-label="required field">*</span>
                <span class="field-name" id="dwfrm_ordertrack_orderNumber_label">
               Họ tên hoặc địa chỉ Email
            </span>
            </label>
            <input class="input-text required" id="dwfrm_ordertrack_orderNumber" type="text"
                   name="dwfrm_ordertrack_orderNumber" value="" maxlength="25">
            <button class="btn-kt-order">Kiểm tra trạng thái</button>
        </div>
    </div>
@stop
@section('contact-us')
    @include('web.partials.contact-us')
@stop
@section('script_page')
    <script src="{{asset('assets/js/home.js')}}"></script>
@stop
