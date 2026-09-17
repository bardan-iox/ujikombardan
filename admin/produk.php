<?php
$pageTitle = 'Jurusan';
include __DIR__ . '/../includes/admin_layout_top.php';

$edit = null;
$msg = '';

// DELETE
if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM produk WHERE id = ?");
    $stmt->execute([(int) $_GET['delete']]);
    header("Location: produk.php");
    exit;
}

// CREATE / UPDATE
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama_jurusan']);
    $singkatan = trim($_POST['singkatan']);
    $deskripsi = trim($_POST['deskripsi']);
    $urutan = (int) $_POST['urutan'];
    $id = $_POST['id'] ?? '';

    if ($id) {
        $stmt = $pdo->prepare("UPDATE produk SET nama_jurusan=?, singkatan=?, deskripsi=?, urutan=? WHERE id=?");
        $stmt->execute([$nama, $singkatan, $deskripsi, $urutan, $id]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO produk (nama_jurusan, singkatan, deskripsi, urutan) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nama, $singkatan, $deskripsi, $urutan]);
    }
    header("Location: produk.php");
    exit;
}

// EDIT (ambil data)
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare("SELECT * FROM produk WHERE id = ?");
    $stmt->execute([(int) $_GET['edit']]);
    $edit = $stmt->fetch();
}

$data = $pdo->query("SELECT * FROM produk ORDER BY urutan ASC")->fetchAll();
?>

<h1 class="font-display text-2xl font-bold mb-8">Kelola Jurusan</h1>

<div class="grid lg:grid-cols-5 gap-8">
  <!-- FORM -->
  <div class="lg:col-span-2 bg-white border border-line rounded-2xl p-6 h-fit">
    <h2 class="font-semibold mb-5"><?= $edit ? 'Edit Jurusan' : 'Tambah Jurusan Baru' ?></h2>
    <form method="POST" class="space-y-4">
      <input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">
      <div>
        <label class="block text-sm font-medium mb-2">Nama Jurusan</label>
        <input type="text" name="nama_jurusan" required class="w-full border border-line rounded-xl px-4 py-2.5 focus-ring focus:outline-none" value="<?= htmlspecialchars($edit['nama_jurusan'] ?? '') ?>">
      </div>
      <div>
        <label class="block text-sm font-medium mb-2">Singkatan</label>
        <input type="text" name="singkatan" required maxlength="10" class="w-full border border-line rounded-xl px-4 py-2.5 focus-ring focus:outline-none" value="<?= htmlspecialchars($edit['singkatan'] ?? '') ?>">
      </div>
      <div>
        <label class="block text-sm font-medium mb-2">Deskripsi</label>
        <textarea name="deskripsi" required rows="4" class="w-full border border-line rounded-xl px-4 py-2.5 focus-ring focus:outline-none"><?= htmlspecialchars($edit['deskripsi'] ?? '') ?></textarea>
      </div>
      <div>
        <label class="block text-sm font-medium mb-2">Urutan Tampil</label>
        <input type="number" name="urutan" class="w-full border border-line rounded-xl px-4 py-2.5 focus-ring focus:outline-none" value="<?= htmlspecialchars($edit['urutan'] ?? 0) ?>">
      </div>
      <div class="flex gap-3">
        <button type="submit" class="btn-primary"><?= $edit ? 'Simpan Perubahan' : 'Tambah' ?></button>
        <?php if ($edit): ?><a href="produk.php" class="btn-outline !text-[var(--text)] !border-line">Batal</a><?php endif; ?>
      </div>
    </form>
  </div>

  <!-- TABLE -->
  <div class="lg:col-span-3 bg-white border border-line rounded-2xl overflow-hidden">
    <table class="admin-table w-full text-sm">
      <thead><tr><th class="text-left px-5 py-3">Jurusan</th><th class="text-left px-5 py-3">Urutan</th><th class="text-left px-5 py-3">Aksi</th></tr></thead>
      <tbody>
        <?php foreach ($data as $d): ?>
        <tr class="border-t border-line">
          <td class="px-5 py-3">
            <p class="font-semibold"><?= htmlspecialchars($d['nama_jurusan']) ?></p>
            <p class="text-text-muted text-xs"><?= htmlspecialchars($d['singkatan']) ?></p>
          </td>
          <td class="px-5 py-3"><?= $d['urutan'] ?></td>
          <td class="px-5 py-3">
            <a href="?edit=<?= $d['id'] ?>" class="text-indigo font-medium">Edit</a>
            <a href="?delete=<?= $d['id'] ?>" onclick="return confirm('Hapus jurusan ini?')" class="text-red-500 font-medium ml-4">Hapus</a>
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
