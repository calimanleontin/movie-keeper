@extends('app')
@section('title')
    {{$movie->Title}}
@endsection()
@section('content')

    <div class="" >
        <div>
            <div class="left img-responsive spacing-right">
                <img src={{$movie->Poster}}>
            </div>
            <div class="spacing-left">
                <h4>Year:{{$movie->Year}}</h4>
                <h4>Rated:{{$movie->Rated}}</h4>
                <h4>Released:{{$movie->Released}}</h4>
                <h4>Runtime:{{$movie->Runtime}}</h4>
                <h4>Genre:{{$movie->Genre}}</h4>
                <h4>Director:{{$movie->Director}}</h4>
                <h4>Writer:{{$movie->Writer}}</h4>
                <h4>Actors:{{$movie->Actors}}</h4>
                <br>
                <h4>IMDB RATING:{{$movie->imdbRating}} </h4>
                <h4>IMDB VOTES:{{$movie->imdbVotes}}</h4>
            </div>
            <div class="btn-upper">
                <ul class = 'list-inline'>
                    <li>
                        <a href="" ng-click="addToWishList()"><button class="btn btn-default"  >Add to Wish List</button></a>
                    </li>
                    <li>
                        <button class="btn btn-default">Add to Seen List</button>
                    </li>
                </ul>
            </div>
        </div>
        @if(!Auth::guest())
            <div class="comment">
                <h3>Add a comment</h3>
                <form ng-submit="submitComment()">
                    <input type="hidden" ng-model="commentData.movie"  value="{{$movie->imdbID}}">
                    <div class="form-group">
                        <textarea type="text" class="form-control input-large" name="author" ng-model="commentData.content" placeholder="Content"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    </div>
                </form>
            </div>
        @endif

        <div class="list-group">
            <div class="article" ng-hide="loading" ng-repeat="comment in comments">
                    <div class="list-group-item">
                        <h3>Comment  <small>by @{{ comment.user.name }} </small>  </h3>
                        <p>@{{ comment.content }}</p>
                        @if(!Auth::guest() and Auth::user()->is_admin() )
                            <ul class="list-inline" >
                                <li><p><a href="" ng-click="deleteComment(comment.id)" class="text-muted">Delete</a></p></li>
                            </ul>
                        @endif
                    </div>
                <br>
            </div>
        </div>
    </div>

@endsection