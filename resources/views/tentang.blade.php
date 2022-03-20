<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>PETA TOWER BTS LAMPUNG BARAT</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset ('AdminLTE')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset ('AdminLTE')}}/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset ('AdminLTE')}}/plugins/sweetalert2/sweetalert2.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset ('AdminLTE')}}/plugins/toastr/toastr.min.css">
    <!-- Logo favicon web -->
    <link rel="icon" href="{{asset ('AdminLTE')}}/dist/img/logokominfo.png">

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{asset ('AdminLTE')}}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset ('AdminLTE')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset ('AdminLTE')}}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset ('AdminLTE')}}/dist/js/demo.js"></script>

    <!-- Leaflet Library -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/hosuaby/Leaflet.SmoothMarkerBouncing@v2.0.0/dist/bundle.js" crossorigin="anonymous"></script>

</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Menu -->
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

            <div class="col-sm-12">
                <br>
                <div class="text-center"><h4><b>Pelayanan Rekomendasi Pendirian Tower/Menara Telekomunikasi</b></h4></div>
                <br>
            </div>
    
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-primary card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                Rekomendasi Pendirian Tower Menara Telekomunikasi
                            </h3>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="persyaratan-tab" data-toggle="pill" href="#persyaratan" role="tab" aria-controls="persyaratan" aria-selected="true">Persyaratan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="prosedur-tab" data-toggle="pill" href="#prosedur" role="tab" aria-controls="prosedur" aria-selected="false">Prosedur</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="produk-tab" data-toggle="pill" href="#produk" role="tab" aria-controls="produk" aria-selected="false">Produk</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="jangka-waktu-tab" data-toggle="pill" href="#jangka-waktu" role="tab" aria-controls="jangka-waktu" aria-selected="false">Jangka Waktu</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="biaya-tarif-tab" data-toggle="pill" href="#biaya-tarif" role="tab" aria-controls="biaya-tarif" aria-selected="false">Biaya/Tarif</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="aduan-saran-masukan-tab" data-toggle="pill" href="#aduan-saran-masukan" role="tab" aria-controls="aduan-saran-masukan" aria-selected="false">Aduan/Saran/Masukan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="waktu-pelayanan-tab" data-toggle="pill" href="#waktu-pelayanan" role="tab" aria-controls="waktu-pelayanan" aria-selected="false">Waktu Pelayanan</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="custom-content-below-tabContent">
                                    <div class="tab-pane fade show active" id="persyaratan" role="tabpanel" aria-labelledby="persyaratan-tab">
                                        <br>
                                        <b style="padding-left:10px;">Syarat :</b>
                                        <ul style="padding-left:30px;">
                                            <li>Fotocopy KTP pemohon</li>
                                            <li>Fotocopy NPWP</li>
                                            <li>Fotocopy sertifikat tanah lokasi tempat pembangunan tower atau menara telekomunikasi</li>
                                            <li>Fotocopy akta pendirian usaha</li>
                                            <li>Gambar bangunan tower/menara telekomunikasi</li>
                                            <li>Rencana Anggaran Biaya (RAB)</li>
                                            <li>Titik koordinat dan lokasi site menara telekomunikasi</li>
                                            <li>Jaminan asuransi bagi masyarakat yang berada pada radius radiasi ketinggian tower/menara telekomunikasi</li>
                                            <li>Surat izin lingkungan dari masyarakat sekeliling menara telekomunikasi</li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="prosedur" role="tabpanel" aria-labelledby="prosedur-tab">
                                        <br>
                                        <ul style="padding-left:30px;">
                                            <li>Pemohon datang ke Dinas Komunikasi dan Informatika</li>
                                            <li>Mengisi formulir permohonan yang telah disediakan</li>
                                            <li>Menyerahkan berkas persyaratan</li>
                                            <li>Jika berkas lengkap, petugas akan memberikan surat pernyataan tidak keberatan untuk pengecekan lokasi</li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="produk" role="tabpanel" aria-labelledby="produk-tab">
                                        <br>
                                        <ul style="padding-left:30px;">
                                            <li>Surat Rekomendasi Pendirian Menara Telekomunikasi</li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="jangka-waktu" role="tabpanel" aria-labelledby="jangka-waktu-tab">
                                        <br>
                                        <ul style="padding-left:30px;">
                                            <li>Maksimal 7 (tujuh) hari kerja sejak permohonan diterima petugas</li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="biaya-tarif" role="tabpanel" aria-labelledby="biaya-tarif-tab">
                                        <br>
                                        <ul style="padding-left:30px;">
                                            <li>Tidak dikenakan biaya (gratis)</li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="aduan-saran-masukan" role="tabpanel" aria-labelledby="aduan-saran-masukan-tab">
                                        <br>
                                        <ul style="padding-left:30px;">
                                            <li>Email : kominfo@lampungbaratkab.go.id</li>
                                            <li>WhatsApp = <i class="fa fa-phone"></i><a href="https://api.whatsapp.com/send?phone=6281272063003" target="_blank" style="text-decoration:none;"><span style="font-size:16px"> 081272063003</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="waktu-pelayanan" role="tabpanel" aria-labelledby="waktu-pelayanan-tab">
                                        <br>
                                        <ul style="padding-left:30px;">
                                            <li>Senin-Kamis 08.00 – 12.00 WIB</li>
                                            <li>Jum’at 08.00 – 11.00 WIB</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>

                    <br>

                    <div class="col-sm-12">
                        <div class="text-center"><h4><b>Provider yang Terdaftar</b></h4></div>
                    </div>

                    <br>

                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                @foreach ($provider as $data)
                                    <div class="col-md-3">
                                        <div class="info-box">
                                            <span class="info-box-icon"><img src="{{ asset('icon')}}/{{ $data->icon}}" width="40px"></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text"><b>{{ $data->provider}}</b></span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>

                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <iframe width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" src="https://www.google.com/maps/embed?pb=!4v1591194439975!6m8!1m7!1sCAoSLEFGMVFpcE0yUWhIS0xQYnRtUlJVYXNIWDlhaVFVX0NndDlFQVlKQXNtai1h!2m2!1d-5.020361299999999!2d104.0606661!3f306.2826766326415!4f-0.32364697146509513!5f0.7820865974627469"></iframe>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1692.2727006994496!2d104.05989222344742!3d-5.0203612520992715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e478f04b4a0e1ff%3A0x25814d88ee75b4cf!2sDinas%20Komunikasi%20dan%20Informatika!5e1!3m2!1sid!2sid!4v1591181469400!5m2!1sid!2sid" width=100% height="300" frameborder="0" style="border:0;" allowfullscreen="yes" aria-hidden="false" tabindex="0"></iframe>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <iframe style="border-width:thin;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7949.027522588219!2d104.0597093!3d-5.020077299999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e478f04b4a0e1ff%3A0x25814d88ee75b4cf!2sDinas%20Komunikasi%20dan%20Informatika!5e0!3m2!1sid!2sid!4v1591182003316!5m2!1sid!2sid" width=100% height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
            </section>
            <!-- /.content -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2021 </strong> <a href="/tentang">- Dinas Komunikasi dan Informatika</a>
            </footer>
        </div>
        
    </div>
</body>

</html>