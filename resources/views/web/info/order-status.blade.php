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
        <p class="title-page-order-status">View the status of an order by entering your order number and billing zip code
            below.<br />
            To view a complete order history you must log in.</p>
        <p class="title-bold-page-order-status">Get the status of a single order</p>
        <div class="">
            <label for="dwfrm_ordertrack_orderNumber" class="row-label">
                <span class="required-indicator" aria-label="required field">*</span>
                <span class="field-name" id="dwfrm_ordertrack_orderNumber_label">
               Order Number
            </span>
            </label>
            <input class="input-text required" id="dwfrm_ordertrack_orderNumber" type="text"
                   name="dwfrm_ordertrack_orderNumber" value="" maxlength="25">
        </div>
    </div>
@stop
@section('contact-us')
    @include('web.partials.contact-us')
@stop
@section('script_page')
    <script src="{{asset('assets/js/home.js')}}"></script>
@stop
