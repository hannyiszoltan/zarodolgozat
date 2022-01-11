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
        $sql="SELECT * FROM felhasznalok WHERE felhasznalok_email=\"$email\" AND felhasznalok_jelszo=\"$kodolt_jelszo\"";


        $ered=$conn->query($sql);
        $sorokszama=mysqli_num_rows($ered);

        if ($sorokszama==1)
        {
            while($sor=mysqli_fetch_array($ered)){
                $_SESSION["id"]=$sor['felhasznalok_id'];
                $_SESSION["username"]=$sor['felhasznalok_nev'];
                $_SESSION["email"]=$sor['felhasznalok_email'];
                $_SESSION["admin"]=$sor['felhasznalok_admin'];

                if ($_SESSION["admin"]==1){
                    header("Location: ../admin_kezdolap.php");
                }
                else{
                    header("Location: ../kezdolap.php");
                }

            }


        }
        else
        {
            session_destroy();
            header("Location: ../kezdolap.php");
            alert("Nem sikerült bejelentkezni, próbáld újra!");
        }
    }
}
?>



