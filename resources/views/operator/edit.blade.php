@extends('backend')

@section('content')

<!-- content-header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-12">
            <div class="col-sm-12">
                <h6 class="m-12 text-dark"><a href="/operator">Data</a> / <a href="/operator">Operator</a> / Edit Operator</h6>
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
                    <form action="/operator/update/{{$operators->id}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <p class="text-danger">(*) Wajib diisi</p>
                            <!-- row -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Operator *</label>
                                        <input name="operator" value="{{$operators->operator}}" class="form-control" placeholder="Masukkan operator">
                                        <div class="text-danger">
                                            @error('operator')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- row -->

                        </div>
                        <div class="card-footer rounded-lg">
                            <button type="submit" class="btn btn-info float-right"><i class="fa fa-save"></i> Simpan</button>
                            <a href="/operator" class="btn btn-warning"> Kembali</a>
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