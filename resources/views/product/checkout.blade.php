@extends('layout')
@section('title')
<title>Porto - Thanh toán</title>
@endsection
@section('content')
<div role="main" class="main shop pb-4">

    <div class="container">

        @include('widget.cart-menu')

        <form role="form" class="needs-validation" method="post" action="{{ route('do-checkout') }}">
            @csrf
            <div class="row">
                <div class="col-lg-7 mb-4 mb-lg-0">

                    <h2 class="text-color-dark font-weight-bold text-5-5 mb-3">Billing Details</h2>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>{{ __('Full Name') }} </label>
                            <input type="text" readonly class="form-control h-auto py-2" name="firstName" value="{{ auth()->user()->ten }}" required />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label>{{ __('Address') }} <span class="text-color-danger">*</span></label>
                            <input type="text" class="form-control h-auto py-2" name="address1" value="{{ auth()->user()->dia_chi }}" placeholder="House number and street name" required />
                        </div>
                    </div>
                    {{-- <div class="form-row">
                        <div class="form-group col">
                            <label>ZIP <span class="text-color-danger">*</span></label>
                            <input type="text" class="form-control h-auto py-2" name="zip" value="" required />
                        </div>
                    </div> --}}
                    <div class="form-row">
                        <div class="form-group col">
                            <label>{{ __('Phone') }} <span class="text-color-danger">*</span></label>
                            <input type="number" class="form-control h-auto py-2" name="phone" value="{{ auth()->user()->sdt }}" required />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label>{{ __('Email address') }} <span class="text-color-danger">*</span></label>
                            <input type="email" class="form-control h-auto py-2" name="email" readonly value="{{ auth()->user()->email }}" required />
                        </div>
                    </div>

                    <!-- Ship to a differente address fields -->
                    {{-- <div class="shipping-field-wrapper collapse">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>First Name <span class="text-color-danger">*</span></label>
                                <input type="text" class="form-control h-auto py-2" name="shippingFirstName" value="" required />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Last Name <span class="text-color-danger">*</span></label>
                                <input type="text" class="form-control h-auto py-2" name="shippingLastName" value="" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label>Company Name</label>
                                <input type="text" class="form-control h-auto py-2" name="shippingCompanyName" value="" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label>Country/Region <span class="text-color-danger">*</span></label>
                                <div class="custom-select-1">
                                    <select class="form-control h-auto py-2" name="shippingCountry" required>
                                        <option value="" selected></option>
                                        <option value="usa">United States</option>
                                        <option value="spa">Spain</option>
                                        <option value="fra">France</option>
                                        <option value="uk">United Kingdon</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label>Street Address <span class="text-color-danger">*</span></label>
                                <input type="text" class="form-control h-auto py-2" name="shippingAddress1" value="" placeholder="House number and street name" required />
                            </div>
                            <div class="form-group col">
                                <input type="text" class="form-control h-auto py-2" name="shippingAddress2" value="" placeholder="Apartment, suite, unit, etc..." required/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label>Town/City <span class="text-color-danger">*</span></label>
                                <input type="text" class="form-control h-auto py-2" name="shippingCity" value="" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label>State <span class="text-color-danger">*</span></label>
                                <div class="custom-select-1">
                                    <select class="form-control h-auto py-2" name="shippingState" required>
                                        <option value="" selected></option>
                                        <option value="ny">Nova York</option>
                                        <option value="ca">California</option>
                                        <option value="tx">Texas</option>
                                        <option value="">Florida</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label>ZIP <span class="text-color-danger">*</span></label>
                                <input type="text" class="form-control h-auto py-2" name="shippingZip" value="" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label>Phone <span class="text-color-danger">*</span></label>
                                <input type="number" class="form-control h-auto py-2" name="shippingPhone" value="" required />
                            </div>
                        </div>
                        <!-- End of Ship to a differente address fields -->
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label>Order Notes</label>
                            <textarea class="form-control h-auto py-2" name="orderNotes" rows="5" placeholder="Notes about you orderm e.g. special notes for delivery"></textarea>
                        </div>
                    </div> --}}


                </div>
                <div class="col-lg-5">
                    <div class="card border-width-3 border-radius-0 border-color-hover-dark" data-plugin-sticky data-plugin-options="{'minWidth': 991, 'containerSelector': '.row', 'padding': {'top': 85}}">
                        <div class="card-body">
                            <h4 class="font-weight-bold text-uppercase text-4 mb-3">{{ __('Your Order') }}</h4>
                            <table class="shop_table cart-totals mb-3">
                                <tbody>
                                    <tr>
                                        <td colspan="2" class="border-top-0">
                                            <strong class="text-color-dark">{{ __('Products') }}</strong>
                                        </td>
                                    </tr>
                                    @php
                                        $subtotal = 0;
                                    @endphp
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
                                    @php
                                        $subtotal += $cart['qty'] * $cart['price'];
                                    @endphp
                                    @endforeach
                                    <tr class="cart-subtotal">
                                        <td class="border-top-0">
                                            <strong class="text-color-dark">Subtotal</strong>
                                        </td>
                                        <td class="border-top-0 text-right">
                                            <strong><span class="amount font-weight-medium">{{ number_format($subtotal) }} VNĐ</span></strong>
                                        </td>
                                    </tr>
                                    <tr class="shipping">
                                        <td colspan="2">
                                            <strong class="d-block text-color-dark mb-2 text-capitalize">{{ __('shipping') }}</strong>

                                            <div class="d-flex flex-column">
                                                <label class="d-flex align-items-center text-color-grey mb-0 text-capitalize" for="shipping_method1">
                                                    <input id="shipping_method1" type="radio" class=" mr-2" name="shipping_method" value="free" checked />
                                                    {{ __('free') }}
                                                </label>
                                                {{-- <label class="d-flex align-items-center text-color-grey mb-0" for="shipping_method3">
                                                    <input id="shipping_method3" type="radio" class="mr-2" name="shipping_method" value="flat-rate" />
                                                    Flat Rate: $5.00
                                                </label> --}}
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="total">
                                        <td>
                                            <strong class="text-color-dark text-3-5">{{ __('Total') }}</strong>
                                        </td>
                                        <td class="text-right">
                                            <strong class="text-color-dark"><span class="amount text-color-dark text-5">{{ number_format($subtotal) }} VNĐ</span></strong>
                                        </td>
                                    </tr>
                                    @php
                                        session(['subTotal' => $subtotal]);
                                    @endphp
                                    <tr class="payment-methods">
                                        <td colspan="2">
                                            <strong class="d-block text-color-dark mb-2">{{ __('Payment Method') }}</strong>

                                            <div class="d-flex flex-column">
                                                <label class="d-flex align-items-center text-color-grey mb-0" for="payment_method1">
                                                    <input id="payment_method1" type="radio" class="mr-2" name="payment_method" value="cash-on-delivery" checked />
                                                        {{ __('Cash On Delivery') }}
                                                </label>
                                                {{-- <label class="d-flex align-items-center text-color-grey mb-0" for="payment_method2">
                                                    <input id="payment_method2" type="radio" class="mr-2" name="payment_method" value="paypal" />
                                                    PayPal
                                                </label> --}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            {{ __('Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.') }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-dark btn-modern btn-block text-uppercase bg-color-hover-primary border-color-hover-primary border-radius-0 text-3 py-3">{{ __('Place Order') }} <i class="fas fa-arrow-right ml-2"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

</div>
@endsection
