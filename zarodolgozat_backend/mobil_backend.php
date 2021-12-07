<?php
include "kapcsolat.php";
header("Content-type: Application/json; charset=utf8");

$sql = "SELECT * FROM film_adatok";
if (isset($conn)) {
    $result = mysqli_query($conn, $sql);
}

//echo "<h1>Ez a sz�veg is �tmegy</h1>";
$kimenet=array();

if (isset($result)) {
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            //echo "id: " . $row["film_cim"]. " - Name: " . $row["film_hossz"]. " " . $row["film_id"]. "<br>";
            array_push($kimenet,$row);
        }

        echo json_encode($kimenet,JSON_UNESCAPED_UNICODE);

    } else {
        echo 0;
    }
}

mysqli_close($conn);