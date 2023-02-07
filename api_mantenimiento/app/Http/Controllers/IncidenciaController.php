<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class IncidenciaController extends Controller
{
    public function mostrarIncidenciasCliente(Request $request, $id_cliente){
        $incidencias=Incidencia::where('id_cliente', $id_cliente)->get();
        $isAdmin = false; 
        return view('listaIncidencias',compact('incidencias', 'isAdmin'));
    }
    public function mostrarFormularioRegistrarIncidencia(Request $request){
        return view('crearEditarIncidencia',[]);
    }
    public function registrarIncidencia(Request $request){
        $request->validate([
            'nombre_contacto' => 'required',
            'apellido_contacto' => 'required',
            'descripcion' => 'required',
            'nif_cif' => 'required',
            'telefono_contacto' => 'required|regex:/(01)[0-9]{9}/',
            'cp' => 'required|max:5',
            'email_contacto' => 'required|email',
        ]);
        $incidencia = new Incidencia();
        $incidencia->nif_cif = $request->nif_cif;
        $incidencia->nombre_contacto = $request->nombre_contacto;
        $incidencia->apellido_contacto = $request->apellido_contacto;
        $incidencia->telefono_contacto = $request->telefono_contacto;
        $incidencia->descripcion = $request->descripcion;
        $incidencia->email_contacto = $request->email_contacto;
        $incidencia->direccion = $request->direccion;
        $incidencia->poblacion = $request->poblacion;
        $incidencia->cp = $request->cp;
        $incidencia->provincia = $request->provincia;
        $incidencia->estado = $request->estado;
        $incidencia->fecha_creacion = $request->fecha_creacion;
        $incidencia->fecha_realizacion = $request->fecha_realizacion;
        $incidencia->anotacion_anterior = $request->anotacion_anterior;
        $incidencia->anotacion_posterior = $request->anotacion_posterior;
        $incidencia->save();
        $incidencias=Incidencia::where('id_cliente', 1)->get();
        $isAdmin = false; 
        return view('listaIncidencias',compact('incidencias', 'isAdmin'));
    }
    public function asignarIncidencia(Request $request){

    }
   
}
