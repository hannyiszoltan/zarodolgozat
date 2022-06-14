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
        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

        <script src="javascript/film_edit_angular.js"></script>

        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


        <title>Kezdőlap</title>
    </head>
    <body>

    <?php
        include_once "includers/adminNavbar.inc.php";
    ?>

    <h1 style="margin-bottom: 20px;margin-left: 20px">Filmek módosítása</h1>


    <div ng-app="myApp" ng-controller="customersCtrl">

        <table class="table table-bordered table-striped" style="width:95%; margin-left: 30px;overflow-x:auto">
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
                    <button class="btn btn-primary" ng-click="sortBy('film_id')">Film kép neve</button>
                    <span class="sortorder" ng-show="propertyName === 'film_id'" ng-class="{reverse: reverse}"></span>
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

                <td style="display: flex !important;"> <input style="width: 3em; " ng-model="x.film_length" type="text" value="{{ x.film_length }}" name="film_length_input">perc</td>

                <td><textarea rows="5" cols="30" ng-model="x.film_description" name="film_description_input" >{{ x.film_description }}</textarea></td>

                <td style="text-align: center !important;"> <span  ng-model="x.film_image" value="" name="film_image">{{ x.film_image }}</span></td>

                <td><input type='button' class="btn btn-outline-danger" ng-click='remove($index,x.film_id,x.film_image);' value='Törlés'></td>
                <td><input type="button" class="btn btn-outline-warning" ng-click='edited($index, x.film_title, x.film_length, x.film_description, x.film_id);' value="Módosítások mentése"></td>


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


    <?php
        include_once "includers/footer.inc.php";
    ?>

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
