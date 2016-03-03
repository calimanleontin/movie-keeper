<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Requests;
use App\Movies;

class MovieController extends Controller
{
    const url = 'http://www.omdbapi.com/?';

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
        $json = json_decode($res->getBody(), true);
        $movies = array();
        foreach($json['Search'] as $item)
        {
            $movie = new Movies();
            $movie->Title = $item['Title'];
            $movie->Year = $item['Year'];
            $movie->imdbID = $item['imdbID'];
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
}
