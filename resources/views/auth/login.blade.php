@extends('layout')
@section('title')

@endsection
@section('content')
<div role="main" class="main shop py-4">

    @if (auth()->user())
        <div class="d-flex justify-content-center">
            <h2 class="text-dark">You are logged! <a href="{{ route('profile') }}">Profile</a></h2>
        </div>
    @else
        <div class="container py-4">

            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-5 mb-10 mb-lg-0">
                    <h2 class="font-weight-bold text-5 mb-0">{{ __('Login') }}</h2>
                    @if ($errors->first('email'))
                        <label class="text-color-danger text-3">{{ $errors->first('email') }}</label>
                    @endif
                    <form action="{{ route('login') }}" id="frmSignIn" method="post" class="needs-validation">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="text-color-dark text-3">{{ __('Email address') }} <span class="text-color-danger">*</span></label>
                                <input type="text" name="email" value="" class="form-control form-control-lg text-4" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="text-color-dark text-3">{{ __('Password') }} <span
                                        class="text-color-danger">*</span></label>
                                <input type="password" value="" name="password" class="form-control form-control-lg text-4" required>
                            </div>
                        </div>
                        <div class="form-row justify-content-between">
                            <div class="form-group col-md-auto">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="rememberme">
                                    <label class="custom-control-label cur-pointer text-2" name="remember" for="rememberme">{{ __('Remember') }}</label>
                                </div>
                            </div>
                            <div class="form-group col-md-auto">
                                <a class="text-decoration-none text-color-dark text-color-hover-primary font-weight-semibold text-2"
                                    href="{{ route('f.forgot') }}">{{ __('Forgot Password') }}?</a>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <button type="submit"
                                    class="btn btn-dark btn-modern btn-block text-uppercase rounded-0 font-weight-bold text-3 py-3"
                                    data-loading-text="{{ __('Loading') }}...">{{ __('Login') }}</button>
                                <a href="{{route('register')}}"
                                    class="btn btn-primary-scale-2 btn-modern btn-block text-transform-none rounded-0 font-weight-bold align-items-center d-inline-flex justify-content-center text-3 py-3"
                                    data-loading-text="{{ __('Loading') }}...">{{ __('Register') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    @endif

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
