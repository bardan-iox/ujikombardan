<nav class="bg-ink sticky top-0 z-50 border-b border-white/10">
  <div class="max-w-7xl mx-auto px-6 lg:px-10 flex items-center justify-between h-20">
    <a href="<?= $baseUrl ?? '' ?>index.php" class="flex items-center gap-3">
      <span class="w-10 h-10 rounded-xl bg-cyan flex items-center justify-center font-display font-bold text-ink">S4</span>
      <span class="text-white font-display font-semibold leading-tight">
        SMKN 4 Bogor<br><span class="text-xs font-normal text-white/50 font-body">Sekolah Menengah Kejuruan Negeri</span>
      </span>
    </a>

    <div class="hidden md:flex items-center gap-8 text-sm font-medium text-white/80">
      <a data-nav="index.php" href="<?= $baseUrl ?? '' ?>index.php" class="hover:text-cyan transition">Home</a>
      <a data-nav="profil.php" href="<?= $baseUrl ?? '' ?>profil.php" class="hover:text-cyan transition">Profil</a>
      <a data-nav="jurusan.php" href="<?= $baseUrl ?? '' ?>jurusan.php" class="hover:text-cyan transition">Jurusan</a>
      <a data-nav="artikel.php" href="<?= $baseUrl ?? '' ?>artikel.php" class="hover:text-cyan transition">Berita</a>
      <a data-nav="galeri.php" href="<?= $baseUrl ?? '' ?>galeri.php" class="hover:text-cyan transition">Galeri</a>
      <a data-nav="kontak.php" href="<?= $baseUrl ?? '' ?>kontak.php" class="hover:text-cyan transition">Kontak</a>
    </div>

    <div class="hidden md:block">
      <a href="<?= $baseUrl ?? '' ?>admin/login.php" class="btn-outline text-sm !py-2 !px-4">Login</a>
    </div>

    <button id="menuBtn" class="md:hidden text-white p-2" aria-label="Buka menu">
      <svg width="26" height="26" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 7h20M3 13h20M3 19h20"/></svg>
    </button>
  </div>

  <div id="mobileMenu" class="hidden md:hidden bg-ink-2 border-t border-white/10 px-6 py-4 space-y-3 text-white/85 text-sm font-medium">
    <a href="<?= $baseUrl ?? '' ?>index.php" class="block hover:text-cyan">Home</a>
    <a href="<?= $baseUrl ?? '' ?>profil.php" class="block hover:text-cyan">Profil</a>
    <a href="<?= $baseUrl ?? '' ?>jurusan.php" class="block hover:text-cyan">Jurusan</a>
    <a href="<?= $baseUrl ?? '' ?>artikel.php" class="block hover:text-cyan">Berita</a>
    <a href="<?= $baseUrl ?? '' ?>galeri.php" class="block hover:text-cyan">Galeri</a>
    <a href="<?= $baseUrl ?? '' ?>kontak.php" class="block hover:text-cyan">Kontak</a>
    <a href="<?= $baseUrl ?? '' ?>admin/login.php" class="block text-cyan">Login Admin</a>
  </div>
</nav>
