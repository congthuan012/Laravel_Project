<!doctype html>
<html class="fixed">

<head>

    @include('admin.widget.head')

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Login | Porto Admin</title>
</head>

<body>
    <!-- start: page -->
    <section class="body-sign">
        <div class="center-sign">
            <a href="/" class="logo float-left">
                <img src="{{ asset('assets-admin/img/logo.png') }}" height="54" alt="Porto Admin" />
            </a>

            <div class="panel card-sign">
                <div class="card-title-sign mt-3 text-right">
                    <h2 class="title text-uppercase font-weight-bold m-0"><i class="fas fa-user mr-1"></i> Sign In</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.login') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <div class="input-group">
                                <input name="email" type="email" class="form-control form-control-lg" />
                                <span class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </span>
                            </div>
                            @if ($errors->first('email'))
                                <label class="text-danger text-3">{{ $errors->first('email') }}</label>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <div class="clearfix">
                                <label class="float-left">Password</label>
                                <a href="pages-recover-password.html" class="float-right">Lost Password?</a>
                            </div>
                            <div class="input-group">
                                <input name="password" type="password" class="form-control form-control-lg" />
                                <span class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </span>
                            </div>
                            @if ($errors->first('password'))
                            <label class="text-color-danger text-3">{{ $errors->first('password') }}</label>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="checkbox-custom checkbox-default">
                                    <input id="RememberMe" name="rememberme" type="checkbox" />
                                    <label for="RememberMe">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-sm-4 text-right">
                                <button type="submit" class="btn btn-primary mt-2">Sign In</button>
                            </div>
                        </div>

                        <p class="text-center">Don't have an account yet? <a href="pages-signup.html">Sign Up!</a></p>

                    </form>
                </div>
            </div>

            <p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2017. All Rights Reserved.</p>
        </div>
    </section>
    <!-- end: page -->

    @include('admin.widget.js')

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
</body>

</html>
