<?php
function tambahMatriks($matriks1, $matriks2) {
    $hasil = [];
    for ($i = 0; $i < 2; $i++) {
        for ($j = 0; $j < 2; $j++) {
            $hasil[$i][$j] = $matriks1[$i][$j] + $matriks2[$i][$j];
        }
    }
    return $hasil;
}

// Definisi Matriks 2x2
$matriksA = [
    [1, 2],
    [3, 4]
];

$matriksB = [
    [5, 6],
    [7, 8]
];

// Menjumlahkan Matriks
$hasilMatriks = tambahMatriks($matriksA, $matriksB);

// Menampilkan hasil
echo "Hasil Penjumlahan Matriks:<br>";
for ($i = 0; $i < 2; $i++) {
    for ($j = 0; $j < 2; $j++) {
        echo $hasilMatriks[$i][$j] . " ";
    }
    echo "<br>";
}
?>
