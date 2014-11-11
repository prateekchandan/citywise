<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{	
	return View::make('home');
});

Route::get('login',array('before' => 'guest','as'=>'user.login','uses'=>'UserController@showlogin'));
Route::any('logout',array('as'=>'user.logout','uses'=>'UserController@logout'));
Route::post('login',array('before' => 'guest','as'=>'user.login','uses'=>'UserController@login'));
Route::get('register',array('before' => 'guest','as'=>'user.register','uses'=>'UserController@showlogin'));
Route::post('register',array('before' => 'guest','as'=>'user.register','uses'=>'UserController@register'));


Route::any('city',array('as'=>'city','uses'=>'HomeController@city'));
Route::any('city/{city}',array('as'=>'city.city','uses'=>'HomeController@city'));

Route::get('populate',array('uses'=>'HomeController@populate'));

