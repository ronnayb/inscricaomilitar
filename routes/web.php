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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'polos', 'as' => 'polos.'],function(){
	Route::get('/', 'PoloController@index')->name('list');
	Route::get('/novo', 'PoloController@create')->name('new');
	Route::post('/','PoloController@store')->name('save');
	Route::get('/editar/{id}','PoloController@edit')->name('edit');
	Route::put('/{id}','PoloController@update')->name('update');
	Route::delete('/{id}','PoloController@destroy')->name('delete');
});


Route::group(['prefix' => 'unidades', 'as' => 'unidades.'],function(){
	Route::get('/', 'UnidadeController@index')->name('list');
	Route::get('/polo/{id?}', 'ApiController@unidades')->name('show');
	Route::get('/novo', 'UnidadeController@create')->name('new');
	Route::post('/','UnidadeController@store')->name('save');
	Route::get('/editar/{id}','UnidadeController@edit')->name('edit');
	Route::put('/{id}','UnidadeController@update')->name('update');
	Route::delete('/{id}','UnidadeController@destroy')->name('delete');
});

Route::group(['prefix' => 'cursos', 'as' => 'cursos.'],function(){
	Route::get('/', 'CursoController@index')->name('list');
	Route::get('/unidade/{id?}/seletivo/{idSeletivo?}', 'ApiController@cursos')->name('show');
	Route::get('/novo', 'CursoController@create')->name('new');
	Route::post('/','CursoController@store')->name('save');
	Route::get('/editar/{id}','CursoController@edit')->name('edit');
	Route::put('/{id}','CursoController@update')->name('update');
	Route::delete('/{id}','CursoController@destroy')->name('delete');
});

Route::group(['prefix' => 'seletivos', 'as' => 'seletivos.'],function(){
	Route::get('/', 'SeletivoController@index')->name('list');
	Route::get('/novo', 'SeletivoController@create')->name('new');
	Route::post('/','SeletivoController@store')->name('save');
	Route::get('/{id}','SeletivoController@show')->name('show');
	Route::get('/editar/{id}','SeletivoController@edit')->name('edit');
	Route::put('/{id}','SeletivoController@update')->name('update');
	Route::delete('/{id}','SeletivoController@destroy')->name('delete');
	Route::get('/{id}/cursos','SeletivoController@showCourse')->name('addCursos');
	Route::post('/cursos','SeletivoController@addCursos')->name('storeCourse');

	/*Route::get('/{id}/arquivos/','ArquivoController@index')->name('arquivos-list');*/
	Route::get('/{id}/arquivos/','ArquivoController@create')->name('arquivos-create');
	Route::post('/arquivos','ArquivoController@store')->name('arquivos-save');
});

Route::group(['prefix' => 'inscricao', 'as' => 'inscricao.'],function(){
	Route::get('/seletivo/{id}','InscricaoController@index')->name('list');
	Route::get('/','InscricaoController@create')->name('new');
	Route::post('/', 'InscricaoController@store')->name('save');
	Route::get('{id}/editar/','InscricaoController@edit')->name('edit');
	Route::put('/{id}','InscricaoController@update')->name('update');
	Route::get('/inscritos','InscricaoController@find')->name('find');
	Route::get('/{id}','InscricaoController@show')->name('show');
	Route::get('/seletivo/{idSeletivo}/curso/{idCurso}','InscricaoController@relatorio')->name('relatorio');
});