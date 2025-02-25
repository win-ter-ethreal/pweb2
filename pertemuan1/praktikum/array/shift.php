<?php
$rokok = ["Samsu", "Esse", "Kretek", "Marlong", "Garpit"];

// menghapus elemen pertama
$awal = array_shift($rokok);

// hasil
echo "Rokok yang dihapus : $awal <br>";
echo "Array setelah shift <br>";
foreach ($rokok as $r) {
    echo"$r<br>";
}
?>