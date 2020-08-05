<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('produtos', 'ProdutoController'); //->middleware('auth');

/*
Route::delete('produtos/{id}', 'ProdutoController@destroy')->name('produtos.destroy');
Route::put('produtos/{id}', 'ProdutoController@update')->name('produtos.update');
Route::get('produtos/{id}/edit', 'ProdutoController@edit')->name('produtos.edit');
Route::get('produtos/create', 'ProdutoController@create')->name('produtos.create');
Route::get('produtos/{id}', 'ProdutoController@show')->name('produtos.show');
Route::get('produtos', 'ProdutoController@index')->name('produtos.index');
Route::post('produtos', 'ProdutoController@store')->name('produtos.store');
*/

Route::get('/login', function(){
    return 'Login';
})->name('login');

Route::get('/gerenciamento', function () {
    return view('admin.gerenciamento');
});
