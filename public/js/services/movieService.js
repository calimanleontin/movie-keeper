angular.module('movieService', [])

    .factory('Movie', function($http){
        return{
            get: function(url) {
                return $http.get('');
            }
        }
    });