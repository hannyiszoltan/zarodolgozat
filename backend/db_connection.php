<?php
$host="localhost:3306";
$user="root";
$pass="";
$db="film";


$conn=mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8");
?>