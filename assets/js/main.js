// Toggle menu mobile
document.addEventListener('DOMContentLoaded', function () {
  const btn = document.getElementById('menuBtn');
  const menu = document.getElementById('mobileMenu');
  if (btn && menu) {
    btn.addEventListener('click', () => menu.classList.toggle('hidden'));
  }

  // Reveal on scroll
  const reveals = document.querySelectorAll('.reveal');
  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('in');
        io.unobserve(e.target);
      }
    });
  }, { threshold: 0.15 });
  reveals.forEach(el => io.observe(el));

  // Counter animasi untuk angka statistik
  const counters = document.querySelectorAll('.counter');
  const cio = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      const el = entry.target;
      const target = parseInt(el.dataset.target, 10);
      const suffix = el.dataset.suffix || '';
      let current = 0;
      const step = Math.max(1, Math.ceil(target / 60));
      const timer = setInterval(() => {
        current += step;
        if (current >= target) { current = target; clearInterval(timer); }
        el.textContent = current + suffix;
      }, 20);
      cio.unobserve(el);
    });
  }, { threshold: 0.4 });
  counters.forEach(el => cio.observe(el));

  // Highlight nav aktif berdasarkan halaman
  const path = window.location.pathname.split('/').pop() || 'index.php';
  document.querySelectorAll('[data-nav]').forEach(a => {
    if (a.getAttribute('data-nav') === path) a.classList.add('active');
  });
});
