<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Utama</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>

<body>
    <h1>Selamat datang, <?php echo $_SESSION["email"]; ?></h1>
    <p>Ini adalah halaman utama setelah login.</p>

    <a href="logout.php">Logout</a>
</body>

</html>
