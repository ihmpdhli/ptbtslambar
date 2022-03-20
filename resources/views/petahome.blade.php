@extends('frontend')

@section('content')

<div id="map" style="width: 100%; height: 734px;"></div>

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

    var towerbts = L.layerGroup();

    var map = L.map('map', {
        center: [-5.036737688172696, 104.08239063312324],
        zoom: 11,
        layers: [peta1, towerbts]
    });

    var baseMaps = {
        "Grayscale": peta1,
        "Satellite": peta2,
        "Streets": peta3,
        "Dark": peta4,
    };

    var overlayer = {
        "towerbts": towerbts,
    };

    L.control.layers(baseMaps, overlayer).addTo(map);

    //menentukan titik koordinat dari database
    @foreach ($towerbts as $data)
    var iconbts = L.icon({
            iconUrl : '{{ asset ('icon')}}/{{ $data->icon }}',
            iconSize:     [38, 38],
            iconAnchor:   [18, 39],
            popupAnchor:  [-3, -46]
    });

    var informasi = '<table class="table table-borderless"><tr><td>Provider</td><td width="0%">:</td><td width="100%">{{ $data->provider}}</td></tr> <tr><td>Posisi</td><td>:</td><td>{{ $data->posisi}}</a></td></tr> <tr><td>Kecamatan</td><td>:</td><td>{{ $data->kecamatan}}</td></tr> <tr><td>Alamat</td><td>:</td><td>{{ $data->alamat}}</td></tr></table>';

    L.marker([<?= $data->posisi ?>],{icon: iconbts}).addTo(towerbts).bindPopup(informasi);
    @endforeach
</script>

<div class="col-sm-12">
    <br>
    <br>
    <br>
    <br>
        <div class="text-center"><h4><b>Selamat Datang di Website Pemetaan Tower/Menara Telekomunikasi BTS</b></h4></div>
        <div class="text-center"><h4><b>Dinas Komunikasi dan Informatika Kabupaten Lampung Barat</b></h4></div>
    <br>
    <br>
    <br>
</div>

<div class="col-sm-12">

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title"><b>Maklumat Pelayanan</b></h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <h6>Dengan ini, kami sanggup menyelenggarakan pelayanan
                                rekomendasi pendirian tower menara telekomunikasi sesuai
                                dengan standar pelayanan dan bertekad untuk selalu
                                meningkatkan profesionalisme kerja dan kualitas pelayanan.
                                Jika kami tidak menepati janji ini, kami siap menerima sanksi
                                sesuai ketentuan yang berlaku</h6>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title"><b>Moto</b></h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Kami "SIAP" melayani dengan sepenuh Hati</label>
                                <ul style="text-align: justify;">
                                    <li>Santun &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;Melayani dengan ramah dan beretika</li>
                                    <li>Ikhlas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;Menyelenggarakan layanan yang tulus</li>
                                    <li>Akuntable&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;Layanan yang dapat dipertanggungjawabkan</li>
                                    <li>Prima&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;Layanan yang maksimal</li>
                                </ul>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title text-center"><b>Visi dan Misi</b></h3>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Visi</b></label>
                                            <ul style="text-align:">
                                                <li>Terwujudnya Lampung Barat hebat dan sejahtera</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Misi</b></label>
                                            <ul style="text-align:">
                                                <li>Mengembangkan wilayah melalui pembangungan infrastuktur
                                                secara berkeadilan, dengan memperhatikan aspek mitigasi
                                                bencana dan berwawasan lingkungan</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <br>
            <br>
        </div>
    </div>
</section>

@endsection