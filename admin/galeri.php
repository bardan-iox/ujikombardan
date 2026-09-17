<?php
$pageTitle = 'Galeri';
include __DIR__ . '/../includes/admin_layout_top.php';

if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM galeri WHERE id = ?");
    $stmt->execute([(int) $_GET['delete']]);
    header("Location: galeri.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = trim($_POST['judul']);
    $kategori = trim($_POST['kategori']);
    $gambarNama = 'placeholder.jpg';

    if (!empty($_FILES['gambar']['name'])) {
        $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
        $gambarNama = 'galeri_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['gambar']['tmp_name'], __DIR__ . '/../uploads/' . $gambarNama);
    }

    $stmt = $pdo->prepare("INSERT INTO galeri (judul, kategori, gambar) VALUES (?, ?, ?)");
    $stmt->execute([$judul, $kategori, $gambarNama]);
    header("Location: galeri.php");
    exit;
}

$data = $pdo->query("SELECT * FROM galeri ORDER BY created_at DESC")->fetchAll();
?>

<h1 class="font-display text-2xl font-bold mb-8">Kelola Galeri</h1>

<div class="grid lg:grid-cols-5 gap-8">
  <div class="lg:col-span-2 bg-white border border-line rounded-2xl p-6 h-fit">
    <h2 class="font-semibold mb-5">Tambah Foto Baru</h2>
    <form method="POST" enctype="multipart/form-data" class="space-y-4">
      <div>
        <label class="block text-sm font-medium mb-2">Judul Foto</label>
        <input type="text" name="judul" required class="w-full border border-line rounded-xl px-4 py-2.5 focus-ring focus:outline-none">
      </div>
      <div>
        <label class="block text-sm font-medium mb-2">Kategori</label>
        <input type="text" name="kategori" required class="w-full border border-line rounded-xl px-4 py-2.5 focus-ring focus:outline-none" placeholder="Fasilitas / Kegiatan">
      </div>
      <div>
        <label class="block text-sm font-medium mb-2">Gambar</label>
        <input type="file" name="gambar" accept="image/*" required class="w-full border border-line rounded-xl px-4 py-2.5">
      </div>
      <button type="submit" class="btn-primary">Tambah Foto</button>
    </form>
  </div>

  <div class="lg:col-span-3 bg-white border border-line rounded-2xl overflow-hidden">
    <table class="admin-table w-full text-sm">
      <thead><tr><th class="text-left px-5 py-3">Judul</th><th class="text-left px-5 py-3">Kategori</th><th class="text-left px-5 py-3">Aksi</th></tr></thead>
      <tbody>
        <?php foreach ($data as $d): ?>
        <tr class="border-t border-line">
          <td class="px-5 py-3 font-semibold"><?= htmlspecialchars($d['judul']) ?></td>
          <td class="px-5 py-3 text-text-muted"><?= htmlspecialchars($d['kategori']) ?></td>
          <td class="px-5 py-3"><a href="?delete=<?= $d['id'] ?>" onclick="return confirm('Hapus foto ini?')" class="text-red-500 font-medium">Hapus</a></td>
        </tr>
        <?php endforeach; ?>
        <?php if (empty($data)): ?>
        <tr><td colspan="3" class="px-5 py-8 text-center text-text-muted">Belum ada data.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?php include __DIR__ . '/../includes/admin_layout_bottom.php'; ?>
