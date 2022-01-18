<?php
include "db_connection.php";

$film_title=$_POST["film_title"];
$film_length=$_POST["film_length"];
$film_description=$_POST["film_description"];
$film_review=0;

$error="";

if ($film_title=="")
    $error.="A film címének megadása kötelező!";
if ($film_length=="")
    $error.="A film hosszának megadása kötelező!";
if ($film_description=="")
    $error.="A film leírásának megadása kötelező!";

if ($error!="")
    echo $error;
else{
    if (isset($conn)) {
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else
        {
            mysqli_query($conn, "ANALYZE TABLE film_data");
            $result = mysqli_query($conn, "SHOW TABLE STATUS LIKE 'film_data'");
            $data = mysqli_fetch_assoc($result);
            $next_increment = $data['Auto_increment'];
            $image_name=$next_increment.".".pathinfo($_FILES['image']['name'] , PATHINFO_EXTENSION);
            echo $image_name;

            $sql="INSERT INTO film_data (film_title, film_length, film_review, film_description, film_image) VALUES ('$film_title','$film_length','$film_review','$film_description','$image_name')";

            mysqli_query($conn, $sql);
            header("Location: ../film_management.php");

        }
    }
}