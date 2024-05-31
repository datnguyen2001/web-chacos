@extends('web.index')
@section('title', 'Chi tiết công nghệ')

@section('style_page')
    <style>
        .contact-center-content img{
            max-width: 100%;
            height: auto;
        }
        .box-technology{
            margin-top: 150px!important;
        }
        @media (max-width: 767px) {
            .box-technology{
                margin-top: 50px!important;
            }
        }
    </style>
@stop
{{--content of page--}}
@section('content')
    <div class="content-contact-center box-technology">
        <p class="title-contact-center">{{@$technology->title}}</p>
        <div class="contact-center-content mb-2">
            {{ @$technology->describe }}
        </div>
        <div class="contact-center-content">
            {!! @$technology->content !!}
        </div>
    </div>
@stop
@section('script_page')
    <script src="{{asset('assets/js/home.js')}}"></script>
@stop
