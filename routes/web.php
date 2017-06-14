<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
	return view('auth/login');
});
Route::group(['middleware' => 'web'], function () {
	Route::any('/dashboard', function () {
		return view('admin/dashboard');
	});
});
/*
// Second Route method – Root URL with ID will match this method
Route::get('ID/{id}',function($id){
   echo 'ID: ' . $id;
});

// Third Route method – Root URL with or without name will match this method
Route::get('/user/{name?}',function($name = 'Ronak Parmar'){
   echo "Name: " . $name;
});
Route::get('about', function(){
	return View::make('pages.about');
});
Route::get('contact', function(){
	return View::make('pages.contact');
});*/
Route::group(['middleware' => 'web', "prefix" => "admin"], function () {
	Route::resource('author','AuthorController');
	Route::resource('book','BookController');
});

Auth::routes();
Route::any('/admin/author', 'AuthorController@index');
// Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
