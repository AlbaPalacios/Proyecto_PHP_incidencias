<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;
//no lo utilizo
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function mostrarFormularioCrearCliente(Request $request){
        return view('cliente.formulario');
    }
   
}
