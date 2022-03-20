@extends('backend')

@section('content')


<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-12">
            <div class="col-sm-12">
                <h6 class="m-12 text-dark"><a href="/profil">Pengguna</a> / Edit Profil</h6>
            </div>
        </div>
    </div>
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <!-- form -->
                    <form action="/profil/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <section class="content">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="inputName">Nama Lengkap</label>
                                                <input type="text" id="inputName" class="form-control" name="nama_lengkap" value="{{auth()->user()->nama_lengkap}}">
                                                <div class="text-danger">
                                                    @error('nama_lengkap')
                                                    {{ $message}}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputProjectLeader">Password Lama</label>
                                                <input type="password" id="inputProjectLeader"  class="form-control" name="oldpassword">
                                                <div class="text-danger">
                                                    @error('oldpassword')
                                                    {{ $message}}
                                                    @enderror
                                                </div>
                                                @if(session('gagal'))
                                                <p class="text-danger">{{session('gagal')}}</p>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="inputProjectLeader">Password Baru</label>
                                                <input type="password" id="inputProjectLeader"  class="form-control" name="newpassword">
                                                <div class="text-danger">
                                                    @error('newpassword')
                                                    {{ $message}}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputProjectLeader">Konfirmasi Password Baru</label>
                                                <input type="password" id="inputProjectLeader"  class="form-control" name="renewpassword">
                                                <div class="text-danger">
                                                    @error('renewpassword')
                                                    {{ $message}}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </section>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info float-right"><i class="fa fa-save"></i> Simpan</button>
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