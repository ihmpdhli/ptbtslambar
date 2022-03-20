@extends('backend')

@section('content')

<!-- content-header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-12">
            <div class="col-sm-12">
                <h6 class="m-12 text-dark"><a href="/rekombts">Transaksi</a> / <a href="/rekombts">Rekomendasi BTS</a> / Detail Data</h6>
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
                <h5 class="card-title m-0">Pengajuan Menara BTS ( {{$rekombts->posisi}} )</h5>
            </div>
            <div class="card-body" style="padding: 20px 20px 20px 20px">
                <table class="table table-borderless table-striped">
                @if (auth()->user()->level == 1) 
                    <tr>
                        <td width="30%">Nama Pemohon</td>
                        <td width="5%">:</td>
                        <td width="100%">{{$rekombts->nama_pemohon}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{{$rekombts->email}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Nomor Telephone</td>
                        <td>:</td>
                        <td>{{$rekombts->no_telp}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Titik Koordiniat Lokasi Site</td>
                        <td>:</td>
                        <td>{{$rekombts->posisi}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Surat Permohonan</td>
                        <td>:</td>
                        <td>{{$rekombts->surat_permohonan}}</td>
                        <td><a href="/rekombts/detail/download/{{$rekombts->surat_permohonan}}">Download</a></td>
                    </tr>
                    <tr>
                        <td>Foto Copy KTP</td>
                        <td>:</td>
                        <td>{{$rekombts->fotocopy_ktp}}</td>
                        <td><a href="/rekombts/detail/download/{{$rekombts->fotocopy_ktp}}">Download</a></td>
                    </tr>
                    <tr>
                        <td>Izin Lokasi Pendirian Tower</td>
                        <td>:</td>
                        <td>{{$rekombts->surat_izinlokasi}}</td>
                        <td><a href="/rekombts/detail/download/{{$rekombts->surat_izinlokasi}}">Download</a></td>
                    </tr>
                    <tr>
                        <td>Foto Copy Akta Pendirian Usaha dari Notaris</td>
                        <td>:</td>
                        <td>{{$rekombts->fotocopy_akta}}</td>
                        <td><a href="/rekombts/detail/download/{{$rekombts->fotocopy_akta}}">Download</a></td>
                    </tr>
                    <tr>
                        <td>Gambar Bangunan Menara Tower</td>
                        <td>:</td>
                        <td>{{$rekombts->gambar_menara}}</td>
                        <td><a href="/rekombts/detail/download/{{$rekombts->gambar_menara}}">Download</a></td>
                    </tr>
                    <tr>
                        <td>Rencana Anggaran dan Biaya</td>
                        <td>:</td>
                        <td>{{$rekombts->rencana_anggaran}}</td>
                        <td><a href="/rekombts/detail/download/{{$rekombts->rencana_anggaran}}">Download</a></td>
                    </tr>
                    <tr>
                        <td>Jaminan Asuransi Bagi Masyarakat Dengan Radius Ketinggian Tower</td>
                        <td>:</td>
                        <td>{{$rekombts->jaminan_asuransi}}</td>
                        <td><a href="/rekombts/detail/download/{{$rekombts->jaminan_asuransi}}">Download</a></td>
                    </tr>
                    <tr>
                        <td>Surat Izin Lingkungan</td>
                        <td>:</td>
                        <td>{{$rekombts->izin_lingkungan}}</td>
                        <td><a href="/rekombts/detail/download/{{$rekombts->izin_lingkungan}}">Download</a></td>
                    </tr>
                    <tr>
                        <td>Tinggi Tower</td>
                        <td>:</td>
                        <td>{{$rekombts->tinggi_tower}} M</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Luas Tanah</td>
                        <td>:</td>
                        <td>{{$rekombts->luas_tanah}} M<sup>2</sup></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Tanggal Pengajuan</td>
                        <td>:</td>
                        <td>{{$rekombts->tgl_pengajuan}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td>{{$rekombts->keterangan}}</td>
                        <td></td>
                    </tr>
                    <br>
                    <tr>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div id="map" style="width: 100%; height: 300px;"></div>
                            </div>
                        </div>
                    </tr>
                    <br>
                    <script>
                        var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                            id: 'mapbox/streets-v11'
                        });
        
                        var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                            id: 'mapbox/satellite-v9'
                        });
        
                        var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        });
        
                        var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                            id: 'mapbox/dark-v10'
                        });
        
                        var map = L.map('map', {
                            center: [{{$rekombts->posisi}}],
                            zoom: 14,
                            layers: [peta1]
                        });
        
                        var baseMaps = {
                            "Grayscale": peta1,
                            "Satellite": peta2,
                            "Streets": peta3,
                            "Dark": peta4,
                        };
        
                        L.control.layers(baseMaps).addTo(map);
        
                        //menentukan titik koordinat
                        var curLocation = [{{$rekombts->posisi}}];
                        map.attributionControl.setPrefix(false);
        
                        var marker = new L.marker(curLocation, {
                            draggable: 'true',
                        });
                        map.addLayer(marker);
        
                        //ambil koodirnat dari marker drag and drop
                        marker.on('dragend', function(event) {
                            var position = marker.getLatLng();
                            marker.setLatLng(position, {
                                draggable: 'true'
                            }).bindPopup(position).update();
                            //console.log(position + "," + position.lng);
                            $("#posisi").val(position.lat + ", " + position.lng).keyup();
                        });
        
                        //ambil koorinat melalui saat map diklik 
                        var posisi = document.querySelector("[name=posisi]");
                        map.on("click", function(event) {
                            var lat = event.latlng.lat;
                            var lng = event.latlng.lng;
        
                            if (!marker) {
                                marker = L.marker(event.latlng.lat).addTo(map);
                            } else {
                                marker.setLatLng(event.latlng);
                            }
                            posisi.value = lat + ", " + lng;
                        });
                    </script>
                
                @elseif(auth()->user()->level == 2)
                    <tr>
                        <td width="10%">Keterangan</td>
                        <td>:</td>
                        <td width="100%">{{$rekombts->keterangan}}</td>
                        <td></td>
                    </tr>
                @endif
                </table>
            </div>
            <div class="card-footer">
                <a href="/rekombts" class="btn btn-warning"> Kembali</a>
            </div>
        </div>
    </div>
</div>


@endsection