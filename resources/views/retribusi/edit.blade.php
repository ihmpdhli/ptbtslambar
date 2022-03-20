@extends('backend')

@section('content')

<!-- content-header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-12">
            <div class="col-sm-12">
                <h6 class="m-12 text-dark"><a href="/retribusibts">Transaksi</a> / <a href="/retribusibts">Retribusi BTS</a> / Edit Data</h6>
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
                    <form action="/retribusi/update/{{$retribusi->id}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <p class="text-danger">(*) Wajib diisi</p>
                            <!-- row -->
                            <div class="row">
                                @if(auth()->user()->level == 1)
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Alamat BTS *</label>
                                        <select name="towerbts_id" class="form-control">
                                            @foreach ($towerbts as $data)
                                            <option value="{{$data->id}}" {{($data->id == $retribusi->towerbts_id) ? 'selected' : ''}}>{{$data->alamat}}</option>
                                            @endforeach
                                        </select>
                                        <div class="text-danger">
                                            @error('towerbts_id')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Tarif Retribusi *</label>
                                        <input name="tarif" value="{{$retribusi->tarif}}" id="tarif" class="form-control" placeholder="Nominal">
                                        <div class="text-danger">
                                            @error('tarif')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                @elseif(auth()->user()->level == 2)
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Alamat BTS *</label>
                                        <select name="towerbts_id" class="form-control">
                                            @foreach ($towerbts as $data)
                                            <option value="{{$data->id}}" {{($data->id == $retribusi->towerbts_id) ? 'selected' : ''}}>{{$data->alamat}}</option>
                                            @endforeach
                                        </select>
                                        <div class="text-danger">
                                            @error('towerbts_id')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tahun *</label>
                                        <select name="tahun_id" class="form-control">
                                            @foreach ($tahuns as $data)
                                            <option value="{{$data->id}}" {{($data->id == $retribusi->tahuns_id) ? 'selected' : ''}}>{{$data->tahun}}</option>
                                            @endforeach
                                        </select>
                                        <div class="text-danger">
                                            @error('tahun_id')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if(auth()->user()->level == 1)
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" class="form-control" rows="4">{{$retribusi->keterangan}}</textarea>
                                    <div class="text-danger">
                                        @error('keterangan')
                                        {{ $message}}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @elseif(auth()->user()->level == 2)
                            @endif
                            <!-- row -->
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info float-right"><i class="fa fa-save"></i>Simpan</button>
                            <a href="/retribusi" class="btn btn-warning"> Kembali</a>
                        </div>
                    </form>
                    <!-- form -->

                </div>
            </div>
        </div>
    </div>
</div>

@endsection