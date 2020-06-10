<?php

use Illuminate\Support\Facades\Route;

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
Route::middleware(['installed'])->group(function () {
	//refresh route om autos binnen te halen
	Route::get('/refresh', 'ApiController@refresh');

	//Auth middleware (Deze routes alleen beschikbaar als je ingelogged bent)
	Route::middleware(['auth'])->group(function () {
		//Logout route voor users
		Route::get('/logout', 'HomeController@logout');

		//Route voor lijst van alle autos
		Route::get('/autos', 'CarController@index');

		//Route voor specifieke auto op kenteken
		Route::get('/auto/{kenteken}', 'CarController@show');

		//post route om een file te uploaden bij een auto
		//Request $request
		Route::post('/auto/{kenteken}', 'FileController@store');

		//delete route voor een file
		Route::get('/auto/delete/{kenteken}/file/{filename}', 'FileController@destroy');
	});

	//basis route 
	Route::get('/', function () {
	    return redirect('login');	
	});

	//Routes voor laravel authenticatie systeem etc: /login /logout /register
	Auth::routes();

	//home route met middleware in de controller
	Route::get('/home', 'HomeController@index')->name('home');
});
