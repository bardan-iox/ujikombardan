@extends('layouts.app')
@section('title', 'Berita & Kegiatan')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <h1 class="section-title mb-3">Berita &amp; Kegiatan</h1>
        <p class="text-muted">Update terbaru seputar kegiatan dan prestasi sekolah.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            @forelse($articles as $article)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm card-hover">
                        @if($article->cover_image)
                            <img src="{{ asset('storage/' . $article->cover_image) }}" class="card-img-top" style="height:180px; object-fit:cover;" alt="{{ $article->title }}">
                        @endif
                        <div class="card-body">
                            @if($article->category)
                                <span class="badge bg-secondary-subtle text-secondary-emphasis mb-2">{{ strtoupper($article->category) }}</span>
                            @endif
                            <h5 class="fw-bold">{{ Str::limit($article->title, 60) }}</h5>
                            <p class="text-muted small">{{ Str::limit($article->excerpt, 90) }}</p>
                            <a href="{{ route('artikel.show', $article->slug) }}" class="small fw-semibold text-decoration-none">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">Belum ada artikel.</p>
            @endforelse
        </div>
        <div class="mt-4">{{ $articles->links() }}</div>
    </div>
</section>
@endsection
