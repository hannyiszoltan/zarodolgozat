<?php
session_start();
include "db_connection.php";

$comment_film_id=$_POST["comment_film_id"];
$review_value=2;
$comment=$_POST["comment"];
$user_id=$_SESSION["id"];


$error="";

if ($comment=="")
    $error.="A komment megadása kötelező!";

if ($error!="")
    echo $error;
else{
    if (isset($conn)) {
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else
        {

            $sql="INSERT INTO review (review_film_id, review_value, review_content, review_user_id) VALUES ($comment_film_id,$review_value,'$comment',$user_id)";

            mysqli_query($conn, $sql) or die(mysqli_error($conn));
            header("Location: ../admin_main_page.php");
        }
    }
}
?>