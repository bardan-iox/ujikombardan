@extends('layouts.admin')
@section('title', 'Tambah Produk Siswa')

@section('content')
<div class="card border-0 shadow-sm p-4" style="max-width:600px;">
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.products._form')
        <button type="submit" class="btn btn-navy px-4">Simpan</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
    </form>
</div>
@endsection