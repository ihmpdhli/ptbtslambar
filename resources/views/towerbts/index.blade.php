@extends('backend')

@section('content')

<!-- content-header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-12">
            <div class="col-sm-12">
                <h6 class="m-12 text-dark"><a href="/towerbts">Data</a> / BTS</h6>
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
                        <a href="/towerbts/add" type="button" class="btn btn-primary btn-sm btn-flat rounded-lg"><i class="fa fa-plus nav-icon"></i> Tambah BTS</a>
                        <a href="towerbts/towerbtsexport" class="btn btn-success btn-sm btn-flat rounded-lg"> Export Excel</a>
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
                                    @if (auth()->user()->level==1)
                                    <th class="text-center">Author</th>
                                    <th class="text-center">Provider</th>
                                    @elseif (auth()->user()->level==2)
                                    <th class="text-center">Provider</th>
                                    @endif
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">Kecamatan</th>
                                    <th class="text-center">Operator</th>
                                    <th class="text-center">Jaringan</th>
                                    <th width="130px" class="text-center">Posisi</th>
                                    <th width="130px" class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($towerbts as $data)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    @if (auth()->user()->level==1)
                                    <td>{{ $data->nama_lengkap}}</td>
                                    <td>{{ $data->provider}}</td>
                                    @elseif (auth()->user()->level==2)
                                    <td>{{ $data->provider}}</td>
                                    </td>
                                    @endif
                                    <td>{{ $data->alamat}}</td>
                                    <td>{{ $data->kecamatan}}</td>
                                    <td>
                                        @foreach ($tower_opt as $opt)
                                            @if($opt->towerbts_id==$data->bts)
                                                {{$opt->operator}}<br>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($tower_jar as $jar)
                                            @if($jar->towerbts_id==$data->bts)
                                                {{$jar->jaringan}}<br>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td><a href="/peta">{{$data->posisi}}</a></td>
                                    <td class="text-center">
                                        <a href="/towerbts/detail/{{$data->bts}}" class="btn btn-info"><i style="color:white" class="far fa-eye"></i></a>
                                        <a href="/towerbts/edit/{{$data->bts}}" class="btn btn-warning"><i style="color:white" class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->bts}}"><i style="color:white" class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- table -->

                    </div>
                </div>
                <!-- card -->

            </div>

            <!-- modal delete -->
            @foreach ($towerbts as $data)
            <div class="modal fade" id="delete{{$data->bts}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{$data->provider}} | {{$data->posisi}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah anda yakin ingin menghapus data tower BTS ini?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                            <a href="/towerbts/delete/{{$data->bts}}" type="button" class="btn btn-danger">Hapus</a>
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