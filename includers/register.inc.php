<?php 
    include_once "controllers/UserController.php";
?>

<form method="POST" >
    <p>Felhasználónév: <input type="text" name="reg_username"></p>
    <p>E-mail: <input type="email" name="reg_email"></p>
    <p>Jelszó: <input type="password" name="reg_password"></p>

    <p>Jelszó újra: <input type="password" name="isRegPasswordSame"></p>

    <p><input type="submit" name="register_form" class="btn btn-primary" value="Regisztráció"></p>
    <p>login email: admin@admin.com</p>
    <p>login jelszó: admin</p>
</form>

<?php 
    if(isset($_POST["register_form"]))
    {
        $uname=$_POST['reg_username'];
        $email=$_POST['reg_email'];
        $password=$_POST['reg_password'];
        $isPasswrodSame=$_POST['isRegPasswordSame'];

        register($uname, $email, $password, $isPasswrodSame);

    }
?>