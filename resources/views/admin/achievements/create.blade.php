@extends('layouts.admin')
@section('title', 'Tambah Prestasi')

@section('content')
<div class="card border-0 shadow-sm p-4" style="max-width:600px;">
    <form action="{{ route('admin.achievements.store') }}" method="POST">
        @csrf
        @include('admin.achievements._form')
        <button type="submit" class="btn btn-navy px-4">Simpan</button>
        <a href="{{ route('admin.achievements.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
    </form>
</div>
@endsection
