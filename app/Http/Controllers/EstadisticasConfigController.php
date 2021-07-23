<?php

namespace App\Http\Controllers;

use App\Models\Models\estadisticas_config;
use Illuminate\Http\Request;

class EstadisticasConfigController extends Controller
{
    public function index()
    {
        return estadisticas_config::all();
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
