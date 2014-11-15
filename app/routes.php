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


Route::get('register-shop',array('before' => 'user','as'=>'shop.add','uses'=>'ShopController@show_add'));
Route::post('register-shop',array('before' => 'user','as'=>'shop.add','uses'=>'ShopController@add'));
Route::get('shops',array('as'=>'shops','uses'=>'ShopController@all'));
Route::get('shop',array('as'=>'shop','uses'=>'ShopController@one_shop'));
Route::post('shop-review',array('before' => 'user','as'=>'shop.review','uses'=>'ShopController@add_review'));
Route::get('shop/{id}',array('as'=>'shop_one','uses'=>'ShopController@one_shop'));


Route::get('shop/{id}/products',array('as'=>'product.shop','uses'=>'ProductController@by_shop'));


