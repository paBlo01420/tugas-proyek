<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrasi</title>
    <link rel="stylesheet" type="text/css" href="register.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">
</head>

<body>
    <h1>Registrasi</h1>
    <form method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit" name="submit">Daftar</button>
    </form>
    <?php
    include 'config.php';
    
    if (isset($_POST['submit'])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
    
    
        $username = mysqli_real_escape_string($conn, $username);
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);
    
        $sql = "INSERT INTO `users` (id,username, email, password) VALUES (NULL,'$username', '$email', '$password')";
    
        if (mysqli_query($conn, $sql)) {
            echo "Pendaftaran berhasil. Selamat bergabung, " . $username . "!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
        mysqli_close($conn);
    }
    ?>
</body>

</html>