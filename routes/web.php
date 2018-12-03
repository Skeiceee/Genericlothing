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

//Rutas de login
Route::get('index', 'Auth\LoginController@showIndex')->middleware('guest');
Route::get('login', 'Auth\LoginController@showLoginForm')->middleware('guest');

Route::post('login','Auth\LoginController@login')->name('login');
Route::post('logout','Auth\LoginController@logout')->name('logout');

//Rutas de register
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

//Rutas de reseteo de passwordz
Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('reset');
Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

Route::get('reset/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('confirmation','Auth\ResetPasswordController@reset')->name('password.send');

//Rutas de admin
Route::get('admin','AdminController@index')->name('admin');

Route::resource('admin/talla','TallaController');
Route::resource('admin/tipo-producto','TipoProductoController');
Route::resource('admin/producto', 'ProductoController');
Route::resource('admin/marca','MarcaController');
Route::resource('admin/ciudad','CiudadController');
Route::resource('admin/tienda','TiendaController');
Route::resource('admin/bodega','BodegaController');
Route::resource('admin/user','UserController');
Route::resource('admin/venta','VentaController');
Route::resource('admin/pedido','PedidoController');
Route::resource('admin/existencia-producto','ExistenciaProductoController');
Route::resource('admin/envio','EnvioController');

//Rutas de usuario
Route::get('home','HomeController@index')->name('home');

Route::get('configuracion','HomeController@configuracion_user')->name('configuracion');


//Rutas de eliminación
Route::get('admin/marca/{Marca}/delete', ['uses' => 'MarcaController@destroy', 'as' => 'Marca.delete']);
Route::get('admin/tipo-producto/{TipoProducto}/delete', ['uses' => 'TipoProductoController@destroy', 'as' => 'TipoProducto.delete']);
Route::get('admin/ciudad/{Ciudad}/delete', ['uses' => 'CiudadController@destroy', 'as' => 'Ciudad.delete']);
Route::get('admin/tienda/{Tienda}/delete', ['uses' => 'TiendaController@destroy', 'as' => 'Tienda.delete']);
Route::get('admin/bodega/{Bodega}/delete', ['uses' => 'BodegaController@destroy', 'as' => 'Bodega.delete']);
Route::get('admin/talla/{Talla}/delete', ['uses' => 'TallaController@destroy', 'as' => 'Talla.delete']);

//Modal
Route::get('admin/existencia-producto/{Producto}/create-producto', ['uses' => 'CommonController@createExistenciaProducto', 'as' => 'ExistenciaProducto.create']);

//Ajax
Route::get('ajax-BodegasFind','AjaxController@ajaxBodegasFind')->name('ajax.bodegasfind');
