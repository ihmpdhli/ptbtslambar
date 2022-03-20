<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Dasboard</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset ('AdminLTE')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset ('AdminLTE')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset ('AdminLTE')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset ('AdminLTE')}}/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset ('AdminLTE')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Logo favicon web -->
    <link rel="icon" href="{{asset ('AdminLTE')}}/dist/img/logokominfo.png">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset ('AdminLTE')}}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{asset ('AdminLTE')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- jQuery -->
    <script src="{{asset ('AdminLTE')}}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset ('AdminLTE')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="{{asset ('AdminLTE')}}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset ('AdminLTE')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset ('AdminLTE')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset ('AdminLTE')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset ('AdminLTE')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset ('AdminLTE')}}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset ('AdminLTE')}}/dist/js/demo.js"></script>

    <!-- Select2 -->
    <script src="{{asset ('AdminLTE')}}/plugins/select2/js/select2.full.min.js"></script>

    <!-- page script -->
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <!-- Leaflet Library -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/hosuaby/Leaflet.SmoothMarkerBouncing@v2.0.0/dist/bundle.js" crossorigin="anonymous"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Profil Dropdown Menu -->
                <li class="nav-item ">
                    <a class="nav-link navbar-brand" data-toggle="dropdown" href="#">
                        <div class="user-panel d-flex">
                            <div class="image dropdown-toggle">
                                <div class="image">
                                    <span class="small">{{Auth::user()->name}}</span>
                                    <img class="img-circle" src="{{asset ('AdminLTE')}}/dist/img/defaultuser.png" alt="User profile picture">
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a class="dropdown-item text-center">Profil</a>
                        <div class="dropdown-divider"></div>
                        <span>
                            <a class="nav-link text-center text-secondary" href="/profil/{{auth()->user()->id}}">
                            <b>Edit Profil</b>
                            </a>
                        </span>
                        <div class="dropdown-divider"></div>
                        <span>
                            <a class="nav-link text-center text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <b>Logout</b>
                            </a>
                        </span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Status Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary">
            <div class="pull-left info brand-link">
                    <center>
                        @if(auth()->user()->level==1)
                        <b>ADMINISTRATOR</b>
                        @elseif(auth()->user()->level==2)
                        <b>PROVIDER</b>
                        @endif
                    </center>
            </div>

            <!-- Navigation-->
            <div class="sidebar">
                <nav class="mt-2">
                    @include('navigation')
                </nav>
            </div>
        </aside>

        <!-- Content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

    <!--page script-->
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 1000)
    </script>

    @include('sweetalert::alert')

</body>

</html>