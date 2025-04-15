<?php
require_once 'koneksi.php';

// 4. Definisi Query
$sql = "SELECT * FROM mahasiswa order by thn_masuk desc";

// 5. Eksekusi Query
$rs = $dbh->query($sql);

// Tampilkan hasil Query
foreach($rs as $row){
    echo "<br>".$row->nim . '_'. $row->nama;
}
?>