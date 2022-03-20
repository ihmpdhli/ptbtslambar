@extends('backend')

@section('content')

<!-- content-header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-12">
            <div class="col-sm-12">
                <h6 class="m-12 text-dark"><a href="/jaringan">Data</a> / Jaringan</h6>
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
                        <div>
                            <a href="/jaringan/add" type="button" class="btn btn-primary btn-sm btn-flat rounded-lg"><i class="fa fa-plus nav-icon"></i> Tambah Jaringan</a>
                        </div>
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
                                    <th class="text-center">Jaringan</th>
                                    <th width="200px" class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($jaringans as $data)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ $data->jaringan}}</td>
                                    <td class="text-center">
                                        <a href="/jaringan/edit/{{$data->id}}" class="btn btn-warning"><i style="color:white" class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger" data-toggle="modal" data-target="#delete{{$data->id}}"><i style="color:white" class="fas fa-trash"></i></a>
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
            @foreach ($jaringans as $data)
            <div class="modal fade" id="delete{{$data->id}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{$data->jaringan}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah anda ingin menghapus data ini?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                            <a href="/jaringan/delete/{{$data->id}}" type="button" class="btn btn-danger">Hapus</a>
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