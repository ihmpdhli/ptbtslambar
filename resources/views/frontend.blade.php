<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>PETA TOWER BTS LAMPUNG BARAT</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset ('AdminLTE')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset ('AdminLTE')}}/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Logo favicon web -->
    <link rel="icon" href="{{asset ('AdminLTE')}}/dist/img/logokominfo.png">

    <!-- Leaflet Library -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/hosuaby/Leaflet.SmoothMarkerBouncing@v2.0.0/dist/bundle.js" crossorigin="anonymous"></script>

</head>

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">

                <a href="/" class="site-logo">
                    <img src="{{asset ('AdminLTE')}}/dist/img/logo_kominfo-01.png" width="150" alt="">
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    
                <div class="collapse navbar-collapse order-3 ml-auto" id="navbarCollapse">
                    <!-- Right navbar links -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="/" class="nav-link"><b>Beranda</b></a>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><b>Kecamatan</b></a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                @foreach ($kecamatan as $data)
                                    <li><a href="/kecamatanpeta/{{$data->id}}" class="dropdown-item">{{$data->kecamatan}}</a></li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><b>Provider</b></a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                @foreach ($provider as $data)
                                    <li><a href="/providerpeta/{{$data->id}}" class="dropdown-item">{{$data->provider}}</a></li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="/tentang" class="nav-link"><b>Informasi</b></a>
                        </li>

                        <li class="nav-item">
                            <a  href="{{ route('login') }}" class="nav-link"><b>Masuk</b></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->
        <!-- Content Wrapper. Contains page content -->
        <div class=" content-wrapper">

            <!-- Main content -->
            <div class="content">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
        
        <!-- /.content -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2021 </strong> <a href="/">- Dinas Komunikasi dan Informatika</a> 
        </footer>
    </div>

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{asset ('AdminLTE')}}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset ('AdminLTE')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset ('AdminLTE')}}/dist/js/adminlte.min.js"></script>
</body>

</html>