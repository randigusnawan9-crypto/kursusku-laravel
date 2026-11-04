# TEST MATRIX - KURSUSKU WEEK 9

## Informasi Pengujian
- Nama Aplikasi: KursusKu
- Minggu: Week 9
- Metode: Manual Testing
- Teknologi: Laravel, Bootstrap, Vite, jQuery, AJAX

## Hasil Pengujian

| No. | Fitur yang Diuji | Hasil Pengujian | Status |
|---|---|---|---|
| 1 | Beranda | Beranda tampil menggunakan layout, navbar, dan Bootstrap | Lulus |
| 2 | Navbar Responsive | Menu hamburger dapat dibuka dan ditutup | Lulus |
| 3 | Halaman Pendaftaran | Form tampil menggunakan layout yang sama | Lulus |
| 4 | Pilihan Kursus Kosong | Informasi availability sebelumnya menghilang | Lulus |
| 5 | Web Dasar | Kuota 30, terdaftar 18, sisa 12 | Lulus |
| 6 | PHP Dasar | Kuota 25, terdaftar 20, sisa 5 | Lulus |
| 7 | Laravel Dasar | Kuota 20, terdaftar 20, sisa 0, status penuh | Lulus |
| 8 | POST Valid | Data pendaftaran berhasil diproses dan ditampilkan | Lulus |
| 9 | Email Tidak Valid | Sistem menolak email dengan format tidak valid | Lulus |
| 10 | Network Availability | Request AJAX berhasil dengan HTTP 200 dan menghasilkan JSON | Lulus |
| 11 | Console | Tidak ditemukan error merah | Lulus |

## Kesimpulan

Berdasarkan pengujian yang telah dilakukan, fitur utama aplikasi KursusKu Week 9 berjalan dengan baik.

Bootstrap dan jQuery berhasil digunakan, halaman pendaftaran menggunakan master layout, form menggunakan CSRF, serta pemilihan kursus dapat memicu request AJAX tanpa melakukan reload penuh.

API availability berhasil mengembalikan data JSON dan menampilkan informasi kuota serta sisa kursi. Validasi form, navbar responsive, dan pemeriksaan Console juga berhasil dilakukan.

Dengan demikian, seluruh 11 pengujian dalam test matrix dinyatakan lulus.