@extends('layouts.app')
@section('title', 'Beranda')

@push('styles')
<style>
    .hero { position: relative; overflow: hidden; }
    .hero::after {
        content: '';
        position: absolute; inset: 0;
        background: radial-gradient(circle at 80% 20%, rgba(247,201,72,.15), transparent 60%);
    }
    .avatar-circle {
        width: 48px; height: 48px; border-radius: 50%;
        background: #0b2545; color: #f7c948; display: flex;
        align-items: center; justify-content: center; font-weight: 700;
    }
    .quote-mark { font-size: 2.5rem; color: #f7c948; line-height: 1; }
    .partner-logo { filter: grayscale(100%); opacity: .5; transition: .2s; }
    .partner-logo:hover { filter: grayscale(0%); opacity: 1; }
    .cta-banner { background: linear-gradient(120deg, #0b2545, #133a68); border-radius: 24px; }
</style>
@endpush

@section('content')
<section class="hero py-5">
    <div class="container py-5 position-relative">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <span class="badge badge-yellow px-3 py-2 mb-3">Membangun Masa Depan Gemilang</span>
                <h1 class="display-5 fw-bold mb-3">Unggul, Berkarakter, dan<br>Berdaya Saing Global</h1>
                <p class="fs-5 mb-4" style="max-width:560px; opacity:.9;">
                    Mencetak generasi berprestasi dan siap kerja di era digital melalui pendidikan vokasi
                    yang inovatif dan terintegrasi dengan industri.
                </p>
                {{-- <a href="{{ route('galeri.index') }}" class="btn btn-yellow btn-lg px-4 me-2">Galeri <i class="bi bi-arrow-right"></i></a>
                <a href="{{ route('profil') }}" class="btn btn-outline-light btn-lg px-4">Pelajari Lebih Lanjut</a> --}}
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="section-title mb-1">Program Keahlian</h2>
                <p class="text-muted mb-0">Pilih jalur karirmu dan kembangkan potensi terbaikmu.</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body">
                        <div class="mb-3"><img src="{{ asset('images/pplg.jpeg') }}" alt="Logo PPLG" style="width:56px; height:56px; object-fit:cover; border-radius:12px;"></div>
                        <h5 class="fw-bold">PPLG</h5>
                        <p class="text-muted small">Pengembangan Perangkat Lunak dan Gim &mdash; rancang aplikasi, web, dan gim interaktif.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body">
                       <div class="mb-3"><img src="{{ asset('images/tkjt.jpeg') }}" alt="Logo TJKT" style="width:56px; height:56px; object-fit:cover; border-radius:12px;"></div>
                        <h5 class="fw-bold">TJKT</h5>
                        <p class="text-muted small">Teknik Jaringan Komputer dan Telekomunikasi &mdash; instalasi jaringan hingga fiber optik.</p>
                    </div>
                </div>

            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body">
                        <div class="mb-3"><img src="{{ asset('images/to.jpeg') }}" alt="Logo Teknik Otomotif" style="width:56px; height:56px; object-fit:cover; border-radius:12px;"></div>
                        <h5 class="fw-bold">Teknik Otomotif</h5>
                        <p class="text-muted small">Perawatan dan perbaikan kendaraan ringan hingga sepeda motor modern.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body">
                        <div class="mb-3"><img src="{{ asset('images/tpfl.jpeg') }}" alt="Logo TPFL" style="width:56px; height:56px; object-fit:cover; border-radius:12px;"></div>
                        <h5 class="fw-bold">TPFL</h5>
                        <p class="text-muted small">Teknik Pengelasan dan Fabrikasi Logam untuk industri manufaktur.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="section-title mb-0">Berita &amp; Kegiatan</h2>
                    <a href="{{ route('artikel.index') }}" class="text-decoration-none fw-semibold">Semua Berita <i class="bi bi-arrow-right"></i></a>
                </div>
                <div class="row g-4">
                    @forelse($articles as $article)
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm card-hover">
                                @if($article->cover_image)
                                    <img src="{{ asset('storage/' . $article->cover_image) }}" class="card-img-top" style="height:160px; object-fit:cover;" alt="{{ $article->title }}">
                                @else
                                    <div class="d-flex align-items-center justify-content-center bg-secondary-subtle" style="height:160px;">
                                        <i class="bi bi-image fs-1 text-secondary"></i>
                                    </div>
                                @endif
                                <div class="card-body">
                                    @if($article->category)
                                        <span class="badge bg-secondary-subtle text-secondary-emphasis mb-2">{{ strtoupper($article->category) }}</span>
                                    @endif
                                    <h6 class="fw-bold">{{ Str::limit($article->title, 60) }}</h6>
                                    <a href="{{ route('artikel.show', $article->slug) }}" class="small fw-semibold text-decoration-none">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">Belum ada berita.</p>
                    @endforelse
                </div>
            </div>
            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3"><i class="bi bi-trophy text-warning me-1"></i> Prestasi Siswa</h5>
                        @forelse($achievements as $item)
                            <div class="mb-3 pb-3 border-bottom">
                                <div class="fw-semibold small">{{ $item->title }}</div>
                                <div class="text-muted small">{{ $item->level }} &middot; {{ $item->year }}</div>
                            </div>
                        @empty
                            <p class="text-muted small">Belum ada data prestasi.</p>
                        @endforelse
                        <a href="{{ route('prestasi.index') }}" class="btn btn-navy btn-sm w-100 mt-2">Lihat Semua Prestasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-4 bg-white">
    <div class="container">
        <p class="text-center text-muted small fw-semibold mb-4">BEKERJASAMA DENGAN INDUSTRI TERKEMUKA</p>
        <div class="d-flex flex-wrap justify-content-center gap-5">
            @foreach(['Bonet'] as $partner)
                <span class="partner-logo fw-bold fs-5 text-secondary">{{ $partner }}</span>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="cta-banner text-white text-center p-5">
            <h3 class="fw-bold mb-2">Siap Bergabung Bersama Kami?</h3>
            <p class="mb-4" style="opacity:.85;">Mulai langkah pertamamu menuju karir yang cerah dan berdaya saing global.</p>
            <a href="{{ route('kontak.index') }}" class="btn btn-yellow btn-lg px-5">Hubungi Kami</a>
        </div>
    </div>
</section>
@endsection