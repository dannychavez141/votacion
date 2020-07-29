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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//estados
Route::get('/estados/all', 'EstadoCcpuController@all')->middleware('auth');
Route::resource('/estados', 'EstadoCcpuController')->middleware('auth');
//usuarios
Route::get('/contadores/all', 'UserController@all')->middleware('auth');
Route::resource('/contadores', 'UserController')->middleware('auth');
