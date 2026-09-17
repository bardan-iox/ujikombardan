@extends('layouts.admin')
@section('title', 'Tambah Foto Galeri')

@section('content')
<div class="card border-0 shadow-sm p-4" style="max-width:600px;">
    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Judul Foto</label>
            <input type="text" name="title" value="{{ old('title') }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Kategori</label>
            <input type="text" name="category" value="{{ old('category') }}" class="form-control" placeholder="Kegiatan, Fasilitas, dll">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Foto</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-navy px-4">Simpan</button>
        <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
    </form>
</div>
@endsection
