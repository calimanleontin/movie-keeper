angular.module('commentService', [])

    .factory('Comment', function($http){

        return{
            get: function(id) {
                return $http.get('/api/comments/' + id);
            },
            save : function(commentData) {
                return $http({
                    method  :   'POST',
                    url     :   '/api/comments/store',
                    data    : $.param(commentData),
                    headers : {'Content-Type' : 'application/x-www-form-urlencoded'}
                });
            },

            delete : function(id){
                return $http.get('/api/comments/delete/' + id);
            }
        }
    });