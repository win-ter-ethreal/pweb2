<?php
$ar_buah = ["a"=>"apel", "m"=>"mangga", "s"=>"srikaya", "n"=>"nanas"];
 echo '<ol>';
 sort($ar_buah);
 echo '<hr/>';
 echo '</ol>';
 foreach ($ar_buah as $key => $value) {
    echo '<li>' . $key . ' - ' . $value . '</li>';
 }
 echo '<ol>';
 ?>