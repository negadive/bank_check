<?php
$host="localhost";
$user="root";
$pass="";
$dbnama="seal_member";
mysql_connect($host, $user, $pass)or die ("Database Account tidak dapat di akses....!!!");
mysql_select_db($dbnama); 
?>