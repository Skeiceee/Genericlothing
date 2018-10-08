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

Route::get('/',function(){
  return redirect('index');
});

Route::get('index', 'Auth\LoginController@showIndex')->middleware('guest');
Route::get('login', 'Auth\LoginController@showLoginForm')->middleware('guest');

Route::get('home','HomeController@index')->name('home');
Route::post('login','Auth\LoginController@login')->name('login');
Route::post('logout','Auth\LoginController@logout')->name('logout');


//Rutas de admin
Route::get('admin','AdminController@index')->name('admin');

Route::resource('admin/tipo-producto','TipoProductoController');
Route::resource('admin/producto', 'ProductoController');
Route::resource('admin/marca','MarcaController');
