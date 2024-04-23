@extends('web.index')
@section('title','Chỉnh sửa tài khoản')

@section('style_page')
    <link rel="stylesheet" href="{{asset('assets/css/account.css')}}">
@stop
{{--content of page--}}
@section('content')
    <div class="box-my-account">
        <div class="line-header-menu-page">
            <a href="{{route('home')}}" class="title-header-menu-page">Trang chủ</a>
            <span style="margin: 0 5px;">/</span>
            <a href="{{route('my-account')}}" class="title-header-menu-page">Tài khoản của tôi</a>
            <span style="margin: 0 5px;">/</span>
            <a href="{{route('order-history')}}" class="title-header-menu-page">Lịch sử đơn hàng</a>
        </div>
        <div class="box-content-my-account">
            <div class="box-left-account">
                <p class="title-menu-child-account">Tài khoản của tôi</p>
                <a href="{{route('edit-account')}}" class="link-page-account">Chỉnh sửa tài khoản</a>
                <a href="{{route('address-account')}}" class="link-page-account">Địa chỉ</a>
                <a href="{{route('order-history-account')}}" class="link-page-account">Lịch sử đơn hàng ></a>
                <a href="{{route('login')}}" class="link-page-account">Đăng xuất</a>
            </div>
            <div class="box-right-account">
                <div class="line-title-my-account">
                    <p class="title-account">LỊCH SỬ ĐƠN HÀNG</p>
                </div>
                <div class="box-child-item-account">
                    <p class="content-item-account">Không có mục nào trong danh sách này.</p>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script_page')

@stop
