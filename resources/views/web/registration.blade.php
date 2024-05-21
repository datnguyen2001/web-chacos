@extends('web.index')
@section('title', 'Đăng Ký')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
@stop
{{-- content of page --}}

@section('content')
    @php
        $url = parse_url(env('APP_URL'));
        $domain = isset($url['host']) ? $url['host'] : '';
    @endphp
    <div class="box-registration">
        <div class="line-header-menu-page">
            <a href="{{ route('home') }}" class="title-header-menu-page">Trang chủ</a>
            <span style="margin: 0 5px;">/</span>
            <a href="{{ route('registration') }}" class="title-header-menu-page">Đăng ký tài khoản</a>
        </div>
        <div class="box-content-reg">
            <div class="box-left-registration">
                <p class="title-menu-child-reg">Tài khoản</p>
                <a href="{{ route('login') }}" class="link-page-reg">Đăng nhập</a>
            </div>
            <div class="box-right-registration">
                <p class="title-reg">Đăng ký tài khoản</p>
                <form action="{{ route('sign-up') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="box-info-reg">
                        <div class="line-header-info-reg">
                            <p class="title-info-big-reg">Thông tin cá nhân</p>
                            <p class="title-info-small-reg">* Phần bắt buộc</p>
                        </div>
                        <div class="content-info-reg">
                            <div class="col-left-info">
                                <label class="title-lable-info" for="first_name">* First Name</label>
                                <input id="first_name" type="text" class="input-value-reg" name="first_name"
                                    value="{{ old('first_name') }}" autofocus>
                                <label class="title-lable-info" for="last_name">* Last Name</label>
                                <input id="last_name" type="text" class="input-value-reg" name="last_name"
                                    value="{{ old('last_name') }}">
                            </div>
                            <div class="col-right-info">
                                <p class="title-note">Đây là tên sẽ được liên kết với tài khoản {{ $domain }} của bạn.
                                </p>
                            </div>
                        </div>
                        <div class="line-header-info-reg">
                            <p class="title-info-big-reg">Địa chỉ email</p>
                            <p class="title-info-small-reg">* Phần bắt buộc</p>
                        </div>
                        <div class="content-info-reg">
                            <div class="col-left-info">
                                <label class="title-lable-info" for="email">* Email</label>
                                <input id="email" type="text" class="input-value-reg" name="email"
                                    value="{{ old('email') }}">
                                <label class="title-lable-info" for="email_confirmed">* Xác nhận email</label>
                                <input id="email_confirmed" type="text" class="input-value-reg" name="email_confirmed"
                                    value="{{ old('email_confirmed') }}">
                            </div>
                            <div class="col-right-info">
                                <p class="title-note">Bạn sẽ sử dụng địa chỉ email của mình để đăng nhập vào
                                    {{ $domain }}. Chúng tôi
                                    yêu cầu bạn nhập hai lần để đảm bảo độ chính xác.</p>
                            </div>
                        </div>
                        <div class="line-header-info-reg">
                            <p class="title-info-big-reg">Mật khẩu</p>
                            <p class="title-info-small-reg">* Phần bắt buộc</p>
                        </div>
                        <div class="content-info-reg">
                            <div class="col-left-info">
                                <label class="title-lable-info" for="password">* Mật khẩu 8 - 20 ký tự</label>
                                <input id="password" name="password" type="password" class="input-value-reg">
                                <label class="title-lable-info" for="password_confirmed">* Xác nhận mật khẩu</label>
                                <input id="password_confirmed" name="password_confirmed" type="password"
                                    class="input-value-reg">
                            </div>
                            <div class="col-right-info">
                                <p class="title-note">Tạo mật khẩu cho tài khoản {{ $domain }} của bạn. Mật khẩu của
                                    bạn
                                    phải dài từ
                                    8-20 ký tự. Nó phải chứa 1 trong số những điều sau đây:</p>
                                <ul style="list-style:inherit;">
                                    <li>
                                        <span style="vertical-align: inherit;">
                                            <span style="vertical-align: inherit;">Chữ hoa</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span style="vertical-align: inherit;">
                                            <span style="vertical-align: inherit;">Chữ thường</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span style="vertical-align: inherit;">
                                            <span style="vertical-align: inherit;">Số</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span style="vertical-align: inherit;">
                                            <span style="vertical-align: inherit;">Kí tự đặc biệt</span>
                                        </span>
                                    </li>
                                </ul>
                                <p class="title-note">
                                    Không gian không được phép. Chúng tôi yêu cầu bạn nhập hai lần để đảm bảo độ chính xác.
                                </p>
                            </div>
                        </div>
                        <button type="submit" class="btn-registrantion">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('script_page')

@stop
