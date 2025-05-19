<?php
session_start();
include 'koneksi.php';  // file koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        die("Username dan password harus diisi!");
    }

    // Cari user berdasar username
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Login berhasil, simpan session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");
            exit;
        } else {
            die("Password salah.");
        }
    } else {
        die("User tidak ditemukan.");
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Metode akses salah.";
}
?>
