@extends('app')
@section('title')
    <ul class="list-inline">

        <li>
            @if(!empty($title))
                    {{$title}}
                @else
                    Movies
                @endif
        </li>
        <li>
            <form method="get" action="/imdbsearch/" class="form form-inline">
                <label for="q"></label>
                <div class="form-group col-md-4">
                    <input type="text" id='movies' name="q" class="form-control" placeholder="Imdb movie">
                </div>
            </form>
        </li>
    </ul>
@endsection
@section('content')
    @if(!empty($movies))
        @foreach($movies as $movie)
            <div class="col-md-3 movie" xmlns:max-height="http://www.w3.org/1999/xhtml">
                <div class="panel-title  title">
                    <a href="/imdbmovie/{{$movie->imdbID}}">{{$movie->title}} </a>
                    <a href ='/imdbmovie/{{$movie->imdbID}}'>
                        <img src={{$movie->imdbPoster}},  style="max-height: 200px; max-width: 120px;"  alt="Poster" class = 'img-responsive'>
                    </a>

                </div>

            </div>
        @endforeach
        @else
        @endif
@endsection
