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

Route::get('venta/{Venta}','VentaController@show');



//Rutas de usuario
Route::get('home','HomeController@index')->name('home');
Route::post('edit/user','HomeController@configurarUser');
Route::get('pago', 'Usuario\PagoController@index');
Route::get('home/delete','DeleteUserController@deleteCliente')->name('deleteUser');

//Ruta venta
Route::resource('venta', 'Usuario\VentaController');

Route::get('configuracion','HomeController@configuracion_user')->name('configuracion');
Route::get('show/{Producto}','HomeController@showProducto');
Route::get('/home/filtro','HomeController@filtrar');
Route::get('carro','Usuario\PedidoController@index')->name('carro');
Route::get('filtro/tipo/{TipoProducto}','HomeController@filtrarTipoProducto');
Route::get('filtro/marca/{Marca}','HomeController@filtrarMarca');
Route::get('/filtro/talla/{Talla}','HomeController@filtrarTalla');

//Rutas Guest
Route::get('guest','GuestController@index')->name('guest');

Route::get('guest/show/{Producto}','GuestController@showProducto');

Route::get('/guest/filtro','GuestController@filtrar');
Route::get('guest/filtro/tipo/{TipoProducto}','GuestController@filtrarTipoProducto');
Route::get('guest/filtro/marca/{Marca}','GuestController@filtrarMarca');
Route::get('guest/filtro/talla/{Talla}','GuestController@filtrarTalla');
Route::get('guest/register','GuestController@redirectRegister')->name('guest?register');

//Rutas de eliminación
Route::get('admin/marca/{Marca}/delete', ['uses' => 'MarcaController@destroy', 'as' => 'Marca.delete']);
Route::get('admin/tipo-producto/{TipoProducto}/delete', ['uses' => 'TipoProductoController@destroy', 'as' => 'TipoProducto.delete']);
Route::get('admin/ciudad/{Ciudad}/delete', ['uses' => 'CiudadController@destroy', 'as' => 'Ciudad.delete']);
Route::get('admin/tienda/{Tienda}/delete', ['uses' => 'TiendaController@destroy', 'as' => 'Tienda.delete']);
Route::get('admin/bodega/{Bodega}/delete', ['uses' => 'BodegaController@destroy', 'as' => 'Bodega.delete']);
Route::get('admin/talla/{Talla}/delete', ['uses' => 'TallaController@destroy', 'as' => 'Talla.delete']);


//Agregar al carro
Route::resource('carro/detalle', 'Usuario\DetallePedidoController');

//Eliminar del carro
Route::get('eliminardetalle/{Producto}/{Talla}', 'Usuario\DetallePedidoController@destroy');

//Modal
Route::get('admin/existencia-producto/{Producto}/create-producto', ['uses' => 'CommonController@createExistenciaProducto', 'as' => 'ExistenciaProducto.create']);

//Ajax
Route::get('ajax-BodegasFind','AjaxController@ajaxBodegasFind')->name('ajax.bodegasfind');
Route::get('ajax-UpdateCarro','AjaxController@ajaxUpdateCarro')->name('ajax.updatecarro');
Route::get('ajax-PecioProductoFind','AjaxController@ajaxPecioProductoFind')->name('ajax.precioproductofind');
