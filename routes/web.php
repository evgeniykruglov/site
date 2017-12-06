<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'FeedController@index')->name('feed');

Route::post('/simbirsoft', 'IndexController@fibonacci') 
	->where('count', '[1-9]+')
	->name('fibonacciSeries');


Route::get('/form', function()	{
	return view('form');
});	

Route::post('/form', function()	{
	print_r($_POST["count"]);
});	


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('post', 'PostController', ['except' => ('index')]);
