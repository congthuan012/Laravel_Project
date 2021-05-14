<ol class="mini-products-list">
    @php
    $total = 0;
    @endphp
    @if(session('cart') != null)
    @foreach (session('cart') as $product)
    <li class="item">
        <a href="{{ route('product.chi-tiet',[$product['slug'],$product['id']]) }}" title="{{ $product['name'] }}"
            class="product-image"><img src="{{ asset($product['img']) }}" alt="Camera X1000"></a>
        <div class="product-details">
            <p class="product-name">
                <a href="{{ route('product.chi-tiet',[$product['slug'],$product['id']]) }}">{{ $product['name'] }}</a>
            </p>
            <p class="qty-price">
                {{ number_format($product['qty']) }} X <span class="price">{{ number_format($product['price']) }}</span>
            </p>
            <a data-id="{{ $product['id'] }}" data-url="{{ route('delete-form-cart') }}" title="Remove This Item"
                class="btn-remove"><i class="fas fa-times"></i></a>
        </div>
    </li>
    @php
    $total+=($product['qty'] * $product['price'])
    @endphp
    @endforeach
    @endif

</ol>
<div class="totals">
    <span class="label">{{ __('Total')}}:</span>
    <span class="price-total"><span class="price">{{number_format($total)}} VNĐ</span></span>
</div>
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script>
    $('.btn-remove').click(function () {
        var _that = $(this);
        var _oldHtml = _that.html();
        var _url = _that.data('url');
        var _data = {
            'id': _that.data('id')
        };
        _that.prop('disable', true).html('<i class="fas fa-spinner"></i>');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: _url,
            data: _data,
            method: 'POST',
            success: function (res) {
                swal({
                    title: res.msg,
                    icon: res.status,
                    button: false,
                    showConfirmButton: false,
                    timer: 1500
                });
                $('#minicart').html(res.minicart);
            },
            error: function (error) {
                console.log(error);
            },
            complete: function (res) {
                _that.prop('disable', false).html(_oldHtml);
            }
        });
    });
</script>
