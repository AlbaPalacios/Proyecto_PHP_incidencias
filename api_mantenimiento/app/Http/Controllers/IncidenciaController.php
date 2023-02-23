<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Incidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class IncidenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mostrarIncidencias(Request $request){
        if(Auth::user()->isAdmin == '1') {
            $incidencias=Incidencia::all();
        }
        else {
            $empleado = Empleado::where('id_user', Auth::user()->id)->first();
            $incidencias=Incidencia::where('id_empleado_asignado', $empleado->id_empleado)->get();
        }
        return view('listaIncidencias',['incidencias' => $incidencias]);
    }
    public function mostrarFormularioRegistrarIncidencia(Request $request){
        $empleados = Empleado::all();
        return view('crearEditarIncidencia',['empleados' => $empleados]);
    }
    public function registrarIncidencia(Request $request){
        $request->validate([
            'nombre_contacto' => 'required',
            'apellido_contacto' => 'required',
            'descripcion' => 'required',
            'nif_cif' => 'required',
            'telefono_contacto' => 'required|regex:/[0-9]{9}/',
            'cp' => 'required|max:5',
            'email_contacto' => 'required|email',
        ]);
        $incidencia = new Incidencia();
        //Metodo fill rellena el objeto incidencia
        $incidencia->fill($request->all());
        $incidencia->save();
        return redirect()->route('incidencias');
    }

    public function mostrarFormularioEditarIncidencia(Request $request, $id_incidencia){
        $incidencia = Incidencia::find($id_incidencia);
        $empleados = Empleado::all();
        return view('crearEditarIncidencia',["incidencia" => $incidencia, 'empleados' => $empleados]);
    }

    public function editarIncidencia(Request $request, $id_incidencia){
        $request->validate([
            'nombre_contacto' => 'required',
            'apellido_contacto' => 'required',
            'descripcion' => 'required',
            'nif_cif' => 'required',
            'telefono_contacto' => 'required|regex:/[0-9]{9}/',
            'cp' => 'required|max:5',
            'email_contacto' => 'required|email',
        ]);
        $incidencia = Incidencia::find($id_incidencia);
        $incidencia->fill($request->all());
        $incidencia->save();
        return redirect()->route('incidencias');
    }

    public function asignarIncidencia(Request $request){

    }
   
}
