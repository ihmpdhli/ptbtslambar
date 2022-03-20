@extends('backend')

@section('content')

<!-- content-header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-12">
            <div class="col-sm-12">
                <h6 class="m-12 text-dark"> <a href="/rekombts">Transaksi</a> / Rekomendasi BTS</h6>
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
                                    <th class="text-center">Nama Pemohon</th>
                                    <th class="text-center">Nomor Telephone</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Posisi</th>
                                    <th class="text-center">Tanggal Pengajuan</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Keterangan</th>
                                    <th width="200px" class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($rekombts as $data)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ $data->nama_pemohon}}</td>
                                    <td>{{ $data->no_telp }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->posisi }}</td>
                                    <td>{{ $data->tgl_pengajuan }}</td>
                                    <td class="text-center">
                                        @if($data->status == 2)
                                        <div class="text-secondary"><b>Menunggu</b></div>
                                        @elseif($data->status == 3)
                                        <div class="text-warning"><b>Terdapat kesalahan</b></div>
                                        @elseif($data->status == 4)
                                        <div class="text-info"><b>Sudah diperbaiki</b></div>
                                        @elseif($data->status == 1)
                                        <div class="text-success"><b>Rekomendasi diizinkan</b></div>
                                        @elseif($data->status == 0)
                                        <div class="text-danger"><b>Rekomendasi ditolak</b></div>
                                        @endif
                                    </td>
                                    @if($data->status == 0 || $data->status == 1)
                                        <td class="text-center">
                                            <div class="text-info"><b>Terkonfirmasi</b></div>
                                        </td>
                                        <td class="text-center">
                                            <a href="/rekombts/detail/{{$data->rekom}}" class="btn btn-info"><i style="color:white" class="far fa-eye"></i></a>
                                            <a href="/rekombts/edit/{{$data->rekom}}" class="btn btn-warning"><i style="color:white" class="fas fa-edit"></i></a>
                                            <a class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->rekom}}"><i style="color:white" class="fas fa-trash"></i></a>
                                        </td>
                                    @else
                                        <td class="text-center">
                                            <a href="/rekombts/accept/{{$data->rekom}}" type="button" class="btn btn-success" data-toggle="modal" data-target="#accept{{ $data->rekom}}"><i style="color:white" class="fas fa-check"></i></a>
                                            <a href="/rekombts/reject/{{$data->rekom}}"type="button" class="btn btn-danger" data-toggle="modal" data-target="#reject{{ $data->rekom}}"><i style="color:white" class="fa fa-minus"></i></a>
                                            
                                        </td>
                                        <td class="text-center">
                                            <a href="/rekombts/wrong/{{$data->rekom}}"type="button" class="btn btn-secondary" data-toggle="modal" data-target="#wrong{{ $data->rekom}}"><i style="color:white" class="fa fa-ban"></i></a>
                                            <a href="/rekombts/detail/{{$data->rekom}}" class="btn btn-info"><i style="color:white" class="far fa-eye"></i></a>
                                            <a href="/rekombts/edit/{{$data->rekom}}" class="btn btn-warning"><i style="color:white" class="fas fa-edit"></i></a>
                                            <a class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->rekom}}"><i style="color:white" class="fas fa-trash"></i></a>
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
                        <a href="/rekombts/add" type="button" class="btn btn-primary btn-sm btn-flat rounded-lg"><i class="fa fa-plus nav-icon"></i> Tambah Data</a>
                    </div>
                    
                    <div class="card-body">
                        <!-- table -->
                        <table id="example1" class="table table-bordered table-striped projects rounded-lg">
                            <thead>
                                <tr>
                                    <th width="10px" class="text-center">No</th>
                                    <th class="text-center">Nama Pemohon</th>
                                    <th class="text-center">Nomor Telephone</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Titik Koordinat</th>
                                    <th class="text-center">Tanggal Pengajuan</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Keterangan</th>
                                    <th width="180px" class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($rekombts as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->nama_pemohon}}</td>
                                    <td>{{ $data->no_telp }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->posisi }}</td>
                                    <td>{{ $data->tgl_pengajuan }}</td>
                                    <td class="text-center">
                                        @if($data->status == 2)
                                        <div class="text-secondary"><b>Menunggu</b></div>
                                        @elseif($data->status == 3)
                                        <div class="text-warning"><b>Terdapat kesalahan</b></div>
                                        @elseif($data->status == 4)
                                        <div class="text-info"><b>Sudah diperbaiki</b></div>
                                        @elseif($data->status == 1)
                                        <div class="text-success"><b>Rekomendasi diizinkan</b></div>
                                        @elseif($data->status == 0)
                                        <div class="text-danger"><b>Rekomendasi ditolak</b></div>
                                        @endif
                                    </td>
                                    <td class="text-center"><a href="/rekombts/detail/{{$data->rekom}}" class="btn btn-info"><i style="color:white" class="far fa-eye"></i></a></td>
                                    <td class="text-center">
                                        @if($data->status == 2 || $data->status == 4)
                                        <a href="/rekombts/edit/{{$data->rekom}}" class="btn btn-warning"><i style="color:white" class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->rekom}}"><i style="color:white" class="fas fa-trash"></i></a>
                                        @elseif($data->status == 3)
                                        <a href="/rekombts/done/{{$data->rekom}}" type="button" class="btn btn-success" data-toggle="modal" data-target="#done{{ $data->rekom}}"><i style="color:white" class="fas fa-check"></i></a>
                                        <a href="/rekombts/edit/{{$data->rekom}}" class="btn btn-warning"><i style="color:white" class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->rekom}}"><i style="color:white" class="fas fa-trash"></i></a>
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


            <!-- modal confirm -->
            @foreach ($rekombts as $data)
            <div class="modal fade" id="accept{{$data->rekom}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{$data->nama_pemohon}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah anda yakin ingin menyetujui rekomendasi BTS ini?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                            <a href="/rekombts/accept/{{$data->rekom}}" type="button" class="btn btn-success">Ya</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- modal reject -->
            @foreach ($rekombts as $data)
            <div class="modal fade" id="reject{{$data->rekom}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{$data->nama_pemohon}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah anda yakin ingin menolak rekomendasi BTS ini?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                            <a href="/rekombts/reject/{{$data->rekom}}" type="button" class="btn btn-danger"> Ya </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- modal wrong -->
            @foreach ($rekombts as $data)
            <div class="modal fade" id="wrong{{$data->rekom}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{$data->nama_pemohon}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah terdapat kesalahan data?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                            <a href="/rekombts/wrong/{{$data->rekom}}" type="button" class="btn btn-secondary">Ya</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- modal done -->
            @foreach ($rekombts as $data)
            <div class="modal fade" id="done{{$data->rekom}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{$data->nama_pemohon}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah ada yakin semua data sudah diperbaiki?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                            <a href="/rekombts/done/{{$data->rekom}}" type="button" class="btn btn-success">Ya</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- modal delete -->
            @foreach ($rekombts as $data)
            <div class="modal fade" id="delete{{$data->rekom}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{$data->nama_pemohon}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah anda ingin menghapus data ini?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                            <a href="/rekombts/delete/{{$data->rekom}}" type="button" class="btn btn-danger">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- modal delete -->

        </div>
    </div>
</div>
<!-- Main content -->

@endsection