<?php
session_start();
error_reporting(0);
include_once "includers/loginCheck.php";
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
        <script src="javascript/film_upload.js"></script>

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

    <?php
        include_once "includers/adminNavbar.inc.php";
    ?>

    <h1 style="margin-left: 20px;margin-right: 20px">Film Felvitele</h1>

    <table style="margin-left: 30px;overflow-x:auto">
        <tr>
            <td style="vertical-align: top">

            <?php 
            //A film feltöltésének a formja
                include_once "includers/filmUploadForm.inc.php";
            ?>

            </td>

            <td style="vertical-align: middle; padding-left: 150px ">
    <div class="card" onclick="" style="width: 300px; ">
        <img class="card-img-top" id="previewImg" src="" width="50%"/>
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
                <li class="list-group-item">Kedvenc</li>
            </ul>
        </div>
    </div>
            </td>
        </tr>
    </table>

    <?php
        include_once "includers/footer.inc.php";
    ?>

    </body>
    </html>
<?php }
else{
    if(isset($_SESSION['email']))
    {
        header('Location: main_page.php');
        exit;
    }else{
        header('Location: index.php');
    }

}
