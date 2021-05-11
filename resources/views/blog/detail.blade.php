@extends('layout')
@section('title')
@endsection
@section('content')
<div class="container py-4">

    <div class="row">
        <div class="col">
            <div class="blog-posts single-post">

                <article class="post post-large blog-single-post border-0 m-0 p-0">
                    <div class="post-image ml-0">
                        <a href="">
                            <img src="{{ asset($blog->anh==null?'assets/img/blog/wide/blog-11.jpg':$blog->anh) }}"
                                class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                        </a>
                    </div>
                    <div class="post-date ml-0">
                        <span class="day">{{ $blog->created_at->format('d') }}</span>
                        <span class="month">{{ $blog->created_at->format('M') }}</span>
                    </div>

                    <div class="post-content ml-0">

                        <h2 class="font-weight-semi-bold"><a href="">{{ $blog->tieu_de }}</a></h2>

                        <div class="post-meta">
                            <span><i class="far fa-user"></i> {{ __('By') }} <a href="#">{{ $blog->Author->name }}</a> </span>
                            <span><i class="far fa-folder"></i> <a href="#">{{ $blog->BlogType->ten }}</a></span>
                            <span><i class="far fa-comments"></i> <a href="#">{{ $blog->comment_number }} Comments</a></span>
                        </div>


                        {{-- Start blog content --}}
                        {!! $blog->noi_dung !!}
                        {{-- end blog content --}}

                        {{-- <div class="post-block mt-5 post-share">
                            <h4 class="mb-3">Share this Post</h4>

                            <!-- AddThis Button BEGIN -->
                            <div class="addthis_toolbox addthis_default_style ">
                                <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                <a class="addthis_button_tweet"></a>
                                <a class="addthis_button_pinterest_pinit"></a>
                                <a class="addthis_counter addthis_pill_style"></a>
                            </div>
                            <script type="text/javascript"
                                src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50faf75173aadc53"></script>
                            <!-- AddThis Button END -->

                        </div> --}}

                        {{-- <div class="post-block mt-4 pt-2 post-author">
                            <h4 class="mb-3">Author</h4>
                            <div class="img-thumbnail img-thumbnail-no-borders d-block pb-3">
                                <a href="blog-post.html">
                                    <img src="img/avatars/avatar.jpg" alt="">
                                </a>
                            </div>
                            <p><strong class="name"><a href="#" class="text-4 pb-2 pt-2 d-block">{{ $blog->Author->name }}</a></strong>
                            </p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio,
                                gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et,
                                interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare
                                nisi, vitae mattis nulla ante id dui. </p>
                        </div> --}}
                        <div id="comments" class="post-block mt-5 post-comments">
                            <h4 class="mb-3">{{ __('Comment') }} ({{ $blog->comment_number }})</h4>

                            <ul class="comments">
                                <li>
                                    @foreach ($blog->comment as $comment)
                                        @if ($comment->tra_loi == null)

                                            <div class="comment">
                                                <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                                                    <img class="avatar" alt="" src="{{ asset($comment->nguoiBinhLuan->avatar == null?'/assets/img/avatars/user.png':$comment->nguoiBinhLuan->avatar) }}">
                                                </div>
                                                <div class="comment-block">
                                                    <div class="comment-arrow"></div>
                                                    <span class="comment-by">
                                                        <strong>{{ $comment->nguoiBinhLuan->name }}</strong>
                                                        <span class="float-right">
                                                            {{-- <span> <a href="{{ $comment->id }}"><i class="fas fa-reply"></i> {{ __('Reply') }}</a></span> --}}
                                                            <label style="cursor: pointer;" class="text-primary" for="btn-reply-{{ $comment->id }}"><i class="fas fa-reply"></i> {{ __('Reply') }}</label>
                                                        </span>
                                                    </span>
                                                    <p>{{ $comment->noi_dung }}.</p>
                                                    <span class="date float-right">{{ $comment->created_at->format('M d, y H:i') }}</span>
                                                </div>
                                                <button class="btn-reply" id="btn-reply-{{ $comment->id }}" hidden></button>
                                                <div class="w-100 mt-1 pl-3" style="display: none">
                                                    <form action="{{ route('blog.reply',$comment->id)}}" method="POST">
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
                                        @foreach ($blog->comment as $value)
                                            @if($value->tra_loi == $comment->id)
                                                <ul class="comments reply">
                                                    <li>
                                                        <div class="comment">
                                                            <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                                                                <img class="avatar" alt="" src="{{ asset($value->nguoiBinhLuan->avatar == null?'/assets/img/avatars/user.png':$value->nguoiBinhLuan->avatar) }}">
                                                            </div>
                                                            <div class="comment-block">
                                                                <div class="comment-arrow"></div>
                                                                <span class="comment-by">
                                                                    <strong>{{ $value->nguoiBinhLuan->name }}</strong>
                                                                    <span class="float-right">
                                                                        {{-- <span> <a href="#"><i class="fas fa-reply"></i>
                                                                                Reply</a></span> --}}
                                                                    </span>
                                                                </span>
                                                                <p>{{ $value->noi_dung }}.</p>
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

                        <div class="post-block mt-5 post-leave-comment">
                            <h4 class="mb-3">{{ __('Leave a comment') }}</h4>

                            <form class="contact-form p-4 rounded bg-color-grey" action="{{ route('blog.review',$blog->id) }}"
                                method="POST">
                                @csrf
                                <div class="p-2">
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label class="required font-weight-bold text-dark">{{ __('Comment') }}</label>
                                            <textarea maxlength="5000" data-msg-required="Please enter your message."
                                                rows="8" class="form-control" name="message" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col mb-0">
                                            <input type="submit" value="{{ __('Post')}} {{ __('Comment') }}" class="btn btn-primary btn-modern"
                                                data-loading-text="Loading...">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </article>

            </div>
        </div>
    </div>

</div>
@endsection
@section('page-js')
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
