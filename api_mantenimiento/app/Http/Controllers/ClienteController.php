<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mostrarListaClientes(Request $request){
        $clientes = Cliente::all();
        return view('clientes.listaClientes',["clientes" => $clientes]);
    }
    
    public function mostrarRegistrarCliente(Request $request){
        return view('crearEditarCliente',[]);
    }
    public function registrarCliente(Request $request){
        $usuarioCliente = User::create([
            'name' => $request->nombre,
            'email' => $request->correo,
            'password' => Hash::make("password"),
            'esCliente' => 1
        ]);
        $usuarioCliente->isAdmin = 0;
        $usuarioCliente->save();

        $request->validate([
            'dni' => 'required',
            'nombre' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
            'pais' => 'required',
            'moneda' => 'required',
            'importe_cuota_mensual' => 'required',
        ]);

        $cliente = new Cliente();
        $cliente->fill($request->all());
        $cliente->id_user = $usuarioCliente->id;
        $cliente->save();
        return redirect()->route('clientes');
    }

    public function mostrarModificarCLiente(Request $request, $id_cliente){
        $cliente = Cliente::find($id_cliente);
        return view('crearEditarCliente',["cliente" => $cliente]);
    }
    public function modificarCliente(Request $request, $id_cliente){
        $request->validate([
            'dni' => 'required',
            'nombre' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
            'pais' => 'required',
            'moneda' => 'required',
            'importe_cuota_mensual' => 'required',
        ]);
        $cliente = Cliente::find($id_cliente);
        $cliente->fill($request->all());
        $cliente->usuarioCliente->email = $request->correo;
        $cliente->usuarioCliente->name = $request->nombre;
        $cliente->usuarioCliente->isAdmin = 0;
        $cliente->usuarioCliente->save();
        $cliente->save();
        return redirect()->route('clientes');
    }
}
