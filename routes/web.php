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

Route::get('/', 'LoginController@frmLogin')->name('frmlogin');
Route::post('/login', 'LoginController@login')->name('login');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function (){
  Route::get('/', 'DashboardController@index')->name('dashboard');
  Route::get('/logout', 'LoginController@logout')->name('logout');

  //<sistema>
  Route::get('/sistema/{sistema}', 'SistemaController@edit')->name('sistema.edit');
  Route::post('/sistema/{sistema}', 'SistemaController@update')->name('sistema.update');
  //</sistema>

  //<configuracion del los correos>
  Route::get('/email', 'EmailSettingController@index')->name('email.index');
  Route::get('/email/email-ajax', 'EmailSettingController@indexAjax')->name('email.index-ajax');
  Route::get('/email/crear', 'EmailSettingController@create')->name('email.create');
  Route::post('/email/crear', 'EmailSettingController@store')->name('email.store');
  Route::get('/email/editar/{email}', 'EmailSettingController@edit')->name('email.edit');
  Route::post('/email/editar/{email}', 'EmailSettingController@update')->name('email.update');
  Route::get('/email/eliminar/{email}', 'EmailSettingController@destroy')->name('email.destroy');
  //</configuracion del los correos>

  //<usuarios>
  Route::get('/usuarios', 'UserController@index')->name('user.index');
  Route::get('/usuarios-ajax', 'UserController@indexAjax')->name('user.index-ajax');
  Route::get('/usuarios/crear', 'UserController@create')->name('user.create');
  Route::post('/usuarios/crear', 'UserController@store')->name('user.store');
  Route::get('/usuarios/editar/{user}', 'UserController@edit')->name('user.edit');
  Route::get('/usuarios/roles/{rol}', 'UserController@permisos')->name('user.edit-permisos');
  Route::post('/usuarios/roles/{rol}', 'UserController@permisosSave')->name('user.edit-permisos');
  Route::post('/usuarios/editar/{user}', 'UserController@update')->name('user.update');
  Route::get('/usuarios/perfil/{user}', 'UserController@frmPerfil')->name('user.perfil');
  Route::post('/usuarios/perfil/{user}', 'UserController@perfil')->name('user.perfil');
  Route::post('/usuarios/eliminar/{user}', 'UserController@destroy')->name('user.destroy');
  //</usuarios>

  //<tipo de documento>
  Route::get('/tipos-documento', 'TipoDocumentoController@index')->name('tpdocumento.index');
  Route::get('/tipos-documento-ajax', 'TipoDocumentoController@indexAjax')->name('tpdocumento.index-ajax');
  Route::get('/tipos-documento/crear', 'TipoDocumentoController@create')->name('tpdocumento.create');
  Route::post('/tipos-documento/crear', 'TipoDocumentoController@store')->name('tpdocumento.store');
  Route::get('/tipos-documento/editar/{tipo}', 'TipoDocumentoController@edit')->name('tpdocumento.edit');
  Route::post('/tipos-documento/editar/{tipo}', 'TipoDocumentoController@update')->name('tpdocumento.update');
  Route::post('/tipos-documento/eliminar/{tipo}', 'TipoDocumentoController@destroy')->name('tpdocumento.destroy');
  //</tipo de documento>

  //<lientes>
  Route::get('/clientes', 'ClienteController@index')->name('cliente.index');
  Route::get('/clientes-ajax', 'ClienteController@indexAjax')->name('cliente.index-ajax');
  Route::get('/clientes/crear', 'ClienteController@create')->name('cliente.create');
  Route::post('/clientes/crear', 'ClienteController@store')->name('cliente.store');
  Route::get('/clientes/editar/{cliente}', 'ClienteController@edit')->name('cliente.edit');
  Route::post('/clientes/editar/{cliente}', 'ClienteController@update')->name('cliente.update');
  Route::post('/clientes/eliminar/{cliente}', 'ClienteController@destroy')->name('cliente.destroy');
  //</lientes>
});
