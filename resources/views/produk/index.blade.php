@extends('layouts.app')
@section('title', 'Produk Siswa')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <h1 class="section-title mb-3">Produk Siswa</h1>
        <p class="text-muted">Kumpulan karya dan hasil kerja terbaik dari siswa-siswi kami.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            @forelse($products as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm card-hover overflow-hidden">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" style="height:200px; object-fit:cover;" alt="{{ $item->title }}">
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-secondary-subtle" style="height:200px;">
                                <i class="bi bi-box-seam fs-1 text-secondary"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="fw-bold mb-1">{{ $item->title }}</h5>
                            <p class="text-muted small mb-2">
                                <i class="bi bi-person-circle me-1"></i>{{ $item->student_name ?? 'Anonim' }}
                                @if($item->class_name) &middot; {{ $item->class_name }} @endif
                            </p>
                            @if($item->description)
                                <p class="small mb-0">{{ Str::limit($item->description, 100) }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">Belum ada produk yang ditambahkan.</p>
            @endforelse
        </div>
        <div class="mt-4">{{ $products->links() }}</div>
    </div>
</section>
@endsection