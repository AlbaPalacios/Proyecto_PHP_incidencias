<?php

namespace App\Http\Controllers;

use App\Mail\FacturaMail;
use App\Models\Cliente;
use App\Models\Cuota;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CuotaController extends Controller
{
    public function __construct()
    {
      
    }
    
    public function mostrarListaCuotas(Request $request){
        $cuotas = Cuota::all();
        return view('cuotas.listaCuotas',["cuotas" => $cuotas]);
    }
    
    public function mostrarRegistrarCuota(Request $request){//excepcional
        $clientes = Cliente::all();
        return view('crearEditarCuota',["clientes" => $clientes]);
    }
    public function registrarCuota(Request $request){//excepcional Crear
        $request->validate([
            'concepto' => 'required',
            'importe' => 'required',
            'notas' => 'required',
            'cliente_id' => 'required',
        ]);

        $cuota = new Cuota();
        $cuota->fill($request->all());
        $cuota->save();
        $ultima_cuota = Cuota::orderBy('id_cuota', 'desc')->first();
        $cliente = Cliente::find($request->cliente_id);
        $this->mandarCorreoCuota($cliente->correo, $ultima_cuota);
        return redirect()->route('cuotas');
    }

    public function mostrarModificarCuota(Request $request, $id_cuota){//mostrar
        $cuota = Cuota::find($id_cuota);
        return view('crearEditarCuota',["cuota" => $cuota]);
    }

    public function modificarCuota(Request $request, $id_cuota){//boton
        $request->validate([
            'concepto' => 'required',
            'importe' => 'required',
            'notas' => 'required',
        ]);
        $cuota = Cuota::find($id_cuota);
        $cuota->fill($request->all());//sobreescribe todos los campos de cuota
        $cuota->save();
        return redirect()->route('cuotas');
    }

    public function mostrarRemesaMensual(Request $request){//mostrar
        return view('crearEditarCuota',[]);
    }

    public function crearRemesaMensual(Request $request){//crear
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
            $ultima_cuota = Cuota::orderBy('id_cuota', 'desc')->first();
            $this->mandarCorreoCuota($cliente->correo, $ultima_cuota);
            //$this->guardarPDFCuota($ultima_cuota->id_cuota);
        }
        return redirect()->route('cuotas');
    }

    private function mandarCorreoCuota($email, $cuota) {
        return Mail::to($email)->send(new FacturaMail());
    }

    /* private function guardarPDFCuota($id_cuota) {
        $cuota = Cuota::find($id_cuota);
        // share data to view
        view()->share('cuotas.informacionCuota',["cuota" => $cuota]);
        $pdf = PDF::loadView('cuotas.informacionCuota', ["cuota" => $cuota]);
        $content = $pdf->download()->getOriginalContent();
        Storage::put('public/'.$id_cuota.'.pdf',$content) ;
    } */

    public function borrarCuota(Request $request, $id_cuota){//boton
        $cuota = Cuota::find($id_cuota);
        $cuota->delete();
        return redirect()->route('cuotas');
    }
    
}
