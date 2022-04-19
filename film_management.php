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
        <link rel="stylesheet" href="CSS/film_management.css">
        <script src="javascript/main_page_films.js"></script>
        <script src="javascript/film_management.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>


        <!--<script src="../javascript/felh_angular.js"></script>-->

        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>




        <title>Kezdőlap</title>
    </head>
    <body onload="init()">

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

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Admin Eszközök
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="user_management.php">Felhasználók kezelése</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Film felvitele</a></li>
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

    <h1 style="margin-left: 20px;margin-right: 20px">Film Felvitele</h1>

    <table style="margin-left: 30px;overflow-x:auto">
        <tr>
            <td style="vertical-align: top">
    <form enctype="multipart/form-data" style="padding: 15px !important; margin-bottom: 30px"  action="/backend/post_film.php" method="post">



        <div style="width: 500px !important;" class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Film címe:</span>
            </div>
            <input id="film_title" type="text" class="form-control" placeholder="Film cím felvitel" aria-label="Username" aria-describedby="basic-addon1" name="film_title" onkeyup="film_cim_kiiratas()">
        </div>



        <div style="width: 500px !important;" class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Film hossza:</span>
            </div>
            <input id="film_length" inputmode="numeric" pattern="[0-9]*" type="number" class="form-control" placeholder="Film hossz felvitel" aria-label="Username" aria-describedby="basic-addon1" name="film_length" onkeyup="film_hossz_kiiratas()">
        </div>


        <div style="width: 500px !important;" class="form-group mb-3">
            <label class="input-group-text" for="exampleFormControlTextarea1">Film leírás</label>
            <textarea id="film_description" style="width: 500px !important;" class="form-control" name="film_description" rows="5" onkeyup="film_leiras_kiiratas()"></textarea>
        </div>

        <!--
        <div style="width: 500px !important;" class="input-group mb-3">
            <input accept="image/*" type="file" class="form-control" id="inputGroupFile01">
            <input accept="image/*" type='file' id="imgInp" />
            <img id="blah" src="#" alt="your image" />
        </div>
        -->
        <div class="input-group mb-3" style="width: 500px !important;">
            <input accept="image/*" class="form-control" type="file" name="image" onchange="preview()">
        </div>

        <input style="margin-left: -20px !important;" class="btn btn-outline-warning" type="submit" value="Film felvitele" >
    </form>
            </td>

            <td style="vertical-align: middle; padding-left: 150px ">
    <div class="card" onclick="" style="width: 300px; ">
        <img class="card-img-top" id="frame" src="" width="50%"/>
        <div class="card-body">
            <h5 id='film_title_card' class="card-title"></h5>
            <p id="film_description_card" class="card-text"></p>
        </div>
        <div class="card-body">
            </a>
            <button id="" type="button" data-bs-toggle="modal" data-bs-target="#myModal" name="'+elem.film_id+'" class="card-link btn btn-outline-success">Bővebben</button>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Értékelés: <a href=""><i class="fas fa-thumbs-up ertekeles_nyil_fel"></i> </a> <a href=""><i class="fas fa-thumbs-down ertekeles_nyil_le"></i></a> </li>
                <li class="list-group-item" id="film_length_card"></li>
                <li class="list-group-item">A third item</li>
            </ul>
        </div>
    </div>
            </td>
        </tr>
    </table>

    <footer style="float: bottom !important;" id="footer">
        Készítette: Hannyis Zoltán
        <p>© 2022 Copyright: filmek.com</p>
    </footer>

    </body>
    </html>
<?php }
else{
    if(isset($_SESSION['email']))
    {
        header('Location: ../main_page.php');
        exit;
    }else{
        header('Location: /index.php');
    }

}
