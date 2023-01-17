<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = "cliente";
    public $timestamps = false;
    protected $primaryKey = 'id_cliente';
    protected $fillable = ['id_cliente', 'dni', 'nombre', 'telefono','correo','numero_cuenta','pais','moneda','importe_cuota_mensual'];


    public function obtenerClientes(){
        return Cliente::all();
    }

    public function obtenerClientePorId($id_cliente){
        return Cliente::find($id_cliente);
    }
}
