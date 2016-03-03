var movieApp = angular.module('movieApp', ['mainCtrl', 'movieService'])
    .constant('API_URL', 'http://www.omdbapi.com/?s=');