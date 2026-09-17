<?php
require_once __DIR__ . '/config/database.php';
$baseUrl = '';
$pageTitle = 'Kontak';

$sukses = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subjek = trim($_POST['subjek'] ?? '');
    $pesan = trim($_POST['pesan'] ?? '');

    if ($nama && $email && $subjek && $pesan) {
        $stmt = $pdo->prepare("INSERT INTO pesan_kontak (nama, email, subjek, pesan) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nama, $email, $subjek, $pesan]);
        $sukses = true;
    } else {
        $error = 'Mohon lengkapi semua kolom.';
    }
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>

<section class="bg-ink circuit-bg py-20">
  <div class="max-w-7xl mx-auto px-6 lg:px-10 text-center">
    <span class="badge-eyebrow justify-center">Kontak Kami</span>
    <h1 class="font-display text-4xl md:text-5xl font-bold text-white mt-4">Kami Siap Membantu</h1>
  </div>
</section>

<section class="max-w-7xl mx-auto px-6 lg:px-10 py-24 grid lg:grid-cols-5 gap-16">
  <div class="lg:col-span-2 reveal">
    <h2 class="font-display text-2xl font-bold mb-6">Lokasi & Kontak</h2>
    <ul class="space-y-5 text-text-muted">
      <li><span class="font-semibold text-[var(--text)] block">Alamat</span>Jl. Raya Tajur, Kp. Buntar RT.02/RW.08, Muarasari, Kec. Bogor Sel., Kota Bogor, Jawa Barat 16137</li>
      <li><span class="font-semibold text-[var(--text)] block">Telepon</span>(0251) 8242411</li>
      <li><span class="font-semibold text-[var(--text)] block">Email</span>info@smkn4bogor.sch.id</li>
    </ul>
    <div class="mt-8 aspect-video rounded-2xl bg-[var(--paper-2)] flex items-center justify-center text-text-muted text-sm">Peta Lokasi</div>
  </div>

  <div class="lg:col-span-3 reveal">
    <?php if ($sukses): ?>
      <div class="rounded-2xl bg-cyan/10 border border-cyan text-[var(--text)] p-6 mb-6">
        Pesan kamu berhasil terkirim. Terima kasih, kami akan segera menghubungi kamu kembali.
      </div>
    <?php endif; ?>
    <?php if ($error): ?>
      <div class="rounded-2xl bg-red-50 border border-red-300 text-red-700 p-6 mb-6"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" class="space-y-5">
      <div class="grid sm:grid-cols-2 gap-5">
        <div>
          <label class="block text-sm font-medium mb-2">Nama Lengkap</label>
          <input type="text" name="nama" required class="w-full border border-line rounded-xl px-4 py-3 focus-ring focus:outline-none">
        </div>
        <div>
          <label class="block text-sm font-medium mb-2">Email</label>
          <input type="email" name="email" required class="w-full border border-line rounded-xl px-4 py-3 focus-ring focus:outline-none">
        </div>
      </div>
      <div>
        <label class="block text-sm font-medium mb-2">Subjek</label>
        <input type="text" name="subjek" required class="w-full border border-line rounded-xl px-4 py-3 focus-ring focus:outline-none">
      </div>
      <div>
        <label class="block text-sm font-medium mb-2">Pesan</label>
        <textarea name="pesan" rows="5" required class="w-full border border-line rounded-xl px-4 py-3 focus-ring focus:outline-none"></textarea>
      </div>
      <button type="submit" class="btn-primary">Kirim Pesan →</button>
    </form>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
