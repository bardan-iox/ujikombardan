@extends('layouts.admin')
@section('title', 'Galeri')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Galeri Foto</h5>
    <a href="{{ route('admin.gallery.create') }}" class="btn btn-navy btn-sm"><i class="bi bi-plus-lg"></i> Tambah Foto</a>
</div>
<div class="row g-3">
    @forelse($galleries as $item)
    <div class="col-md-3">
        <div class="card border-0 shadow-sm overflow-hidden">
            <img src="{{ asset('storage/' . $item->image) }}" style="height:150px; object-fit:cover;" alt="{{ $item->title }}">
            <div class="p-2">
                <p class="small fw-semibold mb-1">{{ $item->title }}</p>
                <form action="{{ route('admin.gallery.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger w-100"><i class="bi bi-trash"></i> Hapus</button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <p class="text-muted">Belum ada foto.</p>
    @endforelse
</div>
@endsection
