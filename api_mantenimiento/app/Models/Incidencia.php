<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;
    
    protected $table = "incidencia";
    protected $fillable = ['id_incidencia', 'nif_cif', 'nombre_contacto', 'apellido_contacto','telefono_contacto','descripcion','email_contacto','direccion','poblacion','estado','fecha_creacion','id_empleado_asignado','anotacion_anterior','anotacion_posterior','id_empleado'];
}
