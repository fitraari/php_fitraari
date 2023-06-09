<?php

// Soal 1A
// Modifikasi

$jml = $_GET['jml'];

$total = '';

for ($x = $jml; $x > 0; $x--) {
    for ($y = $x; $y > 0; $y--) {
        $z = ($y == 1) ? '-' : '';
        $total .= $y . $z;
    }
}

$arrTotal = explode('-', $total);
$arrTotalPop = array_pop($arrTotal);
$eachTotal = [];

for ($i = 0; $i < count($arrTotal); $i++) {
    $eachTotal[] = array_sum(str_split($arrTotal[$i]));
}

$result = array_reverse($eachTotal);

echo "<table border=1>\n";

for ($a = $jml; $a > 0; $a--) {
    echo "<tr><td colspan=$jml>TOTAL : " . $result[$a - 1] . "</td></tr>";
    echo "<tr>\n";
    for ($b = $a; $b > 0; $b--) {
        echo "<td>$b</td>";
    }
    echo "</tr>\n";
}

echo "</table>";
