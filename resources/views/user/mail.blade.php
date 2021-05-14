@extends('layout')
@section('title')
<title>Porto - {{ __('Profile') }}</title>
@endsection
@section('content')
<div role="main" class="main">

    <div id="comments" class="post-block pl-5 pr-5 mt-0 post-comments">
        <ul class="comments p-1">
            <li>
                @foreach ($mails as $mail)
                    @if ($mail->rep_mail)
                        <div class="comment">
                            <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                                <img class="avatar" alt="" src="{{ asset($mail->nguoiTao->avatar == null?'/assets/img/avatars/user.png':$mail->nguoiTao->avatar) }}">
                            </div>
                            <div class="comment-block">
                                <div class="comment-arrow"></div>
                                <span class="comment-by">
                                    <strong>Bạn ({{ $mail->nguoiTao->email }})</strong>
                                </span>
                                <p>{{ $mail->noi_dung }}.</p>
                                <span class="date float-right">{{ $mail->created_at->format('M d, y H:i') }}</span>
                            </div>
                            <button class="btn-reply" id="btn-reply-{{ $mail->id }}" hidden></button>
                            <div class="w-100 mt-1 pl-3" style="display: none">
                                <form action="{{ route('blog.reply',$mail->id)}}" method="POST">
                                    @csrf
                                    <div class="w-100">
                                        <textarea class="w-100 form-control" name="reply_message" id="{{ $mail->id }}"></textarea>
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
                    <div class="reply" style="display: none">
                        @foreach ($mail->rep_mail as $value)
                            <ul class="comments reply">
                                <li>
                                    <div class="comment">
                                        <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                                            <img class="avatar" alt="" src="{{ asset($value->nguoiTraLoi->avatar == null?'/assets/img/avatars/user.png':$value->nguoiBinhLuan->avatar) }}">
                                        </div>
                                        <div class="comment-block">
                                            <div class="comment-arrow"></div>
                                            <span class="comment-by">
                                                <strong>{{ $value->nguoiTraLoi->ten.'('.$value->nguoiTraLoi->mail.')' }}</strong>
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
                        @endforeach
                    </div>
                @endforeach
            </li>
        </ul>

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
