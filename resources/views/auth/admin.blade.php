@extends('app')
@section('title')
    Admin panel
@endsection
@section('content')
    <div class="">
            <div class="list-group">
                <div class="list-group-item">
                    <h3>
                        Search movies in IMDB
                    </h3>
                </div>
                <div class="list-group-item">
                    <div class="space-form">
                        <form method="get" action="/imdbsearch/" class="form">
                            <label for="q"></label>
                            <div class="form-group col-md-4">
                                <input type="text" id='movies' name="q" class="form-control" placeholder="Imdb movie">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="submit" value="Search" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>



        <div class="list-group">
            <div class="list-group-item">
                <h3>
                    Manage users
                </h3>
            </div>
            <div class="list-group-item">
                <article>

                </article>
            </div>
            <div class="list-group-item">

            </div>
        </div>
    </div>
@endsection