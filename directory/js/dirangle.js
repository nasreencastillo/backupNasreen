(function() {
    var App = angular.module('dirApp', ['ngAnimate']);
    App.controller('dirCtrl', function($scope, $http) {
        $http.get('getmember.php').success(function(response) {
            $scope.member = response;
        }).error(function() {
            $err = true;
            $scope.rsError = "No result was found!";
        });

    });
})();
