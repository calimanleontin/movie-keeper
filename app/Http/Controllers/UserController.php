<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use \Auth;
use App\Http\Requests;

class UserController extends Controller
{
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

    public function imdbSearch()
    {

    }
}
