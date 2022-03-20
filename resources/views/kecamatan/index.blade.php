@extends('backend')

@section('content')

<!-- content-header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-12">
            <div class="col-sm-12">
                <h6 class="m-12 text-dark"><a href="/kecamatan">Data</a> / Kecamatan</h6>
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
                    @if(auth()->user()->level==1)
                    <div class="card-header">
                        <div>
                            <a href="/kecamatan/add" type="button" class="btn btn-primary btn-sm btn-flat rounded-lg"><i class="fa fa-plus nav-icon"></i> Tambah Kecamatan</a>
                            <a href="/kecamatan/towerbts" type="button" class="btn btn-primary btn-sm btn-flat rounded-lg float-right"> Data Tower BTS</a>
                        </div>
                    </div>
                    @elseif(auth()->user()->level==2)
                    @endif
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
                                    @if(auth()->user()->level==1)
                                    <th width="10px" class="text-center">No</th>
                                    <th class="text-center">Kecamatan</th>
                                    <th width="200px" class="text-center">Action</th>
                                    @elseif(auth()->user()->level==2)
                                    <th width="10px" class="text-center">No</th>
                                    <th class="text-center">Kecamatan</th>
                                    @endif
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($kecamatans as $data)
                                <tr>
                                    @if(auth()->user()->level==1)
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ $data->kecamatan}}</td>
                                    <td class="text-center">
                                        <a href="/kecamatan/edit/{{$data->id}}" class="btn btn-warning"><i style="color:white" class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id}}"><i style="color:white" class="fas fa-trash"></i></a>
                                    </td>
                                    @elseif(auth()->user()->level==2)
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ $data->kecamatan}}</td>
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

            <!-- modal delete -->
            @foreach ($kecamatans as $data)
            <div class="modal fade" id="delete{{$data->id}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{$data->kecamatan}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah anda ingin menghapus data ini?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                            <a href="/kecamatan/delete/{{$data->id}}" type="button" class="btn btn-danger">Hapus</a>
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