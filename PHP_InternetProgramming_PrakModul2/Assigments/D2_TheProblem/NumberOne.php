<?php
function hitungMaxDanRata($data) {
    $max = max($data);
    $rata_rata = array_sum($data) / count($data);
    return array("max" => $max, "rata" => $rata_rata);
}

// Input Data
$data = array(4, 6, 2);
$hasil = hitungMaxDanRata($data);

// Output
echo "Input Data: <br>";
foreach ($data as $key => $value) {
    echo "Data $key : $value <br>";
}
echo "<br>Output Data:<br>";
echo "Max : " . $hasil["max"] . "<br>";
echo "Rata-rata : " . $hasil["rata"];
?>
