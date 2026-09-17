<footer class="bg-ink text-white/70 mt-24">
  <div class="max-w-7xl mx-auto px-6 lg:px-10 py-16 grid md:grid-cols-4 gap-10 text-sm">
    <div>
      <div class="flex items-center gap-3 mb-4">
        <span class="w-9 h-9 rounded-lg bg-cyan flex items-center justify-center font-display font-bold text-ink text-sm">S4</span>
        <span class="text-white font-display font-semibold">SMKN 4 Bogor</span>
      </div>
      <p>Sekolah kejuruan unggulan yang berdedikasi menciptakan lulusan siap kerja dengan kompetensi global.</p>
    </div>
    <div>
      <h4 class="text-white font-semibold mb-4">Tautan Penting</h4>
      <ul class="space-y-2">
        <li><a href="<?= $baseUrl ?? '' ?>profil.php" class="hover:text-cyan">Profil Sekolah</a></li>
        <li><a href="<?= $baseUrl ?? '' ?>jurusan.php" class="hover:text-cyan">Program Keahlian</a></li>
        <li><a href="<?= $baseUrl ?? '' ?>galeri.php" class="hover:text-cyan">Galeri</a></li>
        <li><a href="#" class="hover:text-cyan">Kebijakan Privasi</a></li>
      </ul>
    </div>
    <div>
      <h4 class="text-white font-semibold mb-4">Kontak</h4>
      <ul class="space-y-2">
        <li>Jl. Raya Tajur, Kp. Buntar RT.02/RW.08, Muarasari, Kec. Bogor Sel., Kota Bogor, Jawa Barat 16137</li>
        <li>(0251) 8242411</li>
        <li>info@smkn4bogor.sch.id</li>
      </ul>
    </div>
    <div>
      <h4 class="text-white font-semibold mb-4">Ikuti Kami</h4>
      <div class="flex gap-3">
        <a href="#" class="w-9 h-9 rounded-full border border-white/20 flex items-center justify-center hover:border-cyan hover:text-cyan">IG</a>
        <a href="#" class="w-9 h-9 rounded-full border border-white/20 flex items-center justify-center hover:border-cyan hover:text-cyan">FB</a>
        <a href="#" class="w-9 h-9 rounded-full border border-white/20 flex items-center justify-center hover:border-cyan hover:text-cyan">YT</a>
      </div>
    </div>
  </div>
  <div class="border-t border-white/10 text-center text-xs py-6">
    © <?= date('Y') ?> SMK Negeri 4 Bogor. All Rights Reserved.
  </div>
</footer>
<script src="<?= $baseUrl ?? '' ?>assets/js/main.js"></script>
</body>
</html>
