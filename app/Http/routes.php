<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'MovieController@index');

    Route::get('/auth/login','UserController@getLogin');
    Route::post('/auth/login', 'UserController@postLogin');
    Route::get('/auth/register', 'UserController@getRegister');
    Route::post('/auth/register', 'UserController@postRegister');
    Route::get('/auth/logout', 'UserController@logout');

    Route::get('/imdbsearch', 'MovieController@imdbSearch');
    Route::get('/imdbmovie/{id}', 'MovieController@imdbShow');
    Route::get('/auth/createMovie', 'MovieController@createMovie');
    Route::post('/auth/storeMovie', 'MovieController@storeMovie');


    Route::get('/api/comments/delete/{id}', 'CommentController@delete');
    Route::get('/api/comments/{id}', 'CommentController@show');
    Route::post('/api/comments/store', 'CommentController@store');



    Route::get('/auth/admin', 'UserController@adminInterface');
});
