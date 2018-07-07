<?php


Route::get('/', function()
{
    return '<h1>Primeira lógica com Laravel</h1>';
});


Route::get('/produtos', 'ProdutoController@lista');
Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra')->where('id', '[0-9]+');
Route::get('/produtos/form/', 'ProdutoController@form');
Route::post('/produtos/insert', 'ProdutoController@insert');
Route::get('/produtos/edit/{id}', 'ProdutoController@edit')->where('id', '[0-9]+');
Route::post('/produtos/update/{id}', 'ProdutoController@update')->where('id', '[0-9]+');
Route::get('/produtos/json', 'ProdutoController@listaJson');
Route::get('/produtos/remove/{id}', 'ProdutoController@remove')->where('id', '[0-9]+');
