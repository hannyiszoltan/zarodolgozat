<?php
session_start();
include "db_connection.php";

$favorite_film_id=$_POST["favorite_film_id"];
$user_id=$_SESSION["id"];



if (isset($conn)) {
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
        else{
            $sql="SELECT * FROM favorite WHERE favorite_film_id=$favorite_film_id and favorite_user_id=$user_id";

            $query=mysqli_query($conn, $sql) or die(mysqli_error($conn));

            echo "Már a kedvencekhez adtad!";
            if (mysqli_num_rows($query) <= 0){
                $sql="INSERT INTO favorite (favorite_film_id, favorite_user_id) VALUES ($favorite_film_id,$user_id)";

                mysqli_query($conn, $sql) or die(mysqli_error($conn));
                header("Location: ../admin_main_page.php");
            }
        }

}
?>