@extends('layouts.admin')
@section('title', 'Produk Siswa')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Daftar Produk Siswa</h5>
    <a href="{{ route('admin.products.create') }}" class="btn btn-navy btn-sm"><i class="bi bi-plus-lg"></i> Tambah Produk</a>
</div>
<div class="row g-3">
    @forelse($products as $item)
    <div class="col-md-3">
        <div class="card border-0 shadow-sm overflow-hidden">
            @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" style="height:150px; object-fit:cover;" alt="{{ $item->title }}">
            @else
                <div class="d-flex align-items-center justify-content-center bg-secondary-subtle" style="height:150px;">
                    <i class="bi bi-box-seam fs-2 text-secondary"></i>
                </div>
            @endif
            <div class="p-2">
                <p class="small fw-semibold mb-0">{{ $item->title }}</p>
                <p class="small text-muted mb-2">{{ $item->student_name }} @if($item->class_name) &middot; {{ $item->class_name }} @endif</p>
                <div class="d-flex gap-1">
                    <a href="{{ route('admin.products.edit', $item) }}" class="btn btn-sm btn-outline-primary flex-fill"><i class="bi bi-pencil"></i></a>
                    <form action="{{ route('admin.products.destroy', $item) }}" method="POST" class="flex-fill" onsubmit="return confirm('Hapus produk ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger w-100"><i class="bi bi-trash"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    <p class="text-muted">Belum ada produk siswa.</p>
    @endforelse
</div>
@endsection