<?php
$mysql_hostname = "db4free.net:3307";
$mysql_user = "carlos";
$mysql_password = "admin123";
$mysql_database = "elecciones";
$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");

?>