<?php
$host="localhost";
$user="root";
$pass="";
$dbnama="gdb0101";
$con = mysqli_connect($host, $user, $pass, $dbnama);
// mysqli_select_db($dbnama); 
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>