<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname = "localhost";
$database = "u201417513_main";
$username = "u201417513_main";
$password = "JFA8kcEGFTMBPy";
date_default_timezone_set("Asia/Bangkok");
$conn = mysqli_connect($hostname, $username, $password, $database) or die('Could not connect: ' . mysqli_connect_error());
mysqli_query($conn,"SET time_zone = '+7:00'") or die('Could not set time zone');
mysqli_select_db($conn,$database) or die('Could not select database');
//mysqli_query( $conn,"SET NAMES UTF8");
// mysql_query("SET NAMES TIS-620");


?>