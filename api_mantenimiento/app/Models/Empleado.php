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

   
    public function incidenciasCreadas(){
        return $this->hasMany(App\Models\Incidencia::class, 'id_empleado', 'id_empleado');
    }

    public function incidenciasAsignadas(){
        return $this->hasMany(App\Models\Incidencia::class, 'id_empleado_asignado', 'id_empleado');
    }
    
    public function clientesRegistrados(){
        return $this->hasMany(App\Models\Cliente::class, 'id_empleado_creador', 'id_empleado');
    }

    public function obtenerEmpleados(){
        return Empleado::all();
    }

    public function obtenerEmpleadoPorId($id_empleado){
        return Empleado::find($id_empleado);
    }
}
