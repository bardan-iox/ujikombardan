@extends('layouts.app')
@section('title', 'Galeri')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <h1 class="section-title mb-3">Galeri</h1>
        <p class="text-muted">Dokumentasi kegiatan dan momen berharga di sekolah kami.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-3">
            @forelse($galleries as $item)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card border-0 shadow-sm card-hover overflow-hidden">
                        <img src="{{ asset('storage/' . $item->image) }}" class="w-100" style="height:200px; object-fit:cover;" alt="{{ $item->title }}">
                        <div class="p-2">
                            <p class="small mb-0 fw-semibold">{{ $item->title }}</p>
                            @if($item->category)
                                <span class="badge bg-secondary-subtle text-secondary-emphasis small">{{ $item->category }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">Belum ada foto di galeri.</p>
            @endforelse
        </div>
        <div class="mt-4">{{ $galleries->links() }}</div>
    </div>
</section>
@endsection
