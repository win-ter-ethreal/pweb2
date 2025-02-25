<?php
$laptop = ["Asus", "Lenovo", "Dell", "Realme"];

// menambahkan elemen di awal
array_unshift($laptop, "HP", "Acer");

// hasil
echo "Hasil";
foreach ($laptop as $p){
    echo"<br>".$p;
}
?>