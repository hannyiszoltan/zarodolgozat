var app = angular.module('myApp', []);



app.controller('customersCtrl', function($scope, $http) {
    $http.get("routes.php?action=AllUser")
        .then(function (response) {$scope.users = response.data;});


    //Rendezés
    $scope.sortBy = function(propertyName) {
        $scope.reverse = ($scope.propertyName === propertyName) ? !$scope.reverse : false;
        $scope.propertyName = propertyName;
    };

    //Felhasználó eltávolítása
    $scope.remove = function(index,userid){
      
        $http({
            method: 'POST',
            url: 'routes.php?action=DeleteUser',
            data: {userId:userid, request_type:3},
            headers: {
                'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'
            }
        }).then(function successCallback(response) {
            if(response.data == 1){
                $scope.users.splice(index, 1);
                alert('Sikeres törlés!');
            }
            else
                alert('Sikertelen törlés!');
        });
        
    }

    //Felhasználó jogainak növelése
    $scope.rangup = function(index,userid,useradmin){
        $http({
            method: 'POST',
            url: 'routes.php?action=ChangeAdmin',
            data: {userId:userid, userAdmin:useradmin, request_type:3},
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
    
    //Felhasználó jogainak csökkentése
    $scope.rangdown = function(index,userid,useradmin){

        $http({
            method: 'POST',
            url: 'routes.php?action=ChangeAdmin',
            data: {userId:userid, userAdmin:useradmin, request_type:3},
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



