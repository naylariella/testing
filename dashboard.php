<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Kalau belum login, arahkan ke login.html
    header("Location: login.html");
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard - COFFEEIN</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #2c2011;
      color: #e0c097;
      padding: 20px;
    }
    a {
      color: #7b5734;
      text-decoration: none;
      font-weight: bold;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <h1>Selamat datang, <?php echo htmlspecialchars($username); ?>!</h1>
  <p>Ini adalah halaman dashboard Anda.</p>
  <p><a href="logout.php">Logout</a></p>
</body>
</html>