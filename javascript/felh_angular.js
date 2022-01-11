var app = angular.module('myApp', []);

app.controller('customersCtrl', function($scope, $http) {
    $http.get("../backend/get_users.php")
        .then(function (response) {$scope.felhasznalok = response.data;});



//rendezés
    $scope.sortBy = function(propertyName) {
        $scope.reverse = ($scope.propertyName === propertyName) ? !$scope.reverse : false;
        $scope.propertyName = propertyName;
    };



// Remove record
    $scope.remove = function(index,userid){
        $http({
            method: 'post',
            url: 'http://zarodolgozat.test/backend/delete_user.php',
            data: {bevitel1:userid,request_type:3},
        }).then(function successCallback(response) {
            if(response.data == 1)
                $scope.felhasznalok.splice(index, 1);
            else
                alert('Record not deleted.');
        });
    }

    
    $scope.rangup = function(index,userid){
        $http({
            method: 'post',
            url: 'http://zarodolgozat.test/backend/change_admin_up.php',
            data: {bevitel1:userid,request_type:3},
        }).then(function successCallback(response) {
            if(response.data == 1)
                $scope.felhasznalok.splice(index, 1);
            else
                alert('Record not deleted.');
        });
    }

    $scope.rangdown = function(index,userid){

        $http({
            method: 'post',
            url: 'http://zarodolgozat.test/backend/change_admin_down.php',
            data: {bevitel1:userid,request_type:3},
        }).then(function successCallback(response) {
            if(response.data == 1)
                $scope.felhasznalok.splice(index, 1);
            else
                alert('Record not deleted.');
        });
    }


});



