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


Route::group(['prefix'=>'api'], function(){
	Route::group(['prefix'=>'user'],function(){

		Route::get('',['uses'=>'UserController@allUsers']);

		Route::get('{id}',['uses'=>'UserController@getUser']);

		Route::post('',['uses'=>'UserController@saveUser']);

		Route::put('{id}',['uses'=>'UserController@updateUser']);

		Route::delete('{id}',['uses'=>'UserController@deleteUser']);
	});
});

Route::get('/', function(){
	return View::make('api.docs.index');
});

/*App::missing(function()
{
    return Redirect::to('docs');
});*/

