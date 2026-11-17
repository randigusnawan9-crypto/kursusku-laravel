# AI USAGE LOG — KURSUSKU PERTEMUAN 12

## 1. Tujuan Penggunaan AI

AI digunakan sebagai asisten pembelajaran (pair programmer) untuk membantu memahami dan mengembangkan fitur relasi database pada aplikasi KursusKu menggunakan Laravel.

AI digunakan untuk memberikan arahan, menjelaskan kode, membantu memperbaiki kesalahan, dan menyusun langkah pengujian. Seluruh implementasi tetap diperiksa dan diuji secara langsung oleh mahasiswa.

## 2. Catatan Penggunaan AI

| No. | Prompt / Masalah | Saran AI | Diterima / Ditolak | Alasan dan Pengujian |
|---|---|---|---|---|
| 1 | Bagaimana membuat tabel participants? | Membuat migration dengan kolom id, name, email, phone, dan timestamps. | Diterima | Migration berhasil dijalankan menggunakan `php artisan migrate`. |
| 2 | Bagaimana membuat tabel enrollments dengan relasi? | Menggunakan foreign key participant_id dan course_id dengan cascadeOnDelete(). | Diterima | Kedua foreign key berhasil dibuat dan migration berstatus Ran. |
| 3 | Bagaimana membuat relasi antar-model? | Menggunakan hasMany, belongsTo, dan belongsToMany. | Diterima | Relasi digunakan pada model Participant, Enrollment, dan Course. |
| 4 | Bagaimana membuat form pendaftaran peserta dan kursus? | Menggunakan dropdown peserta dan kursus dari database. | Diterima | Form berhasil menampilkan data peserta dan kursus aktif. |
| 5 | Bagaimana mencegah pendaftaran ganda? | Menggunakan Rule::unique() berdasarkan participant_id dan course_id. | Diterima | Pendaftaran peserta yang sama pada kursus yang sama berhasil ditolak. |
| 6 | Bagaimana menampilkan laporan enrollment? | Menggunakan eager loading dengan relasi participant dan course. | Diterima | Laporan berhasil menampilkan nama peserta, email, kursus, tanggal mulai, dan status. |
| 7 | Bagaimana menguji cascade delete? | Menggunakan data percobaan melalui Laravel Tinker. | Diterima | Penghapusan kursus dan peserta berhasil menghapus enrollment terkait tanpa menghapus data induk lainnya. |

## 3. Contoh Pengujian

### Pengujian Duplicate Enrollment
- Peserta: Alya Rahma.
- Kursus: JavaScript Pemula.
- Hasil: Pendaftaran kedua ditolak.
- Pesan: Participant ini sudah terdaftar pada course tersebut.

### Pengujian Cascade Course
- Course ID 14 dihapus.
- Enrollment sebelum penghapusan: 1.
- Enrollment setelah penghapusan: 0.
- Participant ID 1 tetap tersedia.

### Pengujian Cascade Participant
- Participant ID 5 dihapus.
- Enrollment sebelum penghapusan: 1.
- Enrollment setelah penghapusan: 0.
- Course ID 15 tetap tersedia.

## 4. Evaluasi Penggunaan AI

Penggunaan AI membantu mempercepat proses pengembangan aplikasi dan memahami hubungan antar-tabel dalam database.

Namun, saran AI tidak langsung dianggap benar. Setiap kode diperiksa, disesuaikan dengan struktur database KursusKu, kemudian diuji menggunakan Laravel dan browser.

## 5. Kesimpulan

AI berperan sebagai alat bantu pembelajaran, bukan pengganti pemahaman mahasiswa. Melalui praktikum ini, mahasiswa mempelajari migration, foreign key, relasi Eloquent, validasi pendaftaran, serta mekanisme cascade delete pada Laravel.
