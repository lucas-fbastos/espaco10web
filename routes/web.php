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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//imoveis
Route::post('/imovel', "ImovelController@store");
Route::get('/imovel/gerenciar', "ImovelController@gerenciar");
Route::get('/imovel/editar/{id}',"ImovelController@edit");
Route::put('/imovel/{id}', "ImovelController@update");
Route::delete('/imovel/{id}', "ImovelController@destroy");
Route::patch('/imovel.ocultar/{id}', "ImovelController@ocultar");
Route::patch('/imovel.exibir/{id}', "ImovelController@exibir");
Route::delete('/imovel.img/{id}',"ImovelController@removeImg");
Route::put('/imovel.addImg/{id}',"ImovelController@addImg");
//clientes
Route::get('/cliente/gerenciar', "ClienteController@index");
Route::post('/cliente', "ClienteController@store");
Route::delete('/cliente/{id}', "ClienteController@destroy");
Route::put('/cliente/{id}','ClienteController@update');

//site
Route::get('/', "ImovelController@index");
Route::get('/{id}',"ImovelController@show");