<?php

namespace App\Http\Controllers;

use App\Models\Models\estadisticas_config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadisticasConfigController extends Controller
{
    public function index()
    {
        //return estadisticas_config::all();

        $posts = DB::select('SELECT monto FROM movimientos');
        return $posts;

    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //

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
        //

    }
    public function destroy($id)
    {
        //
    }
}
