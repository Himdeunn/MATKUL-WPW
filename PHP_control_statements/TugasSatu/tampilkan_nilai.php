<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Konversi Nilai</title>
</head>
<body>
    <h2>Hasil Konversi Nilai</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["nama"];
        $nrp = $_POST["nrp"];
        $nilai = (int) $_POST["nilai"];

        if ($nilai >= 0 && $nilai <= 40) {
            $nilaiHuruf = "E";
            $predikat = "Sangat Tidak Memuaskan";
        } elseif ($nilai >= 41 && $nilai <= 55) {
            $nilaiHuruf = "D";
            $predikat = "Tidak Memuaskan";
        } elseif ($nilai >= 56 && $nilai <= 60) {
            $nilaiHuruf = "C";
            $predikat = "Cukup";
        } elseif ($nilai >= 61 && $nilai <= 65) {
            $nilaiHuruf = "BC";
            $predikat = "Lebih Dari Cukup";
        } elseif ($nilai >= 66 && $nilai <= 70) {
            $nilaiHuruf = "B";
            $predikat = "Baik";
        } elseif ($nilai >= 71 && $nilai <= 80) {
            $nilaiHuruf = "AB";
            $predikat = "Sangat Baik";
        } elseif ($nilai >= 81 && $nilai <= 100) {
            $nilaiHuruf = "A";
            $predikat = "Sempurna";
        } else {
            $nilaiHuruf = "Tidak Mungkin";
            $predikat = "Nilai di luar batas!";
        }

        echo "<p><strong>Nama:</strong> $nama</p>";
        echo "<p><strong>NRP:</strong> $nrp</p>";
        echo "<p><strong>Nilai Angka:</strong> $nilai</p>";
        echo "<p><strong>Nilai Huruf:</strong> $nilaiHuruf</p>";
        echo "<p><strong>Predikat:</strong> $predikat</p>";
    }
    ?>

    <br>
    <a href="nilai.php"><button>Kembali</button></a>
</body>
</html>
