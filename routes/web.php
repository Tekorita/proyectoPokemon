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

Route::get('prueba/{name}','PruebaController@prueba');

Route::resource('trainers','TrainerController');
Route::resource('pokemons','PokemonController');

Route::get('/name/{name}/lastname/{lastname}', function ($name, $lastname=null) {
    return 'Hola soy '.$name.' '.$lastname;
});

Route::get('/mi_primera_ruta', function () {
    return "Holaa papi";
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
