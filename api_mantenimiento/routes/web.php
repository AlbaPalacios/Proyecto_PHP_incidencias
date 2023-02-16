<?php

use App\Http\Controllers\IncidenciaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

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
})->middleware('auth');

Route::group(['prefix' => 'incidencias'], function() {
    Route::get('/registrar', [IncidenciaController::class, 'mostrarFormularioRegistrarIncidencia'])->name('incidencias.registrar.get');
    Route::post('/registrar', [IncidenciaController::class, 'registrarIncidencia'])->name('incidencias.registrar.post');
    Route::get('/editar/{id_incidencia}', [IncidenciaController::class, 'mostrarFormularioEditarIncidencia'])->name('incidencias.editar.get');
    Route::post('/editar/{id_incidencia}', [IncidenciaController::class, 'editarIncidencia'])->name('incidencias.editar.post');
    Route::get('/{id_cliente}', [IncidenciaController::class, 'mostrarIncidenciasCliente'])->name('incidencias.mostrar.cliente');
    //Route::post('/asignarIncidencia/{id_empleado}', 'IncidenciaController@asignarIncidencia')->name('incidencias.asignarIncidencia');

});

Route::group(['prefix' => 'empleados'], function() {
 
    Route::get('/crear',[EmpleadoController::class, 'mostrarRegistrarEmpleado'])->name('empleados.registrar.get');
    Route::post('/crear',[EmpleadoController::class, 'registrarEmpleado'])->name('empleados.registrar.post');
    Route::get('/editar/{id_empleado}',[EmpleadoController::class, 'mostrarModificarEmpleado'])->name('empleados.editar.get');
    Route::post('/editar/{id_empleado}',[EmpleadoController::class, 'modificarEmpleado'])->name('empleados.editar.post');
    Route::get('/',[EmpleadoController::class, 'mostrarListaEmpleados'])->name('empleados');

    Route::delete('/bajaEmpleado/{id_empleado}', 'EmpleadoController@eliminarEmpleado')->name('empleados.eliminar');
    Route::put('/cambioTipoEmpleado/{id_empleado}', 'EmpleadoController@cambioTipoEmpleado')->name('empleados.cambio');
    
});

Route::group(['prefix' => 'cuotas'], function() {
    Route::post('/añadirCuota/{id_cliente}', 'CuotaController@añadirCuota')->name('cuotas.añadir');
    Route::delete('/borrarCuota/{id_cuota}', 'CuotaController@borrarCuota')->name('cuotas.borrar');
    Route::get('/listadoCuotas/{id_cliente}', 'CuotaController@listadoCuotas')->name('cuotas.listado');
    Route::put('/modificarCuota/{id_cuota}', 'CuotaController@modificarCuota')->name('cuotas.modificar');
    Route::post('/', 'CuotaController@añadirCuota')->name('cuotas');
});

Route::group(['prefix' => 'clientes'], function() {
    Route::get('/crear', [App\Http\Controllers\AdminController::class, 'mostrarFormularioCrearCliente'])->name('admin.cliente.crear.get');
    Route::get('/', 'CuotaController@listadoCuotas')->name('clientes');

});

Route::group(['prefix' => 'facturas'], function() {
    Route::get('/', 'CuotaController@listadoCuotas')->name('clientes');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
