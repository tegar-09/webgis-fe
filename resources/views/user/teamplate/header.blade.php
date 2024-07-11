<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
            <img src="{{ asset('assets-user/img/logo/logo-bpbd.png') }}" alt="">
            <div>
                <p class="">BPBD</p>
                <span>Kabupaten Banyuwangi</span>
            </div>
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="/">Beranda</a></li>
                <li><a class="nav-link scrollto" href="#">Peta Bencana</a></li>
                <li><a class="nav-link scrollto" href="/tambah-kejadian">Laporkan Kejadian</a></li>
                {{-- menu laporkan kejadian muncul jika sudah login --}}
                <li><a class="nav-link scrollto" href="#footer">Kontak</a></li>
                {{-- <li><a class="getstarted scrollto" href="/login">Login</a></li> --}}
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->
