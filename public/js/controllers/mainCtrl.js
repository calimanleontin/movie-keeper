angular.module('mainCtrl', [])

    .controller('mainController', function($scope, $http, Comment){

        $scope.commentData = {};

        $scope.loading = true;

        Comment.get()
            .success(function(data){
                $scope.comments = data;
                $scope.loading  = false;
                //alert($scope.comments[0].id);
            });
    });