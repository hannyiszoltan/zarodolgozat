<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Regisztráció</title>

    <link rel="stylesheet" href="CSS/main_page.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body class="d-flex flex-column min-vh-100">



<button style="margin:10ch 10ch 10ch 10ch" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#bejelentkezes">
    Bejelentkezés
</button>


<div class="modal" id="bejelentkezes">
    <div class="modal-dialog">
        <div class="modal-content">


            <div class="modal-header">
                <h4 class="modal-title">Bejelentkezés</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>


            <div class="modal-body">
                <form method="post" action="/backend/login.php">

                    <p>E-mail: <input type="email" name="login_email"></p>
                    <p>Jelszó: <input type="password" name="login_password"></p>

                    <p><input type="submit" class="btn btn-success" value="Bejelentkezés"></p>
                    <p>login felhasználónév:admin@admin.com</p>
                    <p>login jelszó:admin</p>
                </form>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Bezár</button>
            </div>

        </div>
    </div>
</div>



    <!-- Button to Open the Modal -->
    <button style="margin:10ch 10ch 10ch 10ch" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#regisztracio">
        Regisztráció
    </button>

    <!-- The Modal -->
    <div class="modal" id="regisztracio">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Regisztráció</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <form method="post" action="../backend/register.php">

                        <p>Felhasználónév: <input type="text" name="reg_username"></p>
                        <p>E-mail: <input type="email" name="reg_email"></p>
                        <p>Jelszó: <input type="password" name="reg_password1"></p>

                        <p>Jelszó újra: <input type="password" name="reg_password2"></p>

                        <p><input type="submit" class="btn btn-primary" value="Regisztráció"></p>
                        <p>login felhasználónév:admin@admin.com</p>
                        <p>login jelszó:admin</p>
                    </form>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Bezár</button>
                </div>

            </div>
        </div>
    </div>




</body>
<footer id="footer" class="wrapper flex-grow-1">
    Készítette: Hannyis Zoltán
    <p>© 2022 Copyright: film.freecluster.eu</p>
</footer>

</html>

<?php

?>


