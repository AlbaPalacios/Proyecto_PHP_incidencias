<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpleadoController extends Controller
{   
    public function mostrarRegistrarEmpleado(Request $request){
        
        return view('crearEditarEmpleado',[]);
    }
    public function registrarEmpleado(Request $request){

    }
    public function eliminarEmpleado(Request $request){

    }
    public function cambioTipoEmpleado(Request $request){
        
    }



}
