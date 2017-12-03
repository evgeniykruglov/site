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

Route::get('/', function () {
    return view('welcome');
});


//Route::get('/simbirsoft', function () {
//   return view('simbirsoft');
//});

Route::get('/simbirsoft/{count}', 'IndexController@fibonacci') 
	->where('count', '[0-9]+')
	->name('fibonacciSeries');
