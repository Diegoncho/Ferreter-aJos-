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

/*----------------------------------------*/
 /* Formulario Login de Aplicacion */
 Route::get('/', 'Auth\LoginController@showLoginForm');
 Route::get('login', 'Auth\LoginController@showLoginForm');
 Route::get('logout', 'Auth\LoginController@logout');
 
 /* Funciones del Formulario */
 Route::post('login', 'Auth\LoginController@login')->name('login');
 
 
 Route::post('logout', 'Auth\LoginController@logout')->name('logout');
 /*---------------------------------------*/


/*---------------------------------------*/
/* Menu de Aplicacion */
Route::get('menu', 'MenuController@index')->name('menu');
/*---------------------------------------*/ 


//CRUD DE MARCAS//
/*---------------------------------------*/
/* Listar Marcas */
Route::get('/marca', function(){
    return view('marca');
});
Route::get('marca', 'MarcaController@index')->name('marca');

/* Formulario de Registrar Marca */
Route::get('/marcaAdd', function(){
    return view('marcaAdd');
});
Route::get('marcaAdd', 'MarcaController@create')->name('marcaAdd');

/* Formulario de Editar Marca */
Route::get('/marcaEdit/{id}', function($id){
    return view('marcaEdit');
});
Route::get('/marcaEdit/{id}', 'MarcaController@edit')->name('marcaEdit');


/* Agregar Marca */
Route::post('/marcaAdd', 'MarcaController@post');

/* Editar Marca */
Route::put('/marcaEdit/{id}', 'MarcaController@put');

/* Eliminar Marca */
Route::delete('/marca/{id}', 'MarcaController@delete');
/*---------------------------------------*/


//CRUD DE CARGOS//
/*---------------------------------------*/
/* Listar Cargos */
Route::get('/cargo', function(){
    return view('cargo');
});
Route::get('cargo', 'CargoController@index')->name('cargo');

/* Formulario de Registrar Cargo */
Route::get('/cargoAdd', function(){
    return view('cargoAdd');
});
Route::get('cargoAdd', 'CargoController@create')->name('cargoAdd');

/* Formulario de Editar Cargo */
Route::get('/cargoEdit/{id}', function($id){
    return view('cargoEdit');
});
Route::get('/cargoEdit/{id}', 'CargoController@edit')->name('cargoEdit');


/* Agregar Cargo */
Route::post('/cargoAdd', 'CargoController@post');

/* Editar Cargo */
Route::put('/cargoEdit/{id}', 'CargoController@put');

/* Eliminar Cargo */
Route::delete('/cargo/{id}', 'CargoController@delete');
/*---------------------------------------*/