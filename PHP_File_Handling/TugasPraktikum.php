<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = "Nama: " . $_POST["nama"] . "\n";
    $data .= "NRP: " . $_POST["nrp"] . "\n";
    $data .= "Kelas: " . $_POST["kelas"] . "\n";
    $data .= "Jenis Kelamin: " . $_POST["gender"] . "\n";
    $data .= "Agama: " . $_POST["agama"] . "\n";
    $data .= "Tempat/Tanggal Lahir: " . $_POST["tempat_lahir"] . " / " . $_POST["tanggal_lahir"] . "\n";
    $data .= "Alamat: " . $_POST["alamat"] . "\n";
    $data .= "Riwayat Pendidikan:\n";
    $data .= "SD: " . $_POST["sd"] . "\n";
    $data .= "SMP: " . $_POST["smp"] . "\n";
    $data .= "SMA: " . $_POST["sma"] . "\n";
    $data .= "Email: " . $_POST["email"] . "\n";
    $data .= "Homepage: " . $_POST["homepage"] . "\n";
    $data .= "Hobby: " . $_POST["hobby"] . "\n";
    $data .= "Interest: " . implode(", ", $_POST["interest"] ?? []) . "\n";
    
    file_put_contents("data.txt", $data);
    header("Location: TampilkanData.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Praktikum</title>
</head>
<body>
    <form method="post">
        Nama: <input type="text" name="nama"><br>
        NRP: <input type="text" name="nrp"><br>
        Kelas: <input type="text" name="kelas"><br>
        Jenis Kelamin:
        <input type="radio" name="gender" value="Pria"> Pria
        <input type="radio" name="gender" value="Wanita"> Wanita<br>
        Agama: <input type="text" name="agama"><br>
        Tempat/Tanggal Lahir: <input type="text" name="tempat_lahir"> / <input type="text" name="tanggal_lahir"><br>
        Alamat: <textarea name="alamat"></textarea><br>
        Riwayat Pendidikan:<br>
        SD: <input type="text" name="sd"><br>
        SMP: <input type="text" name="smp"><br>
        SMA: <input type="text" name="sma"><br>
        Email: <input type="email" name="email"><br>
        Homepage: <input type="text" name="homepage"><br>
        Hobby: <textarea name="hobby"></textarea><br>
        Interest:<br>
        <input type="checkbox" name="interest[]" value="Komputer"> Komputer
        <input type="checkbox" name="interest[]" value="Sport"> Sport
        <input type="checkbox" name="interest[]" value="Travelling"> Travelling
        <input type="checkbox" name="interest[]" value="Writing"> Writing
        <input type="checkbox" name="interest[]" value="Reading"> Reading<br>
        <input type="submit" value="SIMPAN">
        <input type="reset" value="RESET">
    </form>
</body>
</html>
