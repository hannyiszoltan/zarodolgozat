<?php
include "kapcsolat.php";
$kod="sajt";

$email=$_POST["login_email"];
$password=$_POST["login_password"];

$kodolt_jelszo=md5($password.$kod);

if (isset($kapcsolat)) {
    if (!$kapcsolat)
    {
        echo"MySql felszolgáló hiba!";
        exit(-1);
    }
    else
    {
        $sql="SELECT count(*) FROM felhasznalok WHERE felhasznalok_email=\"$email\" AND felhasznalok_jelszo=\"$kodolt_jelszo\"";

        $ered=$kapcsolat->query($sql);
        $sor=mysqli_fetch_array($ered);

        if ($sor[0]==1)
        {
            echo "Gratulálok bejelentkeztél!";
        }
        else
        {
            echo "Ez nem jött össze!";
        }
    }
}
?>