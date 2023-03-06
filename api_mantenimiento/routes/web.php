<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CuotaController;
use App\Http\Controllers\IncidenciaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;

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
Route::group(['prefix' => ''], function() {
    Route::get('/', [IncidenciaController::class, 'mostrarIncidencias'])->name('incidencias')->middleware(['auth']);;
});

Route::group(['prefix' => 'incidencias'], function() {
    Route::get('/registrar', [IncidenciaController::class, 'mostrarFormularioRegistrarIncidencia'])->name('incidencias.registrar.get')->middleware(['auth', 'cliente']);
    Route::post('/registrar', [IncidenciaController::class, 'registrarIncidencia'])->name('incidencias.registrar.post')->middleware(['auth', 'cliente']);
    Route::get('/editar/{id_incidencia}', [IncidenciaController::class, 'mostrarFormularioEditarIncidencia'])->name('incidencias.editar.get')->middleware(['auth', 'admin']);
    Route::post('/editar/{id_incidencia}', [IncidenciaController::class, 'editarIncidencia'])->name('incidencias.editar.post')->middleware(['auth', 'admin']);
    Route::get('/cambiarEstado/{id_incidencia}', [IncidenciaController::class, 'mostrarFormularioCambiarEstadoIncidencia'])->name('incidencias.cambiarEstado.get')->middleware(['auth', 'empleado']);
    Route::post('/cambiarEstado/{id_incidencia}', [IncidenciaController::class, 'cambiarEstadoIncidencia'])->name('incidencias.cambiarEstado.post')->middleware(['auth', 'empleado']);
    Route::post('/borrar/{id_incidencia}', [IncidenciaController::class, 'borrarIncidencia'])->name('incidencias.borrar.post')->middleware(['auth', 'admin']);
    Route::get('/', [IncidenciaController::class, 'mostrarIncidencias'])->name('incidencias')->middleware(['auth']);
});

Route::group(['prefix' => 'empleados'], function() {
    Route::get('/crear',[EmpleadoController::class, 'mostrarRegistrarEmpleado'])->name('empleados.registrar.get')->middleware(['auth', 'admin']);
    Route::post('/crear',[EmpleadoController::class, 'registrarEmpleado'])->name('empleados.registrar.post')->middleware(['auth', 'admin']);
    Route::get('/editar/{id_empleado}',[EmpleadoController::class, 'mostrarModificarEmpleado'])->name('empleados.editar.get')->middleware(['auth', 'admin']);
    Route::post('/editar/{id_empleado}',[EmpleadoController::class, 'modificarEmpleado'])->name('empleados.editar.post')->middleware(['auth', 'admin']);
    Route::get('/',[EmpleadoController::class, 'mostrarListaEmpleados'])->name('empleados')->middleware(['auth', 'admin']);
    Route::delete('/bajaEmpleado/{id_empleado}', 'EmpleadoController@eliminarEmpleado')->name('empleados.eliminar')->middleware(['auth', 'admin']);
    Route::put('/cambioTipoEmpleado/{id_empleado}', 'EmpleadoController@cambioTipoEmpleado')->name('empleados.cambio')->middleware(['auth', 'admin']);
});

Route::group(['prefix' => 'clientes'], function() {
    Route::get('/crear',[ClienteController::class, 'mostrarRegistrarCliente'])->name('clientes.registrar.get')->middleware(['auth', 'admin']);
    Route::post('/crear',[ClienteController::class, 'registrarCliente'])->name('clientes.registrar.post')->middleware(['auth', 'admin']);
    Route::get('/editar/{id_cliente}',[ClienteController::class, 'mostrarModificarCliente'])->name('clientes.editar.get')->middleware(['auth', 'admin']);
    Route::post('/editar/{id_cliente}',[ClienteController::class, 'modificarCliente'])->name('clientes.editar.post')->middleware(['auth', 'admin']);
    Route::get('/',[ClienteController::class, 'mostrarListaClientes'])->name('clientes')->middleware(['auth', 'admin']);
});

Route::group(['prefix' => 'cuotas'], function() {
    Route::get('/crear',[CuotaController::class, 'mostrarRegistrarCuota'])->name('cuotas.registrar.get')->middleware(['auth', 'admin']);
    Route::post('/crear',[CuotaController::class, 'registrarCuota'])->name('cuotas.registrar.post')->middleware(['auth', 'admin']);
    Route::get('/editar/{id_cuota}',[CuotaController::class, 'mostrarModificarCuota'])->name('cuotas.editar.get')->middleware(['auth', 'admin']);
    Route::post('/editar/{id_cuota}',[CuotaController::class, 'modificarCuota'])->name('cuotas.editar.post')->middleware(['auth', 'admin']);
    Route::get('/remesaMensual',[CuotaController::class, 'mostrarRemesaMensual'])->name('cuotas.remesa.crearRemesaMensual.get')->middleware(['auth', 'admin']);
    Route::post('/remesaMensual',[CuotaController::class, 'crearRemesaMensual'])->name('cuotas.remesa.crearRemesaMensual.post')->middleware(['auth', 'admin']);
    Route::get('/pdf/{id_cuota}',[PDFController::class, 'crearPDFCuota'])->name('cuotas.pdf')->middleware(['auth', 'admin']);
    Route::post('/borrar/{id_cuota}',[CuotaController::class, 'borrarCuota'])->name('cuotas.borrar.post')->middleware(['auth', 'admin']);
    Route::get('/',[CuotaController::class, 'mostrarListaCuotas'])->name('cuotas')->middleware(['auth', 'admin']);
});

Route::group(['prefix' => 'facturas'], function() {
    Route::get('/', 'CuotaController@listadoCuotas')->name('facturas')->middleware(['auth', 'admin']);
});

Route::group(['prefix' => 'user'], function() {
    Route::post('/password/reset', [UserController::class, 'resetearContraseña'])->name('user.password.reset');
});

Auth::routes();