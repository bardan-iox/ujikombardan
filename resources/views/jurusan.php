<?php
require_once __DIR__ . '/config/database.php';
$baseUrl = '';
$pageTitle = 'Jurusan';
$jurusan = $pdo->query("SELECT * FROM produk ORDER BY urutan ASC")->fetchAll();
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>

<section class="bg-ink circuit-bg py-20">
  <div class="max-w-7xl mx-auto px-6 lg:px-10 text-center">
    <span class="badge-eyebrow justify-center">Program Keahlian</span>
    <h1 class="font-display text-4xl md:text-5xl font-bold text-white mt-4">Pilih Jalur Karirmu</h1>
    <p class="text-white/60 mt-4 max-w-2xl mx-auto">Kembangkan potensi terbaikmu bersama program keahlian yang terhubung langsung dengan kebutuhan industri.</p>
  </div>
</section>

<section class="max-w-7xl mx-auto px-6 lg:px-10 py-24">
  <div class="grid md:grid-cols-2 gap-8">
    <?php foreach ($jurusan as $j): ?>
    <div class="card-jurusan reveal">
      <div class="w-14 h-14 rounded-2xl bg-ink text-cyan flex items-center justify-center font-display font-bold text-lg mb-6"><?= htmlspecialchars($j['singkatan']) ?></div>
      <h3 class="font-display font-semibold text-2xl mb-3"><?= htmlspecialchars($j['nama_jurusan']) ?></h3>
      <p class="text-text-muted leading-relaxed"><?= htmlspecialchars($j['deskripsi']) ?></p>
    </div>
    <?php endforeach; ?>
  </div>

  <?php if (empty($jurusan)): ?>
    <p class="text-text-muted text-center py-20">Belum ada data jurusan.</p>
  <?php endif; ?>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
