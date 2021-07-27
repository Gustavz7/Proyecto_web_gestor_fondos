<?php

namespace Database\Seeders;

use App\Models\Models\dinero_principal;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class movimientosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $now = Carbon::now();
        DB::table('movimientos')->insert([
            'monto' => 1999990,
            'titulo'=> 'Titulo de ejemplo para testing',
            'descripcion'=> 'Hola esto solo es una descripcion para uno de los movimientos
            realizados desde un seeder predefinido con el fin de realizar pruebas de funcionamiento
            al momento de estas construyendo este sistema lorem ipsum',
            'imagen' => null,
            'tipo_movimiento' => true,
            'editado' => false,
            'dinero_principal_id' => 1,
            'created_at' => $now,
            'updated_at'=>$now
        ]);
        DB::table('movimientos')->insert([
            'monto' => 1000000,
            'titulo'=> 'Titulo de ejemplo para testing',
            'descripcion'=> 'Hola esto solo es una descripcion para uno de los movimientos
            realizados desde un seeder predefinido con el fin de realizar pruebas de funcionamiento
            al momento de estas construyendo este sistema lorem ipsum',
            'imagen' => null,
            'tipo_movimiento' => true,
            'editado' => false,
            'dinero_principal_id' => 1,
            'created_at' => $now,
            'updated_at'=>$now
        ]);
    }
}
