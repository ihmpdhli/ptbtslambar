@extends('backend')

@section('content')

<!-- content-header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-12">
            <div class="col-sm-12">
                <h6 class="m-12 text-dark"><a href="/tahun">Transaksi</a> / <a href="/tahun">Tahun</a> / <a href="/tahun/retribusi">Retribusi BTS</a> / {{$title}} </h6>
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
                        <div class="button dropdown-toggle" id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><b>Pilih Tahun</b></div>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                            @foreach ($tahun as $data)
                                <li><a href="/tahun/retribusi/datatahun/{{$data->id}}" class="dropdown-item">{{$data->tahun}}</a></li>
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
                                    <th class="text-center">Autor</th>
                                    <th class="text-center">Tahun</th>
                                    <th class="text-center">Provider</th>
                                    <th class="text-center">Struktur Menara</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">Posisi</th>
                                    <th class="text-center">Tanggal Pembayaran</th>
                                    <th class="text-center">Tarif Retribusi</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($retribusi as $data)
                                <tr>
                                    @if ($data->status == 1)
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ $data->nama_lengkap}}</td>
                                    <td>{{ $data->tahun}}</td>
                                    <td>{{ $data->provider}}</td>
                                    <td>{{ $data->struktur_menara}}</td>
                                    <td>{{ $data->alamat}}</td>
                                    <td>{{ $data->posisi}}</td>
                                    <td>{{ $data->tgl_pembayaran}}</td>
                                    <td>@currency($data->tarif)</td>
                                    <td class="text-center">
                                        @if($data->status == 1)
                                        <div class="text-success"><b>Sudah Bayar</b></div>
                                        @else
                                        @endif
                                    </td>
                                    @else
                                    @endif
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