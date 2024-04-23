@extends('web.index')
@section('title','Trang chủ')

@section('style_page')
    <link rel="stylesheet" href="{{asset('assets/css/strap-adjuster.css')}}">
@stop
{{--content of page--}}
@section('content')
    <div class="box-strap-adjuster">
        <div class="line-header-menu-page">
            <a href="{{route('home')}}" class="title-header-menu-page">Trang chủ</a>
            <span style="margin: 0 5px;">/</span>
            <a href="#" class="title-header-menu-page">Strap Adjuster</a>
        </div>
        <div class="box-content-strap-adjuster">
            <div class="box-header-strap">
                <p class="title-header-strap">Get The Perfect Fit</p>
            </div>
            <div class="chco-strp-types">
                <div class="item-strp-types">
                    <a href="" class="chco-strp-types-link">
                        <p class="title-link-strp-types">No Toe Loop</p>
                        <img src="{{asset('assets/image/landing-sp.png')}}" class="img-link-strp">
                        <div class="btn-chco-strp-types">CHOOSE</div>
                    </a>
                    <div class="content-item-strp-types">
                        <p class="title-content-item-strp">Sandals without the webbing strap around the big toe.</p>
                        <p class="name-content-item-strp">Current styles:</p>
                        <ul class="chco-strp-type__variants">
                            <li class="item-type__variants">Z/1®</li>
                            <li class="item-type__variants">ZX/1®</li>
                            <li class="item-type__variants">Z/Cloud</li>
                            <li class="item-type__variants">Z/Cloud X</li>
                            <li class="item-type__variants">Z/Volv</li>
                            <li class="item-type__variants">Z/Volv X</li>
                        </ul>
                    </div>
                </div>
                <div class="item-strp-types">
                    <a href="" class="chco-strp-types-link">
                        <p class="title-link-strp-types">Toe Loop</p>
                        <img src="{{asset('assets/image/landing-sp2.png')}}" class="img-link-strp">
                        <div class="btn-chco-strp-types">CHOOSE</div>
                    </a>
                    <div class="content-item-strp-types">
                        <p class="title-content-item-strp">Sandals without the webbing strap around the big toe.</p>
                        <p class="name-content-item-strp">Current styles:</p>
                        <ul class="chco-strp-type__variants">
                            <li class="item-type__variants">Z/2®</li>
                            <li class="item-type__variants">ZX/2®</li>
                            <li class="item-type__variants">Z/Cloud 2</li>
                            <li class="item-type__variants">Z/Cloud X2</li>
                            <li class="item-type__variants">Z/Volv 2</li>
                            <li class="item-type__variants">Z/Volv X2</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="chco-strp-landing__copy">Adjust double and triple straps as a single strap.</div>
        </div>
    </div>
@stop

@section('script_page')

@stop
