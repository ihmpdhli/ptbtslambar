<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item">
        <a href="/home" class="nav-link {{request()->is('home') ? 'active' : ''}}">
            <i class="nav-icon fas fa-home"></i>
            <p>Dasboard</p>
        </a>
    </li>

    @if (auth()->user()->level==1)
    <li class="nav-header">
        <h5><strong>DATA</strong></h5>
    </li>
    <li class="nav-item">
        <a href="/towerbts" class="nav-link {{request()->is('towerbts') ? 'active' : ''}}">
            <i class="fas fa-broadcast-tower nav-icon"></i>
            <p>Tower BTS</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/provider" class="nav-link {{request()->is('provider') ? 'active' : ''}}">
            <i class="fas fa-rss nav-icon"></i>
            <p>Provider</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/operator" class="nav-link {{request()->is('operator') ? 'active' : ''}}">
            <i class="fas fa-cloud nav-icon"></i>
            <p>Operator</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/jaringan" class="nav-link {{request()->is('jaringan') ? 'active' : ''}}">
            <i class="fas fa-signal nav-icon"></i>
            <p>Jaringan</p>
        </a>
    </li>
    <li class="nav-header">
        <h5><strong>LOKASI</strong></h5>
    </li>
    <li class="nav-item">
        <a href="/kecamatan" class="nav-link {{request()->is('kecamatan') ? 'active' : ''}}">
            <i class="fas fa-map nav-icon"></i>
            <p>Kecamatan</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/peta" class="nav-link {{request()->is('peta') ? 'active' : ''}}">
            <i class="nav-icon fas fa-map-marked-alt"></i>
            <p>Peta</p>
        </a>
    </li>
    <li class="nav-header">
        <h5><strong>TRANSAKSI</strong></h5>
    </li>
    <li class="nav-item">
        <a href="/rekombts" class="nav-link {{request()->is('rekombts') ? 'active' : ''}}">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>Rekomendasi BTS</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/retribusi" class="nav-link {{request()->is('retribusi') ? 'active' : ''}}">
            <i class="fas fa-list-ul nav-icon"></i>
            <p>Retribusi BTS</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/tahun" class="nav-link {{request()->is('tahun') ? 'active' : ''}}">
            <i class="fas fa-calendar-check nav-icon"></i>
            <p>Tahun</p>
        </a>
    </li>
    <li class="nav-header">
        <h5><strong>PENGGUNA</strong></h5>
    </li>
    <li class="nav-item">
        <a href="/profil/{{auth()->user()->id}}" class="nav-link {{request()->is('profil') ? 'active' : ''}}">
            <i class="nav-icon fas fa-user"></i>
            <p>Edit Profil</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/users" class="nav-link {{request()->is('users') ? 'active' : ''}}">
            <i class="fas fa-users nav-icon"></i>
            <p>Users</p>
        </a>
    </li>
    <li class="nav-header"></li>
    <li class="nav-header"></li>
    <li class="nav-header"></li>

    @elseif (auth()->user()->level==2)
    <li class="nav-header">
        <h5><strong>DATA</strong></h5>
    </li>
    <li class="nav-item">
        <a href="/towerbts" class="nav-link {{request()->is('towerbts') ? 'active' : ''}}">
            <i class="fas fa-broadcast-tower nav-icon"></i>
            <p>BTS</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/provider" class="nav-link {{request()->is('provider') ? 'active' : ''}}">
            <i class="fas fa-rss nav-icon"></i>
            <p>Provider</p>
        </a>
    </li>
    <li class="nav-header">
        <h5><strong>LOKASI</strong></h5>
    </li>
    <li class="nav-item">
        <a href="/kecamatan" class="nav-link {{request()->is('kecamatan') ? 'active' : ''}}">
            <i class="fas fa-map nav-icon"></i>
            <p>Kecamatan</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/peta" class="nav-link {{request()->is('peta') ? 'active' : ''}}">
            <i class="nav-icon fas fa-map-marked-alt"></i>
            <p>Peta</p>
        </a>
    </li>
    <li class="nav-header">
        <h5><strong>TRANSAKSI</strong></h5>
    </li>
    <li class="nav-item">
        <a href="/rekombts" class="nav-link {{request()->is('rekombts') ? 'active' : ''}}">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>Rekomendasi BTS</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/retribusi" class="nav-link {{request()->is('retribusi') ? 'active' : ''}}">
            <i class="fas fa-list-ul nav-icon"></i>
            <p>Retribusi BTS</p>
        </a>
    </li>

    <li class="nav-header">
        <h5><strong>PENGGUNA</strong></h5>
    </li>
    <li class="nav-item">
        <a href="/profil/{{auth()->user()->id}}" class="nav-link {{request()->is('profil') ? 'active' : ''}}">
            <i class="nav-icon fas fa-user"></i>
            <p>Edit Profil</p>
        </a>
    </li>
    @endif

</ul>