<?php
include("header.php");

function kalkulator($data) {
    $bil1 = $data["bil1"];
    $bil2 = $data["bil2"];
    $operator = $data["operator"];
    $hasil = 0;

    switch ($operator) {
        case '+':
            $hasil = $bil1 + $bil2;
            break;
        case '-':
            $hasil = $bil1 - $bil2;
            break;
        case '*':
            $hasil = $bil1 * $bil2;
            break;
        case '/':
            $hasil = ($bil2 != 0) ? $bil1 / $bil2 : "Error (Pembagian oleh nol)";
            break;
        default:
            $hasil = "Operator tidak dikenali";
    }

    return $hasil;
}

// Input Data
$data = array(
    "bil1" => 4,
    "bil2" => 7,
    "operator" => "+"
);

$hasil = kalkulator($data);

// Output
echo "Bil 1: " . $data["bil1"] . "<br>";
echo "Bil 2: " . $data["bil2"] . "<br>";
echo "Operator: " . $data["operator"] . "<br>";
echo "Hasil: " . $data["bil1"] . " " . $data["operator"] . " " . $data["bil2"] . " = " . $hasil;

include("footer.php");
?>
