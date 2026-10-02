@extends('layouts.app')
@section('title', 'Profil Sekolah')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <h1 class="section-title mb-3">Profil Sekolah</h1>
        <p class="text-muted" style="max-width:700px;">SMK Negeri 4 Bogor adalah sekolah menengah kejuruan negeri yang berlokasi di Jalan Raya Tajur, Kelurahan Muarasari, Kecamatan Bogor Selatan, Kota Bogor, dan berdiri sejak tahun 2009.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-5 align-items-center mb-5">
            <div class="col-md-6">
                <h3 class="fw-bold mb-3">Sejarah Singkat</h3>
                <p class="text-muted">
                  SMK Negeri 4 Bogor merupakan salah satu sekolah kejuruan negeri yang terletak di kawasan Kelurahan Muarasari (Kp. Buntar), Kecamatan Bogor Selatan, Kota Bogor. Sekolah ini hadir sebagai bagian dari upaya pemerintah untuk memperluas akses dan meningkatkan mutu pendidikan kejuruan di Kota Bogor.</br>

                </br>Sejak awal berdiri, SMKN 4 Bogor telah berfokus pada pengembangan pendidikan vokasi melalui penerapan Kelas Industri serta kerja sama yang erat dengan berbagai perusahaan berskala nasional maupun internasional. Hal ini bertujuan agar para lulusannya memiliki kompetensi teknis yang kuat, berkarakter, siap kerja, serta mampu beradaptasi dengan perkembangan dunia industri modern saat ini.
                </p>
                <p class="text-muted">
                    Kolaborasi strategis dengan berbagai mitra industri memastikan lulusan kami siap menjadi
                    pemain utama di era ekonomi digital.
                </p>
            </div>
                <div class="col-md-6">
                    <img src="{{ asset('images/sekolah.JPG') }}" alt="Foto Sekolah" class="img-fluid rounded-4 w-100" style="aspect-ratio:4/3; object-fit:cover;">
                </div>
        </div>

        <div class="row g-4 align-items-center"> <!-- Ditambahkan align-items-center di sini -->
    <div class="col-md-6">
        <div class="card border-0 shadow-sm p-4 d-flex flex-column justify-content-center" style="background:#0b2545; color:#fff; min-height: 200px;">
            {{-- <i class="bi bi-eye fs-2 text-warning mb-2"></i> --}}
            <h5 class="fw-bold">Visi Sekolah</h5>
            <p class="mb-0 small">Terwujudnya Sekolah Kita sebagai pusat keunggulan pendidikan yang BERIMAN, BERKARAKTER, MANDIRI DAN KOMPETEN.</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row g-3">
            <div class="col-6">
                <div class="card border-0 shadow-sm h-100 p-3">
                    <h6 class="fw-bold">01. Peningkatan Keimanan dan Ketakwaan</h6>
                    <p class="small text-muted mb-0">Meningkatkan keimanan dan ketakwaan kepada Tuhan Yang Maha Esa melalui kegiatan keagamaan dan pembiasaan positif sehari-hari di lingkungan sekolah.</p>
                </div>
            </div>
            <div class="col-6">
                <div class="card border-0 shadow-sm h-100 p-3">
                    <h6 class="fw-bold">02. Pembentukan Karakter</h6>
                    <p class="small text-muted mb-0">Membentuk karakter peserta didik yang berakhlak mulia, disiplin, bertanggung jawab, serta memiliki jiwa nasionalisme yang kuat.</p>
                </div>
            </div>
            <div class="col-6">
                <div class="card border-0 shadow-sm h-100 p-3">
                    <h6 class="fw-bold">03. Pengembangan Kemandirian</h6>
                    <p class="small text-muted mb-0">Mengembangkan kemandirian peserta didik melalui penguasaan keterampilan hidup dan jiwa kewirausahaan.</p>
                </div>
            </div>
            <div class="col-6">
                <div class="card border-0 shadow-sm h-100 p-3">
                    <h6 class="fw-bold">04. Penyelenggaraan Kompetensi</h6>
                    <p class="small text-muted mb-0">Menyelenggarakan pendidikan dan pelatihan kejuruan yang berkualitas sesuai dengan standar kompetensi kerja nasional maupun internasional serta kebutuhan dunia usaha dan dunia industri (DUDIKA).</p>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>     
</section>
@endsection
