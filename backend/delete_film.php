<?php
session_start();
include "./db_connection.php";

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$input1 = $request->input1;
$input2 = $request->input2;

/*törölni az üzeneteket
$sql = "delete from film_data where film_id=$bevitel1";
if (isset($conn)) {
    mysqli_query($conn, $sql);
}*/

//törölni a felhasználót
$sql = "DELETE FROM film_data WHERE film_id=$input1";

if (isset($conn)) {
    if (mysqli_query($conn, $sql)) {
        if (!unlink("kepek/$input2")){
            echo ($input2);
        }
    } else {
        echo 0;
    }
}

mysqli_close($conn);
?>
