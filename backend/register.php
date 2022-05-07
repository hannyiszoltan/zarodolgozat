<?php
include "db_connection.php";
$code="sajt";

$username=$_POST["reg_username"];
$email=$_POST["reg_email"];
$password1=md5($_POST["reg_password1"].$code);
$password2=md5($_POST["reg_password2"].$code);
$error="";


//megadta a felhasználónevet?
if ($username=="")
    $error.="A felhasználónév megadása kötelező!<br>";
//megadta az emailt?
if ($email=="")
    $error.="Az e-mail cím megadása kötelező!<br>";

//Jelszó/jelszavak hosszúsága
if ($password1=="")
    $error.="A Jelszó megadása kötelező!<br>";

//Egyezik-e a két jelszó
if ($password1!=$password2)
    $error.="A két jelszó nem megegyező!<br>";

//Lehetséges-e a regisztráció?
if ($error!="")
    echo $error;
else{

    // Check connection
    if (isset($conn)) {
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else
        {
            $sql="INSERT INTO users (users_name, users_password, users_email, users_admin) VALUES ('$username','$password1','$email','0')";

            mysqli_query($conn, $sql);
            header("Location: ../main_page.php");

        }
    }
}

?>
