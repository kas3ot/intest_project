<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\registred;

Route::get('/', function () {
	$all = registred::all();
    return view('welcome')->with('all',$all);
});

Route::auth();

$this->post('register', function(){
	return view('/');
});

$this->get('register', function(){
	return view('/register_user');
});

Route::get('/home', 'HomeController@index');

Route::post('register', 'RegisterController@register');

Route::get('/searchfor', 'SearchController@searchfor');

Route::get('delete/{id}', 'UserController@destroy');


Route::get('edit/{id}', 'UserController@edit');

Route::post('/update', 'UserController@update');
