<?php

namespace App\Http\Controllers;

use App\Movies;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\MovieComments;
use App\User;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function show($id)
    {
        $movie = Movies::where('imdbID', $id)->first();
        $comments = MovieComments::where('movie_id', $movie->id)->with('user')->get();
        return \Response::json($comments);
    }
    public function store()
    {
        if(Auth::guest())
            return \Response::json(array('logged' => false));
        $content = Input::get('content');
        $movieId = Input::get('movie');
        $comment = new MovieComments();
        $comment->content = $content;
        $comment->user_id = \Auth::user()->id;
        $movie = Movies::where('imdbID', $movieId)->first();
        $comment->movie_id = $movie->id;
        $comment->save();
        return \Response::json(array('success' => true));
    }

    public function delete($id)
    {
        $comment = MovieComments::find($id);
        if($comment == null)
            return \Response::json(array('success' => false));
        $comment->delete();
        return \Response::json(array('success' => true));
    }
}
