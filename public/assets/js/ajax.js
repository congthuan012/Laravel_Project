$(function(){
    $('.addtocart-btn').click(function(){
        var _that    = $(this);
        var _oldHtml = _that.html();
        var _url     = _that.data('url');
        var _data    = {
            'id': _that.data('id')
        };
        _that.prop('disable', true).html('<i class="fas fa-spinner"></i>');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:_url,
            data: _data,
            method:'POST',
            success:function(res){
                swal({
                    title: res.msg,
                    icon: res.status,
                    button:false,
                    showConfirmButton: false,
                    timer: 1500
                });
                console.log(res);
                $('#minicart').html(res.minicart);
            },
            error:function(error){
                console.log(error);
            },
            complete:function(res){
                _that.prop('disable',false).html(_oldHtml);
            }
        });
    })


});
