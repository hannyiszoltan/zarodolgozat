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
            $sql="INSERT INTO favorite (favorite_film_id, favorite_user_id) VALUES ($favorite_film_id,$user_id)";

            mysqli_query($conn, $sql) or die(mysqli_error($conn));
            header("Location: ../admin_main_page.php");
        }
}
?>