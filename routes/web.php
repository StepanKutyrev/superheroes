<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperheroController;

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



Route::get('/', 'SuperheroController@index');
Route::get('/superhero/{superhero}/edit', 'SuperheroController@edit');
Route::put('/superhero/{superhero}', 'SuperheroController@update');
Route::get('/superhero/create', 'SuperheroController@create');
Route::post('/superhero', 'SuperheroController@store');
Route::delete('/superhero/{superhero}', 'SuperheroController@destroy');
