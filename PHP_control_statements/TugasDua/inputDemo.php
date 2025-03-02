<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Perpindahan</title>
</head>
<body>
    <h2>Demo-Perpindahan</h2>
    <form action="inputTampilkanDemo.php" method="post">
        <label>Masukkan angka maksimal perulangan:</label>
        <input type="number" name="angka" required>
        <br><br>
        
        <label>Pilih perintah:</label><br>
        <input type="radio" name="perintah" value="continue"> Continue<br>
        <input type="radio" name="perintah" value="break"> Break<br>
        <input type="radio" name="perintah" value="return"> Return<br>
        <input type="radio" name="perintah" value="exit"> Exit<br>
        
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
