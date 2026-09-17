@extends('layouts.admin')
@section('title', 'Edit Program')

@section('content')
<div class="card border-0 shadow-sm p-4" style="max-width:700px;">
    <form action="{{ route('admin.programs.update', $program) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('admin.programs._form')
        <button type="submit" class="btn btn-navy px-4">Perbarui</button>
        <a href="{{ route('admin.programs.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
    </form>
</div>
@endsection
