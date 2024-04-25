@extends('web.index')
@section('title','Giỏ hàng')

@section('style_page')
    <link rel="stylesheet" href="{{asset('assets/css/cart.css')}}">
@stop
{{--content of page--}}
@section('content')
    <div class="primary-focus responsive box-cart">
        <div id="primary" class="primary-content">
            <div class="wrapper" id="checkout-bs-nav">
                <ol class="stepper">
                    <li class="stepper__item stepper__current__state" aria-current="step">
                        <span class="stepper__title">Cart</span>
                    </li>
                    <li class="stepper__item">
                        <span class="stepper__title">Checkout</span>
                    </li>
                    <li class="stepper__item">
                        <span class="stepper__title">Review</span>
                    </li>
                    <li class="stepper__item">
                        <span class="stepper__title">Complete</span>
                    </li>
                </ol>
            </div>
            <div class="title-hold">
                <h1 class="title-big-cart">Shopping Cart</h1>
                <a href="{{route('home')}}" style="color: #303030;font-size: 12px">
                    < Continue Shopping
                </a>
            </div>
            <div class="cart-empty">
                <div id="empty-cart-icon">
                    <img src="{{asset('assets/image/icon-empty-cart.svg')}}" alt="">
                </div>
                <p class="text-empty">Your cart is empty!</p>
            </div>

        </div>
        <div id="secondary" class="nav">
            <a href="" class="btn-checkout-cart">
                Checkout
            </a>
            <div class="cart-orders-total-box">
                <h3 class="text-summary">Order Summary</h3>
                <table class="order-totals-table">
                    <tbody>
                    <tr class="order-subtotal" >
                        <td>Subtotal</td>
                        <td class="textalign-right">$0.00</td>
                    </tr>
                    <tr class="order-shipping" tabindex="0">
                        <td>
                            Shipping
                        </td>
                        <td class="textalign-right">
                            TBD
                        </td>
                    </tr>
                    <tr class="order-sales-tax" tabindex="0">
                        <td>
                            Sales Tax
                        </td>
                        <td class="textalign-right">
                            TBD
                        </td>
                    </tr>
                    <tr class="order-total" tabindex="0">
                        <td>Estimated Total</td>
                        <td class="textalign-right">$0.00</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <a href="" class="btn-checkout-cart">
                Checkout
            </a>

        </div>
    </div>
@stop
@section('script_page')

@stop
