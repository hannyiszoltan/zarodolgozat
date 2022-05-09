<?php
session_start();
include "db_connection.php";
header("Content-type: Application/json; charset=utf8");

$user_id=$_SESSION["id"];

$film_data = "SELECT * FROM `film_data` LEFT JOIN favorite ON film_data.film_id=favorite.favorite_film_id ORDER BY favorite_user_id=$user_id DESC;";

if (isset($conn)) {
    $data_result = mysqli_query($conn, $film_data);
}

$film_data_array=array();

if (isset($data_result)) {
    if (mysqli_num_rows($data_result) > 0) {

        while($row = mysqli_fetch_assoc($data_result)) {
            array_push($film_data_array,$row);
        }

        echo json_encode($film_data_array,JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);

    } else {
        echo 0;
    }
}

mysqli_close($conn);

?>
