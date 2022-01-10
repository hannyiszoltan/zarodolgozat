<?php
session_start();
error_reporting(0);
include "./backend/bejelentkezes_ell.php";
if($_SESSION["admin"]==1){ ?>
    <!doctype html>
    <html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="./CSS/kezdolap.css">
        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

        <script src="../javascript/felh_angular.js"></script>

        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        <script src="./javascript/film_adatok.js"></script>

        <title>Kezdőlap</title>
    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin_kezdolap.php">Kezdőlap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Kedvencek</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Forum</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Toplisták
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="">Kaland</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Akció</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Fantasy</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Admin Eszközök
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Felhasználók kezelése</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Film felvitele</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">asd</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Bejelentkezve: <?php echo $_SESSION["email"]; ?></a>

                    <p><a class="btn btn-outline-danger" href='./backend/kijelentkezes.php'>Kijelentkezés</a></p>
                </form>
            </div>
        </div>
    </nav>


    



    <footer>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet asperiores distinctio dolore eligendi fugiat id illo illum, inventore laborum maiores, minus, mollitia nemo provident qui quidem repudiandae voluptatem! Ab.</p>
    </footer>

    </body>
    </html>
<?php }
else{
    if(isset($_SESSION['email']))
    {
        header('Location: http://zarodolgozat.test/kezdolap.php');
        exit;
    }else{
        header('Location: http://zarodolgozat.test/index.php');
    }

}
