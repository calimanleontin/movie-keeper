<?php

namespace App\Http\Controllers;

use App\Searches;
use App\Wishlists;
use \Response;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Requests;
use \Auth;
use App\Movies;

class MovieController extends Controller
{
    const url = 'http://www.omdbapi.com/?';

    public function index()
    {
        $search = Searches::find(1);
        if($search == null)
        {
            return view('home');
        }
        else
        {
            $popular = json_decode($search->popular, true);
            if($popular == null)
                return view('home')
                    ->withMessage('Sorry, this page is empty');
            else
            {
                $movies = array();
                arsort($popular);
                $maximNumberOfMovies = 3;
                foreach($popular as $key => $value)
                {
                    $maximNumberOfMovies -= 1;
                    $client = new Client();
                    $url =  self::url .'s=' . $key;
                    $res = $client->request('GET', $url);
                    $json = json_decode($res->getBody(), true);
                    foreach($json['Search'] as $item)
                    {
                        $movie = new Movies();
                        $movie->Title = $item['Title'];
                        $movie->Year = $item['Year'];
                        $movie->imdbID = $item['imdbID'];
                        $movie->imdbPoster = $item['Poster'];
                        $movies[] =$movie;
                    }
                    if(!$maximNumberOfMovies)
                    {
                        shuffle($movies);
                        return view('movies.index')->with('movies', $movies);
                    }
                }
            }
            shuffle($movies);
            return view('movies.index')->with('movies', $movies);
        }
    }

    public function imdbSearch(Request $request)
    {
        $term = $request->get('q');

        $client = new Client();
        $url =  self::url .'s=' . $term;
        $res = $client->request('GET', $url);
        if(json_decode($res->getBody(),1)['Response'] == 'False')
        {
            return view('movies.index')->withErrors('The requested movie was not found');
        }
        $search = Searches::find(1);
        if($search == null)
        {
            $search = new Searches();
            $popular = array();
            $search->popular = json_encode($popular);
        }
        $popular = json_decode($search->popular, true);
        if(!array_key_exists($term,$popular))
        {
            $popular[$term] = 1;
        }
        else
        {
            $popular[$term] += 1;
        }
        $search->popular = json_encode($popular);
        $search->save();


        $json = json_decode($res->getBody(), true);
        $movies = array();
        foreach($json['Search'] as $item)
        {
            $movie = new Movies();
            $duplicate = Movies::where('imdbID',$item['imdbID'])->first();
            $movie->imdbID = $item['imdbID'];
            if($duplicate == null)
                $movie->save();
            $movie->Title = $item['Title'];
            $movie->Year = $item['Year'];
            $movie->imdbPoster = $item['Poster'];
            $movies[] =$movie;
        }
        return view('movies.index')->with('movies', $movies);
    }

    public function imdbShow($imdbID)
    {
        $client = new Client();
        $url = self::url . 'i=' . $imdbID;
        $response = $client->request('GET', $url);
        if(json_decode($response->getBody(),1)['Response'] == 'False')
        {
            return view('movies.index')->withErrors('The requested movie was not found');
        }
        $movie = json_decode($response->getBody());
           return view('movies.show')
           ->withMovie($movie)
           ->withTitle($movie->Title);
    }

    public function createMovie()
    {
        if(!Auth::guest() and Auth::user()->is_admin())
            return view('movies.create');
        else
            return redirect('/')->withErrors('You have not sufficient permissions');
    }

    public function storeMovie(Request $request)
    {
        if(!Auth::guest() and Auth::user()->is_admin())
        {
            $data = $request->all();
            $movie = new Movies($data);
            $movie->save();
            return redirect('/auth/admin')->withMessage('Success');
        }
        else
            return redirect('/')->withErrors('You have not sufficient permissions');
    }

    public function wishList($imdbID)
    {
        if(Auth::guest())
            return Response::json(array('success'=>false));
        $user_id = Auth::user()->id;
        $wishList = WishLists::where('user_id', $user_id)->first();
        if($wishList == null)
        {
            $wishList = new WishLists();
            $wishList->user_id = $user_id;
            $wishList->save();
        }
        $movie = Movies::where('imdbID', $imdbID)->first();
        $id = $movie->id;
        $ok = 1;
        foreach($wishList->movies as $movie)
        {
            if($movie->id == $id)
            {
                $ok = 0;
                break;
            }
        }
        if($ok == 1)
            $wishList->movies()->attach($id);
        return Response::json(array('success' => 'true'));

    }
}
