<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    use HasFactory;
    protected $table = "cuota";
    protected $primaryKey = 'id_cuota';
    public $timestamps = false;
    protected $fillable = ['id_cuota', 'concepto', 'fecha_emision', 'importe','notas','cliente_id'];

    public function obtenerCuotas(){
        return Cuota::all();
    }

    public function obtenerCuotaPorId($id_cuota){
        return Cuota::find($id_cuota);
    }    

    //Enlaza empleado con la tabla User de laravel
    public function clienteCuota() {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id_cliente');
    }
}
