<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('paineladmin', function () {
    return view('paineladmin');
})->middleware('auth');

Route::get('listarclientes', function () {
    return view('listarclientes');
})->middleware('auth');

Auth::routes();

Route::any('produtos/search', 'ProdutoController@search')->name('produtos.search');
Route::any('clientes/search', 'ProdutoController@search')->name('produtos.search');
//Route::resource('produtos', 'ProdutoController'); //->middleware('auth');


Route::delete('produtos/{id}', 'ProdutoController@destroy')->name('produtos.destroy')->middleware('auth');
Route::put('produtos/{id}', 'ProdutoController@update')->name('produtos.update')->middleware('auth');
Route::get('produtos/{id}/edit', 'ProdutoController@edit')->name('produtos.edit')->middleware('auth');
Route::get('produtos/create', 'ProdutoController@create')->name('produtos.create')->middleware('auth');
Route::get('produtos/{id}', 'ProdutoController@show')->name('produtos.show');
Route::get('produtos', 'ProdutoController@index')->name('produtos.index')->middleware('auth');
Route::post('produtos', 'ProdutoController@store')->name('produtos.store')->middleware('auth');
Route::get('/', 'ProdutoController@listprodutos')->name('produtos.listprodutos');

Route::get('gerenciarpedidos', 'PedidoController@todospedidos')->name('pedidos.todospedidos')->middleware('auth');


//Rotas Clientes

Route::delete('clientes/{id}', 'ClienteController@destroy')->name('clientes.destroy');
Route::put('clientes/{id}', 'ClienteController@update')->name('clientes.update');//->middleware('auth');
Route::get('clientes/{id}/edit', 'ClienteController@edit')->name('clientes.edit');//->middleware('auth');
Route::get('clientes/create', 'ClienteController@create')->name('clientes.create');//->middleware('auth');
Route::get('clientes/{id}', 'ClienteController@show')->name('clientes.show');
Route::get('clientes', 'ClienteController@index')->name('clientes.index');//->middleware('auth');
Route::post('{clientes', 'ClienteController@store')->name('clientes.store');//->middleware('auth');

Route::get('listarclientes', 'ClienteController@listarclientes')->name('clientes.listarclientes')->middleware('auth');
//Route::get('clientes', 'ClienteController@listprodutos')->name('clientes.listprodutos');
//Rotas Pedidos

Route::delete('pedidos/{id}', 'PedidoController@destroy')->name('pedidos.destroy');//->middleware('auth');
Route::put('pedidos/{id}', 'PedidoController@update')->name('pedidos.update');//->middleware('auth');
Route::get('pedidos/{id}/edit', 'PedidoController@edit')->name('pedidos.edit');//->middleware('auth');
Route::get('pedidos/create', 'PedidoController@create')->name('pedidos.create');//->middleware('auth');
Route::get('pedidos/{id}', 'PedidoController@show')->name('pedidos.show');
Route::get('pedidos', 'PedidoController@index')->name('pedidos.index');//->middleware('auth');
Route::post('pedidos', 'PedidoController@store')->name('pedidos.store');//->middleware('auth');
Route::get('clientes/{id}/listapedidos', 'PedidoController@listpedidos')->name('pedidos.listpedidos');


//Login e Autenticação

Route::get('/login', function(){
    return 'Login';
})->name('login');

Route::get('/gerenciamento', function () {
    return view('admin.gerenciamento');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
