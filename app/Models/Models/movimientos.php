<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movimientos extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table= 'movimientos';
    protected $primaryKey= 'id';
    protected $fillable= [
        'id',
        'monto',
        'titulo',
        'descripcion',
        'imagen',
        'tipo_movimiento',
        'editado',
        'dinero_principal_id',
    ];
    public function dinero_principals(){
        return $this->hasone(dinero_principal::class, 'dinero_principal_id');
    }
}
