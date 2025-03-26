<?php
if (!isset($_COOKIE['username']) || !isset($_COOKIE['nrp'])) {
    header("Location: login.php");
    exit();
}

$username = $_COOKIE['username'];
$nrp = $_COOKIE['nrp'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Selamat Datang, <?php echo $username; ?>!</h2>
    <p>Informasi Pengguna:</p>
    <ul>
        <li><strong>Nama:</strong> <?php echo $username; ?></li>
        <li><strong>NRP:</strong> <?php echo $nrp; ?></li>
        <li><strong>Kelas:</strong> A</li>
        <li><strong>Jenis Kelamin:</strong> Pria</li>
        <li><strong>Agama:</strong> Islam</li>
        <li><strong>Tempat/Tanggal Lahir:</strong> Surabaya, 01 Januari 2000</li>
        <li><strong>Alamat:</strong> Jl. Contoh No.1</li>
        <li><strong>Riwayat Pendidikan:</strong></li>
        <ul>
            <li>SD: SD Negeri 1</li>
            <li>SMP: SMP Negeri 2</li>
            <li>SMA: SMA Negeri 3</li>
        </ul>
        <li><strong>Email:</strong> contoh@email.com</li>
        <li><strong>Homepage:</strong> www.example.com</li>
        <li><strong>Hobby:</strong> Membaca</li>
        <li><strong>Interest:</strong> Komputer, Sport</li>
    </ul>

    <a href="logout.php">Logout</a>
</body>
</html>