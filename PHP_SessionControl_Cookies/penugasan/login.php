<?php
session_start();

if (isset($_COOKIE['username']) && isset($_COOKIE['nrp'])) {
    header("Location: dashboard.php");
    exit();
}

// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $nrp = $_POST['password'];

    // Ganti sintaksi di bawah ini dengan data login yang sesuai
    $nama_anda = "tegaraprilian";
    $nrp_anda = "123456789";

    if ($username == $nama_anda && $nrp == $nrp_anda) {
        setcookie("username", $username, time() + 3600, "/");
        setcookie("nrp", $nrp, time() + 3600, "/");
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Username atau NRP salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login</title>
</head>
<body>
    <h2>Halaman Login</h2>
    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Password (NRP):</label>
        <input type="text" name="password" required><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>