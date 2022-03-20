@extends('backend')

@section('content')

<!-- content-header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-12">
            <div class="col-sm-12">
                <h6 class="m-12 text-dark"><a href="/provider">Data</a> / <a href="/provider">Provider</a> / Edit Provider</h6>
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
                    <form action="/provider/update/{{$providers->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <p class="text-danger">(*) Wajib diisi</p>
                            <!-- row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Provider *</label>
                                        <input name="provider" value="{{$providers->provider}}" class="form-control" placeholder="Masukkan provider">
                                        <div class="text-danger">
                                            @error('provider')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6"><label>Icon *</label></div>
                                            <div class="col-md-6"><span class="float-right text-danger">Format file: .png, .jpg, .jpeg | Max: 1MB</span></div>
                                        </div>
                                        <input type="file" name="icon" class="form-control" placeholder="Icon" accept="image/png, image/jpg, image/jpeg">
                                        <div class="text-danger">
                                            @error('icon')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 ml-auto">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Icon Sebelumnya : </label>
                                        <img src="{{ asset('icon')}}/{{ $providers->icon}}" width="30px">
                                    </div>
                                </div>
                            </div>
                            <!-- row -->

                        </div>
                        <div class="card-footer rounded-lg">
                            <button type="submit" class="btn btn-info float-right"><i class="fa fa-save"></i> Simpan</button>
                            <a href="/provider" class="btn btn-warning"> Kembali</a>
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