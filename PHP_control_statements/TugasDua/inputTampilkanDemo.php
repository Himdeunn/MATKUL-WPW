<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $angka = isset($_POST['angka']) ? intval($_POST['angka']) : 0;
    $perintah = isset($_POST['perintah']) ? $_POST['perintah'] : '';

    echo "<h2>Demo Perpindahan</h2>";
    echo "Menampilkan angka dari 0 sampai $angka <br>";
    echo "Dengan perintah $perintah <br><br>";
    echo "Bilangan deretnya: ";

    for ($i = 0; $i <= $angka; $i++) {
        if ($perintah == "continue" && $i == 2) {
            continue;
        }
        if ($perintah == "break" && $i == 5) {
            break;
        }
        if ($perintah == "return" && $i == 7) {
            echo "$i, ";
            return;
        }
        if ($perintah == "exit" && $i == 3) {
            echo "$i, ";
            exit;
        }
        echo "$i, ";
    }

    echo "Looping Selesai";
}
?>

<br>
<br>
<br>
<a href="inputDemo.php"><button>Kembali</button></a>
