@extends('layouts.app')
@section('title', $article->title)

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <a href="{{ route('artikel.index') }}" class="text-decoration-none small"><i class="bi bi-arrow-left"></i> Kembali ke Berita</a>
        <h1 class="section-title mt-2">{{ $article->title }}</h1>
        <p class="text-muted small">
            {{ optional($article->published_at)->translatedFormat('d F Y') }}
            @if($article->admin) &middot; oleh {{ $article->admin->name }} @endif
        </p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if($article->cover_image)
                    <img src="{{ asset('storage/' . $article->cover_image) }}" class="img-fluid rounded-4 mb-4" alt="{{ $article->title }}">
                @endif
                <div class="fs-6">
                    {!! nl2br(e($article->content)) !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
