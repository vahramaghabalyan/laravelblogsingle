@extends('layouts.vertical.master')
@section('title', 'NFTExp.io Blog')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h1>NFTExp.io<span>Blog</span></h1>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Blog</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">

            @if(isset($author_id))
            <livewire:user.profile.author-show :userId="$author_id" :mode="'big'"/>
            @endif
            @if($category_chain)
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            @forelse($category_chain as $cat)
                                / <a href="{{$cat->url()}}">
                                    <span class="cat1">{{$cat->category_name}}</span>
                                </a>
                            @empty @endforelse
                        </div>
                    </div>
                </div>
            @endif

            @if(isset($binshopsblog_category) && $binshopsblog_category)
                <h2 class='text-center'> {{$binshopsblog_category->category_name}}</h2>
                @if($binshopsblog_category->category_description)
                    <p class='text-center'>{{$binshopsblog_category->category_description}}</p>
                @endif
            @endif

            <div class="container">
                <div class="row">
                    @forelse($posts as $post)
                        @include("binshopsblog::partials.index_loop")
                    @empty
                        <div class="col-md-12">
                            <div class='alert alert-danger'>No posts!</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <h6>Blog Categories</h6>
            @forelse($categories as $category)
                <a href="{{$category->url()}}">
                    <h6>{{$category->category_name}}</h6>
                </a>
            @empty
                <a href="#">
                    <h6>No Categories</h6>
                </a>
            @endforelse
        </div>
    </div>
    
    {{--
    @if (config('binshopsblog.search.search_enabled') )
        @include('binshopsblog::sitewide.search_form')
    @endif
    --}}

    @if(\Auth::check() && \Auth::user()->canManageBinshopsBlogPosts())
        <div class="row text-center">
            <p class='mb-1'>You are logged in as a blog admin user.
                <br>
                <a href='{{route("binshopsblog.admin.index")}}'
                   class='btn border  btn-outline-primary btn-sm '>
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                    Go To Blog Admin Panel</a>
            </p>
        </div>
    @endif
</div>
@endsection

@section('script')
@endsection
