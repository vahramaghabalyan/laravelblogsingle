@extends('layouts.vertical.master')
@section('title', $post->title)

@section('css')
@endsection

@section('style')
    <style type="text/css">
        .single-blog-content-top p{
            font-size:20px !important;
            margin-top:10px !important;
            margin-bottom: 30px !important;
        }
        .single-blog-content-top h2, .single-blog-content-top h3, .single-blog-content-top h4 {
            margin-top: 40px !important;
            margin-bottom: 20px !important;
            font-weight:700;
        }
        .page-wrapper .page-body-wrapper .page-header .row .main-header h1 {
            color: #0288d1;
            font-weight: 800;
        }
    </style>
@endsection

@section('breadcrumb-title')
    <h1>{{ $post->title }}</h1>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('blog_article.index') }}">Blog</a></li>
    <li class="breadcrumb-item active">{{ $post->title }}</li>
@endsection

@section("content")
{{--
    @if(config("binshopsblog.reading_progress_bar"))
        <div id="scrollbar">
            <div id="scrollbar-bg"></div>
        </div>
    @endif--}}

@include("binshopsblog::partials.show_errors")
@include("binshopsblog::partials.full_post_details")


@if(config("binshopsblog.comments.type_of_comments_to_show","built_in") !== 'disabled')
    <div class="" id='maincommentscontainer'>
        <h2 class='text-left' id='binshopsblogcomments'>Comments</h2>
        @include("binshopsblog::partials.show_comments")
    </div>
@else
    {{--Comments are disabled--}}
@endif

@endsection

@section('blog-custom-js')
    <script src="{{asset('binshops-blog.js')}}"></script>
@endsection
