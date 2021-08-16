<?php

namespace App\Http\Controllers;

use App\Models\Models\dinero_principal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DineroPrincipalController extends Controller
{
    public function index()
    {
        $query = "SELECT monto FROM movimientos";
        $fecha = DB::select("$query");
        return $fecha;
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
        $dinero = new dinero_principal();
        $dinero -> monto_principal = $request->monto_principal;
        $dinero -> user_id = auth()->id();
        $dinero ->save();
        return $dinero;
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
