<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') | Admin SMKN 4 Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --navy: #0b2545; --navy-dark: #081b34; --yellow: #f7c948; }
        body { font-family: 'Poppins', sans-serif; background: #f5f7fa; }
        .sidebar { background: var(--navy); min-height: 100vh; color: #fff; }
        .sidebar a { color: #cbd5e1; text-decoration: none; display: block; padding: .65rem 1.25rem; border-radius: 8px; }
        .sidebar a.active, .sidebar a:hover { background: var(--navy-dark); color: var(--yellow); }
        .sidebar .brand { color: #fff; font-weight: 700; padding: 1.25rem; }
        .topbar { background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,.05); }
        .btn-navy { background: var(--navy); color: #fff; border: none; }
        .btn-navy:hover { background: var(--navy-dark); color: #fff; }
        .card-stat h3 { font-weight: 800; color: var(--navy); }
    </style>
</head>
<body>
<div class="d-flex">
    <div class="sidebar p-3" style="width:250px; position:sticky; top:0; height:100vh;">
        <div class="brand d-flex align-items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 4 Bogor" style="height:40px; width:auto;" class="me-2">
            Admin SMKN 4
        </div>
        <nav class="d-flex flex-column gap-1 mt-3">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
            <a href="{{ route('admin.articles.index') }}" class="{{ request()->routeIs('admin.articles.*') ? 'active' : '' }}"><i class="bi bi-newspaper me-2"></i>Artikel / Berita</a>
            <a href="{{ route('admin.gallery.index') }}" class="{{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}"><i class="bi bi-images me-2"></i>Galeri</a>
            <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}"><i class="bi bi-box-seam me-2"></i>Produk Siswa</a>
            <a href="{{ route('admin.messages.index') }}" class="{{ request()->routeIs('admin.messages.*') ? 'active' : '' }}"><i class="bi bi-envelope me-2"></i>Pesan Masuk</a>
            <hr class="border-secondary">
            <a href="{{ route('home') }}" target="_blank"><i class="bi bi-globe me-2"></i>Lihat Situs</a>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-link p-0 w-100 text-start" style="color:#cbd5e1; padding:.65rem 1.25rem !important;">
                    <i class="bi bi-box-arrow-left me-2"></i>Logout
                </button>
            </form>
        </nav>
    </div>

    <div class="flex-grow-1">
        <div class="topbar px-4 py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0">@yield('title', 'Dashboard')</h5>
            <span class="text-muted small"><i class="bi bi-person-circle me-1"></i>{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</span>
        </div>
        <div class="p-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
