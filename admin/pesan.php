<?php
$pageTitle = 'Pesan Masuk';
include __DIR__ . '/../includes/admin_layout_top.php';

if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM pesan_kontak WHERE id = ?");
    $stmt->execute([(int) $_GET['delete']]);
    header("Location: pesan.php");
    exit;
}

$data = $pdo->query("SELECT * FROM pesan_kontak ORDER BY created_at DESC")->fetchAll();
?>

<h1 class="font-display text-2xl font-bold mb-8">Pesan Masuk</h1>

<div class="bg-white border border-line rounded-2xl overflow-hidden">
  <table class="admin-table w-full text-sm">
    <thead><tr><th class="text-left px-5 py-3">Nama</th><th class="text-left px-5 py-3">Subjek</th><th class="text-left px-5 py-3">Pesan</th><th class="text-left px-5 py-3">Tanggal</th><th class="text-left px-5 py-3">Aksi</th></tr></thead>
    <tbody>
      <?php foreach ($data as $d): ?>
      <tr class="border-t border-line align-top">
        <td class="px-5 py-3">
          <p class="font-semibold"><?= htmlspecialchars($d['nama']) ?></p>
          <p class="text-text-muted text-xs"><?= htmlspecialchars($d['email']) ?></p>
        </td>
        <td class="px-5 py-3"><?= htmlspecialchars($d['subjek']) ?></td>
        <td class="px-5 py-3 max-w-sm"><?= nl2br(htmlspecialchars($d['pesan'])) ?></td>
        <td class="px-5 py-3 text-text-muted whitespace-nowrap"><?= date('d M Y H:i', strtotime($d['created_at'])) ?></td>
        <td class="px-5 py-3"><a href="?delete=<?= $d['id'] ?>" onclick="return confirm('Hapus pesan ini?')" class="text-red-500 font-medium">Hapus</a></td>
      </tr>
      <?php endforeach; ?>
      <?php if (empty($data)): ?>
      <tr><td colspan="5" class="px-5 py-8 text-center text-text-muted">Belum ada pesan masuk.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php include __DIR__ . '/../includes/admin_layout_bottom.php'; ?>
