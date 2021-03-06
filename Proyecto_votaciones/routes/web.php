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

Route::get('/', [
	'uses' => 'Controller@custom_login',
	'as' => 'usuario.login'
]);
//uses indica el nombre del controlador @ nombre del metodo dentro de ese controlador 
//as -> se le da un nombre personalizado a esa ruta 
//ruta para redireccionar al usuario dependiendo de que rol tenga 
Route::get('/redireccionarUsuario', [
	'uses' => 'UserController@redireccionar',
	'as' => 'redireccionar'
]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
	
	Route::get('/', [
		'uses' => 'UserController@admin_index',
		'as' => 'admin'
	]);
	Route::group(['prefix' => 'usuario'], function()
 	{   
 		
		Route::get('autorizar/{codigo}', 'AdminController@autorizar_usuario')->name('usuario.autorizar');
		Route::get('desautorizar/{codigo}', 'AdminController@desautorizar_usuario')->name('usuario.desautorizar');
  	});

});

Route::group(['prefix' => 'votante', 'middleware' => 'auth'], function(){
	
	Route::get('/', [
		'uses' => 'UserController@votante_index',
		'as' => 'votante'
	]);

	Route::post('/votar', 'UserController@votar')->name('votar');

	Route::get('autorizar/{codigo}', 'UserController@autorizar')->name('autorizar');
	
	Route::get('desautorizar/{codigo}', 'UserController@desautorizar')->name('desautorizar');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
