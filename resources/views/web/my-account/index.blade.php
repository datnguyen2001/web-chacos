@extends('web.index')
@section('title', 'Tài khoản của tôi')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/css/account.css') }}">
@stop
{{-- content of page --}}
@section('content')
    <div class="box-my-account">
        <div class="line-header-menu-page">
            <a href="{{ route('home') }}" class="title-header-menu-page">Trang chủ</a>
            <span style="margin: 0 5px;">/</span>
            <a href="{{ route('my-account') }}" class="title-header-menu-page">Tài khoản của tôi</a>
        </div>
        <div class="box-content-my-account">
            <div class="box-left-account">
                <p class="title-menu-child-account">Tài khoản của tôi</p>
                <a href="{{ route('edit-account') }}" class="link-page-account">Chỉnh sửa tài khoản</a>
                <a href="{{ route('address-account') }}" class="link-page-account">Địa chỉ</a>
                <a href="{{ route('order-history') }}" class="link-page-account">Lịch sử đơn hàng</a>
                <a href="{{ route('logout') }}" class="link-page-account">Đăng xuất</a>
            </div>
            <div class="box-right-account">
                <div class="line-title-my-account">
                    <p class="title-account">Tài khoản của tôi | Account</p>
                    <span style="font-size: 14px;cursor: pointer;">Đăng xuất</span>
                </div>
                <div class="box-info-my-account">
                    <div class="line-header-info-account">
                        <p class="title-info-big-account">Thông tin tài khoản</p>
                        <p class="title-info-small-account">Xem/Sửa</p>
                    </div>
                    <div class="box-child-item-account">
                        <div class="item-left-account">
                            <p class="content-item-account">
                                Quản trị viên nhà phát triển chủ tài khoản</p>
                        </div>
                        <div>
                            <p class="content-item-account" style="font-weight: bold;">Tài khoản Email</p>
                            <p class="content-item-account">admin@gmail.com</p>
                        </div>
                    </div>
                    <div class="line-header-info-account">
                        <p class="title-info-big-account">Lịch sử đơn hàng</p>
                        <!-- <p class="title-info-small-account">Xem</p> -->
                    </div>
                    <div class="box-child-item-account">
                        <p class="content-item-account">Không có mục nào trong danh sách này.</p>
                    </div>
                    <div class="line-header-info-account">
                        <p class="title-info-big-account">Địa chỉ</p>
                        <p class="title-info-small-account">Xem tất cả/Chỉnh sửa</p>
                    </div>
                    <div class="box-info-address-book">
                        <div class="box-item-address-book">
                            <p class="title-item-address-book">Địa chỉ giao hàng mặc định</p>
                            <p class="title-item-address-book">Địa chỉ thanh toán mặc định</p>
                            <p class="content-item-address-book">12345678</p>
                            <p class="content-item-address-book">12345678</p>
                            <p class="content-item-address-book">12345678</p>
                            <p class="content-item-address-book">12345678</p>
                            <p class="content-item-address-book">12345678</p>
                            <p class="content-item-address-book">Số điện thoại:</p>
                            <p class="content-item-address-book">12345678</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop

@section('script_page')

@stop
