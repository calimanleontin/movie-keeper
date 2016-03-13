@extends('app')
@section('title')
    {{ $user->name }}
@endsection
@section('content')
    <div>
        <ul class="list-group">
            <li class="list-group-item">
                Joined on {{$user->created_at->format('M d,Y \a\t h:i a') }}
            </li>
            <li class="list-group-item panel-body">
            </li>
            <li class="list-group-item">
                Total Comments {{$comments_count}}
            </li>
        </ul>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Latest Posts</h3></div>
        <div class="panel-body">
           tops
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Latest Comments</h3></div>
        <div class="list-group">
            @if(!empty($latest_comments[0]))
                @foreach($latest_comments as $latest_comment)
                    <div class="list-group-item">
                        <p>{{ $latest_comment->body }}</p>
                        <p>On {{ $latest_comment->created_at->format('M d,Y \a\t h:i a') }}</p>
                        <p>On post <a href="{{ url('/'.$latest_comment->movie->imdbID) }}">{{ $latest_comment->movie->Title }}</a></p>
                    </div>
                @endforeach
            @else
                <div class="list-group-item">
                    <p>You have not commented till now. Your latest 5 comments will be displayed here</p>
                </div>
            @endif
        </div>
    </div>
@endsection