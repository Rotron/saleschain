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

Route::group(['middleware' => 'web'], function () {
    Route::get('/', function () {
	    return view('welcome');
	});
	
    Route::auth();

    Route::get('/home', 'HomeController@index');

    // Web
    Route::get('/backend', 'AdminController@index');
    Route::get('/backend/users', 'AdminController@users');
    Route::get('/backend/store', 'AdminController@store');
    Route::get('/backend/categories', 'CategoriesController@index');

    /*----------------------------------------
    | AJAX
    |----------------------------------------*/
    // backend/categories
    Route::get('/backend/categories/getCats', 'CategoriesController@getCats');
    Route::post('/backend/categories/create', 'CategoriesController@create');
    Route::post('/backend/categories/update', 'CategoriesController@update');
    Route::post('/backend/categories/delete', 'CategoriesController@destroy');
    // web
    Route::get('/backend/categories/{cat}', 'CategoriesController@show');

    // backend/items 
    Route::post('/backend/items/create', 'ItemsController@create');
    Route::post('/backend/items/update', 'ItemsController@update');
    Route::post('/backend/items/delete', 'ItemsController@destroy');
    
    // backend 
    Route::get('/backend/getUsers', 'AdminController@getUsers');
    Route::post('/backend/updateUser', 'AdminController@updateUser');
    Route::post('/backend/deleteUser', 'AdminController@deleteUser');

});
