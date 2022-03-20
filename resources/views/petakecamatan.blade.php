@extends('frontend')

@section('content')

<div class="col-sm-12">
    <br>
    <div class="text-center"><h4><b>{{$title}}</b></h4></div>
    <br>
</div>

<div id="map" style="width: 100%; height: 593px;"></div>

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

    @foreach ($towerbts as $data)
    var iconbts = L.icon({
            iconUrl : '{{ asset ('icon')}}/{{ $data->icon }}',
            iconSize: [40, 40],
    });

    var informasi = '<table class="table table-borderless"><tr><td>Provider</td><td width="0%">:</td><td width="100%">{{ $data->provider}}</td></tr> <tr><td>Posisi</td><td>:</td><td>{{ $data->posisi}}</a></td></tr> <tr><td>Kecamatan</td><td>:</td><td>{{ $data->kecamatan}}</td></tr> <tr><td>Alamat</td><td>:</td><td>{{ $data->alamat}}</td></tr></table>';

    L.marker([<?= $data->posisi ?>],{icon: iconbts}).addTo(towerbts).bindPopup(informasi);
    @endforeach
</script>

@endsection