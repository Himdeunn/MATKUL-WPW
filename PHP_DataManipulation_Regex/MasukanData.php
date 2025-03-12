<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    
    // Validasi Nama (Hanya Huruf, Huruf Awal Kapital)
    if (!preg_match("/^[A-Z][a-z]+( [A-Z][a-z]+)*$/", $_POST["nama"])) {
        $errors[] = "Nama harus berisi huruf saja, dan setiap kata harus diawali huruf kapital.";
    }

    // Validasi NRP (10 Digit, Format 211018xxx)
    if (!preg_match("/^211018(0[3-9]|[1-5][0-9]|60)[0-9]$/", $_POST["nrp"])) {
        $errors[] = "NRP harus 10 digit dengan format 211018xxx (xxx antara 031-060).";
    }

    // Validasi Tanggal Lahir (Format: dd-MMM-YYYY, Bulan dalam Bahasa Indonesia)
    if (!preg_match("/^\d{2}-(Jan|Feb|Mar|Apr|Mei|Jun|Jul|Agu|Sep|Okt|Nop|Des)-\d{4}$/", $_POST["tanggal_lahir"])) {
        $errors[] = "Tanggal lahir harus dalam format dd-MMM-YYYY (contoh: 04-Agu-2000).";
    }

    // Jika tidak ada error, simpan data ke file
    if (empty($errors)) {
        $data = implode("|", [
            $_POST["nama"],
            $_POST["nrp"],
            $_POST["kelas"],
            $_POST["jenis_kelamin"],
            $_POST["agama"],
            $_POST["tempat_lahir"],
            $_POST["tanggal_lahir"],
            $_POST["alamat"],
            $_POST["sd"],
            $_POST["smp"],
            $_POST["sma"],
            $_POST["email"],
            $_POST["homepage"],
            $_POST["hobby"],
            implode(",", $_POST["interest"] ?? [])
        ]);

        file_put_contents("data.txt", $data . PHP_EOL, FILE_APPEND);
        header("Location: TampilkanData.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Masukan Data</title>
</head>
<body>
    <h2>Masukan Data</h2>
    <?php if (!empty($errors)): ?>
        <ul style="color: red;">
            <?php foreach ($errors as $error) echo "<li>$error</li>"; ?>
        </ul>
    <?php endif; ?>
    
    <form method="POST" action="">
        Nama: <input type="text" name="nama" required><br>
        NRP: <input type="text" name="nrp" required><br>
        Kelas: <input type="text" name="kelas"><br>
        
        Jenis Kelamin:
        <input type="radio" name="jenis_kelamin" value="Pria" required> Pria
        <input type="radio" name="jenis_kelamin" value="Wanita" required> Wanita
        <br>

        Agama: 
        <select name="agama">
            <option value="ISLAM">ISLAM</option>
            <option value="KRISTEN">KRISTEN</option>
            <option value="HINDU">HINDU</option>
            <option value="BUDDHA">BUDDHA</option>
        </select>
        <br>

        Tempat/Tanggal Lahir: 
        <input type="text" name="tempat_lahir" placeholder="Tempat" required> /
        <input type="text" name="tanggal_lahir" placeholder="dd-MMM-YYYY" required><br>

        Alamat: <textarea name="alamat"></textarea><br>

        Riwayat Pendidikan:
        SD: <input type="text" name="sd"><br>
        SMP: <input type="text" name="smp"><br>
        SMA: <input type="text" name="sma"><br>

        Email: <input type="email" name="email"><br>
        Homepage: <input type="text" name="homepage"><br>
        Hobby: <input type="text" name="hobby"><br>

        Interest: 
        <input type="checkbox" name="interest[]" value="Komputer"> Komputer
        <input type="checkbox" name="interest[]" value="Sport"> Sport
        <input type="checkbox" name="interest[]" value="Travelling"> Travelling
        <input type="checkbox" name="interest[]" value="Writing"> Writing
        <input type="checkbox" name="interest[]" value="Reading"> Reading
        <br>

        <button type="submit">SIMPAN</button>
    </form>
</body>
</html>
