<?php
session_start();
include "./db_connection.php";
$id=$_POST['id'];


//törölni a felhasználót
$sql = "delete from review where review_id=$id";

if (isset($conn)) {
    if (mysqli_query($conn, $sql)) {
        header('Location: ../admin_main_page.php');
    } else {
        echo"Sikertelen komment törlés";
    }
}

mysqli_close($conn);
?>