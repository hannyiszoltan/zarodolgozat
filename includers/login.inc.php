<?php 
    include_once "controllers/UserController.php";
?>

<form method="POST">
    <p>E-mail: <input type="email" name="login_email"></p>
    <p>Jelszó: <input type="password" name="login_password"></p>

    <p><input type="submit" name="login_form" class="btn btn-success" value="Bejelentkezés"></p>
    <p>login email: admin@admin.com</p>
    <p>login jelszó: admin</p>
</form>

<?php  
    if(isset($_POST["login_form"]))
        {
            $email=$_POST['login_email'];
            $password=$_POST['login_password'];

            login($email, $password);
        }
?>