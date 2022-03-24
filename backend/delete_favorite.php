<?php
session_start();
include "db_connection.php";

$favorite_film_id=$_POST["favorite_film_id"];
$user_id=$_SESSION["id"];



if (isset($conn)) {
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else
    {
        $sql="DELETE FROM `favorite` WHERE favorite_film_id=$favorite_film_id and favorite_user_id=$user_id";

        mysqli_query($conn, $sql) or die(mysqli_error($conn));
        header("Location: ../favorites.php");
    }
}
?>