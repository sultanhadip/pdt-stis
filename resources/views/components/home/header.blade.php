<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/logo pdt.png') }}" alt="" style="width: 50px;">
                <span class="logo-text ps-3">
                    <span>Pengembangan</span>
                    <span>Desa Tertinggal</span>
                </span>
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="/">Home</a></li>
                    <li class="dropdown"><a href="#"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#about">Tentang Kami</a></li>
                            <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
                            <li><a href="/layouts.user.testimoni">Testimoni</a></li>
                            <li><a href="#clients">Kemitraan</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Mari Bergabung</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/daftar-volunteer">Volunteer</a></li>
                            <li><a href="/donasi">Donasi</a></li>
                        </ul>
                    </li>
                    <li><a href="/berita">Berita</a></li>
                    <li><a class="nav-link scrollto" href="/gallery">Galeri</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        @else
                            <li><a class="getstarted scrollto" href="{{ route('login') }}">Login</a></li>
                            @if (Route::has('register'))
                                <li><a class="signup" href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                    @endif
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->