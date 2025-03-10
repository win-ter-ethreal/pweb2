<?php 
/*
fungsi salam dengan parameter $nama
*/
 function salam($nama="Nurul Fikri"){
    echo "Hello, selamat datang! ".$nama;
 }
?>
<h1>Belajar Fungsi</h1>
<?php 
    salam("Mahmud");
    echo "<br>";
    salam();
?>
