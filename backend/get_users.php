<?php
include "./db_connection.php";

$sql = "SELECT users_id,users_name,users_admin FROM users";

if (isset($conn)) {
    $result = mysqli_query($conn, $sql);
}


//echo "<h1>Ez a szöveg is átmegy</h1>";
$output=array();

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["film_cim"]. " - Name: " . $row["film_ev"]. " " . $row["film_kiado_id"]. "<br>";
        array_push($output,$row);
    }

    echo json_encode($output);

} else {
    echo 0;
}

mysqli_close($conn);
?>