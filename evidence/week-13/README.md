# KursusKu — Milestone 13

## Deskripsi
KursusKu merupakan platform pembelajaran berbasis web yang dibangun menggunakan Laravel. Pada Milestone 13, sistem dikembangkan dengan fitur pencarian kursus, filter status kursus, serta pagination untuk mempermudah pengelolaan dan pencarian data kursus.

## Fitur Milestone 13
- Menampilkan daftar kursus.
- Pencarian kursus berdasarkan judul.
- Pencarian kursus berdasarkan deskripsi.
- Filter kursus berdasarkan status aktif dan nonaktif.
- Pagination dengan maksimal 10 kursus per halaman.
- Mempertahankan parameter pencarian dan filter ketika berpindah halaman.
- Menampilkan pesan ketika kursus tidak ditemukan.
- Reset pencarian dan filter.

## Teknologi
- PHP 8.3
- Laravel 13
- MySQL
- Blade
- Bootstrap

## Pengujian
Pengujian dilakukan terhadap fitur daftar kursus, pencarian, filter status, reset filter, pagination, dan pencarian kombinasi filter.

Seluruh skenario pengujian yang dilakukan dinyatakan berhasil.

## Cara Menjalankan Project
1. Jalankan Laragon.
2. Aktifkan Apache dan MySQL.
3. Buka browser.
4. Akses halaman KursusKu melalui:

   http://kursusku.test/courses

## Struktur Eviden
- `01-course-index.png` — Tampilan daftar kursus.
- `02-search-zero-result.png` — Pengujian pencarian data yang tidak ditemukan.
- `03-pagination-query-filter.png` — Pengujian pagination halaman kedua.
- `04-course-controller-index.png` — Bukti kode controller.
- `05-test-matrix.png` — Dokumentasi test matrix.

## Kesimpulan
Milestone 13 berhasil diselesaikan dengan penerapan fitur pencarian, filter status, dan pagination pada halaman daftar kursus. Seluruh fitur telah diuji dan berjalan sesuai skenario pengujian.
