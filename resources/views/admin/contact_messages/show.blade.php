@extends('layouts.admin')
@section('title', 'Detail Pesan')

@section('content')
<div class="card border-0 shadow-sm p-4" style="max-width:700px;">
    <p class="text-muted small mb-1">Dari</p>
    <h5 class="fw-bold">{{ $contactMessage->name }} &lt;{{ $contactMessage->email }}&gt;</h5>
    <p class="text-muted small">{{ $contactMessage->phone }}</p>
    <hr>
    <p class="text-muted small mb-1">Subjek</p>
    <p class="fw-semibold">{{ $contactMessage->subject ?? '-' }}</p>
    <p class="text-muted small mb-1">Pesan</p>
    <p>{{ $contactMessage->message }}</p>
    <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-secondary mt-2">Kembali</a>
</div>
@endsection
