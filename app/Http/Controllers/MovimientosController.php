<?php

namespace App\Http\Controllers;

use App\Models\Models\movimientos;
use Illuminate\Http\Request;

class MovimientosController extends Controller
{
    //
    public function index()
    {
        //devolver todos los datos de la tabla descripcion_infos a traves de su modelo
        return movimientos::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //crear y guardar la info que viene, y a traves del modelo guardarlo en la base de datos
        $var_info_desc = new movimientos();
        $var_info_desc -> monto = $request -> monto_front;
        $var_info_desc -> titulo = $request -> titulo_front;
        $var_info_desc -> descripcion = $request -> descripcion_front;
        $var_info_desc -> imagen = $request -> imagen_front;
        $var_info_desc -> tipo_movimiento = $request -> tipo_movimiento_front;
        $var_info_desc -> editado = $request -> editado_front;
        $var_info_desc -> dinero_principal_id = auth()->id();//corregir mas adelante, puse esta tomando el id del usuario, no de la tabla fondo.
        $var_info_desc ->save();

        return $var_info_desc;
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $mov_update = movimientos::find($id);
        $mov_update -> monto = $request -> monto_upd;
        $mov_update -> titulo = $request -> titulo_upd;
        $mov_update -> descripcion = $request -> descripcion_upd;
        $mov_update -> imagen = $request -> imagen_upd;
        $mov_update -> tipo_movimiento = $request -> tipo_movimiento_upd;
        $mov_update -> editado = $request -> editado_upd;
        $mov_update -> save();

        return $mov_update;
    }

    public function destroy($id)
    {
        //descripcion_infos::destroy($id);
    }
}
