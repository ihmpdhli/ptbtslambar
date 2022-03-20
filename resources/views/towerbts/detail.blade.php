@extends('backend')

@section('content')

<!-- content-header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-12">
            <div class="col-sm-12">
                <h6 class="m-12 text-dark"><a href="/towerbts">Data</a> / <a href="/towerbts">BTS</a> / Detail Data BTS</h6>
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
                <h5 class="card-title m-0">{{$towerbts->provider}} | {{$towerbts->posisi}}</h5>
            </div>
            <div class="card-body" style="padding: 20px 20px 20px 20px">
                <table class="table table-borderless table-striped">
                    <tr>
                        <td width="15%">Author</td>
                        <td>:</td>
                        <td width="100%">{{$towerbts->nama_lengkap}}</td>
                    </tr>
                    <tr>
                        <td width="15%">Provider</td>
                        <td>:</td>
                        <td width="100%">{{$towerbts->provider}}</td>
                    </tr>
                    <tr>
                        <td>Operator</td>
                        <td>:</td>
                        <td>
                            @foreach ($tower_opt as $opt)
                            {{$ops = $opt->operator}}<br>
                            @endforeach</td>
                    </tr>
                    <tr>
                        <td>Struktur Menara</td>
                        <td>:</td>
                        <td>{{$towerbts->struktur_menara}}</td>
                    </tr>
                    <tr>
                        <td>Jaringan</td>
                        <td>:</td>
                        <td>
                            @foreach ($tower_jar as $jar)
                            {{$jar = $jar->jaringan}}<br>
                            @endforeach</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{$towerbts->alamat}}</td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td>:</td>
                        <td>{{$towerbts->kecamatan}}</td>
                    </tr>
                    <tr>
                        <td>Posisi</td>
                        <td>:</td>
                        <td>{{$towerbts->posisi}}</td>
                    </tr>
                    <tr>
                        <td>Tinggi Tower</td>
                        <td>:</td>
                        <td>{{$towerbts->tinggi_tower}} M</td>
                    </tr>
                    <tr>
                        <td>Luas Tanah</td>
                        <td>:</td>
                        <td>{{$towerbts->luas_tanah}} M<sup>2</sup></td>
                    </tr>
                    <tr>
                        <td>Tanggal Berdiri</td>
                        <td>:</td>
                        <td>{{$towerbts->tgl_berdiri}}</td>
                    </tr>
                    <tr>
                        <td>Pemilik Lahan</td>
                        <td>:</td>
                        <td>{{$towerbts->pemilik_lahan}}</td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td>{{$towerbts->keterangan}}</td>
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
                            center: [{{$towerbts->posisi}}],
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
                        var curLocation = [{{$towerbts->posisi}}];
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
                </table>
            </div>
            <div class="card-footer">
                <a href="/towerbts" class="btn btn-warning"> Kembali</a>
            </div>
        </div>
    </div>
</div>

@endsection