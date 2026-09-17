# Sekolah Kita — Sistem Manajemen Sekolah (Laravel 11)

Folder ini sudah berisi seluruh kode aplikasi (migration, model, controller, view).
Yang **belum** ada: folder `vendor/` (dependency Composer), karena harus di-download
di laptop kamu sendiri (butuh koneksi ke Packagist).

## Cara Menjalankan

1. **Extract** zip ini ke `C:\xampp\htdocs\sekolah-app` (atau folder lain di htdocs).

2. **Install dependency PHP** (buka terminal di folder project):
   ```bash
   composer install
   ```

3. **Copy file environment:**
   ```bash
   copy .env.example .env
   ```
   (Mac/Linux pakai `cp .env.example .env`)

4. **Generate application key:**
   ```bash
   php artisan key:generate
   ```

5. **Buat database** di phpMyAdmin (`http://localhost/phpmyadmin`) dengan nama:
   ```
   sekolah_app
   ```
   `.env` sudah otomatis diarahkan ke database ini (user `root`, password kosong — default XAMPP).

6. **Jalankan migration + seeder** (seeder akan membuat 1 akun admin default):
   ```bash
   php artisan migrate --seed
   ```

7. **Buat symbolic link storage** (supaya gambar upload bisa tampil):
   ```bash
   php artisan storage:link
   ```

8. **Jalankan server:**
   ```bash
   php artisan serve
   ```
   Buka `http://127.0.0.1:8000`

## Login Admin

- URL: `http://127.0.0.1:8000/admin/login`
- Email: `admin@sekolah.test`
- Password: `password123`

*(Bisa diganti langsung di database tabel `admins`, atau edit `database/seeders/AdminSeeder.php`)*

## Struktur yang Sudah Dibuat

**Publik:** Home, Profil, Program Keahlian (list+detail), Berita/Artikel (list+detail), Galeri, Prestasi, Kontak (dengan form).

**Admin (`/admin`):** Login manual pakai guard terpisah (`admin`, bukan `web`), Dashboard, CRUD Program Keahlian, CRUD Artikel (dengan cover image), CRUD Galeri (upload foto), CRUD Prestasi, Kelola Pesan Masuk dari form kontak.

**Teknis:**
- Semua model pakai `protected $guarded = []` (strategi ujikom: hemat waktu, tidak perlu tulis `$fillable` satu-satu).
- Routing admin CRUD pakai `Route::resource()` (hemat baris kode).
- Autentikasi admin dibuat manual (bukan Breeze) — pakai `Auth::guard('admin')`, session, dan middleware sendiri (`app/Http/Middleware/AdminMiddleware.php`) supaya kamu paham alurnya untuk ujian.
- Bootstrap 5 + Bootstrap Icons via CDN — tidak perlu `npm install` / `npm run build`.
- Tema warna: navy (`#0b2545`) + kuning (`#f7c948`), terinspirasi dari desain SMKN 4 Bogor.

## Langkah Selanjutnya

Kabari saya kalau sudah berhasil jalan (`php artisan serve` sukses & bisa login admin).
Setelah itu kita lanjut: isi data dummy, polish tampilan, atau tambah fitur lain sesuai roadmap 1 bulan.
