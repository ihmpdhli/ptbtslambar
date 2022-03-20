<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration</title>
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

<body class=" hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="{{asset ('AdminLTE')}}/index2.html"></a>
        </div>

        <div class="card rounded-sm">
            <div class="card-body register-card-body rounded-lg">
                <h3 class="text-center"><strong>Daftar</strong></h3>
                <br>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-6 col-form-label text-md-left">{{ __('Name') }}</label>

                        <div class="col-md-12">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ __('Name sudah digunakan') }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_lengkap" class="col-md-6 col-form-label text-md-left">{{ __('Nama Lengkap') }}</label>

                        <div class="col-md-12">
                            <input id="nama_lengkap" type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required autocomplete="nama_lengkap" autofocus placeholder="Nama Lengkap">

                            @error('nama_lengkap')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-6 col-form-label text-md-left">{{ __('Alamat E-Mail') }} </label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ __('Email sudah digunakan') }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-6 col-form-label text-md-left">{{ __('Password') }}</label>

                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-8 col-form-label text-md-left">{{ __('Konfirmasi Password') }}</label>

                        <div class="col-md-12">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password">
                        </div>
                    </div>

                    <br>
                    <div class="form-group row">
                        <div class="container-fluid">
                            <button type="submit" class="btn btn-outline-primary rounded-pill col-md-12">
                                {{ __('Mendaftar') }}
                            </button>
                        </div>
                    </div>
                </form>

                <br>
                <div class="row">
                    <div class="col-6"><a href="/" class="text-center">Beranda</a></div>
                    <div class="col-6"><span class="float-right"><a href="login" class="text-center"> Sudah punya akun!</a></span></div>
                </div>

            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="{{asset ('AdminLTE')}}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset ('AdminLTE')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset ('AdminLTE')}}/dist/js/adminlte.min.js"></script>
</body>

</html>