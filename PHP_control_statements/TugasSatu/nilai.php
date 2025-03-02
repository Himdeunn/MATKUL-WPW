<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nilai</title>
</head>
<body>
    <h2>Form Input Nilai</h2>
    <form action="tampilkan_nilai.php" method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="nrp">NRP:</label>
        <input type="text" id="nrp" name="nrp" required><br><br>

        <label for="nilai">Nilai Angka:</label>
        <input type="number" id="nilai" name="nilai" required><br><br>

        <button type="submit">Kirim</button>
        <button type="reset">Clear</button>
    </form>
</body>
</html>
