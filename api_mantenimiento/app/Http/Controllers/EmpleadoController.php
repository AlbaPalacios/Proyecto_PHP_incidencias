<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmpleadoController extends Controller
{   
    public function __construct()
    {
      
    }

    public function mostrarListaEmpleados(Request $request){
        $empleados = Empleado::all();
        return view('empleados.listaEmpleados',["empleados" => $empleados]);
    }
    
    public function mostrarRegistrarEmpleado(Request $request){
        return view('crearEditarEmpleado',[]);
    }
    public function registrarEmpleado(Request $request){
        //crear usuario nuevo
        $usuarioEmpleado = User::create([
            'name' => $request->nombre,
            'email' => $request->correo,
            'password' => Hash::make("password"),
        ]);
        //el modelo user de laravel ui no deja introducir al metodo 
        //create nuevos campos y por esto lo tengo que guardar fuera de este
        
        $usuarioEmpleado->esEmpleado = 1;
        $usuarioEmpleado->isAdmin = $request->tipo;
        $usuarioEmpleado->save();

        $request->validate([
            'dni' => 'required',
            'nombre' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'tipo' => 'required',
        ]);

        $empleado = new Empleado();
        $empleado->fill($request->all());
        $empleado->id_user = $usuarioEmpleado->id;
        $empleado->save();
        return redirect()->route('empleados');
    }

    public function mostrarModificarEmpleado(Request $request, $id_empleado){
        $empleado = Empleado::find($id_empleado);
        return view('crearEditarEmpleado',["empleado" => $empleado]);
    }
    public function modificarEmpleado(Request $request, $id_empleado){
        $request->validate([
            'dni' => 'required',
            'nombre' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'tipo' => 'required',
        ]);
        $empleado = Empleado::find($id_empleado);
        $empleado->fill($request->all());
        $empleado->usuarioEmpleado->email = $request->correo;
        $empleado->usuarioEmpleado->name = $request->nombre;
        $empleado->usuarioEmpleado->isAdmin = $request->tipo;
        $empleado->usuarioEmpleado->save();
        $empleado->save();
        return redirect()->route('empleados');
    }

}
