var commentApp = angular.module('commentApp', ['mainCtrl', 'commentService'])
    .constant('API_URL', 'http://www.omdbapi.com/?s=');