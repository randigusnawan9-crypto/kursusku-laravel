# REFLEKSI PRAKTIKUM PERTEMUAN 12
## Relasi Database dan Enrollment KursusKu

### 1. Apa fungsi Foreign Key dalam database?

Foreign Key berfungsi menghubungkan satu tabel dengan tabel lainnya serta menjaga integritas data. Pada aplikasi KursusKu, `participant_id` menghubungkan tabel enrollments dengan participants, sedangkan `course_id` menghubungkan enrollments dengan courses.

Dengan Foreign Key, data enrollment tidak dapat merujuk pada peserta atau kursus yang tidak tersedia.

### 2. Mengapa menggunakan Composite Unique pada participant_id dan course_id?

Composite Unique digunakan untuk mencegah peserta mendaftar pada kursus yang sama lebih dari satu kali.

Dengan aturan ini, peserta tetap dapat mengikuti beberapa kursus berbeda dan satu kursus tetap dapat diikuti banyak peserta.

### 3. Mengapa start_date tidak perlu disimpan kembali di tabel enrollments?

Karena `start_date` sudah tersedia pada tabel courses. Data tersebut dapat diperoleh melalui relasi antara Enrollment dan Course.

Hal ini menghindari duplikasi data dan mengurangi risiko ketidaksesuaian tanggal mulai kursus.

### 4. Apa yang terjadi jika Foreign Key tidak menggunakan Cascade Delete?

Jika data peserta atau kursus dihapus, data enrollment yang masih terhubung dapat menyebabkan penghapusan ditolak oleh database apabila menggunakan aturan pembatasan. Tanpa perlindungan relasi, data enrollment juga berisiko menjadi data yatim.

Dengan Cascade Delete, enrollment terkait otomatis dihapus ketika data peserta atau kursus induknya dihapus.

### 5. Apa perbedaan belongsTo dan hasMany?

- `belongsTo` digunakan ketika suatu model memiliki relasi ke satu data induk. Contohnya, satu Enrollment memiliki satu Participant dan satu Course.
- `hasMany` digunakan ketika suatu model memiliki banyak data anak. Contohnya, satu Participant dapat memiliki banyak Enrollment dan satu Course juga dapat memiliki banyak Enrollment.

### Kesimpulan

Melalui praktikum Pertemuan 12, saya mempelajari penerapan relasi database menggunakan Laravel Eloquent, penggunaan Foreign Key, Composite Unique, validasi pendaftaran, serta pengujian Cascade Delete.

Saya juga memahami bahwa relasi database penting untuk menjaga konsistensi dan integritas data pada aplikasi KursusKu.