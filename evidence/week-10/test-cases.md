
# TEST CASES - PERTEMUAN 10 KURSUSKU

| No | Pengujian | Hasil yang Diharapkan | Hasil Aktual | Status |
|---|---|---|---|---|
| 1 | Koneksi database MySQL | Database kursusku berhasil terhubung | Database berhasil terhubung | Lulus |
| 2 | Membuat tabel courses | Tabel courses berhasil dibuat melalui migration | Tabel berhasil dibuat | Lulus |
| 3 | Membuka form tambah kursus | Form tambah kursus tampil | Form berhasil ditampilkan | Lulus |
| 4 | Menyimpan data kursus | Data kursus tersimpan ke MySQL | Data berhasil tersimpan | Lulus |
| 5 | Nama kursus kosong | Sistem menolak input kosong | Muncul pesan Please fill out this field | Lulus |
| 6 | Harga negatif | Sistem menolak harga kurang dari 0 | Validasi harga muncul | Lulus |
| 7 | Durasi 0 hari | Sistem menolak durasi kurang dari 1 | Pesan validasi durasi muncul | Lulus |
| 8 | Slug duplikat | Sistem menolak slug yang sudah digunakan | Muncul pesan The slug has already been taken | Lulus |
| 9 | Menampilkan daftar kursus | Data kursus tampil pada halaman index | 8 data kursus tampil | Lulus |
