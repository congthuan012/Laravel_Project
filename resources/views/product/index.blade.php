@extends('layout')
@section('title')
<title>Porto - {{ __('Shop') }}</title>
@endsection
@section('content')

<div role="main" class="main shop pt-4">

    <div class="container">
        <div class="masonry-loader masonry-loader-showing">
            <div class="row products product-thumb-info-list" data-plugin-masonry
                data-plugin-options="{'layoutMode': 'fitRows'}">

                @foreach ($list as $item)
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="product mb-0">
                        <div class="product-thumb-info border-0 mb-3">

                            {{-- <div class="product-thumb-info-badges-wrapper">
                                <span class="badge badge-ecommerce badge-success">Mới</span>
                            </div> --}}
                            <form method="post">
                                @csrf
                                <div class="addtocart-btn-wrapper">
                                    <button data-token="{{ csrf_token() }}" data-url="{{ route('add-to-cart-ajax') }}"
                                        data-id="{{ $item->id }}" type="button"
                                        class="text-decoration-none addtocart-btn" data-tooltip
                                        data-original-title="{{ __('Add to cart') }}">
                                        <i class="icons icon-bag"></i>
                                    </button>
                                </div>
                            </form>

                            <a href="{{ route('product.chi-tiet',[$item->slug,$item->id]) }}">
                                <div style="height: 300px;display: flex;align-items: center;"
                                    class="product-thumb-info-image">
                                    <img alt="" class="img-fluid"
                                        src="{{ asset($item->hinhdaidien == null?'assets/img/products/product-grey-1.jpg':$item->hinhdaidien) }}">
                                </div>
                            </a>
                        </div>

                        <div class="d-flex justify-content-center">
                            <div>
                                <a href="#"
                                    class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary text-center line-height-1 text-0 mb-1">{{$item->productType->ten}}</a>
                                <h3
                                    class="text-3-5 font-weight-medium text-center font-alternative text-transform-none line-height-3 mb-0">
                                    <a href="{{ route('product.chi-tiet',[$item->slug,$item->id]) }}"
                                        class="text-color-dark text-color-hover-primary">{{ $item->ten==null?'':$item->ten }}</a>
                                </h3>
                            </div>
                        </div>

                        <p class="price text-5 mb-3 justify-content-center">
                            {{-- <span class="sale text-color-dark font-weight-semi-bold">690.000 VNĐ</span> --}}
                            <span class="amount text-center">{{ $item->gia==null?'':number_format($item->gia) }} VNĐ</span>
                        </p>
                    </div>
                </div>
                @endforeach

</div>
@if(count($list) > 0)
<div class="row mt-4">
    <div class="col">
        <ul class="pagination float-right">
            @if ($list->onFirstPage())
            <li class="page-item disable">
                <a class="page-link"><i class="fas fa-angle-left"></i></a>
            </li>
            @else
            <li>
                <a class="page-link" href="{{ $list->previousPageUrl() }}"><i class="fas fa-angle-left"></i></a>
            </li>
            @endif
            <!-- $page == $paginator->lastPage() - 1 -->
            <li class="page-item"><a class="page-link">{{$list->currentPage()}}</a></li>
            @if ($list->hasMorePages())
            <li>
                <a class="page-link" href="{{ $list->nextPageUrl() }}"><i class="fas fa-angle-right"></i></a>
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

</div>

@endsection
@section('page-js')
<script src="{{asset('assets/js/views/view.shop.js')}}"></script>
<script src="{{asset('assets/js/ajax.js')}}"></script>
<script>
    @if(session('status'))
    swal({
        icon: "{!! session('status') !!}",
        title: "{!! session('msg') !!}",
        showConfirmButton: false,
        timer: 3000
    });
    @endif
</script>
@endsection
