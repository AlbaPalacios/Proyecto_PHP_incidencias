<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    
    protected $table = "empleado";
    public $timestamps = false;
    protected $primaryKey = 'id_empleado';
    protected $fillable = ['id_empleado', 'dni', 'nombre', 'correo','telefono','direccion','fecha_alta','tipo'];

    public function obtenerEmpleados(){
        return Empleado::all();
    }

    public function obtenerEmpleadoPorId($id_empleado){
        return Empleado::find($id_empleado);
    }
}
