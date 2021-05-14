@extends('layout')
@section('title')
<title>Porto - Hoàn tất thanh toán</title>
@endsection
@section('content')
@php
    if(!session('cart')){
        return redirect()->route('product.shop');
    }
@endphp
<div role="main" class="main shop pb-4">

    <div class="container">

        @include('widget.cart-menu')

        <div class="row justify-content-center">
            @if (session('cart'))
                <div class="col-lg-8">
                    <div class="card border-width-3 border-radius-0 border-color-success">
                        <div class="card-body text-center">
                            <p class="text-color-dark font-weight-bold text-4-5 mb-0"><i class="fas fa-check text-color-success mr-1"></i> {{ __('Thank You. Your Order has been received.') }}</p>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between py-3 px-4 my-4">
                        <div class="text-center">
                            <span class="text-capitalize">
                                {{ __('Order Number') }} <br>
                                <strong class="text-color-dark">{{ session('sodonhang')==null?'':session('sodonhang') }}</strong>
                            </span>
                        </div>
                        <div class="text-center mt-4 mt-md-0">
                            <span>
                                {{ __('Date') }} <br>
                                <strong class="text-color-dark">{{ session('donhang')->ngaydat->format('M d-y') }}</strong>
                            </span>
                        </div>
                        <div class="text-center mt-4 mt-md-0">
                            <span>
                                {{ __('Email address') }} <br>
                                <strong class="text-color-dark">{{ $khachHang->email }}</strong>
                            </span>
                        </div>
                        <div class="text-center mt-4 mt-md-0">
                            <span>
                                {{ __('Total') }} <br>
                                <strong class="text-color-dark">{{ number_format(session('subTotal')) }}</strong>
                            </span>
                        </div>
                        <div class="text-center mt-4 mt-md-0">
                            <span>
                                {{ __('Payment Method') }} <br>
                                <strong class="text-color-dark">{{ __('Cash on Delivery') }}</strong>
                            </span>
                        </div>
                    </div>
                    <div class="card border-width-3 border-radius-0 border-color-hover-dark mb-4">
                        <div class="card-body">
                            <h4 class="font-weight-bold text-uppercase text-4 mb-3">{{ __('Your Order') }}</h4>
                            <table class="shop_table cart-totals mb-0">
                                <tbody>
                                    <tr>
                                        <td colspan="2" class="border-top-0">
                                            <strong class="text-color-dark">{{ __('Products') }}</strong>
                                        </td>
                                    </tr>
                                    @foreach (session('cart') as $cart)
                                    <tr>
                                        <td>
                                            <div>
                                                <strong class="d-block text-color-dark line-height-1 font-weight-semibold">{{ $cart['name'] }} <span class="text-1">x{{ $cart['qty']}}</span></strong>
                                            </div>
                                        </td>
                                        <td class="text-right align-top">
                                            <span class="amount font-weight-medium text-color-grey">{{ number_format($cart['qty'] * $cart['price']) }} VNĐ</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr class="cart-subtotal">
                                        <td class="border-top-0">
                                            <strong class="text-color-dark">{{ __('Subtotal') }}</strong>
                                        </td>
                                        <td class="border-top-0 text-right">
                                            <strong><span class="amount font-weight-medium">{{ number_format(session('subTotal')) }} VNĐ</span></strong>
                                        </td>
                                    </tr>
                                    <tr class="shipping">
                                        <td class="border-top-0">
                                            <strong class="text-color-dark">{{ __('shipping') }}</strong>
                                        </td>
                                        <td class="border-top-0 text-right">
                                            <strong><span class="amount font-weight-medium">{{ __('free') }}</span></strong>
                                        </td>
                                    </tr>
                                    <tr class="total">
                                        <td>
                                            <strong class="text-color-dark text-3-5">{{ __('Total') }}</strong>
                                        </td>
                                        <td class="text-right">
                                            <strong class="text-color-dark"><span class="amount text-color-dark text-5">{{ number_format(session('subTotal')) }} VNĐ</span></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <h2 class="text-color-dark font-weight-bold text-5-5 mb-1 text-capitalize">{{ __('Billing Address') }}</h2>
                            <ul class="list list-unstyled text-2 mb-0">
                                <li class="mb-0">John Doe Junior</li>
                                <li class="mb-0">Street Name, City</li>
                                <li class="mb-0">State AL 85001</li>
                                <li class="mb-0">123 456 7890</li>
                                <li class="mt-3 mb-0">abc@abc.com</li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <h2 class="text-color-dark font-weight-bold text-5-5 mb-1">{{ __('Shipping Address') }}</h2>
                            <ul class="list list-unstyled text-2 mb-0">
                                <li class="mb-0">{{ $khachHang->ten }}</li>
                                <li class="mb-0">{{ session('donhang')->dia_chi_giao_hang }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        @php
            Session::forget('cart');
            Session::forget('donhang');
            Session::forget('sodonhang');
            Session::forget('subtotal');
        @endphp
    </div>

</div>
@endsection
