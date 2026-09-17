<?php
require_once __DIR__ . '/config/database.php';
$baseUrl = '';
$pageTitle = 'Galeri';
$galeri = $pdo->query("SELECT * FROM galeri ORDER BY created_at DESC")->fetchAll();
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>

<section class="bg-ink circuit-bg py-20">
  <div class="max-w-7xl mx-auto px-6 lg:px-10 text-center">
    <span class="badge-eyebrow justify-center">Gallery</span>
    <h1 class="font-display text-4xl md:text-5xl font-bold text-white mt-4">Momen di SMKN 4 Bogor</h1>
  </div>
</section>

<section class="max-w-7xl mx-auto px-6 lg:px-10 py-24">
  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($galeri as $g): ?>
    <div class="reveal rounded-2xl overflow-hidden border border-line group">
      <div class="aspect-[4/3] bg-[var(--paper-2)] flex items-center justify-center text-text-muted text-sm">Foto: <?= htmlspecialchars($g['judul']) ?></div>
      <div class="p-5">
        <span class="text-xs font-semibold uppercase tracking-wide text-amber"><?= htmlspecialchars($g['kategori']) ?></span>
        <h3 class="font-display font-semibold mt-1"><?= htmlspecialchars($g['judul']) ?></h3>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

  <?php if (empty($galeri)): ?>
    <p class="text-text-muted text-center py-20">Belum ada foto galeri.</p>
  <?php endif; ?>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
