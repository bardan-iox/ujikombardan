<?php
session_start();
require_once __DIR__ . '/../config/database.php';

if (isset($_SESSION['admin_id'])) {
    header("Location: dashboard.php");
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_nama'] = $admin['nama_lengkap'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = 'Username atau password salah.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Admin — SMKN 4 Bogor</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-ink circuit-bg min-h-screen flex items-center justify-center px-6">
  <div class="w-full max-w-sm bg-white rounded-3xl p-10 shadow-xl">
    <div class="w-11 h-11 rounded-xl bg-ink text-cyan flex items-center justify-center font-display font-bold mb-6">S4</div>
    <h1 class="font-display text-2xl font-bold">Login Admin</h1>
    <p class="text-text-muted text-sm mt-1 mb-8">Kelola konten website SMKN 4 Bogor.</p>

    <?php if ($error): ?>
      <div class="rounded-xl bg-red-50 border border-red-300 text-red-700 text-sm p-4 mb-5"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" class="space-y-4">
      <div>
        <label class="block text-sm font-medium mb-2">Username</label>
        <input type="text" name="username" required class="w-full border border-line rounded-xl px-4 py-3 focus-ring focus:outline-none" value="admin">
      </div>
      <div>
        <label class="block text-sm font-medium mb-2">Password</label>
        <input type="password" name="password" required class="w-full border border-line rounded-xl px-4 py-3 focus-ring focus:outline-none">
      </div>
      <button type="submit" class="btn-primary w-full justify-center">Masuk →</button>
    </form>
    <p class="text-xs text-text-muted mt-6 text-center">Default: admin / admin123</p>
    <a href="../index.php" class="block text-center text-xs text-indigo mt-4 hover:underline">← Kembali ke Website</a>
  </div>
</body>
</html>
