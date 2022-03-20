@extends('backend')

@section('content')

<!-- content-header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-12">
            <div class="col-sm-12">
                <h6 class="m-12 text-dark"><a href="/tahun">Transaksi</a> / <a href="/tahun">Tahun</a> / Edit Tahun</h6>
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
                    <form action="/tahun/update/{{$tahuns->id}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <p class="text-danger">(*) Wajib diisi</p>
                            <!-- row -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Tahun *</label>
                                        <input name="tahun" value="{{$tahuns->tahun}}" class="form-control" placeholder="Masukkan ahun">
                                        <div class="text-danger">
                                            @error('tahun')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- row -->

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info float-right"><i class="fa fa-save"></i> Simpan</button>
                            <a href="/tahun" class="btn btn-warning"> Kembali</a>
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