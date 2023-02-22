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

    public function incidenciasRegistradas() {
        return $this->hasMany(App\Models\Incidencia::class, 'id_cliente', 'id_cliente');
    }

    public function cuotas() {
        return $this->hasMany(App\Models\Cuota::class, 'cliente_id', 'id_cliente');
    }

    public function obtenerClientes(){
        return Cliente::all();
    }

    public function obtenerClientePorId($id_cliente){
        return Cliente::find($id_cliente);
    }

    public function crearIncidencia($incidencia) {
        $this->incidenciasRegistradas()->save($incidencia);
    }

    //Enlaza cliente con la tabla User de laravel
    public function usuarioCliente() {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
   
}
