<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;
    
    protected $table = "incidencia";
    public $timestamps = false;
    protected $primaryKey = 'id_incidencia';
    protected $fillable = ['id_incidencia', 'nif_cif', 'nombre_contacto', 'apellido_contacto','telefono_contacto','descripcion', 'provincia', 'email_contacto','direccion','poblacion','cp','estado','fecha_creacion', 'fecha_realizacion' ,'id_empleado_asignado','anotacion_anterior','anotacion_posterior','id_empleado'];

    public function obtenerIncidencias(){
        return Incidencia::all();
    }

    //Enlaza empleado con la tabla User de laravel
    public function empleadoAsignado() {
        return $this->belongsTo(Empleado::class, 'id_empleado_asignado', 'id_empleado');
    }
}
