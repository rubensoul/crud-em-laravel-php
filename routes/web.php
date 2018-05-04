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

Route::resource('pacientes', 'PacientesController');
Route::resource('enderecos', 'EnderecosController');

Route::post('enderecos/create', 'EnderecosController@create');
// Route::get('enderecos/create', 'EnderecosController@create');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
