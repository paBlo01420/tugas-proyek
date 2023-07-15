
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="register.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">
</head>

<body>
    <header>
        <div class="logo">
            <a href="index.html" class="room">
                <img src="logo.png" alt="KosKu Logo">
            </a>
        </div>
    </header>

    <h1>Login</h1>
    <form action="" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
 <?php
    include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir login
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Menghubungkan ke database
    include 'config.php';

    // Melakukan sanitasi data sebelum melakukan query
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Melakukan query untuk memeriksa kecocokan data login
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        session_start();
        $_SESSION["email"] = $email;
        header("Location: home.php");
        exit();
    } else {
        echo "Email atau password salah. Silakan coba lagi.";
    }

    mysqli_close($conn);
}
?>
</body>

</html>
