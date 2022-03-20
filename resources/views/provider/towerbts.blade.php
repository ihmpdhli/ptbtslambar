@extends('backend')

@section('content')

<!-- content-header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-12">
            <div class="col-sm-12">
                <h6 class="m-12 text-dark"><a href="/provider">Data</a> / <a href="/provider">Provider</a> / Tower BTS</h6>
            </div>
        </div>
    </div>
</div>
<!-- content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <!-- card -->
                <div class="card">
                    <div class="card-header">
                        <div class="button dropdown-toggle" id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><b>Pilih Provider</b></div>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                            @foreach ($provider as $data)
                                <li><a href="/provider/towerbts/dataprovider/{{$data->id}}" class="dropdown-item">{{$data->provider}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        @if (session('pesan'))
                        <div class="alert alert-success alert-dismissible text-center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> {{session('pesan')}}</h5>
                        </div>
                        @endif

                        <!-- table -->
                        <table id="example1" class="table table-bordered table-striped projects rounded-lg">
                            <thead>
                                <tr>
                                    <th width="10px" class="text-center">No</th>
                                    <th class="text-center">Author</th>
                                    <th class="text-center">Provider</th>
                                    <th class="text-center">Kecamatan</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">Tanggal Berdiri</th>
                                    <th width="150px" class="text-center">Posisi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($towerbts as $data)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ $data->nama_lengkap}}</td>
                                    <td>{{ $data->provider}}</td>
                                    <td>{{ $data->kecamatan}}</td>
                                    <td>{{ $data->alamat}}</td>
                                    <td>{{ $data->tgl_berdiri}}</td>
                                    <td>{{ $data->posisi}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- table -->
                    </div>
                </div>
                <!-- card -->

            </div>

        </div>
    </div>
</div>
<!-- Main content -->


@endsection