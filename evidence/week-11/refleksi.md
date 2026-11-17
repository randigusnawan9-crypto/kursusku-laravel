
# REFLEKSI PRAKTIKUM PERTEMUAN 11
## Project KursusKu

### 1. Mengapa validasi dipindahkan dari Controller ke Form Request?

Validasi dipindahkan ke Form Request agar kode Controller lebih rapi dan mudah dibaca. Selain itu, aturan validasi dapat dikelola secara terpisah sehingga lebih mudah diperbaiki dan digunakan kembali.

### 2. Mengapa aturan unique pada Update berbeda dengan Store?

Pada proses Store, slug harus benar-benar baru dan belum digunakan oleh kursus lain. Pada proses Update, slug milik data yang sedang diedit harus diabaikan agar pengguna tetap bisa menyimpan data tanpa harus mengganti slug tersebut.

### 3. Apa fungsi @method('PUT') dan @method('DELETE')?

Keduanya digunakan untuk menentukan metode HTTP pada form HTML. Karena form HTML secara langsung hanya mendukung GET dan POST, Laravel menggunakan method spoofing agar form dapat menjalankan proses PUT untuk memperbarui data dan DELETE untuk menghapus data.
