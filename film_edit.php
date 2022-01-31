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

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

        <script src="../javascript/film_edit_angular.js"></script>

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
                            <li><a class="dropdown-item" href="user_management.php">Felhasználók kezelése</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="film_management.php">Film felvitele</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Filmek szerkesztése</a></li>
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


    <h1 style="margin-bottom: 20px;margin-left: 20px">Filmek módosítása</h1>


    <div ng-app="myApp" ng-controller="customersCtrl">



        <table class="table table-bordered table-striped" style="width:50%; margin-left: 30px">
            <tr>
                <th>
                    <button class="btn btn-primary" ng-click="sortBy('film_title')">Film név</button>
                    <span class="sortorder" ng-show="propertyName === 'film_title'" ng-class="{reverse: reverse}"></span>
                </th>
                <th>
                    <button class="btn btn-primary" ng-click="sortBy('film_id')">Film id</button>
                    <span class="sortorder" ng-show="propertyName === 'film_id'" ng-class="{reverse: reverse}"></span>
                </th>
                <th>
                    <button class="btn btn-primary" ng-click="sortBy('film_length')">Film hossz</button>
                    <span class="sortorder" ng-show="propertyName === 'film_length'" ng-class="{reverse: reverse}"></span>
                </th>
                <th>
                    <button class="btn btn-primary" ng-click="sortBy('film_description')">Film leírás</button>
                    <span class="sortorder" ng-show="propertyName === 'film_description'" ng-class="{reverse: reverse}"></span>
                </th>
                <th>
                    Törlés
                </th>
                <th>
                    Film Módosítás
                </th>

            </tr>
            <tr ng-repeat="x in film | orderBy:propertyName:reverse">


                <td> <input style="width: auto" ng-model="x.film_title" type="text" value="" name="film_title_input"></td>
                <td style="text-align: center !important;"> <span  ng-model="x.film_id" value="" name="film_id">{{ x.film_id }}</span></td>

                <td style="display: flex !important;"> <input style="width: 3em; " ng-model="x.film_length" type="number" value="{{ x.film_length }}" name="film_length_input">perc</td>

                <td><textarea rows="5" cols="30" ng-model="x.film_description" name="film_description_input" >{{ x.film_description }}</textarea></td>

                <td><input type='button' class="btn btn-outline-danger" ng-click='remove($index,x.film_id);' value='Törlés'></td>
                <td><input type="button" class="btn btn-outline-warning" ng-click='edited($index,x.film_id,x.film_title,x.film_length,x.film_description);' value="Módosítások mentése"></td>


                <!--
                    <td><span contenteditable="true">{{ x.film_title }}</span></td>
                    <td><span contenteditable="true">{{ x.film_id }}</span></td>
                -->
            <!--
                <td>
                    <input onclick="window.location.reload()" ng-if="x.users_admin==0" type='button' class="btn btn-outline-success" ng-click='rangup($index,x.users_id,x.users_admin);' value='Rang növel'>
                    <input onclick="window.location.reload()" ng-if="x.users_admin==1" type='button' class="btn btn-outline-danger" ng-click='rangdown($index,x.users_id,x.users_admin);' value='Rang csökkent'>
                </td>
             -->

            </tr>
        </table>

    </div>


    <footer id="footer">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet asperiores distinctio dolore eligendi fugiat id illo illum, inventore laborum maiores, minus, mollitia nemo provident qui quidem repudiandae voluptatem! Ab.</p>
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
        header('Location: ../index.php');
    }

}
