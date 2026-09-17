@extends('layouts.app')
@section('title', 'Program Keahlian')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <h1 class="section-title mb-3">Program Keahlian</h1>
        <p class="text-muted">Pilih jalur karirmu dan kembangkan potensi terbaikmu di sini.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            @forelse($programs as $program)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm card-hover">
                        @if($program->image)
                            <img src="{{ asset('storage/' . $program->image) }}" class="card-img-top" style="height:180px; object-fit:cover;" alt="{{ $program->name }}">
                        @endif
                        <div class="card-body">
                            <div class="mb-2 fs-3 text-warning"><i class="bi bi-{{ $program->icon ?? 'mortarboard' }}"></i></div>
                            <h5 class="fw-bold">{{ $program->name }}</h5>
                            <p class="text-muted small">{{ Str::limit($program->short_description, 100) }}</p>
                            <a href="{{ route('program.show', $program->slug) }}" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">Belum ada program keahlian.</p>
            @endforelse
        </div>
        <div class="mt-4">{{ $programs->links() }}</div>
    </div>
</section>
@endsection
