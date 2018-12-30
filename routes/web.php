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


//CRUD DE CATEGORIAS//
/*---------------------------------------*/
/* Listar Categorias */
Route::get('/categoria', function(){
    return view('categoria');
});
Route::get('categoria', 'CategoriaController@index')->name('categoria');

/* Formulario de Registrar Categoria */
Route::get('/categoriaAdd', function(){
    return view('categoriaAdd');
});
Route::get('categoriaAdd', 'CategoriaController@create')->name('categoriaAdd');

/* Formulario de Editar Categoria */
Route::get('/categoriaEdit/{id}', function($id){
    return view('categoriaEdit');
});
Route::get('/categoriaEdit/{id}', 'CategoriaController@edit')->name('categoriaEdit');


/* Agregar Categoria */
Route::post('/categoriaAdd', 'CategoriaController@post');

/* Editar Categoria */
Route::put('/categoriaEdit/{id}', 'CategoriaController@put');

/* Eliminar Categoria */
Route::delete('/categoria/{id}', 'CategoriaController@delete');
/*---------------------------------------*/


//CRUD DE PROVEEDORES//
/*---------------------------------------*/
/* Listar Proveedores */
Route::get('/proveedor', function(){
    return view('proveedor');
});
Route::get('proveedor', 'ProveedorController@index')->name('proveedor');

/* Formulario de Registrar Proveedor */
Route::get('/proveedorAdd', function(){
    return view('proveedorAdd');
});
Route::get('proveedorAdd', 'ProveedorController@create')->name('proveedorAdd');

/* Formulario de Editar Proveedor */
Route::get('/proveedorEdit/{id}', function($id){
    return view('proveedorEdit');
});
Route::get('/proveedorEdit/{id}', 'ProveedorController@edit')->name('proveedorEdit');


/* Agregar Proveedor */
Route::post('/proveedorAdd', 'ProveedorController@post');

/* Editar Proveedor */
Route::put('/proveedorEdit/{id}', 'ProveedorController@put');

/* Eliminar Proveedor */
Route::delete('/proveedor/{id}', 'ProveedorController@delete');
/*---------------------------------------*/


//CRUD DE CLIENTES//
/*---------------------------------------*/
/* Listar Clientes */
Route::get('/cliente', function(){
    return view('cliente');
});
Route::get('cliente', 'ClienteController@index')->name('cliente');

/* Formulario de Registrar Cliente */
Route::get('/clienteAdd', function(){
    return view('clienteAdd');
});
Route::get('clienteAdd', 'ClienteController@create')->name('clienteAdd');

/* Formulario de Editar Cliente */
Route::get('/clienteEdit/{id}', function($id){
    return view('clienteEdit');
});
Route::get('/clienteEdit/{id}', 'ClienteController@edit')->name('clienteEdit');


/* Agregar Cliente */
Route::post('/clienteAdd', 'ClienteController@post');

/* Editar Cliente */
Route::put('/clienteEdit/{id}', 'ClienteController@put');

/* Eliminar Cliente */
Route::delete('/cliente/{id}', 'ClienteController@delete');
/*---------------------------------------*/


//CRUD DE EMPLEADOS//
/*---------------------------------------*/
/* Listar Empleados */
Route::get('/empleado', function(){
    return view('empleado');
});
Route::get('empleado', 'EmpleadoController@index')->name('empleado');

/* Formulario de Registrar Empleado */
Route::get('/empleadoAdd', function(){
    return view('empleadoAdd');
});
Route::get('empleadoAdd', 'EmpleadoController@create')->name('empleadoAdd');

/* Formulario de Editar Empleado */
Route::get('/empleadoEdit/{id}', function($id){
    return view('empleadoEdit');
});
Route::get('/empleadoEdit/{id}', 'EmpleadoController@edit')->name('empleadoEdit');


/* Agregar Empleado */
Route::post('/empleadoAdd', 'EmpleadoController@post');

/* Editar Empleado */
Route::put('/empleadoEdit/{id}', 'EmpleadoController@put');

/* Eliminar Empleado */
Route::delete('/empleado/{id}', 'EmpleadoController@delete');
/*---------------------------------------*/


//CRUD DE PRODUCTOS//
/*---------------------------------------*/
/* Listar Productos */
Route::get('/producto', function(){
    return view('producto');
});
Route::get('producto', 'ProductoController@index')->name('producto');

/* Formulario de Registrar Producto */
Route::get('/productoAdd', function(){
    return view('productoAdd');
});
Route::get('productoAdd', 'ProductoController@create')->name('productoAdd');

/* Vista de Reporte Producto */
Route::get('/productoView/{id}', function($id){
    return view('productoView');
});
Route::get('/productoView/{id}', 'ProductoController@view')->name('productoView');

/* Formulario de Editar Producto */
Route::get('/productoEdit/{id}', function($id){
    return view('productoEdit');
});
Route::get('/productoEdit/{id}', 'ProductoController@edit')->name('productoEdit');


/* Agregar Producto */
Route::post('/productoAdd', 'ProductoController@post');

/* Editar Producto */
Route::put('/productoEdit/{id}', 'ProductoController@put');

/* Eliminar Producto */
Route::delete('/producto/{id}', 'ProductoController@delete');
/*---------------------------------------*/