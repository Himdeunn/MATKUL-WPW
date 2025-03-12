<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header("Location: MasukanData.php");
    exit();
}

$data = file("data.txt", FILE_IGNORE_NEW_LINES);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tampilkan Data</title>
</head>
<body>
    <h2>Data yang Dimasukkan</h2>
    <?php if (empty($data)): ?>
        <p>Tidak ada data yang tersedia.</p>
    <?php else: ?>
        <table border="1">
            <tr>
                <th>Nama</th>
                <th>NRP</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Pendidikan SD</th>
                <th>Pendidikan SMP</th>
                <th>Pendidikan SMA</th>
                <th>Email</th>
                <th>Homepage</th>
                <th>Hobby</th>
                <th>Interest</th>
            </tr>
            <?php foreach ($data as $line): 
                $row = explode("|", $line);
            ?>
                <tr>
                    <?php foreach ($row as $value): ?>
                        <td><?php echo htmlspecialchars($value); ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <form method="POST">
        <button type="submit">LOGOUT</button>
    </form>
</body>
</html>
