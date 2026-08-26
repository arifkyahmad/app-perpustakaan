NAMA APLIKASI:SISTEM PERPUSTAKAAN DIGITAL KAMPUS
TUJUAN: aplikasi yang dikelola petugas/admin untuk mengelola buku, anggota, dan transaksi peminjaman.
Cara menjalankan projek secara lokal:

1. buka direktori app-perpustakaan
2. jalankan server mysql di xampp
3. bash di terminal "php artisan serve"
4. Buka http://127.0.0.1:8000 di browser

<!--
Model: Bertanggung jawab atas pengelolaan data dan komunikasi langsung dengan database (mengambil, menyimpan, memvalidasi aturan data).

View: Bertanggung jawab murni atas antarmuka visual (UI/HTML) yang dilihat oleh pengguna tanpa memproses logika database.

Controller:  Bertindak sebagai perantara yang menerima request pengguna, memanggil Model untuk mengambil data, lalu mengoper hasilnya ke View untuk ditampilkan.
-->
