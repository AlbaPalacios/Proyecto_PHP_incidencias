<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    use HasFactory;
    protected $table = "cuota";
    protected $fillable = ['id_cuota', 'concepto', 'fecha_emision', 'importe','notas','cliente_id'];
}
