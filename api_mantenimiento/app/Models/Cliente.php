<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = "cliente";
    protected $fillable = ['id_empleado', 'dni', 'nombre', 'telefono','correo','numero_cuenta','pais','moneda','importe_cuota_mensual'];
}
