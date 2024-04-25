@extends('web.index')
@section('title','Shipping')

@section('style_page')

@stop
{{--content of page--}}
@section('menu-contact')
    @include('web.partials.menu-contact')
@stop
@section('content')
    <div class="content-contact-center">
        <p class="title-contact-center">Shipping Information</p>
        <div class="contact-center-content">
            CREATE AN ACCOUNT
            Register today to enjoy fast and easy checkout. A chacos.com account allows you to store payment methods and
            addresses, check the status of orders, view your order history, select shopping preferences and save items in
            your shopping bag for up to 30 days.

            MANAGE ACCOUNT
            Login to change any of your account information including shipping and billing information, your preferred
            payment method and your preferences regarding receiving chacos.com emails.

            PASSWORD HELP
            Forgot your Password? No problem. Go to Your Account , there you can view your password hint or have your
            password emailed to you.

            MANAGE EMAIL PREFERENCES
            Go to your email preferences to manage your email updates or unsubscribe from chacos.com emails.
        </div>
    </div>
@stop
@section('contact-us')
    @include('web.partials.contact-us')
@stop
@section('script_page')
    <script src="{{asset('assets/js/home.js')}}"></script>
@stop
