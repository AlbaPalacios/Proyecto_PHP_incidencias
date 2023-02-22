<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CuotaController;
use App\Http\Controllers\IncidenciaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PDFController;

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

Route::group(['prefix' => 'clientes'], function() {
    Route::get('/crear',[ClienteController::class, 'mostrarRegistrarCliente'])->name('clientes.registrar.get');
    Route::post('/crear',[ClienteController::class, 'registrarCliente'])->name('clientes.registrar.post');
    Route::get('/editar/{id_cliente}',[ClienteController::class, 'mostrarModificarCliente'])->name('clientes.editar.get');
    Route::post('/editar/{id_cliente}',[ClienteController::class, 'modificarCliente'])->name('clientes.editar.post');
    Route::get('/',[ClienteController::class, 'mostrarListaClientes'])->name('clientes');
});

Route::group(['prefix' => 'cuotas'], function() {
    Route::get('/crear',[CuotaController::class, 'mostrarRegistrarCuota'])->name('cuotas.registrar.get');
    Route::post('/crear',[CuotaController::class, 'registrarCuota'])->name('cuotas.registrar.post');
    Route::get('/editar/{id_cuota}',[CuotaController::class, 'mostrarModificarCuota'])->name('cuotas.editar.get');
    Route::post('/editar/{id_cuota}',[CuotaController::class, 'modificarCuota'])->name('cuotas.editar.post');
    Route::get('/remesaMensual',[CuotaController::class, 'mostrarRemesaMensual'])->name('cuotas.remesa.crearRemesaMensual.get');
    Route::post('/remesaMensual',[CuotaController::class, 'crearRemesaMensual'])->name('cuotas.remesa.crearRemesaMensual.post');
    Route::get('/pdf/{id_cuota}',[PDFController::class, 'crearPDFCuota'])->name('cuotas.pdf');
    Route::get('/',[CuotaController::class, 'mostrarListaCuotas'])->name('cuotas');
});

Route::group(['prefix' => 'facturas'], function() {
    Route::get('/', 'CuotaController@listadoCuotas')->name('facturas');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
