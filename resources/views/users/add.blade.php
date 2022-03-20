@extends('backend')

@section('content')

<!-- content-header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-12">
            <div class="col-sm-12">
                <h6 class="m-12 text-dark"><a href="/users">Pengguna</a> / <a href="/users">Users</a> / Tambah User</h6>
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
                    <form action="/users/insert" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <!-- row -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="name" class="form-control" value="{{ old('name')}}" placeholder="Masukkan name">
                                        <div class="text-danger">
                                            @error('name')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap')}}" placeholder="Masukkan nama lengkap">
                                        <div class="text-danger">
                                            @error('nama_lengkap')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select name="level" class="form-control">
                                            <option value="">-- Pilih Role --</option>
                                            <option value="1">Admin</option>
                                            <option value="2">User</option>
                                        </select>
                                        <div class="text-danger">
                                            @error('level')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" class="form-control" value="{{ old('email')}}" placeholder="Masukkan email">
                                        <div class="text-danger">
                                            @error('email')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" value="{{ old('password')}}" class="form-control" placeholder="Masukkan password">
                                        <div class="text-danger">
                                            @error('password')
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
                            <a href="/users" class="btn btn-warning"> Kembali</a>
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