<?php
session_start();
include "db_connection.php";
header("Content-type: Application/json; charset=utf8");

$id = $_GET['id'];
$user_id=$_SESSION['id'];

$film_comments="SELECT review_id, users_name, review_content FROM review INNER JOIN users ON review.review_user_id=users.users_id WHERE review_film_id='$id'";

if (isset($conn)) {
    $comments_result=mysqli_query($conn,$film_comments);
}


$film_comments_array=array();

if (isset($comments_result)) {
    if (mysqli_num_rows($comments_result) > 0) {

        while($row = mysqli_fetch_assoc($comments_result)) {
            //echo "id: " . $row["film_cim"]. " - Name: " . $row["film_hossz"]. " " . $row["film_id"]. "<br>";
            array_push($film_comments_array,$row);
        }

        echo json_encode($film_comments_array,JSON_UNESCAPED_UNICODE);

    } else {
        echo 0;
    }
}

mysqli_close($conn);
?>