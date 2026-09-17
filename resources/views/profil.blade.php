@extends('layouts.app')
@section('title', 'Profil Sekolah')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <h1 class="section-title mb-3">Profil Sekolah</h1>
        <p class="text-muted" style="max-width:700px;">Mengenal lebih dekat sejarah, visi misi, dan komitmen kami dalam mencetak generasi unggul.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-5 align-items-center mb-5">
            <div class="col-md-6">
                <h3 class="fw-bold mb-3">Sejarah Singkat</h3>
                <p class="text-muted">
                    Sekolah Kita berdiri dengan komitmen menyediakan pendidikan vokasi berkualitas yang relevan
                    dengan kebutuhan industri. Sejak awal berdiri, kami terus berkembang dengan menghadirkan
                    program keahlian yang terintegrasi dengan dunia usaha dan dunia industri (DUDIKA).
                </p>
                <p class="text-muted">
                    Kolaborasi strategis dengan berbagai mitra industri memastikan lulusan kami siap menjadi
                    pemain utama di era ekonomi digital.
                </p>
            </div>
                <div class="col-md-6">
                    <img src="{{ asset('images/sekolah.JPG') }}" alt="Foto Sekolah" class="img-fluid rounded-4 w-100" style="aspect-ratio:4/3; object-fit:cover;">
                </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100 p-4" style="background:#0b2545; color:#fff;">
                    <i class="bi bi-eye fs-2 text-warning mb-2"></i>
                    <h5 class="fw-bold">Visi Sekolah</h5>
                    <p class="mb-0 small">Terwujudnya Sekolah Kita sebagai pusat keunggulan pendidikan yang berkarakter, inovatif, dan kompetitif secara nasional.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="card border-0 shadow-sm h-100 p-3">
                            <h6 class="fw-bold">01. Kualitas Akademik</h6>
                            <p class="small text-muted mb-0">Pembelajaran berbasis proyek (PBL) dan industri.</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card border-0 shadow-sm h-100 p-3">
                            <h6 class="fw-bold">02. Pembentukan Karakter</h6>
                            <p class="small text-muted mb-0">Menanamkan integritas, disiplin, dan etika kerja.</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card border-0 shadow-sm h-100 p-3">
                            <h6 class="fw-bold">03. Jejaring Industri</h6>
                            <p class="small text-muted mb-0">Kemitraan strategis dengan DUDIKA nasional & internasional.</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card border-0 shadow-sm h-100 p-3">
                            <h6 class="fw-bold">04. Inovasi Digital</h6>
                            <p class="small text-muted mb-0">Ekosistem sekolah berbasis teknologi informasi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
