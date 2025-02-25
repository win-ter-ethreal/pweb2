<?php
$ar_buah = ["semangka", "apel", "mangga", "matoa"];

echo "buah ke 2 adalah $ar_buah[2]";

echo "<br>jumlah array: ". count($ar_buah);

echo '<ol>';
foreach($ar_buah as $_buah){
    echo '<li>'.$_buah. '</li>';
}

echo '</ol>';
$ar_buah[]="nanas";

unset($ar_buah[1]);

$ar_buah[4]="picang";

echo'<ul>';
foreach($ar_buah as $ak => $av){
    echo'<li>index:'.$ak. '- nama buah : '.$av.'</li>';
}

echo '</ul>';
?>