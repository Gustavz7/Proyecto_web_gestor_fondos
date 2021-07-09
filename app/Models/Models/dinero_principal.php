<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dinero_principal extends Model
{
    use HasFactory;
    protected $table = 'dinero_principals';
    protected $primaryKey = 'id';
    protected $fillable = [
      'id',
      'monto_principal',
      'moneda_principal',
      'precio_moneda_principal',
      'user_id',
      'created_at',
      'updated_at'
    ];
    public function dinero_usuario () {
        return $this->hasOne(User::Class, 'user_id');
    }


}
