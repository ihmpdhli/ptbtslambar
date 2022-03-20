<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset ('AdminLTE')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset ('AdminLTE')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset ('AdminLTE')}}/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Logo favicon web -->
    <link rel="icon" href="{{asset ('AdminLTE')}}/dist/img/logokominfo.png">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{asset ('AdminLTE')}}/index2.html"></a>
        </div>
        <!-- /.login-logo -->
        <div class="card rounded-sm">
            <div class="card-body login-card-body rounded-lg">
                <h3 class="text-center"><strong>Silahkan Masuk</strong></h3>
                <br>
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @if(session('gagal'))
                    <div class="bg-danger rounded disabled color-palette">
                        <p class="text-center">{{session('gagal')}}</p>
                    </div>
                    @endif
                    <div class="form-group row">
                        <label for="email" class="col-md-6 col-form-label text-md-left" >{{ __('E-Mail') }}</label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>Mohon maaf, kombinasi Email dan Password anda salah</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-6 col-form-label text-md-left">{{ __('Password') }}</label>

                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>Mohon maaf, kombinasi Email dan Password anda salah</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row container-fluid ">
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Lupa Password?') }}
                        </a>
                        @endif
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-12 ml-auto">
                            <button type="submit" class="btn btn-outline-primary btn-block rounded-pill">{{ __('Masuk') }}</button>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-6"><a href="/" class="text-center">Beranda</a></div>
                        <div class="col-6"><span class="float-right"><a href="register" class="text-center"> Daftar akun!</a></span></div>
                    </div>
                </form>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{asset ('AdminLTE')}}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset ('AdminLTE')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset ('AdminLTE')}}/dist/js/adminlte.min.js"></script>

</body>

</html>