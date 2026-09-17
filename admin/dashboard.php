<?php
$pageTitle = 'Dashboard';
include __DIR__ . '/../includes/admin_layout_top.php';

$totalProduk = $pdo->query("SELECT COUNT(*) FROM produk")->fetchColumn();
$totalArtikel = $pdo->query("SELECT COUNT(*) FROM artikel")->fetchColumn();
$totalGaleri = $pdo->query("SELECT COUNT(*) FROM galeri")->fetchColumn();
$totalPesan = $pdo->query("SELECT COUNT(*) FROM pesan_kontak")->fetchColumn();
?>

<h1 class="font-display text-2xl font-bold mb-1">Dashboard</h1>
<p class="text-text-muted mb-8">Selamat datang kembali, <?= htmlspecialchars($_SESSION['admin_nama']) ?>.</p>

<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
  <div class="bg-white border border-line rounded-2xl p-6">
    <p class="text-text-muted text-sm">Jurusan</p>
    <p class="font-display text-3xl font-bold mt-2"><?= $totalProduk ?></p>
    <a href="produk.php" class="text-cyan text-sm font-medium mt-3 inline-block">Kelola →</a>
  </div>
  <div class="bg-white border border-line rounded-2xl p-6">
    <p class="text-text-muted text-sm">Artikel</p>
    <p class="font-display text-3xl font-bold mt-2"><?= $totalArtikel ?></p>
    <a href="artikel.php" class="text-cyan text-sm font-medium mt-3 inline-block">Kelola →</a>
  </div>
  <div class="bg-white border border-line rounded-2xl p-6">
    <p class="text-text-muted text-sm">Foto Galeri</p>
    <p class="font-display text-3xl font-bold mt-2"><?= $totalGaleri ?></p>
    <a href="galeri.php" class="text-cyan text-sm font-medium mt-3 inline-block">Kelola →</a>
  </div>
  <div class="bg-white border border-line rounded-2xl p-6">
    <p class="text-text-muted text-sm">Pesan Masuk</p>
    <p class="font-display text-3xl font-bold mt-2"><?= $totalPesan ?></p>
    <a href="pesan.php" class="text-cyan text-sm font-medium mt-3 inline-block">Lihat →</a>
  </div>
</div>

<div class="mt-10 bg-white border border-line rounded-2xl p-6">
  <p class="font-semibold mb-2">Panduan cepat</p>
  <p class="text-text-muted text-sm">Gunakan menu di samping untuk menambah, mengubah, atau menghapus data Jurusan, Artikel, dan Galeri. Perubahan akan langsung tampil di halaman utama website.</p>
</div>

<?php include __DIR__ . '/../includes/admin_layout_bottom.php'; ?>
