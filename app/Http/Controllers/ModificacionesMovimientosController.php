<?php

namespace App\Http\Controllers;

use App\Models\Models\modificaciones_movimientos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModificacionesMovimientosController extends Controller
{
    //
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //crear y guardar la info que viene, y a traves del modelo guardarlo en la base de datos
        $var_info_desc = new modificaciones_movimientos();
        $var_info_desc -> monto = $request -> monto_upd;
        $var_info_desc -> titulo = $request -> titulo_upd;
        $var_info_desc -> descripcion = $request -> descripcion_upd;
        $var_info_desc -> imagen = $request -> imagen_upd;
        $var_info_desc -> tipo_movimiento = $request -> tipo_movimiento_upd;
        $var_info_desc -> id_movimiento_origin = $request -> id_mov_original_upd;
        $var_info_desc -> id_cambios_user = auth()->id();//corregir mas adelante, puse esta tomando el id del usuario, no de la tabla fondo.
        $var_info_desc ->save();

        return $var_info_desc;
    }

    public function show($id_mov)
    {
        //
        //devolver todos los datos de la tabla descripcion_infos a traves de su modelo
        $query = "SELECT * FROM modificaciones_movimientos WHERE id_movimiento_origin = $id_mov";
        return DB::select($query);

    }
}
