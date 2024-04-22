@extends('web.index')
@section('title','Đăng Ký')

@section('style_page')
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
@stop
{{--content of page--}}

@section('content')
    <div class="box-registration">
        <div class="line-header-menu-page">
            <a href="{{route('home')}}" class="title-header-menu-page">Trang chủ</a>
            <span style="margin: 0 5px;">/</span>
            <a href="{{route('registration')}}" class="title-header-menu-page">Đăng ký tài khoản</a>
        </div>
        <div class="box-content-reg">
            <div class="box-left-registration">
                <p class="title-menu-child-reg">Tài khoản</p>
                <a href="{{route('login')}}" class="link-page-reg">Đăng nhập</a>
            </div>
            <div class="box-right-registration">
                <p class="title-reg">Đăng ký tài khoản</p>
                <div class="box-info-reg">
                    <div class="line-header-info-reg">
                        <p class="title-info-big-reg">Thông tin cá nhân</p>
                        <p class="title-info-small-reg">* Phần bắt buộc</p>
                    </div>
                    <div class="content-info-reg">
                        <div class="col-left-info">
                            <label class="title-lable-info">* First Name</label>
                            <input type="text" class="input-value-reg">
                            <label class="title-lable-info">* Last Name</label>
                            <input type="text" class="input-value-reg">
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
                            <label class="title-lable-info">* Email</label>
                            <input type="text" class="input-value-reg">
                            <label class="title-lable-info">* Xác nhận email</label>
                            <input type="text" class="input-value-reg">
                        </div>
                        <div class="col-right-info">
                            <p class="title-note">Bạn sẽ sử dụng địa chỉ email của mình để đăng nhập vào Chacos.com. Chúng tôi
                                yêu cầu bạn nhập hai lần để đảm bảo độ chính xác.</p>
                        </div>
                    </div>
                    <div class="line-header-info-reg">
                        <p class="title-info-big-reg">Mật khẩu</p>
                        <p class="title-info-small-reg">* Phần bắt buộc</p>
                    </div>
                    <div class="content-info-reg">
                        <div class="col-left-info">
                            <label class="title-lable-info">* Mật khẩu 8 - 20 ký tự</label>
                            <input type="text" class="input-value-reg">
                            <label class="title-lable-info">* Xác nhận mật khẩu</label>
                            <input type="text" class="input-value-reg">
                        </div>
                        <div class="col-right-info">
                            <p class="title-note">Tạo mật khẩu cho tài khoản Chacos.com của bạn. Mật khẩu của bạn phải dài từ
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
                                Không gian không được phép. Chúng tôi yêu cầu bạn nhập hai lần để đảm bảo độ chính xác.</p>
                        </div>
                    </div>
                    <button class="btn-registrantion">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script_page')

@stop
