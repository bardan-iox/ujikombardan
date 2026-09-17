<?php
require_once __DIR__ . '/config/database.php';
$baseUrl = '';
$pageTitle = 'Profil';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>

<section class="bg-ink circuit-bg py-20">
  <div class="max-w-7xl mx-auto px-6 lg:px-10 text-center">
    <span class="badge-eyebrow justify-center">Tentang Kami</span>
    <h1 class="font-display text-4xl md:text-5xl font-bold text-white mt-4">Profil SMK Negeri 4 Bogor</h1>
    <p class="text-white/60 mt-4 max-w-2xl mx-auto">Akreditasi A — Unggul, Berkarakter, dan Berdaya Saing Global.</p>
  </div>
</section>

<!-- VISI MISI -->
<section class="max-w-7xl mx-auto px-6 lg:px-10 py-24 grid lg:grid-cols-2 gap-16">
  <div class="reveal">
    <span class="badge-eyebrow">Visi Kami</span>
    <p class="font-display text-2xl font-semibold mt-4 leading-snug">
      "Menjadi lembaga pendidikan kejuruan yang unggul, menghasilkan lulusan berkarakter, inovatif, dan kompetitif di tingkat global."
    </p>
    <p class="text-text-muted mt-6">Nilai Inti: <span class="font-semibold text-[var(--text)]">Disiplin, Jujur, Kreatif, Kompeten</span></p>
  </div>
  <div class="reveal">
    <span class="badge-eyebrow">Misi Kami</span>
    <ul class="mt-4 space-y-4">
      <li class="flex gap-4"><span class="w-8 h-8 shrink-0 rounded-lg bg-ink text-cyan flex items-center justify-center text-xs font-bold">01</span><p class="text-text-muted">Menyelenggarakan pendidikan yang berbasis teknologi dan kebutuhan industri.</p></li>
      <li class="flex gap-4"><span class="w-8 h-8 shrink-0 rounded-lg bg-ink text-cyan flex items-center justify-center text-xs font-bold">02</span><p class="text-text-muted">Menumbuhkembangkan jiwa kewirausahaan dan etos kerja yang tinggi.</p></li>
      <li class="flex gap-4"><span class="w-8 h-8 shrink-0 rounded-lg bg-ink text-cyan flex items-center justify-center text-xs font-bold">03</span><p class="text-text-muted">Meningkatkan kerjasama strategis dengan dunia usaha dan industri.</p></li>
      <li class="flex gap-4"><span class="w-8 h-8 shrink-0 rounded-lg bg-ink text-cyan flex items-center justify-center text-xs font-bold">04</span><p class="text-text-muted">Mengembangkan pendidikan karakter berdasarkan kearifan lokal dan nasional.</p></li>
    </ul>
  </div>
</section>

<!-- SEJARAH -->
<section class="bg-white border-y border-line py-24">
  <div class="max-w-7xl mx-auto px-6 lg:px-10 grid lg:grid-cols-2 gap-16 items-center">
    <div class="reveal">
      <span class="badge-eyebrow">Sejak 2008</span>
      <h2 class="font-display text-3xl font-bold mt-3">Sejarah & Evolusi</h2>
      <p class="text-text-muted mt-5 leading-relaxed">
        SMK Negeri 4 Bogor didirikan dengan semangat untuk menyediakan pendidikan kejuruan yang relevan dengan kebutuhan industri di wilayah Bogor dan sekitarnya. Melalui perjalanan panjang penuh dedikasi, sekolah ini terus bertransformasi dari beberapa jurusan inti menjadi salah satu sekolah vokasi rujukan dengan fasilitas modern dan kemitraan industri yang kuat.
      </p>
      <p class="text-text-muted mt-4 leading-relaxed">
        Terwujudnya SMK Negeri 4 Bogor sebagai pusat keunggulan pendidikan vokasi yang berkarakter, inovatif, dan kompetitif secara internasional di tahun 2030.
      </p>
    </div>
    <div class="grid grid-cols-2 gap-6 reveal">
      <div class="rounded-2xl bg-[var(--paper-2)] p-8 text-center">
        <p class="font-display text-3xl font-bold text-indigo counter" data-target="1200" data-suffix="+">0</p>
        <p class="text-text-muted text-sm mt-1">Siswa Aktif</p>
      </div>
      <div class="rounded-2xl bg-[var(--paper-2)] p-8 text-center">
        <p class="font-display text-3xl font-bold text-indigo counter" data-target="85" data-suffix="+">0</p>
        <p class="text-text-muted text-sm mt-1">Tenaga Pendidik</p>
      </div>
      <div class="rounded-2xl bg-[var(--paper-2)] p-8 text-center">
        <p class="font-display text-3xl font-bold text-indigo counter" data-target="50" data-suffix="+">0</p>
        <p class="text-text-muted text-sm mt-1">Mitra Industri</p>
      </div>
      <div class="rounded-2xl bg-[var(--paper-2)] p-8 text-center">
        <p class="font-display text-3xl font-bold text-indigo counter" data-target="95" data-suffix="%">0</p>
        <p class="text-text-muted text-sm mt-1">Keterserapan Lulusan</p>
      </div>
    </div>
  </div>
</section>

<!-- FASILITAS -->
<section class="max-w-7xl mx-auto px-6 lg:px-10 py-24">
  <div class="mb-14 reveal">
    <span class="badge-eyebrow">Fasilitas Modern</span>
    <h2 class="font-display text-3xl font-bold mt-3">Mendukung Standar Industri Terkini</h2>
  </div>
  <div class="grid md:grid-cols-3 gap-6">
    <div class="card-jurusan reveal">
      <h3 class="font-display font-semibold text-lg mb-2">Lab Robotika</h3>
      <p class="text-text-muted text-sm">Fasilitas praktek hardware dan software IoT tercanggih.</p>
    </div>
    <div class="card-jurusan reveal">
      <h3 class="font-display font-semibold text-lg mb-2">Workshop Otomotif</h3>
      <p class="text-text-muted text-sm">Peralatan diagnosa kendaraan modern standar internasional.</p>
    </div>
    <div class="card-jurusan reveal">
      <h3 class="font-display font-semibold text-lg mb-2">Perpustakaan & Digital Lab</h3>
      <p class="text-text-muted text-sm">Ruang belajar nyaman dengan koleksi digital lengkap dan internet cepat.</p>
    </div>
  </div>
</section>

<!-- STRUKTUR ORGANISASI -->
<section class="bg-ink-2 py-24">
  <div class="max-w-7xl mx-auto px-6 lg:px-10 text-center reveal">
    <span class="badge-eyebrow justify-center">Struktur Organisasi</span>
    <h2 class="font-display text-3xl font-bold text-white mt-3">Kepemimpinan yang Visioner & Terstruktur</h2>
    <a href="#" class="btn-outline mt-8">Unduh Bagan (PDF)</a>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
