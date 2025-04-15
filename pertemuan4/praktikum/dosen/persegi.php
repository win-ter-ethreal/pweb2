<?php

// class persegi panjang
class persegipanjang {
    public $panjang;
    public $lebar;

    //kontruktor persegi panjang
    function __construct($panjang, $lebar) {
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }

    //method untuk menghitung luas
    function getluas(){
        $luasPP = $this->panjang * $this->lebar;
        return $luasPP;
    }

    //method hitung keliling
    function getkeliling() {
        $kelilingPP = 2 * ($this->panjang + $this->lebar);
        return $kelilingPP;
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="section">
        <h2>contoh penggunaan persegi panjang</h2>

        <?php
        $PP = new persegipanjang(10, 8);
        echo "panjang : ". $PP->panjang. "<br>";
        echo "lebar : ". $PP->lebar. "<br>";
        echo '<hr>';
        echo "luas : ". $PP->getluas(). "<br>";
        echo "keliling : ". $PP->getkeliling(). "<br>";
        ?>
        
    </div>



</body>
</html>