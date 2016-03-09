angular.module('mainCtrl', [])

    .controller('mainController', function($scope, $http, Comment){

        $scope.commentData = {};

        $scope.loading = true;
        var href = window.location.href;
        href = href.split('/');
        var number = href.length;
        var id = (href[number-1]);
        Comment.get(id)
            .success(function(data){
                $scope.comments = data;
                $scope.loading  = false;
            });

        $scope.submitArticle = function() {
            $scope.loading = true;
            var href = window.location.href;
            href = href.split('/');
            var number = href.length;
            var param = (href[number-1]);
            $scope.commentData.movie = param;


            Comment.save($scope.commentData)
                .success(function(data){

                    Comment.get(id)
                        .success(function(data){
                            $scope.comments = data;
                            $scope.loading = false;
                        });
                });
        };


    });