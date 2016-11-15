var app = angular.module('myApp', ['ngRoute']);

app.config(function ($routeProvider) {
    $routeProvider.when('/', {
        templateUrl: 'login.html',
        controller: 'loginController'
    });
    $routeProvider.when('/about-us', {
        templateUrl: 'about.html',
        controller: 'aboutus'
    });
    $routeProvider.when('/dashboard', {
        resolve: {
            'check': function ($location, $rootScope) {
                if (!$rootScope.isLoggedIn) {
                    $location.path('/');
                }
            }
        },
        templateUrl: 'dashboard.html',
        controller: 'dashboard'
    });
    $routeProvider.when('/contact-us', {
        templateUrl: 'contact.html',
        controller: 'contact'
    });
    $routeProvider.otherwise({
        redirectTo: '/'
    });
});

app.controller('loginController', function ($scope, $http, $location, $rootScope) {
    $scope.get_form_data = function () {
        $http.post('inc/login.php', {'username': $scope.username, 'password': $scope.password})
                .success(function (data) {
                    $rootScope.isLoggedIn = true;
                    $rootScope.userName = data.username;
                    $location.path('/dashboard');
                });
    };
});

app.controller('dashboard', function ($scope) {
    $scope.msg = "This is Dashboard";
});
