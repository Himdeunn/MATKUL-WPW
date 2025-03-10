<?php
if (file_exists("data.txt")) {
    $data = file_get_contents("data.txt");
} else {
    $data = "Data tidak ditemukan.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tampilkan Data</title>
</head>
<body>
    <h2>Data yang Disimpan</h2>
    <pre><?php echo htmlspecialchars($data); ?></pre>
    <br>
    <a href="TugasPraktikum.php">
        <button>Kembali</button>
    </a>
</body>
</html>
