@extends('layouts.app')
@section('title', 'Prestasi Siswa')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <h1 class="section-title mb-3">Prestasi Siswa</h1>
        <p class="text-muted">Kebanggaan kami atas pencapaian siswa-siswi terbaik.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-3">
            @forelse($achievements as $item)
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm p-3 d-flex flex-row align-items-start gap-3">
                        <i class="bi bi-trophy-fill fs-3 text-warning"></i>
                        <div>
                            <h6 class="fw-bold mb-1">{{ $item->title }}</h6>
                            <p class="small text-muted mb-1">{{ $item->level }} &middot; {{ $item->year }}</p>
                            <p class="small mb-0">{{ $item->description }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">Belum ada data prestasi.</p>
            @endforelse
        </div>
        <div class="mt-4">{{ $achievements->links() }}</div>
    </div>
</section>
@endsection
