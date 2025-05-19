<?php
include 'koneksi.php';

if ($koneksi) {
    echo "Koneksi database berhasil!";
} else {
    echo "Koneksi database gagal!";
}
?>