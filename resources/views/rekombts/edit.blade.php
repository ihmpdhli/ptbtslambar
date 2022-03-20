@extends('backend')

@section('content')

<!-- content-header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-12">
            <div class="col-sm-12">
                <h6 class="m-12 text-dark"><a href="/rekombts">Transaksi</a> / <a href="/rekombts">Rekomendasi BTS</a> / Edit Data</h6>
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
                    <form action="/rekombts/update/{{$rekombts->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <p class="text-danger">(*) Wajib diisi</p>
                            <!-- row -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Nama Pemohon *</label>
                                        <input name="nama_pemohon" value="{{$rekombts->nama_pemohon}}" class="form-control" placeholder="Masukkan nama pemohon">
                                        <div class="text-danger">
                                            @error('nama_pemohon')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Nomor Telephone *</label>
                                        <input name="no_telp" value="{{$rekombts->no_telp}}" class="form-control" placeholder="Masukkan nomor telephone">
                                        <div class="text-danger">
                                            @error('no_telp')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Email *</label>
                                        <input name="email" value="{{$rekombts->email}}" class="form-control" placeholder="Masukkan email">
                                        <div class="text-danger">
                                            @error('email')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6"><label>Surat Permohonan *</label></div>
                                            <div class="col-md-6"><span class="float-right text-danger">Format file: .pdf | Max: 2MB</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <h6>{{$rekombts->surat_permohonan}}</h6>
                                            </div>
                                            <div class="col-sm-3">
                                                <span class="float-right">
                                                <a href="{{asset ('berkas/'. $rekombts->surat_permohonan)}}"
                                                    target="_blank" rel="noopener noreferrer">Download</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <input type="file" name="surat_permohonan" class="form-control" accept="application/pdf">
                                            <div class="text-danger">
                                                @error('surat_permohonan')
                                                {{ $message}}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6"><label>Foto Copy KTP *</label></div>
                                            <div class="col-md-6"><span class="float-right text-danger">Format file: .pdf | Max: 2MB</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <h6>{{$rekombts->fotocopy_ktp}}</h6>
                                            </div>
                                            <div class="col-sm-4">
                                                <span class="float-right">
                                                <a href="{{asset ('berkas/'. $rekombts->fotocopy_ktp)}}"
                                                    target="_blank" rel="noopener noreferrer">Download</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <input type="file" name="fotocopy_ktp" class="form-control" accept="application/pdf">
                                            <div class="text-danger">
                                                @error('fotocopy_ktp')
                                                {{ $message}}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6"><label>Izin Lokasi Pendirian Tower *</label></div>
                                            <div class="col-md-6"><span class="float-right text-danger">Format file: .pdf | Max: 2MB</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <h6>{{$rekombts->surat_izinlokasi}}</h6>
                                            </div>
                                            <div class="col-sm-4">
                                                <span class="float-right">
                                                <a href="{{asset ('berkas/'. $rekombts->surat_izinlokasi)}}"
                                                    target="_blank" rel="noopener noreferrer">Download</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <input type="file" name="surat_izinlokasi" class="form-control" accept="application/pdf">
                                            <div class="text-danger">
                                                @error('surat_izinlokasi')
                                                {{ $message}}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-9"><label>Foto Copy Akta Pendirian Usaha dari Notaris *</label></div>
                                            <div class="col-md-3"><span class="float-right text-danger">Format file: .pdf | Max: 2MB</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <h6>{{$rekombts->fotocopy_akta}}</h6>
                                            </div>
                                            <div class="col-sm-4">
                                                <span class="float-right">
                                                <a href="{{asset ('berkas/'. $rekombts->fotocopy_akta)}}"
                                                    target="_blank" rel="noopener noreferrer">Download</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <input type="file" name="fotocopy_akta" class="form-control" accept="application/pdf">
                                            <div class="text-danger">
                                                @error('fotocopy_akta')
                                                {{ $message}}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6"><label>Gambar Bangunan Menara Tower *</label></div>
                                            <div class="col-md-6"><span class="float-right text-danger">Format file: .pdf | Max: 2MB</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <h6>{{$rekombts->gambar_menara}}</h6>
                                            </div>
                                            <div class="col-sm-4">
                                                <span class="float-right">
                                                <a href="{{asset ('berkas/'. $rekombts->gambar_menara)}}"
                                                    target="_blank" rel="noopener noreferrer">Download</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <input type="file" name="gambar_menara" class="form-control" accept="application/pdf">
                                            <div class="text-danger">
                                                @error('gambar_menara')
                                                {{ $message}}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6"><label>Rencana Anggaran dan Biaya *</label></div>
                                            <div class="col-md-6"><span class="float-right text-danger">Format file: .pdf | Max: 2MB</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <h6>{{$rekombts->rencana_anggaran}}</h6>
                                            </div>
                                            <div class="col-sm-4">
                                                <span class="float-right">
                                                <a href="{{asset ('berkas/'. $rekombts->rencana_anggaran)}}"
                                                    target="_blank" rel="noopener noreferrer">Download</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <input type="file" name="rencana_anggaran" class="form-control" accept="application/pdf">
                                            <div class="text-danger">
                                                @error('rencana_anggaran')
                                                {{ $message}}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-9"><label>Jaminan Asuransi Masyarakat dengan Radius Ketinggian Tower *</label></div>
                                            <div class="col-md-3"><span class="float-right text-danger">Format file: .pdf | Max: 2MB</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <h6>{{$rekombts->jaminan_asuransi}}</h6>
                                            </div>
                                            <div class="col-sm-4">
                                                <span class="float-right">
                                                <a href="{{asset ('berkas/'. $rekombts->jaminan_asuransi)}}"
                                                    target="_blank" rel="noopener noreferrer">Download</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <input type="file" name="jaminan_asuransi" class="form-control" accept="application/pdf">
                                            <div class="text-danger">
                                                @error('jaminan_asuransi')
                                                {{ $message}}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6"><label>Surat Izin Lingkungan *</label></div>
                                            <div class="col-md-6"><span class="float-right text-danger">Format file: .pdf | Max: 2MB</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <h6>{{$rekombts->izin_lingkungan}}</h6>
                                            </div>
                                            <div class="col-sm-4">
                                                <span class="float-right">
                                                <a href="{{asset ('berkas/'. $rekombts->izin_lingkungan)}}"
                                                    target="_blank" rel="noopener noreferrer">Download</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <input type="file" name="izin_lingkungan" class="form-control" accept="application/pdf">
                                            <div class="text-danger">
                                                @error('izin_lingkungan')
                                                {{ $message}}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Tinggi Tower BTS *</label>
                                        <input name="tinggi_tower" value="{{$rekombts->tinggi_tower}}" class="form-control" placeholder="Masukkan tinggi tower (meter)">
                                        <div class="text-danger">
                                            @error('tinggi_tower')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Luas Tanah *</label>
                                        <input name="luas_tanah" value="{{$rekombts->luas_tanah}}" class="form-control" placeholder="Masukkan luas tanah (meter persegi)">
                                        <div class="text-danger">
                                            @error('luas_tanah')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Tanggal Pengajuan *</label>
                                        <input type="date" name="tgl_pengajuan" value="{{$rekombts->tgl_pengajuan}}" class="form-control" placeholder="Masukkan tanggal pengajuan">
                                        <div class="text-danger">
                                            @error('tanggal_pengajuan')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Titik Koordiniat Lokasi Site *</label>
                                        <input name="posisi" value="{{$rekombts->posisi}}" class="form-control" placeholder="Masukkan Lotitude, Longitude">
                                        <div><p class="text-danger">* Wajib gunakan format penulisan (0.0000, 0.0000) tanpa tanda kurung sebagai inputan &nbsp;&nbsp;&nbsp;koordinat lotitude dan longitude posisi menara/tower bts.</p></div>
                                        <div class="text-danger">
                                            @error('posisi')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div id="map" style="width: 100%; height: 300px;"></div>
                                    </div>
                                </div>
                                @if(auth()->user()->level == 1)
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea name="keterangan" id="keterangan" class="form-control" rows="4">{{$rekombts->keterangan}}</textarea>
                                        <div class="text-danger">
                                            @error('keterangan')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @elseif(auth()->user()->level == 2)
                                @endif
                            </div>
                            <!-- row -->

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info float-right"><i class="fa fa-save"></i> Simpan</button>
                            <a href="/rekombts" class="btn btn-warning"> Kembali</a>
                        </div>
                    </form>
                    <!-- form -->
                </div>
            </div>

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

        </div>
    </div>
</div>
<!-- Main content -->

@endsection