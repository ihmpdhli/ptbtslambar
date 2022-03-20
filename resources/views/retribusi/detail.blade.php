@extends('backend')

@section('content')

<!-- content-header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-12">
            <div class="col-sm-12">
                <h6 class="m-12 text-dark"><a href="/retribusi">Transaksi</a> / <a href="/retribusi">Retribusi BTS</a> / Detail Data</h6>
            </div>
        </div>
    </div>
</div>
<!-- content-header -->

<!-- Main content -->
<div class="col-lg-12">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title m-0">Retribusi ( {{$retribusi->posisi}} )</h5>
            </div>
            <div class="card-body" style="padding: 20px 20px 20px 20px">
                <table class="table table-borderless table-striped">
                @if(auth()->user()->level == 1)
                    <tr>
                        <td width="15%">Autor</td>
                        <td>:</td>
                        <td width="100%">{{$retribusi->nama_lengkap}}</td>
                    </tr>
                    <tr>
                        <td>Provider</td>
                        <td>:</td>
                        <td>{{$retribusi->provider}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{$retribusi->alamat}}</td>
                    </tr>
                    <tr>
                        <td>Struktur Menara</td>
                        <td>:</td>
                        <td>{{$retribusi->struktur_menara}}</td>
                    </tr>
                    <tr>
                        <td>Posisi</td>
                        <td>:</td>
                        <td>{{$retribusi->posisi}}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Pembayaran</td>
                        <td>:</td>
                        <td>{{$retribusi->tgl_pembayaran}}</td>
                    </tr>
                    <tr>
                        <td>Tahun</td>
                        <td>:</td>
                        <td>{{$retribusi->tahun}}</td>
                    </tr>
                    <tr>
                        <td>Tarif Retribusi</td>
                        <td>:</td>
                        <td>{{$retribusi->ket_tarif}} @currency($retribusi->tarif)</td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td>{{$retribusi->keterangan}}</td>
                    </tr>

                @elseif(auth()->user()->level == 2)
                    <tr>
                        <td width="10%">Keterangan</td>
                        <td>:</td>
                        <td width="100%">{{$retribusi->keterangan}}</td>
                    </tr>
                    <tr>
                        <td width="10%">Tarif retribusi</td>
                        <td>:</td>
                        <td width="100%">{{$retribusi->ket_tarif}} @currency($retribusi->tarif)</td>
                    </tr>
                @endif
                </table>
            </div>
            <div class="card-footer">
                <a href="/retribusi" class="btn btn-warning"> Kembali</a>
            </div>
        </div>
    </div>
</div>


@endsection