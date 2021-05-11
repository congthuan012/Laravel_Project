@extends('layout')
@section('title')
<title>Porto - {{ __('Blog') }}</title>
@endsection
@section('content')
<div role="main" class="main">

    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
        <div class="container">
            <div class="row">

                <div class="col-md-12 align-self-center p-static order-2 text-center">


                    <h1 class="text-dark font-weight-bold text-8">{{ __('Blog') }}</h1>
                </div>

                <div class="col-md-12 align-self-center order-1">


                    <ul class="breadcrumb d-block text-center">
                        <li><a class="text-dark" href="{{ route('index') }}">{{ __('Home') }}</a></li>
                        <li class="active"></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-4">

        <div class="row">
            <div class="col">
                <div class="blog-posts">

                    @foreach ($blog_list as $blog)
                    <article class="post post-large">
                        <div class="post-image">
                            <div class="owl-carousel owl-theme show-nav-hover"
                                data-plugin-options="{'items': 1, 'margin': 10, 'loop': false, 'nav': true, 'dots': false}">
                                <div>
                                    <div class="img-thumbnail border-0 p-0 d-block">
                                        <img class="img-fluid border-radius-0"
                                            src="{{ asset($blog->anh==null?'assets/img/blog/wide/blog-21.jpg':$blog->anh) }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="post-date">
                            <span class="day">{{ $blog->created_at->format('d') }}</span>
                            <span class="month">{{ $blog->created_at->format('M') }}</span>
                        </div>

                        <div class="post-content">

                            <h2 class="font-weight-semibold text-6 line-height-3 mb-3"><a
                                    href="{{ route('blog.detail',[$blog->slug,$blog->id]) }}">{{ $blog->tieu_de }}</a></h2>
                            <p>{{ $blog->tom_tat }}</p>

                            <div class="post-meta">
                                <span><i class="far fa-user"></i> {{ __('By') }} <a href="">{{ $blog->Author->name }}</a> </span>
                                <span><i class="far fa-folder"></i> <a href="">{{ $blog->BlogType->ten }}</a></a>
                                </span>
                                <span><i class="far fa-comments"></i> <a href="#">{{ $blog->comment_number }}
                                        {{ __('Comment')}}</a></span>
                                <span class="d-block d-sm-inline-block float-sm-right mt-3 mt-sm-0"><a
                                        href="{{ route('blog.detail',[$blog->slug,$blog->id]) }}"
                                        class="btn btn-xs btn-light text-1 text-uppercase">{{ __('Read More') }}</a></span>
                            </div>

                        </div>
                    </article>
                    @endforeach
                </div>
            </div>

        </div>
        @if(count($blog_list) > 0)
        <div class="row mt-4">
            <div class="col">
                <ul class="pagination float-right">
                    @if ($blog_list->onFirstPage())
                    <li class="page-item disable">
                        <a class="page-link"><i class="fas fa-angle-left"></i></a>
                    </li>
                    @else
                    <li>
                        <a class="page-link" href="{{ $blog_list->previousPageUrl() }}"><i class="fas fa-angle-left"></i></a>
                    </li>
                    @endif
                    <!-- $page == $paginator->lastPage() - 1 -->
                    <li class="page-item"><a class="page-link">{{$blog_list->currentPage()}}</a></li>
                    @if ($blog_list->hasMorePages())
                    <li>
                        <a class="page-link" href="{{ $blog_list->nextPageUrl() }}"><i class="fas fa-angle-right"></i></a>
                    </li>
                    @else
                    <li class="disabled">
                        <a class="page-link"><i class="fas fa-angle-right"></i></a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        @endif

    </div>

</div>
@endsection
