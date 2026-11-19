# BOOKSTOCK – Aplikasi Inventaris Buku
## Identitas Mahasiswa

- **Nama:** Nurani Anisa Putri
- **NIM:** 240631100001
- **Nama Proyek:** BOOKSTOCK – Aplikasi Inventaris Buku

## Deskripsi Proyek
BOOKSTOCK merupakan aplikasi inventaris buku berbasis web yang digunakan untuk mengelola data koleksi buku. Aplikasi ini dibuat untuk mempermudah proses pencatatan, penyimpanan, pencarian, dan pengelolaan informasi buku secara terstruktur.

## Fitur Aplikasi
- Menampilkan daftar koleksi buku.
- Menambahkan data buku.
- Mengedit data buku.
- Menghapus data buku.
- Mencari data buku.
- Memfilter buku berdasarkan kategori.

## Teknologi yang Digunakan
- PHP
- CodeIgniter 4
- MySQL
- HTML
- CSS
- Bootstrap
- Laragon
- Visual Studio Code

## Struktur Repository
```text
BOOKSTOCK/
├── app/                 # Source code aplikasi
├── public/              # File publik aplikasi
├── tests/               # File pengujian
├── writable/            # Cache, log, dan file sementara
├── database/            # File database SQL
│   └── db_inventaris_buku.sql
├── dokumentasi/         # Dokumentasi screenshot aplikasi
├── .gitignore           # Pengaturan file yang diabaikan Git
├── composer.json        # Konfigurasi dependensi
├── composer.lock        # Versi dependensi
└── spark                # CodeIgniter CLI
```

## Cara Menjalankan Aplikasi
1. Pastikan PHP, Composer, MySQL, dan Laragon sudah terpasang.
2. Clone atau unduh repository BOOKSTOCK.
3. Jalankan perintah berikut untuk memasang dependensi:

```bash
composer install
```
4. Salin file `env` menjadi `.env`.
5. Atur konfigurasi database pada file `.env` sesuai pengaturan MySQL lokal.
6. Buat database dengan nama `db_inventaris_buku` melalui phpMyAdmin.
7. Import file `database/db_inventaris_buku.sql` ke database tersebut.
8. Jalankan aplikasi melalui terminal:

```bash
php spark serve
```
9. Buka browser dan akses:
```text
http://localhost:8080
```

## Database
Nama database: `db_inventaris_buku`
Tabel utama: `buku`
File database tersedia pada folder `database/`.

## Dokumentasi
Screenshot tampilan aplikasi dapat dilihat pada folder dokumentasi/.
