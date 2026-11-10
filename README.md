# SISTEM INFORMASI MANAJEMEN BELANJA DAN PENGENDALIAN BIAYA BAHAN PANGAN BERBASIS WEB MENGGUNAKAN METODE WEIGHTED PRODUCT (WP)

## 1. Deskripsi Proyek

Sistem Informasi Manajemen Belanja dan Pengendalian Biaya Bahan Pangan merupakan aplikasi berbasis web yang dikembangkan menggunakan framework Laravel 12 dan database MySQL.

Aplikasi ini dirancang untuk membantu pengguna dalam mengelola data bahan pangan, mencatat harga, memantau ketersediaan stok, serta menentukan prioritas belanja berdasarkan metode Weighted Product (WP).

Dengan adanya aplikasi ini, proses pengelolaan bahan pangan diharapkan menjadi lebih terstruktur. Pengguna juga dapat melihat hasil perhitungan dan peringkat bahan pangan sebagai bahan pertimbangan dalam menentukan prioritas pembelian.

Proyek ini dikembangkan secara berkelompok untuk memenuhi tugas mata kuliah Proyek Perangkat Lunak.

## 2. Tujuan Pengembangan

Tujuan dari pengembangan aplikasi ini adalah:

- Mempermudah pengelolaan data bahan pangan.
- Membantu pengguna mencatat harga dan jumlah stok.
- Memantau kebutuhan bahan pangan.
- Membantu menentukan prioritas belanja menggunakan metode Weighted Product.
- Menyediakan hasil perhitungan yang dapat digunakan sebagai bahan pertimbangan pengambilan keputusan.
- Menerapkan pengembangan aplikasi berbasis web menggunakan Laravel dan MySQL.
- Melatih kerja sama tim melalui penggunaan Git dan GitHub.

## 3. Fitur Aplikasi

Aplikasi ini dirancang dengan beberapa fitur utama sebagai berikut:

1. **Login dan Logout**  
   Digunakan untuk mengatur akses pengguna ke dalam aplikasi.

2. **Dashboard**  
   Menampilkan ringkasan informasi dan data bahan pangan.

3. **Manajemen Data Bahan Pangan (CRUD)**  
   Memungkinkan pengguna menambah, melihat, mengubah, dan menghapus data bahan pangan.

4. **Pengelolaan Harga dan Stok**  
   Digunakan untuk mencatat harga, satuan, stok tersedia, dan jumlah kebutuhan bahan pangan.

5. **Perhitungan Weighted Product (WP)**  
   Mengolah data bahan pangan berdasarkan kriteria dan bobot yang telah ditentukan.

6. **Hasil Perangkingan**  
   Menampilkan urutan prioritas bahan pangan berdasarkan nilai preferensi metode WP.

## 4. Teknologi yang Digunakan

Berikut teknologi yang digunakan dalam pengembangan aplikasi:

| Teknologi | Kegunaan |
|---|---|
| PHP | Bahasa pemrograman backend |
| Laravel 12 | Framework pengembangan aplikasi |
| MySQL | Pengelolaan database |
| HTML | Membuat struktur halaman |
| CSS | Mengatur tampilan aplikasi |
| Blade Template | Mengelola tampilan Laravel |
| Git | Mengelola versi kode program |
| GitHub | Menyimpan dan mengembangkan proyek bersama |
| XAMPP | Menjalankan server lokal dan MySQL |

## 5. Metode Pengambilan Keputusan Weighted Product (WP)

Weighted Product (WP) merupakan salah satu metode Sistem Pendukung Keputusan (SPK) yang digunakan untuk menentukan peringkat alternatif berdasarkan beberapa kriteria dengan bobot tertentu.

Dalam aplikasi ini, metode WP digunakan untuk membantu menentukan prioritas belanja bahan pangan berdasarkan harga dan jumlah kebutuhan.

### 5.1 Kriteria dan Bobot

Kriteria yang digunakan dalam perhitungan awal adalah:

| No. | Kriteria | Jenis | Bobot |
|---|---|---|---|
| 1 | Harga bahan pangan | Cost | 40% |
| 2 | Kebutuhan belanja | Benefit | 60% |
| | **Total** | | **100%** |

Keterangan:

- **Cost:** Semakin rendah nilai harga, semakin baik.
- **Benefit:** Semakin tinggi jumlah kebutuhan, semakin baik.

Bobot digunakan untuk menunjukkan tingkat kepentingan masing-masing kriteria dalam proses perhitungan.

### 5.2 Rumus Vektor S

Rumus yang digunakan untuk menghitung nilai vektor S adalah:

Sᵢ = ∏ (Xᵢⱼ)ʷʲ

Untuk dua kriteria pada aplikasi ini, rumusnya menjadi:

Sᵢ = Hargaᵢ⁻⁰·⁴⁰ × Kebutuhanᵢ⁰·⁶⁰

Keterangan:

- Sᵢ = Nilai vektor S setiap alternatif.
- Xᵢⱼ = Nilai alternatif berdasarkan kriteria.
- Wⱼ = Bobot masing-masing kriteria.
- Harga = Nilai harga bahan pangan.
- Kebutuhan = Jumlah kebutuhan bahan pangan.

### 5.3 Rumus Vektor V

Setelah nilai vektor S diperoleh, langkah selanjutnya adalah menghitung nilai preferensi menggunakan rumus:

Vᵢ = Sᵢ / ΣSᵢ

Keterangan:

- Vᵢ = Nilai preferensi setiap alternatif.
- Sᵢ = Nilai vektor S setiap alternatif.
- ΣSᵢ = Jumlah seluruh nilai vektor S.

### 5.4 Hasil Perangkingan

Nilai preferensi yang diperoleh digunakan untuk menentukan peringkat setiap bahan pangan.

Semakin tinggi nilai preferensi, semakin tinggi pula prioritas alternatif berdasarkan kriteria dan bobot yang digunakan.

**Catatan:** Bobot dan kriteria tersebut merupakan konfigurasi awal yang digunakan dalam proyek. Hasil perangkingan menunjukkan prioritas berdasarkan harga dan kebutuhan, bukan secara otomatis menunjukkan bahan pangan yang stoknya paling sedikit. Data harga dan kebutuhan juga harus bernilai positif agar dapat diproses menggunakan rumus WP.

## 6. Struktur Data Bahan Pangan

Data bahan pangan yang dikelola dalam aplikasi memiliki beberapa atribut sebagai berikut:

| No. | Atribut | Keterangan |
|---|---|---|
| 1 | id | Identitas setiap data bahan pangan |
| 2 | nama_bahan | Nama bahan pangan |
| 3 | kategori | Jenis atau kelompok bahan pangan |
| 4 | satuan | Satuan bahan pangan |
| 5 | harga | Harga bahan pangan per satuan |
| 6 | stok | Jumlah stok yang tersedia |
| 7 | kebutuhan | Jumlah kebutuhan bahan pangan |

Data tersebut digunakan untuk membantu proses pengelolaan bahan pangan dan perhitungan prioritas menggunakan metode Weighted Product.

## 7. Persyaratan Sistem

Sebelum menjalankan aplikasi, pastikan perangkat telah memiliki beberapa kebutuhan berikut:

- PHP versi 8.2 atau lebih baru yang kompatibel dengan Laravel 12.
- Composer.
- MySQL.
- XAMPP.
- Git.
- Visual Studio Code atau editor kode lainnya.
- Browser seperti Google Chrome atau Microsoft Edge.

## 8. Cara Instalasi dan Menjalankan Aplikasi

Ikuti langkah-langkah berikut untuk menjalankan aplikasi di komputer lokal.

### A. Clone Repository

Buka terminal atau CMD, kemudian jalankan perintah:

```bash
git clone https://github.com/rafafahlevi1406-beep/belanja-pangan.git
```

Masuk ke direktori proyek:

```bash
cd belanja-pangan
```

### B. Instal Dependensi

Jalankan perintah berikut untuk menginstal seluruh dependensi Laravel:

```bash
composer install
```

### C. Konfigurasi File Environment

Salin file `.env.example` menjadi `.env` menggunakan perintah:

```bash
copy .env.example .env
```

Kemudian buat application key:

```bash
php artisan key:generate
```

### D. Membuat Database

1. Buka XAMPP.
2. Jalankan Apache dan MySQL.
3. Buka phpMyAdmin melalui browser.
4. Buat database baru dengan nama:

```text
db_belanja_pangan
```

Selanjutnya, buka file `.env` pada folder proyek dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_belanja_pangan
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan username dan password berdasarkan konfigurasi MySQL pada komputer masing-masing.

### E. Menjalankan Migrasi Database

Jalankan perintah berikut untuk membuat tabel database berdasarkan file migration:

```bash
php artisan migrate
```

### F. Menjalankan Aplikasi

Setelah seluruh proses konfigurasi selesai, jalankan:

```bash
php artisan serve
```

Kemudian buka browser dan akses alamat berikut:

http://127.0.0.1:8000

**Catatan:** Jika aplikasi menggunakan autentikasi, pastikan akun pengguna telah tersedia melalui proses registrasi, seeder, atau mekanisme pembuatan akun yang disediakan proyek.

## 9. Tim Pengembang

Proyek ini dikembangkan oleh tiga mahasiswa dengan pembagian tanggung jawab sebagai berikut:

| No. | Nama Anggota | Tanggung Jawab |
|---|---|---|
| 1 | MUHAMMAD RAFFAIL FAHLEVI | Mengembangkan struktur proyek Laravel, mengelola database MySQL, membuat migration dan model, serta mengembangkan fitur CRUD bahan pangan. |
| 2 | ANSAR SALSARAJA | Mengimplementasikan metode Weighted Product (WP), mengembangkan perhitungan nilai vektor S dan V, serta membuat fitur perangkingan bahan pangan. |
| 3 | AHLUL ZIKRI | Mengembangkan dashboard dan antarmuka aplikasi, membantu pengujian sistem, serta melakukan penyempurnaan tampilan dan dokumentasi. |

### Profil GitHub Anggota

- **Muhammad Raffail Fahlevi:** https://github.com/rafafahlevi1406-beep
- **Ansar Salsaraja:** https://github.com/ansarsalsaraja123-source
- **Ahlul Zikri:** https://github.com/Ahlulzikri

Setiap anggota memiliki tanggung jawab sesuai pembagian tugas dan diharapkan berkontribusi menggunakan akun GitHub masing-masing.

Riwayat pengembangan dan kontribusi anggota dapat dilihat melalui aktivitas commit pada repository proyek.

## 10. Repository GitHub

Repository utama proyek:

https://github.com/rafafahlevi1406-beep/belanja-pangan

GitHub digunakan sebagai tempat penyimpanan kode sumber, dokumentasi, dan pengelolaan versi aplikasi.

Melalui repository ini, seluruh anggota kelompok dapat bekerja sama dalam mengembangkan aplikasi, memperbarui kode program, dan melihat riwayat perubahan yang dilakukan oleh masing-masing anggota.

## 11. Pengujian Sistem

Pengujian dilakukan untuk mengetahui apakah setiap fitur aplikasi telah berjalan sesuai dengan kebutuhan yang direncanakan.

Beberapa bagian yang menjadi fokus pengujian meliputi:

1. Pengujian login dan logout.
2. Pengujian penambahan data bahan pangan.
3. Pengujian tampilan daftar bahan pangan.
4. Pengujian perubahan data bahan pangan.
5. Pengujian penghapusan data bahan pangan.
6. Pengujian penyimpanan harga, stok, dan kebutuhan.
7. Pengujian proses perhitungan vektor S.
8. Pengujian proses perhitungan vektor V.
9. Pengujian hasil perangkingan metode WP.
10. Pengujian validasi data yang dimasukkan pengguna.

Hasil pengujian dicatat berdasarkan proses pengujian yang benar-benar dilakukan selama pengembangan aplikasi.

## 12. Pengembangan Selanjutnya

Aplikasi ini masih dapat dikembangkan dengan menambahkan beberapa kemampuan, antara lain:

- Penambahan kriteria penilaian pada metode Weighted Product.
- Pengaturan bobot kriteria secara dinamis.
- Penambahan fitur analisis kekurangan stok.
- Penyediaan laporan hasil perhitungan.
- Pengujian menggunakan lebih banyak variasi data.
- Peningkatan keamanan dan pengelolaan hak akses pengguna.
- Penyempurnaan tampilan agar lebih mudah digunakan.
- Peningkatan dokumentasi dan kolaborasi melalui GitHub.

## 13. Referensi

1. Laravel Documentation. https://laravel.com/docs/12.x
2. MySQL Documentation. https://dev.mysql.com/doc/
3. Git Documentation. https://git-scm.com/doc
4. GitHub Documentation. https://docs.github.com/

---

**Penutup**

Sistem Informasi Manajemen Belanja dan Pengendalian Biaya Bahan Pangan Berbasis Web Menggunakan Metode Weighted Product (WP) merupakan proyek pengembangan aplikasi yang bertujuan membantu pengelolaan data bahan pangan dan menentukan prioritas belanja berdasarkan kriteria tertentu.

Melalui proyek ini, anggota kelompok dapat menerapkan pengetahuan mengenai pemrograman web, pengelolaan database, metode Sistem Pendukung Keputusan, serta kolaborasi pengembangan perangkat lunak menggunakan Git dan GitHub.

Proyek ini dikembangkan sebagai bagian dari pemenuhan tugas mata kuliah Proyek Perangkat Lunak.
