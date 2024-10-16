<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{

    public function index()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(string $id)
    {
        //
        $proveedor = Proveedor::find($id);
        if(!$proveedor){
            return response()->json([
                'status' => false,
                'message' => 'Proveedor no encontrado'
            ],404);
        }
        return response()->json($proveedor);
    }
    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy(string $id)
    {
        //
    }
}
