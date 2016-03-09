angular.module('mainCtrl', [])

    .controller('mainController', function($scope, $http, Comment){

        $scope.commentData = {};

        $scope.loading = true;
        var href = window.location.href;
        href = href.split('/');
        var number = href.length;
        var movie_id = (href[number-1]);
        if(movie_id[movie_id.length-1] == '#')
        {
            id = id.substring(0, id.length - 1);
        }
        Comment.get(movie_id)
            .success(function(data){
                $scope.comments = data;
                $scope.loading  = false;
            });

        $scope.submitComment = function() {
            $scope.loading = true;
            var href = window.location.href;
            href = href.split('/');
            var number = href.length;
            var param = (href[number-1]);
            $scope.commentData.movie = param;


            Comment.save($scope.commentData)
                .success(function(data){

                    Comment.get(movie_id)
                        .success(function(data){
                            $scope.comments = data;
                            $scope.loading = false;
                            $scope.commentData.content = '';
                        });
                });
        };

        $scope.deleteComment = function(id) {
            $scope.loading  = true;

            Comment.delete(id)
                .success(function(data){

                    Comment.get(movie_id)
                        .success(function(data){
                            $scope.comments = data;
                            $scope.loading = false;
                        });
                });
        }


    });