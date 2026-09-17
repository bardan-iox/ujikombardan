@extends('layouts.admin')
@section('title', 'Edit Artikel')

@section('content')
<div class="card border-0 shadow-sm p-4" style="max-width:700px;">
    <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('admin.articles._form')
        <button type="submit" class="btn btn-navy px-4">Perbarui</button>
        <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
    </form>
</div>
@endsection
