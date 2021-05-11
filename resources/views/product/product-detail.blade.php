@extends('layout')
@section('title')

@endsection
@section('content')
<div role="main" class="main shop pt-4">

    <div class="container">

        <div class="row">
            <div class="col">
                <ul class="breadcrumb breadcrumb-style-2 d-block text-4 mb-4">
                    <li>
                        <a href="{{ route('index') }}" class="text-color-default text-color-hover-primary text-decoration-none">{{ __('Home') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('product.shop') }}" class="text-color-default text-color-hover-primary text-decoration-none">{{ __('Shop') }}</a>
                    </li>
                    <li>
                        <a href="#" class="text-color-default text-color-hover-primary text-decoration-none">{{$product->productSupplier->ten}}</a>
                    </li>
                    <li><a href="#"
                        class="text-color-default text-color-hover-primary text-decoration-none">{{$product->ten}}</a>
                </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mb-5 mb-md-0">

                <div class="thumb-gallery-wrapper">
                    <div
                        class="thumb-gallery-detail owl-carousel owl-theme manual nav-inside nav-style-1 nav-dark mb-3">
                        <div>
                            <img alt="" class="img-fluid" src="{{ asset($product->hinhdaidien) }}"
                                data-zoom-image="{{ asset($product->hinhdaidien) }}">
                        </div>
                    </div>
                    <div class="thumb-gallery-thumbs owl-carousel owl-theme manual thumb-gallery-thumbs">
                        <div class="cur-pointer">
                            <img alt="" class="img-fluid" src="{{ asset($product->hinhdaidien) }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="summary entry-summary position-relative">
                    <h1 class="mb-0 font-weight-bold text-7">{{ $product->ten==null?'':$product->ten }}</h1>

                    <div class="pb-0 clearfix d-flex align-items-center">
                        <div title="Rated 3 out of 5" class="float-left">
                            <input type="text" class="d-none" value="3" title="" data-plugin-star-rating
                                data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
                        </div>

                        <div class="review-num">
                            <a href="#description"
                                class="text-decoration-none text-color-default text-color-hover-primary" data-hash
                                data-hash-offset="75" data-hash-trigger-click=".nav-link-reviews"
                                data-hash-trigger-click-delay="1000">
                                <span class="count text-color-inherit" itemprop="ratingCount">({{ $product->comment_number??0 }}</span> {{ __('Review') }})
                            </a>
                        </div>
                    </div>

                    <div class="divider divider-small">
                        <hr class="bg-color-grey-scale-4">
                    </div>

                    <p class="price mb-3">
                        <span class="sale text-color-dark">{{number_format($product->gia)}} VNĐ</span>
                        {{-- <span class="amount">$22,00</span> --}}
                    </p>

                    <p class="text-3-5 mb-3">
                        {{ $product->mota==null?'':$product->mota }}
                    </p>

                    <ul class="list list-unstyled text-2">
                        <li class="mb-0">{{ __('AVAILABILITY') }}: <strong class="text-color-{{ $product->soluong>0?'dark':'danger' }}">{{ $product->soluong>0? __('available') : __('unavailable') }}</strong></li>
                        <li class="mb-0">SKU: <strong class="text-color-dark">{{ $product->sku==null?'':$product->sku }}</strong></li>
                    </ul>


                    <form method="post" class="cart" action="{{ route('add-to-cart',$product->id) }}">
                        @csrf
                        <hr>
                        @if ($product->soluong > 0)
                            <button type="submit" class="btn btn-dark btn-modern text-uppercase bg-color-hover-primary border-color-hover-primary">{{ __('Add to cart') }}</button>
                        @else
                            <button type="button" class="btn btn-dark" disabled data-bs-toggle="button" autocomplete="off">UNVALIABLE</button>
                        @endif
                        <hr>
                    </form>

                    {{-- <div class="d-flex align-items-center">
                        <ul
                            class="social-icons social-icons-medium social-icons-clean-with-border social-icons-clean-with-border-border-grey social-icons-clean-with-border-icon-dark mr-3 mb-0">
                            <!-- Facebook -->
                            <li class="social-icons-facebook">
                                <a href="http://www.facebook.com/sharer.php?u=https://www.okler.net" target="_blank"
                                    data-toggle="tooltip" data-placement="top" title="Share On Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <!-- Google+ -->
                            <li class="social-icons-googleplus">
                                <a href="https://plus.google.com/share?url=https://www.okler.net" target="_blank"
                                    data-toggle="tooltip" data-placement="top" title="Share On Google+">
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                            </li>
                            <!-- Twitter -->
                            <li class="social-icons-twitter">
                                <a href="https://twitter.com/share?url=https://www.okler.net&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons"
                                    target="_blank" data-toggle="tooltip" data-placement="top" title="Share On Twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <!-- Email -->
                            <li class="social-icons-email">
                                <a href="mailto:?Subject=Share This Page&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 https://www.okler.net"
                                    data-toggle="tooltip" data-placement="top" title="Share By Email">
                                    <i class="far fa-envelope"></i>
                                </a>
                            </li>
                        </ul>
                        <a href="#"
                            class="d-flex align-items-center text-decoration-none text-color-dark text-color-hover-primary font-weight-semibold text-2">
                            <i class="far fa-heart mr-1"></i> SAVE TO WISHLIST
                        </a>
                    </div> --}}

                </div>

            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <div id="description" class="tabs tabs-simple tabs-simple-full-width-line tabs-product tabs-dark mb-2">
                    <ul class="nav nav-tabs justify-content-start">
                        <li class="nav-item active"><a
                                class="nav-link active font-weight-bold text-3 text-uppercase py-2 px-3"
                                href="#productDescription" data-toggle="tab">{{ __('Description') }}</a></li>
                        {{-- <li class="nav-item"><a class="nav-link font-weight-bold text-3 text-uppercase py-2 px-3" href="#productInfo" data-toggle="tab">Additional Information</a></li>
                        <li class="nav-item"><a class="nav-link nav-link-reviews font-weight-bold text-3 text-uppercase py-2 px-3" href="#productReviews" data-toggle="tab">Reviews (2)</a></li> --}}
                    </ul>
                    <div class="tab-content p-0">
                        <div class="tab-pane px-0 py-3 active" id="productDescription">
                            <p>{{ $product->motachitiet }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Product Reviews --}}
        <div id="comments" class="post-block mt-5 post-comments">

            <h4 class="mb-3">{{ __('Review') }} ({{ $product->comment_number }})</h4>

            <ul class="comments">
                <li>

                    @foreach ($product->comment as $comment)
                        @if ($comment->tra_loi == null)
                            <div class="comment">
                                <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                                    <img class="avatar" alt="" src="{{ asset( $comment->nguoiDanhGia ==null || $comment->nguoiDanhGia->avt == null?'/assets/img/avatars/user.png':$comment->nguoiDanhGia->avt) }}">
                                </div>
                                <div class="comment-block">
                                    <div class="comment-arrow"></div>
                                    <span class="comment-by">
                                        <strong>{{ $comment->nguoiDanhGia == null || $comment->nguoiDanhGia->ten == null ? '(Guest)' : $comment->nguoiDanhGia->ten  }}</strong>
                                        <span class="float-right">
                                            {{-- <span> <a href="{{ $comment->id }}"><i class="fas fa-reply"></i> Reply</a></span> --}}
                                            <label style="cursor: pointer;" class="text-primary" for="btn-reply-{{ $comment->id }}"><i class="fas fa-reply"></i> {{ __('Reply') }}</label>
                                        </span>
                                    </span>

                                    <p>{{ $comment->danh_gia }}.</p>
                                    <span class="date float-right">{{ $comment->created_at->format('M d, y H:i') }}</span>
                                </div>
                                <button class="btn-reply" id="btn-reply-{{ $comment->id }}" hidden></button>
                                <div class="w-100 mt-1 pl-3" style="display: none">
                                    <form action="{{ route('product.reply',$comment->id)}}" method="POST">
                                        @csrf
                                        <div class="w-100">
                                            <textarea class="w-100 form-control" name="reply_message" id="{{ $comment->id }}"></textarea>
                                        </div>
                                        @if ($errors->first('reply_message'))
                                            <label class="text-color-danger text-3">{{ $errors->first('reply_message') }}</label>
                                        @endif
                                        <div class="d-flex justify-content-end mt-2">
                                            <button type="submit" class="btn btn-outline-primary">{{ __('Reply') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        @endif
                        @foreach ($product->comment as $value)
                            @if($value->tra_loi == $comment->id)
                                <ul class="comments reply">
                                    <li>
                                        <div class="comment">
                                            <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                                                <img class="avatar" alt="" src="{{ asset($value->nguoiDanhGia->avt == null?'/assets/img/avatars/user.png':$value->nguoiDanhGia->avt) }}">
                                            </div>
                                            <div class="comment-block">
                                                <div class="comment-arrow"></div>
                                                <span class="comment-by">
                                                    <strong>{{ $value->nguoiDanhGia->ten }}</strong>
                                                    <span class="float-right">
                                                        {{-- <span> <a href="#"><i class="fas fa-reply"></i>
                                                                Reply</a></span> --}}
                                                    </span>
                                                </span>
                                                <p> {{ $value->danh_gia }}.</p>
                                                <span class="date float-right">{{ $value->created_at->format('M d, y H:i') }}</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            @endif
                        @endforeach
                    @endforeach
                </li>
            </ul>

        </div>
        {{-- Product Review --}}
        {{-- Reviwe --}}
        <div class="post-block mt-5 post-leave-comment">
            <h4 class="mb-3">{{ __('Leave a comment') }}</h4>
            <form class="contact-form p-4 rounded bg-color-grey" action="{{ route('product.review',$product->id)}}"
                method="POST">
                @csrf
                <div class="p-2">
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="required font-weight-bold text-dark">{{ __('Review') }}</label>
                            <textarea maxlength="5000" data-msg-required="Please enter your message."
                                rows="8" class="form-control" name="message" required></textarea>
                            @if ($errors->first('message'))
                                <label class="text-color-danger text-3">{{ $errors->first('message') }}</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col mb-0 d-flex">
                            <input type="submit" value="{{ __('Post') }} {{ __('Review') }}" class="btn btn-primary btn-modern"
                                data-loading-text="Loading...">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        {{-- Review --}}
    </div>
</div>


</div>
@endsection
@section('page-js')
<!-- Examples -->
<script src="{{ asset('assets/js/examples/examples.gallery.js') }}"></script>
<!-- Current Page Vendor and Views -->
<script src="{{ asset('assets/js/views/view.shop.js') }}"></script>

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
