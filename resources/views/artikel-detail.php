<?php
require_once __DIR__ . '/config/database.php';
$baseUrl = '';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$stmt = $pdo->prepare("SELECT * FROM artikel WHERE id = ?");
$stmt->execute([$id]);
$a = $stmt->fetch();

if (!$a) {
    header("Location: artikel.php");
    exit;
}

$pageTitle = $a['judul'];
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>

<article class="max-w-3xl mx-auto px-6 lg:px-10 py-20">
  <a href="artikel.php" class="text-sm text-indigo hover:text-cyan font-medium">← Kembali ke Berita</a>
  <span class="badge-eyebrow mt-8"><?= htmlspecialchars($a['kategori']) ?></span>
  <h1 class="font-display text-3xl md:text-4xl font-bold mt-4 leading-tight"><?= htmlspecialchars($a['judul']) ?></h1>
  <p class="text-text-muted text-sm mt-4"><?= date('d M Y', strtotime($a['created_at'])) ?> · Oleh <?= htmlspecialchars($a['penulis']) ?></p>

  <div class="aspect-[16/9] rounded-3xl bg-[var(--paper-2)] flex items-center justify-center text-text-muted text-sm my-10">Foto Kegiatan</div>

  <div class="prose max-w-none text-[var(--text)] leading-relaxed">
    <p><?= nl2br(htmlspecialchars($a['isi'])) ?></p>
  </div>
</article>

<?php include __DIR__ . '/includes/footer.php'; ?>
