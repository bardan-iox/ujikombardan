@extends('layouts.app')
@section('title', 'Kontak')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <h1 class="section-title mb-3">Kontak Kami</h1>
        <p class="text-muted">Ada pertanyaan? Kirim pesan lewat form di bawah, tim kami akan segera merespons.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-md-5">
                <h5 class="fw-bold mb-3">Informasi Kontak</h5>
                <p class="text-muted"><i class="bi bi-geo-alt text-warning me-2"></i>Kp. Buntar, Kelurahan Muarasari, Kec. Bogor Selatan, Kota Bogor, Jawa Barat 16137</p>
                <p class="text-muted"><i class="bi bi-telephone text-warning me-2"></i>(+62) 895-3234-20403</p>
                <p class="text-muted"><i class="bi bi-envelope text-warning me-2"></i>bardansulaiman123@gmail.com</p>
                <div class="ratio ratio-4x3 rounded-4 mt-4 overflow-hidden">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7926.099679117838!2d106.8246939!3d-6.640733399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16ee07ef5%3A0x14ab253dd267de49!2sSMK%20Negeri%204%20Bogor%20(Nebrazka)!5e0!3m2!1sid!2sid!4v1789435120457!5m2!1sid!2sid"
                        style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
            <div class="col-md-7">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('kontak.store') }}" method="POST" class="card border-0 shadow-sm p-4">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">No. Telepon</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Subjek</label>
                        <input type="text" name="subject" value="{{ old('subject') }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pesan</label>
                        <textarea name="message" rows="5" class="form-control @error('message') is-invalid @enderror" required>{{ old('message') }}</textarea>
                        @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <button type="submit" class="btn btn-navy px-4">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection