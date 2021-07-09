<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class fondo_principal_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('dinero_principals')->insert([
            'monto_principal' => 1999990,
            'moneda_principal'=>' CLP ',
            'precio_moneda_principal'=>999,
            'user_id' => 1,
            'created_at' => $now,
            'updated_at'=>$now
        ]);
    }
}
