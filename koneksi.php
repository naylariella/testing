<?php
// Data koneksi ke database
$host = "localhost";       // Biasanya localhost
$username = "root";        // Username MySQL default XAMPP
$password = "";            // Password MySQL default XAMPP kosong
$database = "toko_kopi_online"; // Nama database yang sudah dibuat

// Membuat koneksi
$koneksi = mysqli_connect($host, $username, $password, $database);

// Cek koneksi, jika gagal tampilkan pesan error
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// Jika berhasil, koneksi aktif dan bisa dipakai di halaman lain
?>