@extends('web.index')
@section('title','Đăng nhập')

@section('style_page')
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
@stop
{{--content of page--}}

@section('content')
    <div class="box-sgin-in">
        <div class="line-header-menu-page">
            <a href="{{route('home')}}" class="title-header-menu-page">Trang chủ</a>
            <span style="margin: 0 5px;">/</span>
            <a href="{{route('login')}}" class="title-header-menu-page">Đăng nhập</a>
        </div>
        <div class="box-content-login-register">
            <div class="item-login-register">
                <p class="title-login-register">Đăng nhập</p>
                <p class="content-login-register">Nếu bạn là người dùng đã đăng ký, vui lòng nhập email và mật khẩu của bạn.</p>
                <label for="email-login" class="lable-login">Email của bạn</label>
                <input type="email" id="email-login" class="inpit-login">
                <label for="pass-login" class="lable-login">Mật khẩu</label>
                <input type="email" id="pass-login" class="inpit-login">
                <div class="d-flex align-items-center">
                    <input class="input-checkbox" type="checkbox" name="dwfrm_login_rememberme" id="dwfrm_login_rememberme"
                           value="true">
                    <label for="dwfrm_login_rememberme" class="checkbox-label-login ">
                        Remember Me
                    </label>
                </div>
                <a href="" class="link-forgot-pass">Quên mật khẩu?</a>
                <button class="btn-login">Đăng nhập</button>
            </div>
            <div class="item-login-register">
                <p class="title-login-register">Đăng ký ngay</p>
                <p class="content-login-register">Lợi ích của việc tạo tài khoản</p>
                <ul>
                    <li><strong>Thanh toán nhanh hơn</strong> Lưu trữ các phương thức thanh toán và địa chỉ giao hàng của bạn để sử dụng sau.<br><br></li>
                    <li><strong>Theo dõi đơn hàng</strong> Lưu và xem lại lịch sử đơn hàng.<br><br></li>

                </ul>
                <p class="content-login-register">Nếu bạn dưới 18 tuổi, bạn phải có sự cho phép của cha mẹ hoặc người giám hộ để gửi thông tin cá nhân của bạn.</p>
{{--                <p class="content-login-register">--}}
{{--                    <a href="" target="_blank" class="link-here">Click here</a> to read--}}
{{--                    our privacy policy.--}}
{{--                </p>--}}
                <a href="{{route('registration')}}" class="btn-login btn-dk">Tạo tài khoản ngay</a>
            </div>
        </div>
    </div>
@stop
@section('script_page')

@stop
