@extends('layout')
@section('title')

@endsection
@section('content')
<div role="main" class="main shop pb-4">

    <div class="container py-5 mt-3">

        <div class="row">
            <div class="col">
                <h2 class="font-weight-normal text-7 mb-0">{{ __('Showing results for') }} <strong
                        class="font-weight-extra-bold">{{ $search }}</strong></h2>
                <p class="lead mb-0">{{ count($blogs) + count($products) }} {{ __('results found') }}.</p>
            </div>
        </div>
        <div class="row">
            <div class="col pt-2 mt-1">
                <hr class="my-4">
            </div>
        </div>
        <div class="row">
            <div class="col">

                <ul class="simple-post-list m-0">
                    @foreach ($products as $product)
                    <li>
                        <div class="post-info">
                            <a href="{{ route('product.chi-tiet',[$product->slug,$product->id]) }}">{{ $product->ten==null?'':$product->ten }}</a>
                            <div class="post-meta">
                                <span class="text-dark text-uppercase font-weight-semibold">{{ __('Product') }}</span> | {{ $product->created_at==null?'':$product->created_at->format('M d, Y') }}
                            </div>
                        </div>
                    </li>
                    @endforeach

                    @foreach ($blogs as $blog)
                    <li>
                        <div class="post-info">
                            <a href="{{ route('blog.detail',[$blog->slug,$blog->id]) }}">{{ $blog->tieu_de == null?'':$blog->tieu_de }}</a>
                            <div class="post-meta">
                                <span class="text-dark text-uppercase font-weight-semibold">{{ __('Blog') }}</span> | {{ $blog->created_at==null?'':$blog->created_at->format('M d, Y') }}
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</div>
@endsection
@section('page-js')
@endsection
