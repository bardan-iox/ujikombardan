<?php
require_once __DIR__ . '/config/database.php';
$baseUrl = '';
$pageTitle = 'Berita';
$artikel = $pdo->query("SELECT * FROM artikel ORDER BY created_at DESC")->fetchAll();
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>

<section class="bg-ink circuit-bg py-20">
  <div class="max-w-7xl mx-auto px-6 lg:px-10 text-center">
    <span class="badge-eyebrow justify-center">Berita & Kegiatan</span>
    <h1 class="font-display text-4xl md:text-5xl font-bold text-white mt-4">Prestasi & Kemitraan</h1>
  </div>
</section>

<section class="max-w-7xl mx-auto px-6 lg:px-10 py-24">
  <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
    <?php foreach ($artikel as $a): ?>
    <a href="artikel-detail.php?id=<?= $a['id'] ?>" class="reveal block rounded-3xl border border-line overflow-hidden hover:shadow-xl transition group">
      <div class="aspect-[16/9] bg-[var(--paper-2)] flex items-center justify-center text-text-muted text-sm">Foto Kegiatan</div>
      <div class="p-7">
        <span class="text-xs font-semibold uppercase tracking-wide text-amber"><?= htmlspecialchars($a['kategori']) ?></span>
        <h3 class="font-display text-lg font-semibold mt-2 group-hover:text-cyan transition"><?= htmlspecialchars($a['judul']) ?></h3>
        <p class="text-text-muted text-sm mt-3 leading-relaxed"><?= htmlspecialchars($a['ringkasan']) ?></p>
        <p class="text-xs text-text-muted mt-4"><?= date('d M Y', strtotime($a['created_at'])) ?> · <?= htmlspecialchars($a['penulis']) ?></p>
      </div>
    </a>
    <?php endforeach; ?>
  </div>

  <?php if (empty($artikel)): ?>
    <p class="text-text-muted text-center py-20">Belum ada berita.</p>
  <?php endif; ?>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
