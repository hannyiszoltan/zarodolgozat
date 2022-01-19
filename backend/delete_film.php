<?php
session_start();
include "./db_connection.php";

$data = json_decode(file_get_contents("php://input"));
$bevitel1 = $data->bevitel1;


/*törölni az üzeneteket
$sql = "delete from film_data where film_id=$bevitel1";
if (isset($conn)) {
    mysqli_query($conn, $sql);
}*/

//törölni a felhasználót
$sql = "DELETE FROM film_data WHERE film_id=$bevitel1";

if (isset($conn)) {
    if (mysqli_query($conn, $sql)) {
        echo 1;
    } else {
        echo 0;
    }
}

mysqli_close($conn);
?>