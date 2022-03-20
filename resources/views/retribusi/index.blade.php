@extends('backend')

@section('content')

<!-- content-header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-12">
            <div class="col-sm-12">
                <h6 class="m-12 text-dark"><a href="/retribusi">Transaksi</a> / Retribusi BTS</h6>
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
                    @if(auth()->user()->level == 1)
                    <div class="card-header">
                        <a href="/retribusi/add" type="button" class="btn btn-primary btn-sm btn-flat rounded-lg"><i class="fa fa-plus nav-icon"></i> Tambah Data</a>
                    </div>
                    <div class="card-body">
                        @if (session('pesan'))
                        <div class="alert alert-success alert-dismissible text-center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> {{session('pesan')}}</h5>
                        </div>
                        @endif

                        <!-- table -->
                        <table id="example1" class="table table-bordered table-striped projects">
                            <thead>
                                <tr>
                                    <th width="10px" class="text-center">No</th>
                                    <th class="text-center">Provider</th>
                                    <th class="text-center">Author</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">Tahun</th>
                                    <th class="text-center">Tanggal Pembayaran</th>
                                    <th width="85px" class="text-center">Tarif Retribusi</th>
                                    <th class="text-center">Status</th>
                                    <th width="120px" class="text-center">Keterangan</th>
                                    <th width="165px" class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($retribusi as $data)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ $data->provider}}</td>
                                    <td>{{ $data->nama_lengkap}}</td>
                                    <td>{{ $data->alamat}}</td>
                                    <td>{{ $data->tahun}}</td>
                                    <td>
                                        @if ($data->status == 1)
                                        {{ $data->tgl_pembayaran}}</td>
                                        @else
                                            
                                        @endif
                                    </td>
                                    <td>
                                        @if($data->status == 5 | $data->status == 1)
                                        <span class="text-success"><b>@currency($data->tarif)</b></span>
                                        @elseif($data->status == 6)
                                        <span class="text-danger"><b>@currency($data->tarif)</b></span>
                                        @else
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($data->status == 0)
                                        <div class="text-danger"><b>Ditolak</b></div>
                                        @elseif($data->status == 1)
                                        <div class="text-success"><b>Diterima</b></div>
                                        @elseif($data->status == 2)
                                        <div class="text-secondary"><b>Menunggu</b></div>
                                        @elseif($data->status == 3)
                                        <div class="text-warning"><b>Terdapat Kesalahan</b></div>
                                        @elseif($data->status == 4)
                                        <div class="text-info"><b>Sudah diperbaiki</b></div>
                                        @elseif($data->status == 5)
                                        <div class="text-success"><b>Sudah Bayar</b></div>
                                        @elseif($data->status == 6)
                                        <div class="text-info"><b>Silahkan Bayar</b></div>
                                        @endif
                                    </td>
                                    @if($data->status == 0 || $data->status == 1)
                                        <td class="text-center">
                                            <div class="text-info"><b>Terkonfirmasi</b></div>
                                        </td>
                                        <td class="text-center">
                                            <a href="/retribusi/detail/{{$data->retribusi}}" class="btn btn-info"><i style="color:white" class="far fa-eye"></i></a>
                                            <a href="/retribusi/edit/{{$data->retribusi}}" class="btn btn-warning"><i style="color:white" class="fas fa-edit"></i></a>
                                            <a class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->retribusi}}"><i style="color:white" class="fas fa-trash"></i></a>
                                        </td>
                                    @elseif($data->status == 5)
                                    <td class="text-center">
                                        <a href="/retribusi/accept/{{$data->retribusi}}" class="btn btn-success" data-toggle="modal" data-target="#accept{{ $data->retribusi}}"><i style="color:white" class="fas fa-check"></i></a>
                                        <a href="/retribusi/reject/{{$data->retribusi}}" class="btn btn-danger" data-toggle="modal" data-target="#reject{{ $data->retribusi}}"><i style="color:white" class="fa fa-minus"></i></a>
                                    </td>
                                    <td class="text-center">
                                        <a href="/retribusi/wrong/{{$data->retribusi}}"type="button" class="btn btn-secondary" data-toggle="modal" data-target="#wrong{{ $data->retribusi}}"><i style="color:white" class="fa fa-ban"></i></a>
                                        <a href="/retribusi/detail/{{$data->retribusi}}" class="btn btn-info"><i style="color:white" class="far fa-eye"></i></a>
                                        <a href="/retribusi/edit/{{$data->retribusi}}" class="btn btn-warning"><i style="color:white" class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->retribusi}}"><i style="color:white" class="fas fa-trash"></i></a>
                                    </td>
                                    @else
                                        <td class="text-center">
                                            <a href="/retribusi/slkbayar/{{$data->retribusi}}"type="button" class="btn btn-info" data-toggle="modal" data-target="#slkbayar{{ $data->retribusi}}"><i style="color:white" class="fas fa-money-bill-wave"></i></a>
                                            <a href="/retribusi/accept/{{$data->retribusi}}" class="btn btn-success" data-toggle="modal" data-target="#accept{{ $data->retribusi}}"><i style="color:white" class="fas fa-check"></i></a>
                                            <a href="/retribusi/reject/{{$data->retribusi}}" class="btn btn-danger" data-toggle="modal" data-target="#reject{{ $data->retribusi}}"><i style="color:white" class="fa fa-minus"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <a href="/retribusi/wrong/{{$data->retribusi}}"type="button" class="btn btn-secondary" data-toggle="modal" data-target="#wrong{{ $data->retribusi}}"><i style="color:white" class="fa fa-ban"></i></a>
                                            <a href="/retribusi/detail/{{$data->retribusi}}" class="btn btn-info"><i style="color:white" class="far fa-eye"></i></a>
                                            <a href="/retribusi/edit/{{$data->retribusi}}" class="btn btn-warning"><i style="color:white" class="fas fa-edit"></i></a>
                                            <a class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->retribusi}}"><i style="color:white" class="fas fa-trash"></i></a>
                                        </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- table -->

                    </div>

                    @elseif(auth()->user()->level == 2)
                    <div class="card-header">
                        <a href="/retribusi/add" type="button" class="btn btn-primary btn-sm btn-flat rounded-lg"><i class="fa fa-plus nav-icon"></i> Tambah Data</a>
                    </div>
                    <div class="card-body">
                        @if (session('pesan'))
                        <div class="alert alert-success alert-dismissible text-center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> {{session('pesan')}}</h5>
                        </div>
                        @endif

                        <!-- table -->
                        <table id="example1" class="table table-bordered table-striped projects">
                            <thead>
                                <tr>
                                    <th width="10px" class="text-center">No</th>
                                    <th class="text-center">Provider</th>
                                    <th class="text-center">Struktur Menara</th>
                                    <th class="text-center">Alamat</th>
                                    <th width="100px" class="text-center">Posisi</th>
                                    <th class="text-center">Tahun</th>
                                    <th class="text-center">Tanggal Pembayaran</th>
                                    <th width="80px" class="text-center">Tarif Retribusi</th>
                                    <th class="text-center">Status</th>
                                    <th width="50px" class="text-center">Keterangan</th>
                                    <th width="80px" class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($retribusi as $data)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ $data->provider}}</td>
                                    <td>{{ $data->struktur_menara}}</td>
                                    <td>{{ $data->alamat}}</td>
                                    <td>{{ $data->posisi}}</td>
                                    <td>{{ $data->tahun}}</td>
                                    <td>
                                        @if ($data->status == 1)
                                        {{ $data->updated_at}}</td>
                                        @else
                                            
                                        @endif
                                    </td>
                                    <td>
                                        @if($data->status == 5 | $data->status == 1)
                                        <span class="text-success"><b>@currency($data->tarif)</b></span>
                                        @elseif($data->status == 6)
                                        <span class="text-danger"><b>@currency($data->tarif)</b></span>
                                        @else
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($data->status == 0)
                                        <div class="text-danger"><b>Ditolak</b></div>
                                        @elseif($data->status == 1)
                                        <div class="text-success"><b>Diterima</b></div>
                                        @elseif($data->status == 2)
                                        <div class="text-secondary"><b>Menunggu</b></div>
                                        @elseif($data->status == 3)
                                        <div class="text-warning"><b>Terdapat Kesalahan</b></div>
                                        @elseif($data->status == 4)
                                        <div class="text-info"><b>Sudah diperbaiki</b></div>
                                        @elseif($data->status == 5)
                                        <div class="text-success"><b>Sudah Bayar</b></div>
                                        @elseif($data->status == 6)
                                        <div class="text-info"><b>Silahkan Bayar</b></div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($data->status == 6)
                                        <a href="/retribusi/detail/{{$data->retribusi}}" class="btn btn-info"><i style="color:white" class="far fa-eye"></i></a>
                                        <a href="/retribusi/bayar/{{$data->retribusi}}" type="button" class="btn btn-success" data-toggle="modal" data-target="#bayar{{ $data->retribusi}}"><i style="color:white" class="fas fa-money-bill-wave"></i></a>
                                        @else
                                        <a href="/retribusi/detail/{{$data->retribusi}}" class="btn btn-info"><i style="color:white" class="far fa-eye"></i></a>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($data->status == 2 || $data->status == 4)
                                        <div class="text-center">
                                            <a href="/retribusi/edit/{{$data->retribusi}}" class="btn btn-warning"><i style="color:white" class="fas fa-edit"></i></a>
                                        </div>
                                        @elseif($data->status == 3)
                                            <a href="/retribusi/done/{{$data->retribusi}}" type="button" class="btn btn-success" data-toggle="modal" data-target="#done{{ $data->retribusi}}"><i style="color:white" class="fas fa-check"></i></a>
                                            <a href="/retribusi/edit/{{$data->retribusi}}" class="btn btn-warning"><i style="color:white" class="fas fa-edit"></i></a>
                                        @else
                                            <div class="text-secondary text-center"><b>Tidak ada akses</b></div>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- table -->

                    </div>

                    @endif
                </div>
                <!-- card -->

            </div>

            @if(auth()->user()->level == 1)
            <!-- modal accept -->
            @foreach ($retribusi as $data)
            <div class="modal fade" id="accept{{$data->retribusi}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{$data->nama_lengkap}} | {{$data->posisi}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah anda yakin ingin menyetujui retribusi tower BTS ini?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                            <a href="/retribusi/accept/{{$data->retribusi}}" type="button" class="btn btn-success">Ya</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- modal reject -->
            @foreach ($retribusi as $data)
            <div class="modal fade" id="reject{{$data->retribusi}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{$data->nama_lengkap}} | {{$data->posisi}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah anda yakin ingin menolak retribusi tower BTS ini?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                            <a href="/retribusi/reject/{{$data->retribusi}}" type="button" class="btn btn-danger">Ya</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- modal wrong -->
            @foreach ($retribusi as $data)
            <div class="modal fade" id="wrong{{$data->retribusi}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{$data->nama_lengkap}} | {{$data->posisi}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah terdapat kesalahan data?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                            <a href="/retribusi/wrong/{{$data->retribusi}}" type="button" class="btn btn-secondary">Ya</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- modal slkbayar -->
            @foreach ($retribusi as $data)
            <div class="modal fade" id="slkbayar{{$data->retribusi}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{$data->nama_lengkap}} | {{$data->posisi}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah ada yakin memberikan pengajuan nominal pembayaran retribusi dengan jumlah @currency($data->tarif) </p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                            <a href="/retribusi/slkbayar/{{$data->retribusi}}" type="button" class="btn btn-info">Ya</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- modal delete -->
            @foreach ($retribusi as $data)
            <div class="modal fade" id="delete{{$data->retribusi}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{$data->nama_lengkap}} | {{$data->posisi}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah anda ingin menghapus data ini?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                            <a href="/retribusi/delete/{{$data->retribusi}}" type="button" class="btn btn-danger">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- modal delete -->
            @elseif(auth()->user()->level == 2)
            <!-- modal done -->
            @foreach ($retribusi as $data)
            <div class="modal fade" id="done{{$data->retribusi}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{$data->posisi}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah ada yakin semua data sudah diperbaiki?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                            <a href="/retribusi/done/{{$data->retribusi}}" type="button" class="btn btn-success">Ya</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- modal bayar -->
            @foreach ($retribusi as $data)
            <div class="modal fade" id="bayar{{$data->retribusi}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{$data->posisi}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah ada yakin sudah membayar retribusi?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                            <a href="/retribusi/bayar/{{$data->retribusi}}" type="button" class="btn btn-success">Ya</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            

        </div>
    </div>
</div>
<!-- /.content -->

@endsection