<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modificaciones_movimientos extends Model
{
    use HasFactory;
    protected $table= 'modificaciones_movimientos';
    protected $primaryKey= 'id';
    protected $fillable= [
        'id',
        'monto',
        'titulo',
        'descripcion',
        'imagen',
        'tipo_movimiento',
        'id_movimiento_original',
        'dinero_principal_id',
    ];

    public function modificaciones_movimientos(){
        return $this->hasone(dinero_principal::class, 'movimiento_id');
    }
}
