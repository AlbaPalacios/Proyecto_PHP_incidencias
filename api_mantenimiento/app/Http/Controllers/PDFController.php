<?php

namespace App\Http\Controllers;

use App\Models\Cuota;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
    public function __construct()
    {
       
    }

    public function crearPDFCuota(Request $request, $id_cuota) {
        // retreive all records from db
        $cuota = Cuota::find($id_cuota);
        // share data to view
        view()->share('cuotas.informacionCuota',["cuota" => $cuota]);
        $pdf = PDF::loadView('cuotas.informacionCuota', ["cuota" => $cuota]);
        // download PDF file with download method
        return $pdf->download($cuota->clienteCuota->nombre.'.pdf');
      }
   
}
