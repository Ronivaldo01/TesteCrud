<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/nova-categoria', function (){
    return view('nova-categoria');
});
Route::get('/novo-produto', 'ProdutoController@create');
Route::post('/produtos', 'ProdutoController@store')->name('produtos');
Route::get('/produtos', 'ProdutoController@index');
Route::get('/produtos/editar/{id}', 'ProdutoController@edit');
Route::post('/produtos/{id}', 'ProdutoController@update');
Route::get('/produtos/apagar/{id}', 'ProdutoController@destroy');

Route::get('/categorias', 'CategoriaController@index')->name('categorias');
Route::post('/categorias', 'CategoriaController@store');
Route::get('/categorias/editar/{id}', 'CategoriaController@edit')->name('editar');
Route::post('/categorias/{id}', 'CategoriaController@update');
Route::get('/categorias/apagar/{id}', 'CategoriaController@destroy');

Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('produtos').'">clique aqui</a> para ir para página inicial';
});
