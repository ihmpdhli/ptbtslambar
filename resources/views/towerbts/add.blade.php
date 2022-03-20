@extends('backend')

@section('content')

<!-- content-header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-12">
            <div class="col-sm-12">
                <h6 class="m-12 text-dark"><a href="/towerbts">Data</a> / <a href="/towerbts">BTS</a> / Tambah BTS</h6>
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
                    <form action="/towerbts/insert" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <p class="text-danger">(*) Wajib diisi</p>
                            <!-- row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- option input -->
                                    <div class="form-group">
                                        <label>Provider *</label>
                                        <select name="provider_id" class="form-control">
                                            <option value="">-- Pilih provider --</option>
                                            @foreach ($provider as $data) {
                                                <option value="{{$data->id}}">{{$data->provider}}</option>
                                            @endforeach
                                        </select>
                                        <div class="text-danger">
                                            @error('provider_id')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- option input -->
                                    <div class="form-group">
                                        <label>Struktur Menara *</label>
                                        <select name="struktur_menara_id" class="form-control">
                                            <option value="">-- Pilih struktur menara --</option>
                                            @foreach ($struktur_menara as $data) {
                                            <option value="{{$data->id}}">{{$data->struktur_menara}}</option>
                                            @endforeach
                                        </select>
                                        <div class="text-danger">
                                            @error('struktur_menara_id')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Alamat *</label>
                                        <input name="alamat" value="{{ old('alamat')}}" class="form-control" placeholder="Masukkan alamat">
                                        <div class="text-danger">
                                            @error('alamat')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <!-- option input -->
                                    <div class="form-group">
                                        <label>Kecamatan *</label>
                                        <select name="kecamatan_id" class="form-control">
                                            <option value="">-- Pilih kecamatan --</option>
                                            @foreach ($kecamatan as $data)
                                            <option value="{{$data->id}}">{{ $data->kecamatan}}</option>
                                            @endforeach
                                        </select>
                                        <div class="text-danger">
                                            @error('kecamatan_id')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <!-- option input -->
                                    <div class="form-group">
                                        <label>Operator</label>
                                        <select name="operator_id[]" class="select2bs4" multiple="multiple" data-placeholder="&nbsp;&nbsp;&nbsp;-- Pilih operator -- (Jika tidak ada silahkan dikosongi)" style="width: 100%;">
                                            <option value="">-- Pilih operator --</option>
                                            @foreach ($operator as $data) {
                                            <option value="{{$data->id}}">{{$data->operator}}</option>
                                            @endforeach
                                        </select>
                                        <div class="text-danger">
                                            @error('operator_id')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <!-- option input -->
                                    <div class="form-group">
                                        <label>Jaringan</label>
                                        <select name="jaringan_id[]" class="select2bs4" multiple="multiple" data-placeholder="&nbsp;&nbsp;&nbsp;-- Pilih jaringan -- (Jika tidak ada silahkan dikosongi)" style="width: 100%;">
                                            <option value="">-- Pilih jaringan --</option>
                                            @foreach ($jaringan as $data)
                                            <option value="{{$data->id}}">{{ $data->jaringan}}</option>
                                            @endforeach
                                        </select>
                                        <div class="text-danger">
                                            @error('jaringan_id')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Tinggi Tower *</label>
                                        <input name="tinggi_tower" value="{{ old('tinggi_tower')}}" class="form-control" placeholder="Masukkan tinggi tower (meter)">
                                        <div class="text-danger">
                                            @error('tinggi_tower')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Luas Tanah *</label>
                                        <input name="luas_tanah" value="{{ old('luas_tanah')}}" class="form-control" placeholder="Masukkan luas tanah (meter persegi)">
                                        <div class="text-danger">
                                            @error('luas_tanah')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Tanggal Berdiri *</label>
                                        <input type="date" name="tgl_berdiri" value="{{ old('tgl_berdiri')}}" class="form-control" placeholder="Masukkan tanggal berdiri">
                                        <div class="text-danger">
                                            @error('tgl_berdiri')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Nama Pemilik Lahan *</label>
                                        <input name="pemilik_lahan" value="{{ old('pemilik_lahan')}}" class="form-control" placeholder="Masukkan nama pemilik lahan">
                                        <div class="text-danger">
                                            @error('pemilik_lahan')
                                            {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Posisi *</label>
                                        <input name="posisi" id="posisi" value="{{ old('posisi')}}" class="form-control" placeholder="Masukkan Lotitude, Longitude">
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

                            </div>
                            <!-- row -->

                        </div>
                        <div class="card-footer rounded-lg">
                            <button type="submit" class="btn btn-info float-right"><i class="fa fa-save"></i> Simpan</button>
                            <a href="/towerbts" class="btn btn-warning"> Kembali</a>
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
                    center: [-5.0367199,104.0823632],
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
                var curLocation = [-5.0367199,104.0823632];
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