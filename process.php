<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (nama, email, password) VALUES ('$nama', '$email', '$password')";
    
    if (mysqli_query($conn, $sql)) {
        echo 'Pendaftaran berhasil. Silakan <a href="login.php">login</a>.';
    } else {
        echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
