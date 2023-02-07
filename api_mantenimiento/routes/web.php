<?php

use App\Http\Controllers\IncidenciaController;
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
    return view('welcome');
});

Route::group(['prefix' => 'incidencias'], function() {
    Route::get('/registrar', [IncidenciaController::class, 'mostrarFormularioRegistrarIncidencia'])->name('incidencias.registrar.get');
    Route::post('/registrar', [IncidenciaController::class, 'registrarIncidencia'])->name('incidencias.registrar.post');
    Route::post('/editar/{id_incidencia}', [IncidenciaController::class, 'editarIncidencia'])->name('incidencias.editar');
    Route::get('/{id_cliente}', [IncidenciaController::class, 'mostrarIncidenciasCliente'])->name('incidencias.mostrar.cliente');
    Route::post('/asignarIncidencia/{id_empleado}', 'IncidenciaController@asignarIncidencia')->name('incidencias.asignarIncidencia');

});

Route::group(['prefix' => 'empleados'], function() {
    Route::post('/altaEmpleado', 'EmpleadoController@registrarEmpleado')->name('empleados.registrar');
    Route::delete('/bajaEmpleado/{id_empleado}', 'EmpleadoController@eliminarEmpleado')->name('empleados.eliminar');
    Route::put('/cambioTipoEmpleado/{id_empleado}', 'EmpleadoController@cambioTipoEmpleado')->name('empleados.cambio');
    
});

Route::group(['prefix' => 'cuotas'], function() {
    Route::post('/añadirCuota/{id_cliente}', 'CuotaController@añadirCuota')->name('cuotas.añadir');
    Route::delete('/borrarCuota/{id_cuota}', 'CuotaController@borrarCuota')->name('cuotas.borrar');
    Route::get('/listadoCuotas/{id_cliente}', 'CuotaController@listadoCuotas')->name('cuotas.listado');
    Route::put('/modificarCuota/{id_cuota}', 'CuotaController@modificarCuota')->name('cuotas.modificar');
});