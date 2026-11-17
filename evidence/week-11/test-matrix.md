
# TEST MATRIX - KURSUSKU PERTEMUAN 11

## Informasi Pengujian

- Aplikasi: KursusKu
- Framework: Laravel
- Fitur: CRUD Kursus, Form Request, dan Validasi
- Tanggal Pengujian: 18 November 2026

## Catatan Struktur Database

Project menggunakan struktur kolom:
- title: Nama kursus
- slug: Identitas unik kursus
- price: Harga kursus
- duration: Durasi kursus
- start_date: Tanggal mulai
- is_active: Status aktif kursus

Struktur database yang sudah ada dipertahankan sesuai ketentuan praktikum.

## Hasil Pengujian

| No. | Skenario Pengujian | Hasil yang Diharapkan | Status |
|---|---|---|---|
| 1 | Nama kursus dikosongkan | Validasi nama wajib diisi | Lulus |
| 2 | Harga dikosongkan | Validasi harga wajib diisi | Lulus |
| 3 | Harga diisi huruf | Input angka menolak nilai huruf | Lulus* |
| 4 | Durasi dikosongkan | Validasi durasi wajib diisi | Lulus |
| 5 | Durasi diisi 0 | Validasi durasi minimal 1 | Lulus |
| 6 | Nama kursus kurang dari 3 karakter | Validasi minimal 3 karakter | Lulus |
| 7 | Slug duplikat saat tambah kursus | Validasi slug sudah digunakan | Lulus |
| 8 | Menambahkan kursus dengan data valid | Data kursus berhasil disimpan | Lulus |
| 9 | Membuka detail kursus | Detail kursus ditampilkan | Lulus |
| 10 | Mengosongkan nama saat edit | Pesan validasi ditampilkan | Lulus |
| 11 | Menggunakan slug milik kursus lain saat edit | Validasi slug duplikat ditampilkan | Lulus |
| 12 | Mempertahankan slug milik sendiri saat edit | Update tetap berhasil | Lulus |
| 13 | Mengubah data kursus dengan benar | Data berhasil diperbarui | Lulus |
| 14 | Menghapus kursus uji | Data terhapus dan pesan sukses muncul | Lulus |
| 15 | Membatalkan konfirmasi hapus | Data tetap tersimpan | Lulus |

*Keterangan: Pengujian harga berupa huruf ditolak oleh input angka pada browser. Pengujian ini belum membuktikan validasi numerik Laravel secara terpisah.

## Kesimpulan

Berdasarkan pengujian, fitur CRUD kursus, validasi Form Request, halaman detail, proses edit, dan penghapusan data telah berjalan sesuai hasil yang diharapkan.

Struktur database tetap menggunakan kolom yang sudah tersedia pada project KursusKu.
