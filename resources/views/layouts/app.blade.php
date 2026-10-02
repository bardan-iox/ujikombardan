<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMKN 4 Bogor') | Sistem Manajemen Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --navy: #0b2545;
            --navy-dark: #081b34;
            --yellow: #f7c948;
        }
        body { font-family: 'Poppins', sans-serif; color: #1f2937; }
        .navbar-brand { font-weight: 700; color: var(--navy) !important; }
        .navbar { background: #fff; box-shadow: 0 2px 10px rgba(0,0,0,.06); }
        .nav-link { font-weight: 500; color: #333 !important; }
        .nav-link.active { color: var(--navy) !important; font-weight: 700; }
        .btn-navy { background: var(--navy); color: #fff; border: none; }
        .btn-navy:hover { background: var(--navy-dark); color: #fff; }
        .btn-yellow { background: var(--yellow); color: var(--navy); border: none; font-weight: 600; }
        .btn-yellow:hover { background: #e6b93d; color: var(--navy); }
        .hero {
            position: relative;
            overflow: hidden;
            color: #fff;
            background-image: linear-gradient(rgba(8,27,52,.88), rgba(11,37,69,.92)), url('{{ asset('images/sekolah.JPG') }}');
            background-size: cover;
            background-position: center;
        }
        .badge-yellow { background: var(--yellow); color: var(--navy); font-weight: 600; }
        .section-title { font-weight: 700; color: var(--navy); }
        footer { background: var(--navy-dark); color: #cbd5e1; }
        footer a { color: #cbd5e1; text-decoration: none; }
        footer a:hover { color: var(--yellow); }
        .card-hover { transition: transform .2s ease, box-shadow .2s ease; }
        .card-hover:hover { transform: translateY(-4px); box-shadow: 0 10px 25px rgba(0,0,0,.08); }
        .stat-box h3 { font-weight: 800; color: var(--yellow); }
    </style>
    @stack('styles')
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 4 Bogor" style="height:44px; width:auto;" class="me-2">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navMenu">
            <ul class="navbar-nav gap-lg-3 align-items-lg-center">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('profil') ? 'active' : '' }}" href="{{ route('profil') }}">Profil</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('artikel.*') ? 'active' : '' }}" href="{{ route('artikel.index') }}">Berita</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('galeri.*') ? 'active' : '' }}" href="{{ route('galeri.index') }}">Galeri</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('produk.*') ? 'active' : '' }}" href="{{ route('produk.index') }}">Produk</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('kontak.*') ? 'active' : '' }}" href="{{ route('kontak.index') }}">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>

@if(session('success'))
    <div class="container mt-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
@endif

<main>
    @yield('content')
</main>

<footer class="pt-5 pb-4 mt-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 4 Bogor" style="height:48px; width:auto;" class="mb-2">
                {{-- <h5 class="text-white">SMK Negeri 4 Bogor</h5> --}}
                <p class="small mt-2">Sekolah kejuruan unggulan yang berdedikasi menciptakan lulusan siap kerja.</p>
            </div>
            <div class="col-md-4">
                <h6 class="text-white">Tautan</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="{{ route('profil') }}">Profil Sekolah</a></li>
                    <li class="mb-2"><a href="{{ route('program.index') }}">Program Keahlian</a></li>
                    <li class="mb-2"><a href="{{ route('artikel.index') }}">Berita &amp; Kegiatan</a></li>
                    <li class="mb-2"><a href="{{ route('kontak.index') }}">Kontak</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h6 class="text-white">Kontak</h6>
                <p class="small mb-1"><i class="bi bi-geo-alt me-1"></i> Kp. Buntar, Kel. Muarasari, Kec. Bogor Selatan, Kota Bogor, Jawa Barat 16137</p>
                <p class="small mb-1"><i class="bi bi-telephone me-1"></i> (+62) 895-3234-20403</p>
                <p class="small"><i class="bi bi-envelope me-1"></i> bardansulaiman@gmail.com</p>
            </div>
        </div>
        <hr class="border-secondary mt-4">
        <p class="small text-center mb-0">&copy; {{ date('Y') }} SMK Negeri 4 Bogor. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>