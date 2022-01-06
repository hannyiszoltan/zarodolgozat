<?php
include "kapcsolat.php";
header("Content-type: Application/json; charset=utf8");

$film_data = "SELECT * FROM film_adatok";

if (isset($conn)) {
    $data_result = mysqli_query($conn, $film_data);
}


$film_data_array=array();

if (isset($data_result)) {
    if (mysqli_num_rows($data_result) > 0) {

        while($row = mysqli_fetch_assoc($data_result)) {
            //echo "id: " . $row["film_cim"]. " - Name: " . $row["film_hossz"]. " " . $row["film_id"]. "<br>";
            array_push($film_data_array,$row);
        }

        echo json_encode($film_data_array,JSON_UNESCAPED_UNICODE);

    } else {
        echo 0;
    }
}




mysqli_close($conn);

?>