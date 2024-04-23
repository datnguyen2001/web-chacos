@extends('web.index')
@section('title','Trang chủ')

@section('style_page')
    <link rel="stylesheet" href="{{asset('assets/css/product-features.css')}}">
@stop
{{--content of page--}}
@section('content')
    <div class="box-product-features">
        <div class="w-100 position-relative">
            <img src="{{asset('assets/image/intro-bg.jpg')}}" class="w-100 img-intro-desktop">
            <img src="{{asset('assets/image/intro-bg-mobile.jpg')}}" class="w-100 img-intro-mobile">
            <div class="box-content-features-1">
                <p class="title-content-features-1">Product Features</p>
                <p class="content-features-1">Learn more about the features and technology that make Chaco products
                    best-in-class</p>
            </div>
        </div>
        <div class="box-staraps">
            <div class="item-staraps">
                <img src="{{asset('assets/image/icon-adjust.png')}}" alt="">
                <p class="title-starap">Adjust Your Straps</p>
                <p class="content-starap">
                    Chaco offers the industry's only sandal with a 360 degree customizable fit. Click below for a
                    step-by-step guide to adjusting your straps.</p>
                <a href="" class="link-strap">
                    Strap Adjuster</a>
            </div>
        </div>
        <div class="box-our-fit">
            <img src="{{asset('assets/image/icon-luvseat.png')}}" alt="">
            <p class="title-our-fit-1">Our Fit</p>
            <p class="content-out-fit-1">
                Chaco products are supportive and durable, promoting healthy alignment and arch support for all-day wear.
            </p>
            <img src="{{asset('assets/image/luv-bg.png')}}" alt="">
            <p class="title-our-fit-2">
                LUVSEAT <sup>TM</sup> Footbed</p>
            <p class="content-out-fit-1">
                Built into every pair of Chaco footwear, our LUVSEAT Footbed provides contoured arch support in a product so
                dependable, every single style is accepted by the American Podiatric Medical Association.</p>
            <div class="d-flex justify-content-center align-items-center">
                <img src="{{asset('assets/image/logo-luvseat.png')}}" class="w-100 h-100" style="padding: 0 16px;">
                <img src="{{asset('assets/image/logo-ampa.png')}}" class="w-100 h-100" style="padding: 0 16px;">
            </div>

        </div>
        <div class="box-ultimate">
            <img src="{{asset('assets/image/icon-durability.png')}}" alt="">
            <p class="title-starap">
                Ultimate Durability</p>
            <p class="content-starap">
                Chaco makes all of our footbeds out of polyurethane (PU) compounds. Why PU? Because unlike disposable foam,
                PU doesn't break down or compress with wear. This makes for durable, long-lasting products that stay on your
                feet and outof the landfill.</p>
            <img src="{{asset('assets/image/dura-bg.png')}}" class="w-100">
        </div>
        <div class="box-outsoles">
            <img src="{{asset('assets/image/icon-outsoles.png')}}" alt="">
            <p class="title-starap">Outsoles</p>
            <p class="content-starap">Our performance outsoles are designed for traction and grip in the toughest
                environments.</p>
            <div class="outsole-info">
                <div class="outsole-item" data-bs-toggle="modal" data-bs-target="#exampleModalVideo">
                    <img src="{{asset('assets/image/outsoles-item.jpg')}}" class="w-100">
                    <p class="title-outsole-info">
                        ChacoGrip <sup>®</sup></p>
                    <p class="content-outsole-info">
                        Made by us, for us. Our proprietary outsole compound was developed for performance tread in extreme
                        conditions.
                    </p>
                </div>
                <div class="outsole-item">
                    <img src="{{asset('assets/image/outsoles-item1.jpg')}}" class="w-100">
                    <p class="title-outsole-info">
                        EcoTread <sup>TM</sup></p>
                    <p class="content-outsole-info">
                        Made by us, for us. Our proprietary outsole compound was developed for performance tread in extreme
                        conditions.
                    </p>
                </div>
            </div>
        </div>
        <div class="box-care">
            <img src="{{asset('assets/image/icon-sandal.png')}}" alt="">
            <p class="title-starap">Outsoles</p>
            <p class="content-starap">Our performance outsoles are designed for traction and grip in the toughest
                environments.</p>
            <div class="outsole-info">
                <div class="outsole-item">
                    <img src="{{asset('assets/image/sandal-item-0.jpg')}}" class="w-100">
                    <p class="title-outsole-info">
                        Sandal Care & Cleaning</p>
                    <p class="content-outsole-info">
                        If your straps won't adjust or your sandals need a good cleaning, we've got you covered.
                    </p>
                    <a href="" class="link-strap">
                        Learn More</a>
                </div>
                <div class="outsole-item">
                    <img src="{{asset('assets/image/sandal-item-1.jpg')}}" class="w-100">
                    <p class="title-outsole-info">
                        Rechaco Repairs</p>
                    <p class="content-outsole-info">
                        Repairability is an important part of our sandal product philosophy. So when you've worn through your
                        soles or your straps are threadbare, let our repair experts step in.
                    </p>
                    <a href="" class="link-strap">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Modal video-->
        <div class="modal fade" id="exampleModalVideo" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <img src="{{asset('assets/image/xmark-solid.svg')}}" data-bs-dismiss="modal" aria-label="Close"
                 class="close-model-video">
            <div class="modal-dialog modal-dialog-video">
                <div class="modal-content modal-content-video">
                    <div class="modal-body">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/OjeO1S8hQgM?si=JPGs7JHu1NBKcnqV"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script_page')

@stop
