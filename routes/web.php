<?php
Route::get('/', function()
{
    return '<h1>Primeira lógica com Laravel</h1>';
});

// PRODUTOS
Route::get('/produtos', 'ProdutoController@lista');
Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra')->where('id', '[0-9]+');
Route::get('/produtos/form/', [
    'middleware' => 'nosso-middleware',
    'uses' => 'ProdutoController@form'
]);

Route::post('/produtos/insert', 'ProdutoController@insert');

Route::get('/produtos/edit/{id}', 'ProdutoController@edit')->where('id', '[0-9]+');
Route::post('/produtos/update/{id}', 'ProdutoController@update')->where('id', '[0-9]+');
Route::get('/produtos/json', 'ProdutoController@listaJson');
Route::get('/produtos/remove/{id}', [
    'middleware' => 'nosso-middleware',
    'uses' => 'ProdutoController@remove'
])->where('id', '[0-9]+');

//USERS
Route::get('/users', 'UserController@lista');
Route::get('/users/mostra/{id}', 'UserController@mostra')->where('id', '[0-9]+');
Route::get('/users/form/', 'UserController@form');
Route::post('/users/insert', 'UserController@insert');
Route::get('/users/edit/{id}', 'UserController@edit')->where('id', '[0-9]+');
Route::post('/users/update/{id}', 'UserController@update')->where('id', '[0-9]+');
Route::get('/produtos/json', 'UserController@listaJson');
Route::get('/users/remove/{id}', 'UserController@remove')->where('id', '[0-9]+');

//CATEGORIAS
Route::get('/categorias', 'CategoriaController@lista');
Route::get('/categorias/mostra/{id}', 'CategoriaController@mostra')->where('id', '[0-9]+');
Route::get('/categorias/form/', 'CategoriaController@form');
Route::post('/categorias/insert', 'CategoriaController@insert');
Route::get('/categorias/edit/{id}', 'CategoriaController@edit')->where('id', '[0-9]+');
Route::post('/categorias/update/{id}', 'CategoriaController@update')->where('id', '[0-9]+');
Route::get('/categorias/json', 'CategoriaController@listaJson');
Route::get('/categorias/remove/{id}', 'CategoriaController@remove')->where('id', '[0-9]+');

Route::get('/tipos', 'TipoController@lista');
Route::get('/tipos/mostra/{id}', 'TipoController@mostra')->where('id', '[0-9]+');
Route::get('/tipos/form/', 'TipoController@form');
Route::post('/tipos/insert', 'TipoController@insert');
Route::get('/tipos/edit/{id}', 'TipoController@edit')->where('id', '[0-9]+');
Route::post('/tipos/update/{id}', 'TipoController@update')->where('id', '[0-9]+');
Route::get('/tipos/json', 'TipoController@listaJson');
Route::get('/tipos/remove/{id}', 'TipoController@remove')->where('id', '[0-9]+');


Route::get('/login', 'LoginController@login');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
