<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('crear-cliente', 'ApiController@store')->name('cli.store');
Route::get('cliente/{documento}', 'ApiController@show')->name('cli.show');
Route::get('marcas', 'ApiController@getMarcas')->name('cli.marcas');
Route::get('tipo-vehiculos', 'ApiController@getTipos')->name('cli.tipo');
Route::get('tipos-documento', 'ApiController@getTiposDocumento')->name('cli.tipo.documento');
Route::get('vehiculos', 'ApiController@getVehiculos')->name('cli.vehiculos');
