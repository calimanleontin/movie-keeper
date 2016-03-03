@extends('app')
@section('title')
    {{$movie->Title}}
@endsection()
@section('content')

    <div class="">
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
        </div>
        <div>

        </div>


    </div>

@endsection