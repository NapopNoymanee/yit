<?php 
$my_id = '1190403145518'; 


$base36 = base_convert($my_id, 10, 36); 
echo "เลขฐาน 32 ได้       ".$base36."<br>"; 

$base10 = base_convert($base36, 36, 10);
echo "เลขฐาน 10 ได้        ".$base10;

?>