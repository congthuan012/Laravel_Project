@extends('layout')
@section('title')

@endsection
@section('content')
<div role="main" class="main shop pb-4">

    <div class="container">

        @include('widget.cart-menu')

        <div class="row pb-4 mb-5">
            @if (session('cart')!=null)
            <div class="col-lg-8 mb-5 mb-lg-0">
                <form method="post" action="{{ route('cart.update') }}">
                    @method('put')
                    @csrf
                    <div class="table-responsive">
                        <table class="shop_table cart">
                            <thead>
                                <tr class="text-color-dark">
                                    <th class="product-thumbnail" width="15%">
                                        &nbsp;
                                    </th>
                                    <th class="product-name text-uppercase" width="30%">
                                        {{ __('Product') }}
                                    </th>
                                    <th class="product-price text-uppercase" width="15%">
                                        {{ __('Price') }}
                                    </th>
                                    <th class="product-quantity text-uppercase" width="20%">
                                        {{ __('Quantity') }}
                                    </th>
                                    <th class="product-subtotal text-uppercase text-right" width="20%">
                                        {{ __('Subtotal') }} (VNĐ)
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(session('cart')!=null)
                                @php
                                    $subTotal = 0;
                                @endphp
                                    @foreach (session('cart') as $product)
                                    <tr class="cart_table_item">
                                        <td class="product-thumbnail">
                                            <div class="product-thumbnail-wrapper">
                                                <a href="#" class="product-thumbnail-remove" title="Remove Product">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                                <a href="shop-product-sidebar-right.html" class="product-thumbnail-image"
                                                    title="{{ $product['name'] }}">
                                                    <img width="90" height="90" alt="" class="img-fluid"
                                                        src="{{ asset($product['img']) }}">
                                                </a>
                                            </div>
                                        </td>
                                        <td class="product-name">
                                            <a href="shop-product-sidebar-right.html"
                                                class="font-weight-semi-bold text-color-dark text-color-hover-primary text-decoration-none">{{ $product['name'] }}</a>
                                        </td>
                                        <td class="product-price">
                                            <span class="amount font-weight-medium text-color-grey">{{ number_format($product['price']) }}</span>
                                        </td>
                                        <td class="product-quantity pl-3">
                                            <input style="border: none" type="number" id="product_{{ $product['id'] }}" name="quatity[{{ $product['id'] }}]" id="" value="{{ number_format($product['qty']) }}">
                                        </td>
                                        <td class="product-subtotal text-right">
                                            <span class="amount text-color-dark font-weight-bold text-4">{{number_format($product['qty'] * $product['price'])}}</span>
                                        </td>
                                    </tr>
                                    @php
                                        $subTotal += $product['qty'] * $product['price'];
                                    @endphp
                                    @endforeach
                                    <tr>
                                        <td colspan="5">
                                            <div class="row justify-content-between mx-0">
                                                <div class="col-md-auto px-0 mb-3 mb-md-0">
                                                    {{-- <div class="d-flex align-items-center">
                                                        <input type="text" class="form-control h-auto border-radius-0 line-height-1 py-3" name="couponCode" placeholder="Coupon Code" />
                                                        <button type="submit" class="btn btn-light btn-modern text-color-dark bg-color-light-scale-2 text-color-hover-light bg-color-hover-primary text-uppercase text-3 font-weight-bold border-0 border-radius-0 ws-nowrap btn-px-4 py-3 ml-2">Apply Coupon</button>
                                                    </div> --}}
                                                </div>
                                                <div class="col-md-auto px-0">
                                                    <button type="submit" class="btn btn-light btn-modern text-color-dark bg-color-light-scale-2 text-color-hover-light bg-color-hover-primary text-uppercase text-3 font-weight-bold border-0 border-radius-0 btn-px-4 py-3">{{ __('Update Cart') }}</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="card border-width-3 border-radius-0 border-color-hover-dark" data-plugin-sticky
                    data-plugin-options="{'minWidth': 991, 'containerSelector': '.row', 'padding': {'top': 85}}">
                    <div class="card-body">
                        <h4 class="font-weight-bold text-uppercase text-4 mb-3">{{ __('Cart Totals') }}</h4>
                        <table class="shop_table cart-totals mb-4">
                            <tbody>
                                <tr class="cart-subtotal">
                                    <td class="border-top-0">
                                        <strong class="text-color-dark">{{ __('Subtotal') }}</strong>
                                    </td>
                                    <td class="border-top-0 text-right">

                                        <strong><span class="amount font-weight-medium">{{ number_format($subTotal) }}</span></strong>
                                    </td>
                                </tr>
                                @php
                                    session(['subTotal' => $subTotal]);
                                @endphp
                                <tr class="shipping">
                                    <td colspan="2">
                                        <strong class="d-block text-color-dark mb-2 text-capitalize">{{ __('shipping') }}</strong>
                                        <div class="d-flex flex-column">
                                            <label class="d-flex align-items-center text-color-grey mb-0"
                                                for="shipping_method1">
                                                <input id="shipping_method1" type="radio" class="mr-2"
                                                    name="shipping_method" value="free" checked />
                                                {{ __('free') }}
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="total">
                                    <td>
                                        <strong class="text-color-dark text-3-5">{{ __('Total') }}</strong>
                                    </td>
                                    <td class="text-right">
                                        <strong class="text-color-dark"><span
                                                class="amount text-color-dark text-5">{{ number_format($subTotal) }}</span></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('checkout') }}" class="btn btn-dark btn-modern btn-block text-uppercase bg-color-hover-primary border-color-hover-primary border-radius-0 text-3 py-3">
                            {{ __('Proceed to Checkout') }}
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            @else
            <div class="col-lg-12 mb5 mb-lg-0 text-center">
                <div><img src="{{ asset('assets/img/products/empty.png')}}" alt=""></div>
                <div><span>{{ __('Your shopping cart is empty') }}!!</span></div>
                <div>
                    <a href="{{ route('product.shop') }}" class="btn btn-warning text-uppercase">{{ __('Go shopping now') }}</a>
                </div>
            </div>
            @endif
        </div>
    </div>

</div>
@endsection
@section('page-js')
@endsection
