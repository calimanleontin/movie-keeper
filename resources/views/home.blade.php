@extends('app')
@section('title')

    <ul class="list-inline">
        <li>
            @if(!empty($title))
                {{$title}}
            @else
                First Page
            @endif
        </li>
        <li>
                <form method="get" action="/imdbsearch/" class="">
                    <label for="q"></label>
                    <div class="form-group col-md-4">
                        <input type="text" id='movies' name="q" class="long-search form-control" placeholder="Search imdb movie">
                    </div>
                </form>
        </li>
    </ul>

@endsection
@section('content')


        <div class="">

        </div>
@endsection
