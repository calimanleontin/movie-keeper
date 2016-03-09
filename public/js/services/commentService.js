angular.module('commentService', [])

    .factory('Comment', function($http){
        return{
            get: function() {
                return $http.get('/api/comments/');
            },
            save : function() {
                return $http({
                    method  :   'POST',
                    url     :   '/api/comments/store',
                    data    : $.param(commentData),
                    headers : {'Content-Type' : 'application/x-www-form-urlencoded'}
                });
            }
        }
    });