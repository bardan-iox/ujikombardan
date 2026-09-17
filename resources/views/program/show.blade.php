@extends('layouts.app')
@section('title', $program->name)

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <a href="{{ route('program.index') }}" class="text-decoration-none small"><i class="bi bi-arrow-left"></i> Kembali ke Program</a>
        <h1 class="section-title mt-2">{{ $program->name }}</h1>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                @if($program->image)
                    <img src="{{ asset('storage/' . $program->image) }}" class="img-fluid rounded-4 mb-4" alt="{{ $program->name }}">
                @endif
                <p class="fs-5 text-muted">{{ $program->short_description }}</p>
                <div class="mt-3">
                    {!! nl2br(e($program->description)) !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm p-4">
                    <h6 class="fw-bold mb-2">Tertarik dengan program ini?</h6>
                    <p class="small text-muted">Hubungi kami untuk info pendaftaran lebih lanjut.</p>
                    <a href="{{ route('kontak.index') }}" class="btn btn-navy w-100">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
