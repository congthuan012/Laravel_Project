@extends('layout')
@section('title')

@endsection
@section('content')
<div role="main" class="main shop py-4">

    <div class="container py-4">

        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-5 mb-10 mb-lg-0">
                <h2 class="font-weight-bold text-5 mb-0">{{ __('Reset Password') }}</h2>
                <form action="{{ route('forgot') }}" id="frmSignIn" method="post" class="needs-validation">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="text-color-dark text-3">{{ __('Email address') }} <span
                                    class="text-color-danger">*</span></label>
                            <input type="text" value="" name="email" class="form-control form-control-lg text-4" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <button type="submit"
                                class="btn btn-dark btn-modern btn-block text-uppercase rounded-0 font-weight-bold text-3 py-3"
                                data-loading-text="Loading...">{{ __('Send to email') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>
@endsection
@section('page-js')
@endsection
