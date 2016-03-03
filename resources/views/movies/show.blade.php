@extends('app')
@section('title')
    {{$movie->Title}}
@endsection()
@section('content')

    <div class="">
        <div class="img-responsive left">
            <img src={{$movie->Poster}}>
        </div>
        <div class="left spacing">
            <h4>Year:{{$movie->Year}}</h4>
            <h4>Rated:{{$movie->Rated}}</h4>
            <h4>Released:{{$movie->Released}}</h4>
            <h4>Runtime:{{$movie->Runtime}}</h4>
            <h4>Genre:{{$movie->Genre}}</h4>
        </div>
    </div>
@endsection