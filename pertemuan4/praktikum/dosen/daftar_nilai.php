<?php 
require_once 'nilai_mahasiswa.php';


$data_mhs =[];


///data awal
$data_mhs[] = new NilaiMahasiswa("hakim", "pemrograman web", 85, 25, 30);
$data_mhs[] = new NilaiMahasiswa("siti", "pemrograman web", 23, 32, 54);
$data_mhs[] = new NilaiMahasiswa("mamas", "pemrograman web", 75, 89, 90);

?>





<h3>Input data mahasiswa</h3>
<form action="POST" action="">
    <label for="">nama</label>
    <input type="text" name="nama" id=""><br><br>
    <label for="">matakuliah</label>
    <input type="text" name="matakuliah" id=""><br><br>
    <label for="">nilai uts</label>
    <input type="number" name="nilai_uts" id=""><br><br>
    <label for="">nilai uas</label>
    <input type="number" name="nilai_uas" id=""><br><br>
    <label for="">nilai tugas</label>
    <input type="number" name="nilai_tugas" id=""><br><br>
    <input type="submit" value="Simpan">
</form>

<h3>Daftar Nilai mahasiswa</h3>
<table border="1" cellpadding="5" width="100%">
<thead>
    <tr>
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>Mata Kuliah</th>
        <th>Nilai UTS</th>
        <th>Nilai UAS</th>
        <th>Nilai Tugas</th>
        <th>Nilai Akhir</th>
        <th>Nilai Kelulusan</th>
    </tr>
</thead>

<tbody>
    <?php
    $nomor = 1;
    foreach($data_mhs as $mhs){
        echo "<tr>";
        echo "<td>$nomor</td>";
        echo "<td>$mhs->nama</td>";
        echo "<td>$mhs->matakuliah</td>";
        echo "<td>$mhs->nilai_uts</td>";
        echo "<td>$mhs->nilai_uas</td>";
        echo "<td>$mhs->nilai_tugas</td>";
        echo "<td>" . number_format($mhs->getNA(), 2). "</td>";
        echo "<td>".$mhs->kelulusan()."</td>";
        echo "</tr>";
        $nomor++;
    }
    ?>
</tbody>
</table>