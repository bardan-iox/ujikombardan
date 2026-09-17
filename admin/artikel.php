<?php
$pageTitle = 'Artikel';
include __DIR__ . '/../includes/admin_layout_top.php';

$edit = null;

if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM artikel WHERE id = ?");
    $stmt->execute([(int) $_GET['delete']]);
    header("Location: artikel.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = trim($_POST['judul']);
    $kategori = trim($_POST['kategori']);
    $ringkasan = trim($_POST['ringkasan']);
    $isi = trim($_POST['isi']);
    $id = $_POST['id'] ?? '';

    $gambarNama = null;
    if (!empty($_FILES['gambar']['name'])) {
        $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
        $gambarNama = 'artikel_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['gambar']['tmp_name'], __DIR__ . '/../uploads/' . $gambarNama);
    }

    if ($id) {
        if ($gambarNama) {
            $stmt = $pdo->prepare("UPDATE artikel SET judul=?, kategori=?, ringkasan=?, isi=?, gambar=? WHERE id=?");
            $stmt->execute([$judul, $kategori, $ringkasan, $isi, $gambarNama, $id]);
        } else {
            $stmt = $pdo->prepare("UPDATE artikel SET judul=?, kategori=?, ringkasan=?, isi=? WHERE id=?");
            $stmt->execute([$judul, $kategori, $ringkasan, $isi, $id]);
        }
    } else {
        $stmt = $pdo->prepare("INSERT INTO artikel (judul, kategori, ringkasan, isi, gambar, penulis) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$judul, $kategori, $ringkasan, $isi, $gambarNama, $_SESSION['admin_nama']]);
    }
    header("Location: artikel.php");
    exit;
}

if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare("SELECT * FROM artikel WHERE id = ?");
    $stmt->execute([(int) $_GET['edit']]);
    $edit = $stmt->fetch();
}

$data = $pdo->query("SELECT * FROM artikel ORDER BY created_at DESC")->fetchAll();
?>

<h1 class="font-display text-2xl font-bold mb-8">Kelola Artikel / Berita</h1>

<div class="grid lg:grid-cols-5 gap-8">
  <div class="lg:col-span-2 bg-white border border-line rounded-2xl p-6 h-fit">
    <h2 class="font-semibold mb-5"><?= $edit ? 'Edit Artikel' : 'Tambah Artikel Baru' ?></h2>
    <form method="POST" enctype="multipart/form-data" class="space-y-4">
      <input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">
      <div>
        <label class="block text-sm font-medium mb-2">Judul</label>
        <input type="text" name="judul" required class="w-full border border-line rounded-xl px-4 py-2.5 focus-ring focus:outline-none" value="<?= htmlspecialchars($edit['judul'] ?? '') ?>">
      </div>
      <div>
        <label class="block text-sm font-medium mb-2">Kategori</label>
        <input type="text" name="kategori" required class="w-full border border-line rounded-xl px-4 py-2.5 focus-ring focus:outline-none" value="<?= htmlspecialchars($edit['kategori'] ?? '') ?>" placeholder="Prestasi / Kemitraan">
      </div>
      <div>
        <label class="block text-sm font-medium mb-2">Ringkasan</label>
        <textarea name="ringkasan" required rows="2" class="w-full border border-line rounded-xl px-4 py-2.5 focus-ring focus:outline-none"><?= htmlspecialchars($edit['ringkasan'] ?? '') ?></textarea>
      </div>
      <div>
        <label class="block text-sm font-medium mb-2">Isi Lengkap</label>
        <textarea name="isi" required rows="5" class="w-full border border-line rounded-xl px-4 py-2.5 focus-ring focus:outline-none"><?= htmlspecialchars($edit['isi'] ?? '') ?></textarea>
      </div>
      <div>
        <label class="block text-sm font-medium mb-2">Gambar</label>
        <input type="file" name="gambar" accept="image/*" class="w-full border border-line rounded-xl px-4 py-2.5">
      </div>
      <div class="flex gap-3">
        <button type="submit" class="btn-primary"><?= $edit ? 'Simpan Perubahan' : 'Tambah' ?></button>
        <?php if ($edit): ?><a href="artikel.php" class="btn-outline !text-[var(--text)] !border-line">Batal</a><?php endif; ?>
      </div>
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
          <td class="px-5 py-3">
            <a href="?edit=<?= $d['id'] ?>" class="text-indigo font-medium">Edit</a>
            <a href="?delete=<?= $d['id'] ?>" onclick="return confirm('Hapus artikel ini?')" class="text-red-500 font-medium ml-4">Hapus</a>
          </td>
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
