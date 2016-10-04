<?php
include("config.php");

$ip=$_SERVER['REMOTE_ADDR']; 

$id=$_POST['radiobutton'];

$ip_sql=mysql_query("select ip from vote_ip where vote_fk='$id' and ip='$ip'");
$count=mysql_num_rows($ip_sql);

if($count==0)
{
$sql = "update vote set vote=vote+1  where id='$id'";
mysql_query( $sql);
$sql_in = "insert into vote_ip (vote_fk,ip) values ('$id','$ip')";
mysql_query( $sql_in);
header("location:index.php");
}
else
{
header("location:index.php");
}

?>