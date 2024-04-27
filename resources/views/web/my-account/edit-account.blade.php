@extends('web.index')
@section('title', 'Chỉnh sửa tài khoản')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/account.css') }}">
@stop
{{-- content of page --}}
@section('content')
    <div class="box-my-account">
        <div class="line-header-menu-page">
            <a href="{{ route('home') }}" class="title-header-menu-page">Trang chủ</a>
            <span style="margin: 0 5px;">/</span>
            <a href="{{ route('my-account') }}" class="title-header-menu-page">Tài khoản của tôi</a>
            <span style="margin: 0 5px;">/</span>
            <a href="{{ route('edit-account') }}" class="title-header-menu-page">Chỉnh sửa tài khoản</a>
        </div>
        <div class="box-content-my-account">
            <div class="box-left-account">
                <a href="{{ route('my-account') }}" class="link-page-account">Tài khoản của tôi</a>
                <p class="title-menu-child-account">Chỉnh sửa tài khoản ></p>
                <a href="{{ route('address-account') }}" class="link-page-account">Địa chỉ</a>
                <a href="{{ route('order-history') }}" class="link-page-account">Lịch sử đơn hàng</a>
                <a href="{{ route('logout') }}" class="link-page-account">Đăng xuất</a>
            </div>
            <div class="box-right-account">
                <div class="line-title-my-account">
                    <p class="title-account">CHỈNH SỬA TÀI KHOẢN</p>
                </div>
                <form action="{{ route('update-account', ['id' => Auth::user()->id ?? 0]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="box-info-reg">
                        <div class="line-header-info-reg">
                            <p class="title-info-big-reg">Thông tin cá nhân</p>
                            <p class="title-info-small-reg">* Phần bắt buộc</p>
                        </div>
                        <div class="content-info-reg">
                            <div class="col-left-info">
                                <label class="title-lable-info" for="first_name">* First Name</label>
                                <input type="text" class="input-value-reg" id="first_name" name="first_name"
                                    value="{{ old('first_name', Auth::user()->first_name) }}">
                                <label class="title-lable-info" for="last_name">* Last Name</label>
                                <input type="text" class="input-value-reg" id="last_name" name="last_name"
                                    value="{{ old('last_name', Auth::user()->last_name) }}">
                            </div>
                            <div class="col-right-info">
                                <p class="title-note">Đây là tên sẽ được liên kết với tài khoản Chaco.com của bạn.</p>
                            </div>
                        </div>
                        <div class="line-header-info-reg">
                            <p class="title-info-big-reg">Địa chỉ email</p>
                            <p class="title-info-small-reg">* Phần bắt buộc</p>
                        </div>
                        <div class="content-info-reg">
                            <div class="col-left-info">
                                <label class="title-lable-info">Email hiện tại</label>
                                <p class="title-lable-info mb-0">{{ Auth::user()->email }}</p>
                                <label class="title-lable-info" for="email">Email</label>
                                <input type="text" class="input-value-reg" id="email" name="email"
                                    value="{{ old('email') }}">
                                <label class="title-lable-info" for="">Xác nhận email</label>
                                <input type="text" class="input-value-reg" id="email_confirmed" name="email_confirmed"
                                    value="{{ old('email_confirmed') }}">
                            </div>
                            <div class="col-right-info">
                                <p class="title-note">Bạn sẽ sử dụng địa chỉ email của mình để đăng nhập vào Chacos.com.
                                    Chúng
                                    tôi
                                    yêu cầu bạn nhập hai lần để đảm bảo độ chính xác.</p>
                            </div>
                        </div>
                        <div class="line-header-info-reg">
                            <p class="title-info-big-reg">Mật khẩu</p>
                            <p class="title-info-small-reg">* Phần bắt buộc</p>
                        </div>
                        <div class="content-info-reg">
                            <div class="col-left-info">
                                <label class="title-lable-info" for="">Mật khẩu hiện tại</label>
                                <input type="password" class="input-value-reg" id="current_password"
                                    name="current_password">
                                <label class="title-lable-info" for="">Mật khẩu mới</label>
                                <input type="password" class="input-value-reg" id="password" name="password">
                                <label class="title-lable-info" for="">Xác nhận mật khẩu</label>
                                <input type="password" class="input-value-reg" id="password_confirmed"
                                    name="password_confirmed">
                            </div>
                            <div class="col-right-info">
                                <p class="title-note">Tạo mật khẩu cho tài khoản Chacos.com của bạn. Mật khẩu của bạn phải
                                    dài
                                    từ
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
                                            <span style="vertical-align: inherit;">số</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span style="vertical-align: inherit;">
                                            <span style="vertical-align: inherit;">Tính cách đặc biệt</span>
                                        </span>
                                    </li>
                                </ul>
                                <p class="title-note">
                                    Không gian không được phép. Chúng tôi yêu cầu bạn nhập hai lần để đảm bảo độ chính xác.
                                </p>
                            </div>
                        </div>
                        <button class="btn-registrantion">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('script_page')

@stop
