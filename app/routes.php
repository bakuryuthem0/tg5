<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@getIndex');
Route::get('servicios/{id}','ServiceController@getService');

Route::post('servicios/movil','ServiceController@postMobilService');
Route::post('buscar','ServiceController@postService');
Route::post('enviar-correo','ContactController@postContact');


	Route::get('administrador','AdminController@getLogin');
	Route::post('administrador/iniciar-sesion','AdminController@postLogin');


Route::group(array('before' => 'auth'), function() {
	Route::get('administrador/inicio','AdminController@getIndex');

	Route::get('administrador/nuevo-slide','AdminController@getNewSlide');	
	Route::post('administrador/nuevo-slide/procesar','AdminController@postNewSlide');

	Route::get('administrador/editar-slides','AdminController@getEditSlides');
	Route::post('administrador/editar-slides/actualizar','AdminController@postEditSlides');
	Route::post('administrador/editar-slides/eliminar','AdminController@postElimSlides');

	Route::post('administrador/nuevos-slides/procesar','AdminController@post_upload');
	Route::post('administrador/nuevos-slides/remover','AdminController@post_delete');

	Route::get('cerrar-sesion','AdminController@logout');
});