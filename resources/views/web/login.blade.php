@extends('web.index')
@section('title','Trang chủ')

@section('style_page')

@stop
{{--content of page--}}

@section('content')
    <div class="box-sgin-in">
        <div class="line-header-menu-page">
            <a href="{{route('home')}}" class="title-header-menu-page">Home</a>
            <span style="margin: 0 5px;">/</span>
            <a href="{{route('login')}}" class="title-header-menu-page">Login</a>
        </div>
        <div class="box-content-login-register">
            <div class="item-login-register">
                <p class="title-login-register">Login</p>
                <p class="content-login-register">If you are a registered user, please enter your email and password.</p>
                <label for="email-login" class="lable-login">Your Email</label>
                <input type="email" id="email-login" class="inpit-login">
                <label for="pass-login" class="lable-login">Password</label>
                <input type="email" id="pass-login" class="inpit-login">
                <div class="d-flex align-items-center">
                    <input class="input-checkbox" type="checkbox" name="dwfrm_login_rememberme" id="dwfrm_login_rememberme"
                           value="true">
                    <label for="dwfrm_login_rememberme" class="checkbox-label-login ">
                        Remember Me
                    </label>
                </div>
                <a href="" class="link-forgot-pass">Forgot Password?</a>
                <button class="btn-login">login</button>
            </div>
            <div class="item-login-register">
                <p class="title-login-register">Register Now</p>
                <p class="content-login-register">Benefits of creating an account</p>
                <ul>
                    <li><strong>Faster Checkout</strong> Store your payment methods and shipping addresses for later
                        use.<br><br></li>
                    <li><strong>Track Orders</strong> Save and review order history.<br><br></li>

                </ul>
                <p class="content-login-register">If you are under 18, you must have your parent or guardian's permission to
                    submit your personal information.</p>
                <p class="content-login-register">
                    <a href="" target="_blank" class="link-here">Click here</a> to read
                    our privacy policy.
                </p>
                <a href="{{route('registration')}}" class="btn-login">CREATE AN ACCOUNT NOW</a>
            </div>
        </div>
    </div>
@stop
@section('script_page')
    <script src="{{asset('assets/js/home.js')}}"></script>
@stop
