<?php
include "./db_connection.php";

$sql = "SELECT users_id,users_name,users_admin FROM users";

if (isset($conn)) {
    $result = mysqli_query($conn, $sql);
}

$output=array();

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {

        array_push($output,$row);
    }

    echo json_encode($output);

} else {
    echo 0;
}

mysqli_close($conn);
?>