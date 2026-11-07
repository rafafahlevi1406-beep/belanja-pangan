# SISTEM INFORMASI MANAJEMEN BELANJA DAN PENGENDALIAN BIAYA BAHAN PANGAN BERBASIS WEB MENGGUNAKAN METODE WEIGHTED PRODUCT (WP)

## 1. Deskripsi Proyek

Sistem Informasi Manajemen Belanja dan Pengendalian Biaya Bahan Pangan merupakan aplikasi berbasis web yang dikembangkan menggunakan framework Laravel dan database MySQL.

Aplikasi ini bertujuan membantu pengguna mengelola data bahan pangan, mencatat harga, memantau stok, serta menentukan peringkat prioritas bahan pangan berdasarkan metode Weighted Product (WP).

Proyek ini dibuat untuk memenuhi tugas mata kuliah Proyek Perangkat Lunak.

## 2. Tujuan

- Mempermudah pengelolaan data bahan pangan.
- Membantu pengguna memantau stok dan kebutuhan bahan pangan.
- Mencatat harga dan informasi bahan pangan.
- Menerapkan metode Weighted Product (WP) dalam pengambilan keputusan.
- Mempelajari pengembangan aplikasi berbasis web menggunakan Laravel dan MySQL.
- Menerapkan kolaborasi pengembangan perangkat lunak menggunakan GitHub.

## 3. Fitur Aplikasi

- **Login dan Logout:** Mengatur akses pengguna ke dalam aplikasi.
- **Dashboard:** Menampilkan ringkasan informasi bahan pangan.
- **Manajemen Data Bahan Pangan (CRUD):** Menambah, melihat, mengubah, dan menghapus data.
- **Pengelolaan Harga dan Stok:** Mencatat harga, satuan, stok tersedia, dan kebutuhan bahan pangan.
- **Perhitungan Weighted Product (WP):** Menghitung nilai preferensi berdasarkan kriteria dan bobot.
- **Peringkat Bahan Pangan:** Menampilkan urutan hasil perhitungan metode WP.

## 4. Teknologi yang Digunakan

- PHP
- Laravel 12
- MySQL
- HTML
- CSS
- Blade Template
- Git
- GitHub
- XAMPP

## 5. Metode Weighted Product (WP)

Weighted Product (WP) merupakan metode pengambilan keputusan yang menggunakan perkalian nilai setiap kriteria dengan bobot yang telah ditentukan.

Kriteria awal yang digunakan dalam aplikasi:

| No. | Kriteria | Jenis | Bobot |
|---|---|---|---|
| 1 | Harga bahan pangan | Cost | 40% |
| 2 | Kebutuhan belanja | Benefit | 60% |
| | **Total** | | **100%** |

### Rumus Vektor S

Sᵢ = ∏ xᵢⱼʷʲ

Untuk dua kriteria yang digunakan:

Sᵢ = Hargaᵢ⁻⁰·⁴⁰ × Kebutuhanᵢ⁰·⁶⁰

### Rumus Nilai Preferensi V

Vᵢ = Sᵢ / ΣSᵢ

Nilai preferensi digunakan untuk menentukan peringkat setiap alternatif. Semakin tinggi nilai preferensi, semakin tinggi peringkat alternatif tersebut.

**Catatan:** Kriteria dan bobot merupakan konfigurasi awal proyek. Peringkat WP tidak secara otomatis menunjukkan kekurangan stok. Interpretasi hasil perlu disesuaikan dengan kebutuhan belanja yang sebenarnya.

## 6. Struktur Data

Data bahan pangan memiliki atribut sebagai berikut:

| No. | Atribut | Keterangan |
|---|---|---|
| 1 | id | Identitas data bahan pangan |
| 2 | nama_bahan | Nama bahan pangan |
| 3 | kategori | Kategori bahan pangan |
| 4 | satuan | Satuan bahan pangan |
| 5 | harga | Harga per satuan |
| 6 | stok | Jumlah stok tersedia |
| 7 | kebutuhan | Jumlah kebutuhan bahan pangan |

## 7. Persyaratan Sistem

Sebelum menjalankan aplikasi, siapkan:

- PHP yang kompatibel dengan Laravel 12.
- Composer.
- MySQL atau XAMPP.
- Git.
- Browser web.
- Visual Studio Code atau editor kode lainnya.

## 8. Cara Instalasi

### A. Clone Repository

Buka terminal, kemudian jalankan:

```bash
git clone https://github.com/rafafahlevi1406-beep/belanja-pangan.git
```

Masuk ke folder proyek:

```bash
cd belanja-pangan
```

### B. Instal Dependensi

```bash
composer install
```

### C. Konfigurasi Lingkungan

Salin file `.env.example` menjadi `.env`.

Untuk Windows Command Prompt:

```bash
copy .env.example .env
```

Buat kunci aplikasi:

```bash
php artisan key:generate
```

### D. Membuat Database

Jalankan Apache dan MySQL melalui XAMPP.

Buat database dengan nama:

```sql
CREATE DATABASE db_belanja_pangan;
```

Atur konfigurasi database pada file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_belanja_pangan
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan username dan password dengan konfigurasi MySQL masing-masing.

### E. Menjalankan Migrasi

```bash
php artisan migrate
```

### F. Menjalankan Aplikasi

```bash
php artisan serve
```

Buka browser dan akses:

http://127.0.0.1:8000

**Catatan:** Akun login harus dibuat atau disediakan sesuai konfigurasi autentikasi proyek.

## 9. Tim Pengembang

Proyek ini dikembangkan oleh dua anggota dengan pembagian tugas sebagai berikut:

| No. | Nama Anggota | Tanggung Jawab |
|---|---|---|
| 1 | MUHAMMAD RAFFAIL FAHLEVI | Membuat struktur proyek Laravel, mengelola database MySQL, mengembangkan fitur CRUD bahan pangan, dan mengatur tampilan dashboard. |
| 2 | ANSAR SALSARAJA | Mengimplementasikan metode Weighted Product (WP), mengembangkan perhitungan dan peringkat bahan pangan, melakukan pengujian sistem, serta membantu dokumentasi proyek. |

### Profil GitHub Anggota

- Muhammad Raffail Fahlevi: https://github.com/rafafahlevi1406-beep
- Ansar Salsaraja: https://github.com/ansarsalsaraja123-source

Setiap anggota bertanggung jawab terhadap tugas masing-masing dan wajib berkontribusi menggunakan akun GitHub pribadi. Riwayat kontribusi dapat dilihat melalui commit pada repository proyek.

## 10. Repositori GitHub

Repository proyek:

https://github.com/rafafahlevi1406-beep/belanja-pangan

Repository ini digunakan untuk menyimpan kode sumber, dokumentasi, serta riwayat pengembangan dan kontribusi anggota kelompok.

## 11. Pengujian Sistem

Pengujian dilakukan untuk memastikan fitur aplikasi berjalan sesuai kebutuhan, meliputi:

1. Pengujian login dan logout.
2. Pengujian tambah data bahan pangan.
3. Pengujian tampil data bahan pangan.
4. Pengujian edit data bahan pangan.
5. Pengujian hapus data bahan pangan.
6. Pengujian penyimpanan harga, stok, dan kebutuhan.
7. Pengujian perhitungan nilai S dan nilai V.
8. Pengujian peringkat hasil Weighted Product.
9. Pengujian validasi input dan penanganan data yang tidak valid.

Hasil pengujian dicatat berdasarkan pelaksanaan pengujian yang sebenarnya.

## 12. Pengembangan Selanjutnya

- Penyempurnaan kriteria dan bobot metode WP.
- Penambahan analisis kekurangan stok.
- Penyempurnaan laporan hasil perhitungan.
- Pengujian dengan berbagai variasi data.
- Peningkatan keamanan aplikasi.
- Peningkatan dokumentasi dan kolaborasi GitHub.

## 13. Referensi

1. Laravel Documentation: https://laravel.com/docs/12.x
2. MySQL Documentation: https://dev.mysql.com/doc/
3. GitHub Documentation: https://docs.github.com/

---

Proyek ini dikembangkan untuk keperluan pembelajaran dan memenuhi tugas mata kuliah Proyek Perangkat Lunak.
