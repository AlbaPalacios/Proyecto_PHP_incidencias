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
        $incidencia->fill($request->all());
        $incidencia->save();
        $incidencias=Incidencia::where('id_cliente', 1)->get();
        $isAdmin = false; 
        return view('listaIncidencias',compact('incidencias', 'isAdmin'));
    }

    public function mostrarFormularioEditarIncidencia(Request $request, $id_incidencia){
        $incidencia = Incidencia::find($id_incidencia);
        return view('crearEditarIncidencia',["incidencia" => $incidencia, "id_incidencia" => $id_incidencia]);
    }

    public function editarIncidencia(Request $request, $id_incidencia){
        $request->validate([
            'nombre_contacto' => 'required',
            'apellido_contacto' => 'required',
            'descripcion' => 'required',
            'nif_cif' => 'required',
            'telefono_contacto' => 'required|regex:/(01)[0-9]{9}/',
            'cp' => 'required|max:5',
            'email_contacto' => 'required|email',
        ]);
        $incidencia = Incidencia::find($id_incidencia);
        $incidencia->fill($request->all());
        $incidencia->save();
        $incidencias=Incidencia::where('id_cliente', 1)->get();
        $isAdmin = false; 
        return view('listaIncidencias',compact('incidencias', 'isAdmin'));
    }

    public function asignarIncidencia(Request $request){

    }
   
}
