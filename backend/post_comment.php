<?php
session_start();
include "db_connection.php";

$comment_film_id=$_POST["comment_film_id"];
$review_value=$_POST["review_value"];
$comment=$_POST["comment"];
$user_id=$_SESSION["id"];


$error="";

if ($comment=="")
    $error.="A komment megadása kötelező!";

if ($review_value<1||$review_value>10)
    $error.="1-től 10-ig értékeld a filmet!";

if ($error!="")
    echo "<SCRIPT> 
            window.location.replace('../admin_main_page.php');
            
            alert('$error')

            </SCRIPT>";

else{
    if (isset($conn)) {
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else{
            $sql="SELECT * FROM review WHERE review_film_id=$comment_film_id and review_user_id=$user_id";

            $query=mysqli_query($conn, $sql) or die(mysqli_error($conn));

            if(mysqli_num_rows($query) == 0){
                $sql="INSERT INTO review (review_film_id, review_value, review_content, review_user_id) VALUES ($comment_film_id,$review_value,'$comment',$user_id)";

                mysqli_query($conn, $sql) or die(mysqli_error($conn));

                header("Location: ../admin_main_page.php");
            }
            else {
                echo "Már van kommented!";

            }
        }

    }
}
?>