var app = angular.module('myApp', []);

app.controller('customersCtrl', function($scope, $http) {
    $http.get("../backend/get_film_data.php")
        .then(function (response) {$scope.film = response.data;});



//rendezés
    $scope.sortBy = function(propertyName) {
        $scope.reverse = ($scope.propertyName === propertyName) ? !$scope.reverse : false;
        $scope.propertyName = propertyName;
    };



// Remove record
    $scope.remove = function(index,filmid,filmimage){
        $http({
            method: 'post',
            url: '../backend/delete_film.php',
            headers: {
                'Content-Type': 'application/json'
            },
            data: {input1:filmid,input2:filmimage},
        }).then(function successCallback(response) {
            if(response.data == 1)
                $scope.film.splice(index, 1);
            else
                $scope.film.splice(index, 1);
        });
    }


    $scope.edited = function(index, filmid, filmTitle, filmLength, filmDescription){
        $http({
            method: 'post',
            url: '../backend/edit_film.php',
            headers: {
                'Content-Type': 'application/json'
            },
            data: {index, input1: filmid, input2: filmTitle, input3: filmLength, input4: filmDescription},
        }).then(function successCallback(response) {
            if(response.data == 1)
                alert('Sikeres makákó!');
            else
                alert('Sikertelen makákó!');
        });
    }
});
/*
    $scope.rangdown = function(index,userid){

        $http({
            method: 'post',
            url: '../backend/change_admin_down.php',
            data: {bevitel1:userid,request_type:3},
        }).then(function successCallback(response) {
            if(response.data == 1)
                $scope.film.splice(index, 1);
            else
                alert('Record not deleted.');
        });
    }



*/


