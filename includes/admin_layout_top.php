<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}
require_once __DIR__ . '/../config/database.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $pageTitle ?? 'Admin' ?> — Admin SMKN 4 Bogor</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-[var(--paper)] min-h-screen">
<div class="flex min-h-screen">
  <aside class="w-64 bg-ink text-white/80 shrink-0 hidden md:flex flex-col">
    <div class="px-6 py-6 border-b border-white/10">
      <span class="text-white font-display font-semibold">SMKN 4 Bogor</span>
      <p class="text-xs text-white/40">Admin Panel</p>
    </div>
    <nav class="flex-1 px-4 py-6 space-y-1 text-sm">
      <a href="dashboard.php" class="block px-4 py-3 rounded-xl hover:bg-white/5 hover:text-cyan">Dashboard</a>
      <a href="produk.php" class="block px-4 py-3 rounded-xl hover:bg-white/5 hover:text-cyan">Jurusan (Produk)</a>
      <a href="artikel.php" class="block px-4 py-3 rounded-xl hover:bg-white/5 hover:text-cyan">Artikel / Berita</a>
      <a href="galeri.php" class="block px-4 py-3 rounded-xl hover:bg-white/5 hover:text-cyan">Galeri</a>
      <a href="pesan.php" class="block px-4 py-3 rounded-xl hover:bg-white/5 hover:text-cyan">Pesan Masuk</a>
    </nav>
    <div class="px-6 py-5 border-t border-white/10 text-sm">
      <p class="text-white mb-3"><?= htmlspecialchars($_SESSION['admin_nama']) ?></p>
      <a href="logout.php" class="text-cyan hover:underline">Logout</a>
    </div>
  </aside>

  <main class="flex-1 p-6 md:p-10">
