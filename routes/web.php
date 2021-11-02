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
    return view('page/index');
});


Route::get('/', 'Admin\HomeController@index')->name('home');

Route::get('home', 'Admin\HomeController@index')->name('home');

//Rutas de Catalogo Sucursal
Route::resource('admin/sucursales','Admin\SucursalController')->parameters(['sucursales'=>'sucursales'])->names('admin.sucursales');


//Rutas de Catalogo de Categorias
Route::resource('admin/categorias','Admin\CategoriaController')->parameters(['categorias'=>'categorias'])->names('admin.categorias');


//Rutas de Catalogo Productos
Route::resource('admin/productos','Admin\ProductoController')->parameters(['productos'=>'productos'])->names('admin.productos');
//Rutas para clientes
Route::resource('admin/clientes','Admin\ClienteController')->parameters(['clientes'=>'clientes'])->names('admin.clientes');

//Rutas para Empleado
Route::resource('admin/empleados','Admin\EmpleadoController')->parameters(['empleados'=>'empleados'])->names('admin.empleados');


//Rutas de ventas
Route::resource('admin/ventas','Admin\VentaController')->parameters(['ventas'=>'ventas'])->names('admin.ventas');

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/usuarios', 'Admin\UserController')->parameters(['usuarios'=>'usuarios'])->names('admin.usuarios');


Route::get('admin/ventas/productosPorCategoria/{id}', 'Admin\CategoriaController@productosPorCategoria');
Route::get('admin/ventas/obtenerDescuento/{id}', 'Admin\ClienteController@obtenerDescuento');


Route::post('admin/guardar/ventas/{id}', 'Admin\VentaController@guardarEstadoVenta');

Route::get('admin/ventas/ticket/{id}', 'Admin\VentaController@imprimirTicket')->name('admin.ventas.ticket');

