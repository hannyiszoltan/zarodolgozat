<?php
session_start();
error_reporting(0);
include "./backend/check_login.php";
if($_SESSION["admin"]==1){ ?>
<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="CSS/main_page.css">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <script src="javascript/main_page_films.js"></script>


    <title>Kezdőlap</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="admin_main_page.php">Kezdőlap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="favorites.php">Kedvencek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Forum</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Toplisták
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Kaland</a></li>
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
                        <li><a class="dropdown-item" href="user_management.php">Felhasználók kezelése</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="film_management.php">Film felvitele</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="film_edit.php">Filmek szerkesztése</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Bejelentkezve: <?php echo $_SESSION["email"]; ?></a>

                <p><a class="btn btn-outline-danger" href='backend/logout.php'>Kijelentkezés</a></p>
            </form>
        </div>
    </div>
</nav>


<div style="margin-right: unset;margin-left: unset" class="row firstDiv" id="tablazat">

</div>

<!-- The Modal -->
<div class="modal" id="filmCard">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 id="modal-fejlec" class="modal-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div id="modal-bodyContent" class="modal-body row">

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Bezárás</button>
            </div>

        </div>
    </div>
</div>

<div id="adminstatus" style="display: none";><?php echo $_SESSION['admin']; ?></div>




<footer id="footer">
Készítette: Hannyis Zoltán
   <p>© 2022 Copyright: filmek.com</p>
</footer>

</body>


</html>

<?php }
else{
    if(isset($_SESSION['email']))
    {
        header('Location: /main_page.php');
        exit;
    }else{
        header('Location: /index.php');
    }

}
