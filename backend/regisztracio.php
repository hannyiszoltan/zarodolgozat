<?php
include "kapcsolat.php";
$kod="sajt";

$username=$_POST["reg_username"];
$email=$_POST["reg_email"];
$password1=md5($_POST["reg_password1"].$kod);
$password2=md5($_POST["reg_password2"].$kod);
$stay_loged=$_POST["stay_loged"];
$hiba="";


//megadta a felhasználónevet?
if ($username=="")
    $hiba.="A felhasználónév megadása kötelező!<br>";
//megadta az emailt?
if ($email=="")
    $hiba.="Az e-mail cím megadása kötelező!<br>";

//Jelszó/jelszavak hosszúsága
if ($password1=="")
    $hiba.="A Jelszó megadása kötelező!<br>";

//Egyezik-e a két jelszó
if ($password1!=$password2)
    $hiba.="A két jelszó nem megegyező!<br>";

if ($stay_loged!="ok")
    $hiba.="A felhasználási feltételek elfogadása kötelező!<br>";

//Lehetséges-e a regisztráció?
if ($hiba!="")
    echo $hiba;
else{

    // Check connection
    if (isset($conn)) {
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else
        {
            $sql="INSERT INTO felhasznalok (felhasznalok_nev, felhasznalok_jelszo, felhasznalok_email, felhasznalok_admin) VALUES ('$username','$password1','$email','0')";

            mysqli_query($conn, $sql);
            echo "Sikeres regisztráció";

        }
    }
}

?>