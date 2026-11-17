# TEST MATRIX - KURSUSKU PERTEMUAN 11

## Informasi Pengujian

- Nama Proyek: KursusKu
- Pertemuan: 11
- Modul: CRUD, Form Request, dan Validasi
- Framework: Laravel
- Metode Pengujian: Black Box Testing

## Tabel Pengujian

| No. | Skenario Pengujian | Hasil yang Diharapkan | Hasil Aktual | Status |
|---|---|---|---|---|
| 1 | Membuka halaman daftar kursus | Daftar kursus ditampilkan | Daftar kursus tampil | Lulus |
| 2 | Membuka halaman detail kursus | Detail kursus ditampilkan | Detail kursus tampil | Lulus |
| 3 | Membuka halaman edit kursus | Form edit menampilkan data sebelumnya | Data tampil otomatis | Lulus |
| 4 | Mengosongkan nama kursus | Muncul pesan nama wajib diisi | Pesan validasi muncul | Lulus |
| 5 | Mengosongkan harga kursus | Muncul pesan harga wajib diisi | Pesan validasi muncul | Lulus |
| 6 | Mengisi harga dengan huruf | Input harga tidak menerima nilai nonangka | Browser menolak input | Lulus* |
| 7 | Mengosongkan durasi kursus | Muncul pesan durasi wajib diisi | Pesan validasi muncul | Lulus |
| 8 | Mengisi durasi dengan angka 0 | Muncul pesan durasi minimal 1 | Pesan validasi muncul | Lulus |
| 9 | Mengisi nama kurang dari 3 karakter | Muncul pesan nama minimal 3 karakter | Pesan validasi muncul | Lulus |
| 10 | Menggunakan slug yang sudah dipakai kursus lain | Muncul pesan slug sudah digunakan | Pesan validasi muncul | Lulus |
| 11 | Menambahkan kursus dengan data valid | Kursus berhasil disimpan | Kursus berhasil ditambahkan | Lulus |
| 12 | Mengubah data kursus dengan slug milik sendiri | Data berhasil diperbarui | Data berhasil diperbarui | Lulus |
| 13 | Mengubah data kursus | Muncul pesan kursus berhasil diperbarui | Pesan berhasil diperbarui muncul | Lulus |
| 14 | Menghapus kursus uji coba | Kursus terhapus dan muncul pesan sukses | Kursus berhasil dihapus | Lulus |
| 15 | Membatalkan konfirmasi penghapusan | Data kursus tidak jadi dihapus | Penghapusan dibatalkan | Lulus |

## Kesimpulan

Berdasarkan pengujian yang telah dilakukan, fitur daftar kursus, detail, tambah, edit, hapus, dan validasi formulir pada aplikasi KursusKu telah berjalan sesuai hasil yang diharapkan.

## Catatan

*Pengujian nomor 6 dinyatakan lulus berdasarkan penolakan input oleh browser pada kolom bertipe number. Validasi numeric Laravel belum diuji secara terpisah.*