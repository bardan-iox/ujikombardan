@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<div class="row g-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm p-4 card-stat">
            <i class="bi bi-mortarboard fs-2 text-primary mb-2"></i>
            <h3>{{ $totalPrograms }}</h3>
            <p class="text-muted small mb-0">Program Keahlian</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm p-4 card-stat">
            <i class="bi bi-newspaper fs-2 text-success mb-2"></i>
            <h3>{{ $totalArticles }}</h3>
            <p class="text-muted small mb-0">Artikel</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm p-4 card-stat">
            <i class="bi bi-images fs-2 text-info mb-2"></i>
            <h3>{{ $totalGallery }}</h3>
            <p class="text-muted small mb-0">Foto Galeri</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm p-4 card-stat">
            <i class="bi bi-envelope fs-2 text-warning mb-2"></i>
            <h3>{{ $unreadMessages }}</h3>
            <p class="text-muted small mb-0">Pesan Belum Dibaca</p>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm mt-4 p-4">
    <h6 class="fw-bold mb-2">Selamat datang di Panel Admin</h6>
    <p class="text-muted small mb-0">Gunakan menu di samping untuk mengelola Program Keahlian, Artikel, Galeri, Prestasi, dan Pesan Masuk.</p>
</div>
@endsection
