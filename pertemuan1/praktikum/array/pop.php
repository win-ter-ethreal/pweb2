<?php
$siswa = ["rian", "mamas", "winter", "jawa"];
//menampilkan array awal
echo "array awal : \n";
print_r($siswa);

//menghapus element terakhir
$orang_terakhir = array_pop($siswa);

//menampilkan element array yang hapus
eccho "array setelah penghapusan" .$orang_terakhir. "\n";

//menampilkan array setelah di hapus
echo "<br>Elemen yang akan dihapus " $orang_terakhir.

//menampilkan 
echo "<br>array setelah penghapusan : <br>";
print_r($siswa);
?>