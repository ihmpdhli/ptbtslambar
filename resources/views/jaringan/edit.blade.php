@extends('backend')

@section('content')

<!-- content-header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-12">
            <div class="col-sm-12">
                <h6 class="m-12 text-dark"><a href="/jaringan">Data</a> / <a href="/jaringan">Jaringan</a> / Edit Jaringan</h6>
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
                <div class="card">

                    <!-- form -->
                    <form action="/jaringan/update/{{$jaringans->id}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <p class="text-danger">(*) Wajib diisi</p>
                            <!-- row-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Jaringan *</label>
                                        <input name="jaringan" value="{{$jaringans->jaringan}}" class="form-control" placeholder="Masukkan jaringan">
                                        <div class="text-danger">
                                            @error('jaringan')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- row-->

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info float-right"><i class="fa fa-save"></i> Simpan</button>
                            <a href="/jaringan" class="btn btn-warning"> Kembali</a>
                        </div>
                    </form>
                    <!-- form -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main content -->

@endsection