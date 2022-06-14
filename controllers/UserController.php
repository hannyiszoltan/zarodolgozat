<?php
session_start();

include_once "includers/database.inc.php";


function login($email, $password){
    global $conn;
    $code="sajt";
    $coded_password=md5($password.$code);

    $sql = "SELECT * FROM users WHERE users_email=\"$email\" AND users_password=\"$coded_password\"";

    if(isset($conn)){
            $result=$conn->query($sql);
            $rownumber=mysqli_num_rows($result);
        if ($rownumber==1)
        {
            while($row=mysqli_fetch_array($result)){
                $_SESSION["id"]=$row['users_id'];
                $_SESSION["username"]=$row['users_name'];
                $_SESSION["email"]=$row['users_email'];
                $_SESSION["admin"]=$row['users_admin'];

                mysqli_close($conn);
                header("Location: ./main_page.php");
                
            }

        }
        else
        {
            echo "
            <script>
            let loginModal = new bootstrap.Modal(document.getElementById('bejelentkezes'), {});
            loginModal.show();
            </script>
            <h4 style='text-align: center; color: red;'>Nem megfelelő E-mail cím, vagy jelszó!</h4>";
        }
    }

    mysqli_close($conn);
}


function register($uname, $email, $password, $isPasswordSame) {
    global $conn;
    $code="sajt";
    $codedPassword=md5($password.$code);
    $codedIsPasswordSame=md5($isPasswordSame.$code);

    $error="";

    //megadta a felhasználónevet?
    if ($uname=="")
        $error.="A felhasználónév megadása kötelező!<br>";
    //megadta az emailt?
    if ($email=="")
        $error.="Az e-mail cím megadása kötelező!<br>";

    //Jelszó/jelszavak hosszúsága
    if ($password=="")
        $error.="A Jelszó megadása kötelező!<br>";

    //Egyezik-e a két jelszó
    if ($password!=$isPasswordSame)
        $error.="A két jelszó nem megegyező!<br>";

    //Lehetséges-e a regisztráció?
    if ($error!="") {
        echo "<script>
        let registerModal = new bootstrap.Modal(document.getElementById('regisztracio'), {});
        registerModal.show();
        </script>
        <h4 style='text-align: center; color: red;'>$error</h4>";
        exit();
    }
    else{

        $sql = "INSERT INTO users (users_name, users_password, users_email, users_admin) VALUES ('$uname','$codedPassword','$email','0')";
        // Check connection
        if (isset($conn)) {
                if(mysqli_query($conn, $sql)) {
                    login($email, $password);
                    exit();
                }
                else{
                    echo "<h4 style='text-align: center; color: red;'>Sikertelen regisztráció!</h4>";
                }
                
        }
    }
    mysqli_close($conn);
}


function AllUser(){
    global $conn;

    header("Content-type: application/json; charset=utf8");

    $sql = "SELECT * FROM users";

    if (isset($conn)) {
        $data_result = mysqli_query($conn, $sql);
    }
    
    $user_data_array=array();
    
    if (isset($data_result)) {
        if (mysqli_num_rows($data_result) > 0) {
    
            while($row = mysqli_fetch_assoc($data_result)) {
                array_push($user_data_array,$row);
            }
    
            echo json_encode($user_data_array, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
    
        } else {
            echo 0;
        }
    }
    mysqli_close($conn);
}


function DeleteUser($userid){
    global $conn;


    //törölni az üzeneteket
    $sql1 = "DELETE FROM review WHERE review_user_id=$userid";
    if (isset($conn)) {
        mysqli_query($conn, $sql1);
    }

    //törölni a kedvenceket
    $sql2 = "DELETE FROM favorite WHERE favorite_user_id=$userid";
    if (isset($conn)) {
        mysqli_query($conn, $sql2);
    }

    //törölni a felhasználót
    $sql3 = "DELETE FROM users WHERE users_id=$userid";
    if (isset($conn)) {
        if (mysqli_query($conn, $sql3)) {
            echo 1;
        } else {
            echo 0;
        }
    }


    mysqli_close($conn);
}

function AdminChange($userid,$useradmin){
    global $conn;

    $sql1 = "update users set users_admin=1 where users_id=$userid";
    $sql2 = "update users set users_admin=0 where users_id=$userid";

    if($useradmin==0){
          //Rang módosítás fel
        if (isset($conn)) {
            if (mysqli_query($conn, $sql1)) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }else if($useradmin==1){
        if (isset($conn)) {
            if (mysqli_query($conn, $sql2)) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    mysqli_close($conn);

}

?>