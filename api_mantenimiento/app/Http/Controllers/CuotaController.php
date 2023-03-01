<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cuota;
use Illuminate\Http\Request;

class CuotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function mostrarListaCuotas(Request $request){
        $cuotas = Cuota::all();
        return view('cuotas.listaCuotas',["cuotas" => $cuotas]);
    }
    
    public function mostrarRegistrarCuota(Request $request){
        $clientes = Cliente::all();
        return view('crearEditarCuota',["clientes" => $clientes]);
    }
    public function registrarCuota(Request $request){
        $request->validate([
            'concepto' => 'required',
            'importe' => 'required',
            'notas' => 'required',
            'cliente_id' => 'required',
        ]);

        $cuota = new Cuota();
        $cuota->fill($request->all());
        $cuota->save();
        return redirect()->route('cuotas');
    }

    public function mostrarModificarCuota(Request $request, $id_cuota){
        $cuota = Cuota::find($id_cuota);
        return view('crearEditarCuota',["cuota" => $cuota]);
    }

    public function modificarCuota(Request $request, $id_cuota){
        $request->validate([
            'concepto' => 'required',
            'importe' => 'required',
            'notas' => 'required',
        ]);
        $cuota = Cuota::find($id_cuota);
        $cuota->fill($request->all());
        $cuota->save();
        return redirect()->route('cuotas');
    }

    public function mostrarRemesaMensual(Request $request){
        return view('crearEditarCuota',[]);
    }

    public function crearRemesaMensual(Request $request){
        $request->validate([
            'concepto' => 'required',
            'importe' => 'required',
            'notas' => 'required',
        ]);
        $clientes = Cliente::all();
        foreach ($clientes as $cliente) {
            $cuota = new Cuota();
            $cuota->fill($request->all());
            $cuota->cliente_id = $cliente->id_cliente;
            $cuota->save();
        }
        return redirect()->route('cuotas');
    }

    public function borrarCuota(Request $request, $id_cuota){
        $cuota = Cuota::find($id_cuota);
        $cuota->delete();
        return redirect()->route('cuotas');
    }
    
}
