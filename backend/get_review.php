<?php
include "db_connection.php";
header("Content-type: Application/json; charset=utf8");


$review_data = "SELECT review_film_id,AVG(review_value)AS'review_value' FROM review group by review_film_id;";

if (isset($conn)) {
    $data_result = mysqli_query($conn, $review_data);
}

$review_data_array=array();

if (isset($data_result)) {
    if (mysqli_num_rows($data_result) > 0) {

        while($row = mysqli_fetch_assoc($data_result)) {
            array_push($review_data_array,$row);
        }

        echo json_encode($review_data_array,JSON_UNESCAPED_UNICODE);

    } else {
        echo 0;
    }
}

mysqli_close($conn);

?>