<?php

$server="host";
$db_username="username";
$db_password="password";
$con = mysql_connect($server,$db_username,$db_password);
if(!$con){
die("can't connect".mysql_error());
}
mysql_select_db('DBname',$con);

?>