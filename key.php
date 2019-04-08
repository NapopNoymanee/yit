<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_MyConcect = "https://auth-db179.hostinger.in.th/";
$database_MyConcect = "u201417513_main";
$username_MyConcect = "u201417513_main";
$password_MyConcect = "JFA8kcEGFTMBPy";
$MyConcect = mysql_connect($hostname_MyConcect, $username_MyConcect, $password_MyConcect, $database_MyConcect);
mysql_query("SET NAMES UTF8");
// mysql_query("SET NAMES TIS-620");


?>