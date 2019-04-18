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
    Route::get('deletar/{cliente}', 'ClienteController@destroy');
});
Route::get('novo', 'ClienteController@formCreate');

Route::prefix('importacao')->group(function () {
    Route::get('/', 'ArquivoImportacaoController@index');
    Route::post('salvar', 'ArquivoImportacaoController@store');
    Route::post('listajson', 'ArquivoImportacaoController@listaArquivosJson');
    Route::get('importar/{arquivo_importacao}', 'ArquivoImportacaoController@importarArquivo');
});

Route::prefix('email')->group(function () {
    Route::get('/', 'EmailController@form');
    Route::post('enviar', 'EmailController@enviar');
});