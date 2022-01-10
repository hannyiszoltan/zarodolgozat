<?php
include "./kapcsolat.php";

$sql = "SELECT felhasznalok_id,felhasznalok_nev,felhasznalok_admin FROM felhasznalok";

if (isset($conn)) {
    $result = mysqli_query($conn, $sql);
}


//echo "<h1>Ez a szöveg is átmegy</h1>";
$kimenet=array();

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["film_cim"]. " - Name: " . $row["film_ev"]. " " . $row["film_kiado_id"]. "<br>";
        array_push($kimenet,$row);
    }

    echo json_encode($kimenet);

} else {
    echo 0;
}

mysqli_close($conn);
?>