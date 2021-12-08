<?php
session_start();
include "kapcsolat.php";


$kod="sajt";

$email=$_POST["login_email"];
$password=$_POST["login_password"];

$kodolt_jelszo=md5($password.$kod);

if (isset($conn)) {
    if (!$conn)
    {
        echo"MySql felszolgáló hiba!";
        exit(-1);
    }
    else
    {
        $sql="SELECT count(*) FROM felhasznalok WHERE felhasznalok_email=\"$email\" AND felhasznalok_jelszo=\"$kodolt_jelszo\"";

        $ered=$conn->query($sql);
        $sor=mysqli_fetch_array($ered);

        if ($sor[0]==1)
        {
            $_SESSION["email"]=$email;
            header("Location: ../kezdolap.php");
        }
        else
        {
            session_destroy();
        }
    }
}
?>



