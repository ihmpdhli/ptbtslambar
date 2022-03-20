@extends('backend')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-12">
            <div class="col-sm-12">
                <h6 class="m-12 text-dark"></h6>
            </div>
        </div>
    </div>
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <section class="content">
                            <!-- Small boxes (Stat box) -->
                            <div class="row">

                                @if (auth()->user()->level==1)
                                <div class="col-lg-4 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-gradient-primary">
                                        <div class="inner">
                                            <h3>{{ $towerbts }}</h3>
                                            
                                            <p>BTS</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-broadcast-tower"></i>
                                        </div>
                                        <a href="/towerbts" class="small-box-footer">Detail Data <i class="fa fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-4 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-gradient-primary">
                                        <div class="inner">
                                            <h3>{{ $providers }}</h3>

                                            <p>Provider</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-rss nav-icon"></i>
                                        </div>
                                        <a href="/provider" class="small-box-footer">Detail Data <i class="fa fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-4 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-gradient-primary">
                                        <div class="inner">
                                            <h3>{{ $kecamatans }}</h3>

                                            <p>Kecamatan</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-map nav-icon"></i>
                                        </div>
                                        <a href="/kecamatan" class="small-box-footer">Detail Data <i class="fa fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                @elseif (auth()->user()->level==2)
                                <div class="container">
                                    <h2 class="text-center">Selamat Datang di Website Pelayanan Tower/Menara Telekomunikasi BTS Kabupaten Lampung Barat</h2>
                                </div>
                                @endif
                                
                            </div>
                        </section>
                        <!--<div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <center>
                        {{ __('You are logged in!') }}
                    </center>
                </div>
            </div>-->
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->


@endsection