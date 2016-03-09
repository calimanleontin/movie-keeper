<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MovieComments;
use App\User;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{
    public function show($id)
    {
        $comments = MovieComments::where('movie_id', id);
        return \Response::json($comments);
    }
    public function store()
    {
        $content = Input::get('content');
        $movieId = Input::get('movie_id');
        $comment = new MovieComments();
        $comment->content = $content;
        $comment->user_id = Auth::user()->id;
        $comment->movie_id = $movieId;
        $comment->save();
        return \Response::json(array('success' => true));
    }
}
