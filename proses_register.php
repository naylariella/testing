<?php
session_start();
include 'koneksi.php';  // file koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi sederhana
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        die("Semua field harus diisi!");
    }
    if ($password !== $confirm_password) {
        die("Password dan konfirmasi password tidak sama!");
    }

    // Cek apakah username atau email sudah ada
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        die("Username atau email sudah terdaftar.");
    }

    // Hash password sebelum simpan
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Insert user baru
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password_hash);

    if ($stmt->execute()) {
        echo "Registrasi berhasil! Silakan <a href='login.html'>login</a>.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Metode akses salah.";
}
?>