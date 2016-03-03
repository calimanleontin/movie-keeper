<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use \Auth;
use App\Movies;
use GuzzleHttp\Client;
use App\Http\Requests;

class UserController extends Controller
{
    const url = 'http://www.omdbapi.com/?s=';

    public function getLogin()
    {
        return view('auth.login');
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postLogin()
    {
        $email = Input::get('email');
        $password = Input::get('password');
        $user = User::where('email', $email)->first();
        if($user == null)
            return redirect('/auth/login')->withErrors('Email not found');
        if(password_verify($password, $user->password))
            Auth::login($user);
        return redirect('/')->withMessage('Login successfully');
    }

    public function postRegister()
    {
        $name = Input::get('username');
        $password = Input::get('password');
        $confirm = Input::get('confirm');
        $email = Input::get('email');

        $duplicate = User::where('name', $name)->first();
        if($duplicate != null)
            return redirect('/auth/register')->withErrors('Name already used');
        $duplicate = User::where('email', $email)->first();

        if($duplicate != null)
            return redirect('/auth/register')->withErrors('E-mail already used');

        if($confirm != $password)
            return redirect('/auth/register')->withErrors('Passwords are not the same');
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = password_hash($password,PASSWORD_BCRYPT);
        $user->save();
        Auth::login($user);
        return redirect('/')->withMessage('Register successfully');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->withMessage('Logout successfully');
    }

    public function adminInterface()
    {
        if(!Auth::guest() and Auth::user()->is_admin())
            return view('auth.admin');
        else
            return redirect('/')->withErrors('You have not sufficient permissions');
    }

    public function imdbSearch(Request $request)
    {
        $term = $request->get('q');
        $client = new Client();
        $url =  self::url . $term;
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
            $movie->title = $item['Title'];
            $movie->year = $item['Year'];
            $movie->imdbID = $item['imdbID'];
            $movie->imdbPoster = $item['Poster'];
            $movies[] =$movie;
        }
        return view('movies.index')->with('movies', $movies);
    }
}
