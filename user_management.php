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

        <script src="javascript/user_management_angular.js"></script>

        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


        <title>Kezdőlap</title>
    </head>
    <body>

    <?php  
        include_once "includers/adminNavbar.inc.php";
    ?>



    <h1 style="margin-left: 20px;margin-bottom: 20px">Felhasználók</h1>


    <div ng-app="myApp" ng-controller="customersCtrl">

        <table class="table table-bordered table-striped" style="width:50%;margin-left: 30px;overflow-x:auto">
            <tr>
                <th>
                    <button class="btn btn-primary" ng-click="sortBy('users_name')">Felhasználó név</button>
                    <span class="sortorder" ng-show="propertyName === 'users_name'" ng-class="{reverse: reverse}"></span>
                </th>
                <th>
                    <button class="btn btn-primary" ng-click="sortBy('users_admin')">Rang</button>
                    <span class="sortorder" ng-show="propertyName === 'users_admin'" ng-class="{reverse: reverse}"></span>
                </th>
                <th>
                    Törlés
                </th>
                <th>
                    Rang Módosítás
                </th>

            </tr>
            <tr ng-repeat="x in users | orderBy:propertyName:reverse">
                <td>{{ x.users_name }}</td>
                <td style="text-align: center">{{ x.users_admin }}</td>
                <td><input type='button' class="btn btn-outline-danger" ng-click='remove($index,x.users_id);' value='Törlés'></td>

                <td id="rankButtons">
                    <input onclick="window.location.reload()" ng-if="x.users_admin==0" type='button' class="btn btn-outline-success" ng-click='rangup($index,x.users_id,x.users_admin);' value='Rang növel'>
                    <input onclick="window.location.reload()" ng-if="x.users_admin==1" type='button' class="btn btn-outline-danger" ng-click='rangdown($index,x.users_id,x.users_admin);' value='Rang csökkent'>
                </td>
            </tr>
        </table>

    </div>

    <div id="responstest"></div>

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
