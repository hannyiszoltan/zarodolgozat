<?php
session_start();
include "db_connection.php";


$code="sajt";

$email=$_POST["login_email"];
$password=$_POST["login_password"];


$coded_password=md5($password.$code);


if (isset($conn)) {
    if (!$conn)
    {
        echo"MySql felszolgáló hiba!";
        exit(-1);
    }
    else
    {
        $sql="SELECT * FROM users WHERE users_email=\"$email\" AND users_password=\"$coded_password\"";


        $result=$conn->query($sql);
        $rownumber=mysqli_num_rows($result);

        if ($rownumber==1)
        {
            while($row=mysqli_fetch_array($result)){
                $_SESSION["id"]=$row['users_id'];
                $_SESSION["username"]=$row['users_name'];
                $_SESSION["email"]=$row['users_email'];
                $_SESSION["admin"]=$row['users_admin'];

                if ($_SESSION["admin"]==1){
                    mysqli_close($conn);
                    header("Location: ../admin_main_page.php");
                }
                else{
                    mysqli_close($conn);
                    header("Location: ../main_page.php");
                }

            }

        }
        else
        {
            session_destroy();
            mysqli_close($conn);
            header("Location: ../main_page.php");
        }

    }
}
?>



