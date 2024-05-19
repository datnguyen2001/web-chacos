@extends('web.index')
@section('title','FAQ')

@section('style_page')
    <style>
        .contact-center-content img{
            max-width: 100%;
            height: auto;
        }
    </style>
@stop
{{--content of page--}}
@section('menu-contact')
    @include('web.partials.menu-contact')
@stop
@section('content')
    <div class="content-contact-center">
        <p class="title-contact-center">{{@$data->title}}</p>
        <div class="contact-center-content">
            {!! @$data->content !!}
        </div>
    </div>
@stop
@section('contact-us')
    @include('web.partials.contact-us')
@stop
@section('script_page')
    <script src="{{asset('assets/js/home.js')}}"></script>
@stop
