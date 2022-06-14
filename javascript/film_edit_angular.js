var app = angular.module('myApp', []);

app.controller('customersCtrl', function($scope, $http) {
    $http.get("routes.php?action=AllFilm")
        .then(function (response) {$scope.film = response.data;});

    //Rendezés
    $scope.sortBy = function(propertyName) {
        $scope.reverse = ($scope.propertyName === propertyName) ? !$scope.reverse : false;
        $scope.propertyName = propertyName;
    };

    //Film Törlése
    $scope.remove = function(index, filmid, imagename){
        $http({
            method: 'POST',
            url: 'routes.php?action=DeleteFilm',
            data: {filmId:filmid, imageName:imagename},
            headers: {
                'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'
            }
        }).then(function successCallback(response) {
            if(response.data == 1){
                $scope.film.splice(index, 1);
                alert('Sikeres eltávolítás!');
            }
            else{
            $scope.film.splice(index, 1);
            alert('Sikeres eltávolítás!');
            }
        });
    }

    //Film Adatainak Szerkesztése
    $scope.edited = function(index, filmtitle, filmlength, filmdescription, filmid  ){
        $http({
            method: 'POST',
            url: 'routes.php?action=ChangeFilmData',
            data: {filmTitle:filmtitle, filmLength:filmlength, filmDescription:filmdescription, filmId:filmid, request_type:3},
            headers: {
                'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'
            }
        }).then(function successCallback(response) {
            if(response.data == 1)
                alert('Sikeres módosítás!');
            else
                alert('Sikertelen módosítás!');
        });
    }

});


