@extends('backend')

@section('content')

<!-- content-header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-12">
            <div class="col-sm-12">
                <h6 class="m-12 text-dark"><a href="/retribusi">Transaksi</a> / <a href="/retribusi">Retribusi BTS</a> / Edit Data</h6>
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
                    <form action="/retribusi/insert" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <p class="text-danger">(*) Wajib diisi</p>
                            <!-- row -->
                            <div class="row">
                                @if(auth()->user()->level == 1)
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Alamat BTS *</label>
                                        <select name="towerbts_id" class="form-control">
                                            <option value="">-- Pilih Alamat BTS --</option>
                                            @foreach ($towerbts as $data)
                                            <option value="{{$data->id}}">{{ $data->alamat}}</option>
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
                                        <input name="tarif" class="form-control" placeholder="Masukkan tarif retribusi">
                                        <div class="text-danger">
                                            @error('tarif')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Tahun  *</label>
                                        <select name="tahun_id" class="form-control">
                                            <option value="">-- Pilih Tahun--</option>
                                            @foreach ($tahuns as $data)
                                            <option value="{{$data->id}}">{{ $data->tahun}}</option>
                                            @endforeach
                                        </select>
                                        <div class="text-danger">
                                            @error('tahun_id')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                @elseif(auth()->user()->level == 2)
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Alamat BTS *</label>
                                        <select name="towerbts_id" class="form-control">
                                            <option value="">-- Pilih Alamat BTS --</option>
                                            @foreach ($towerbts as $data)
                                            <option value="{{$data->id}}">{{ $data->alamat}}</option>
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
                                        <label>Tahun  *</label>
                                        <select name="tahun_id" class="form-control">
                                            <option value="">-- Pilih Tahun--</option>
                                            @foreach ($tahuns as $data)
                                            <option value="{{$data->id}}">{{ $data->tahun}}</option>
                                            @endforeach
                                        </select>
                                        <div class="text-danger">
                                            @error('tahun_id')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>

                            @if(auth()->user()->level == 1)
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea name = "keterangan" value="{{ old('keterangan')}}" class="form-control" rows="4"></textarea>
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
                            <button type="submit" class="btn btn-info float-right"><i class="fa fa-save"></i> Simpan</button>
                            <a href="/retribusi" class="btn btn-warning"> Kembali</a>
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