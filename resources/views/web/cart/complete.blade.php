@extends('web.index')
@section('title', 'Thanh toán thành công')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
@stop
{{-- content of page --}}
@section('content')
    <div class="primary-focus responsive box-cart" style="margin-top: 8rem">
        <div id="primary" class="primary-content w-100">
            <div class="wrapper" id="checkout-bs-nav">
                <ol class="stepper">
                    <li class="stepper__item stepper__current__state" aria-current="step">
                        <span class="stepper__title">Đơn hàng</span>
                    </li>
                    <li class="stepper__item stepper__current__state">
                        <span class="stepper__title">Thủ tục thanh toán</span>
                    </li>
                    <li class="stepper__item stepper__current__state">
                        <span class="stepper__title">Hoàn thành</span>
                    </li>
                </ol>
            </div>
            <div class="cart-empty">
                <img src="{{ asset('assets/image/complete.gif') }}" style="width: 300px">
                <p class="text-complete">Đặt hàng thành công</p>
                <p class="text-center">Đơn hàng của quý khách đã được đặt thành công với mã đơn
                    <strong>{{ $trackingCode }}</strong>. <br>Chúng tôi sẽ sớm giao hàng cho quý khách.</p>
                <a href="{{ route('home') }}" class="link-back-home">Tiếp tục mua hàng</a>
            </div>

        </div>
    </div>
@stop
@section('script_page')

@stop
