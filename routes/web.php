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

Route::get('/', 'ClienteController@index');
Route::post('listajson', 'ClienteController@listaClientesJson');

Route::prefix('cliente')->group(function () {
    Route::get('{cliente}', 'ClienteController@show');
    Route::post('salvar', 'ClienteController@store');
});
Route::get('novo','ClienteController@formCreate');