# Sistem Informasi Manajemen Belanja dan Pengendalian Biaya Bahan Pangan

**Berbasis Web Menggunakan Metode Weighted Product (WP)**

## 1. Deskripsi Proyek

Sistem Informasi Manajemen Belanja dan Pengendalian Biaya Bahan Pangan merupakan aplikasi berbasis web yang dikembangkan menggunakan framework Laravel dan database MySQL. Aplikasi ini bertujuan membantu pengguna mengelola data bahan pangan, memantau stok, mencatat harga, serta menentukan peringkat prioritas bahan pangan berdasarkan metode Weighted Product (WP).

Proyek ini dibuat untuk memenuhi tugas mata kuliah Proyek Perangkat Lunak.

## 2. Tujuan

- Mempermudah pengelolaan data bahan pangan.
- Membantu pengguna memantau stok dan kebutuhan bahan pangan.
- Menerapkan metode Weighted Product (WP) dalam pengambilan keputusan.
- Mengembangkan aplikasi berbasis web menggunakan Laravel dan MySQL.
- Menerapkan kolaborasi pengembangan perangkat lunak menggunakan GitHub.

## 3. Fitur Aplikasi

1. **Login dan Logout** untuk mengatur akses pengguna.
2. **Dashboard** untuk menampilkan ringkasan data bahan pangan.
3. **Manajemen Data Bahan Pangan (CRUD)** untuk menambah, melihat, mengubah, dan menghapus data.
4. **Pengelolaan Harga dan Stok** untuk mencatat harga, satuan, stok tersedia, dan kebutuhan bahan pangan.
5. **Perhitungan Weighted Product (WP)** untuk menghitung nilai preferensi berdasarkan kriteria dan bobot.
6. **Peringkat Bahan Pangan** untuk menampilkan urutan hasil perhitungan metode WP.

## 4. Teknologi yang Digunakan

- PHP
- Laravel 12
- MySQL
- HTML dan CSS
- Blade Template Engine
- Git dan GitHub
- XAMPP

## 5. Metode Weighted Product (WP)

Weighted Product (WP) merupakan metode pengambilan keputusan yang menggunakan perkalian nilai kriteria dengan bobot yang telah ditentukan.

Kriteria awal yang digunakan dalam aplikasi:

| Kriteria | Jenis | Bobot |
|---|---|---:|
| Harga bahan pangan | Cost | 40% |
| Kebutuhan belanja | Benefit | 60% |
| **Total** | | **100%** |

Rumus nilai vektor S:

`Sᵢ = Hargaᵢ⁻⁰·⁴⁰ × Kebutuhanᵢ⁰·⁶⁰`

Rumus nilai preferensi V:

`Vᵢ = Sᵢ / ΣS`

Nilai preferensi digunakan untuk menentukan peringkat setiap alternatif. Hasilnya bergantung pada data, kriteria, dan bobot yang digunakan.

**Catatan:** Kriteria dan bobot tersebut merupakan konfigurasi awal aplikasi. Peringkat WP tidak secara otomatis menunjukkan kekurangan stok, sehingga interpretasi hasil perlu disesuaikan dengan kebutuhan belanja yang sebenarnya.

## 6. Struktur Data

Data bahan pangan memiliki atribut berikut:

| Atribut | Keterangan |
|---|---|
| `id` | Identitas data bahan pangan |
| `nama_bahan` | Nama bahan pangan |
| `kategori` | Kategori bahan pangan |
| `satuan` | Satuan bahan pangan |
| `harga` | Harga per satuan |
| `stok` | Jumlah stok tersedia |
| `kebutuhan` | Jumlah kebutuhan bahan pangan |

## 7. Persyaratan Sistem

Sebelum menjalankan aplikasi, siapkan:

- PHP yang kompatibel dengan Laravel 12
- Composer
- MySQL atau XAMPP
- Git
- Browser web

## 8. Cara Instalasi

### A. Clone Repository

```bash
git clone https://github.com/rafafahlevi1406-beep/NAMA-REPOSITORY.git
cd NAMA-REPOSITORY
```

Ganti `NAMA-REPOSITORY` dengan nama repository proyek yang sebenarnya.

### B. Instal Dependensi

```bash
composer install
```

### C. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`.

Untuk Windows Command Prompt:

```bat
copy .env.example .env
```

Buat application key:

```bash
php artisan key:generate
```

### D. Buat Database

Jalankan MySQL melalui XAMPP, kemudian buat database:

```sql
CREATE DATABASE db_belanja_pangan;
```

Atur konfigurasi database dalam file `.env`:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_belanja_pangan
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan username dan password dengan konfigurasi MySQL masing-masing.

### E. Jalankan Migrasi

```bash
php artisan migrate
```

### F. Jalankan Aplikasi

```bash
php artisan serve
```

Buka browser dan akses:

`http://127.0.0.1:8000`

**Catatan:** Akun login harus dibuat atau disediakan sesuai konfigurasi autentikasi proyek.

## 9. Tim Pengembang

| No. | Nama Anggota | Tanggung Jawab |
|---|---|---|
| 1 | MUHAMMAD RAFFAIL FAHLEVI | Pengembangan aplikasi Laravel, pengelolaan database, dan implementasi metode Weighted Product (WP). |
| 2 | FAJARUL AKBAR | Pengembangan fitur aplikasi, pengujian sistem, dan dokumentasi proyek. |

Pembagian tanggung jawab tersebut merupakan pembagian awal dan perlu disesuaikan dengan pekerjaan yang benar-benar dilakukan oleh setiap anggota.

Setiap anggota wajib menggunakan akun GitHub masing-masing untuk berkontribusi dalam pengembangan proyek.

## 10. Repository GitHub

Repository proyek:

https://github.com/rafafahlevi1406-beep/NAMA-REPOSITORY

Ganti tautan tersebut dengan alamat repository proyek yang sebenarnya.

## 11. Pengujian Sistem

Pengujian dilakukan untuk memastikan fitur aplikasi berjalan sesuai kebutuhan, meliputi:

1. Pengujian login dan logout.
2. Pengujian tambah, tampil, edit, dan hapus data bahan pangan.
3. Pengujian penyimpanan harga, stok, dan kebutuhan.
4. Pengujian perhitungan nilai S dan nilai V.
5. Pengujian urutan peringkat hasil WP.
6. Pengujian validasi input dan penanganan data yang tidak valid.

## 12. Pengembangan Selanjutnya

- Penyempurnaan kriteria dan bobot metode WP.
- Penambahan analisis kekurangan stok.
- Penyempurnaan laporan hasil perhitungan.
- Pengujian dengan berbagai variasi data.
- Peningkatan dokumentasi dan kolaborasi GitHub.

## 13. Referensi

- Dokumentasi Laravel 12: https://laravel.com/docs/12.x
- Dokumentasi MySQL: https://dev.mysql.com/doc/
- Dokumentasi GitHub: https://docs.github.com/

---

Proyek ini dikembangkan untuk keperluan pembelajaran dan memenuhi tugas mata kuliah Proyek Perangkat Lunak.
