<?php
session_start();
include "./db_connection.php";

//$data = json_decode(file_get_contents("php://input"));
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$input1 = $request->input1;
$input2 = $request->input2;
$input3 = $request->input3;
$input4 = $request->input4;

/*$bevitel1=$_POST["bevitel1"];
$bevitel2=$_POST["bevitel2"];*/


/*törölni az üzeneteket
$sql = "delete from film_data where film_id=$bevitel1";
if (isset($conn)) {
    mysqli_query($conn, $sql);
}*/

//módosítani a film adatait
$sql = "update film_data set film_title='$input2',film_length=$input3,film_description='$input4' where film_id=$input1";

if (isset($conn)) {
    if (mysqli_query($conn, $sql)) {
        echo 1;
    } else {
        echo 0;
    }
}

mysqli_close($conn);
?>