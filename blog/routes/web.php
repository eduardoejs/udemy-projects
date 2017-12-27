<?php

use App\Artigo;
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
  $lista = Artigo::listaArtigosSite(3);
  return view('site', compact('lista'));
})->name('site');

Route::get('/artigo/{id}/{titulo?}', function ($id) {
  $artigo = Artigo::find($id);
  if($artigo){
    return view('artigo', compact('artigo'));
  }
  return redirect()->route('site');
})->name('artigo');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');

Route::middleware(['auth'])->prefix('admin')->namespace('Admin')->group(function(){

  Route::resource('artigos', 'ArtigosController');
  Route::get('/trashed/artigos', 'ArtigosController@trashed')->name('artigos.excluidos');
  Route::post('/trashed/artigos/delete/', 'ArtigosController@forceDelete')->name('artigos.forceDelete');
  Route::resource('usuarios', 'UsuariosController');
  Route::resource('autores', 'AutoresController');

});
