<div class="row">
    <div class="col">
        <ul class="breadcrumb font-weight-bold text-6 justify-content-center my-5">
            <li class="text-transform-none text-color-grey-lighten">
                <a href="{{ route('cart') }}" class="text-decoration-none {{ $page=='cart'?'text-color-primary':'text-color-grey-lighten'}}">{{ __('Shopping Cart') }}</a>
            </li>
            <li class="text-transform-none text-color-grey-lighten mr-2">
                <a href="{{ route('checkout') }}"
                    class="text-decoration-none text-color-hover-primary text-color-grey-lighten {{ $page=='checkout'?'text-color-primary':'text-color-grey-lighten'}}">{{ __('Checkout') }}</a>
            </li>
            <li class="text-transform-none text-color-grey-lighten">
                <a href=""
                    class="text-decoration-none text-color-hover-primary text-color-grey-lighten {{ $page=='complete'?'text-color-primary':'text-color-grey-lighten'}}">{{ __('Order Complete')}}</a>
            </li>
        </ul>
    </div>
</div>
