<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estadisticas_config extends Model
{
    use HasFactory;
    protected $table = 'movimientos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'monto',
        'tipo_movimiento',
        'editado',
        'created_at',
        'updated_at'
    ];
}
