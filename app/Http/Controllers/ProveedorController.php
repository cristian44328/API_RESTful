<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{

    public function index()
    {
        //
        $proveedor = Proveedor::all();
        return response()->json($proveedor);
    }
    public function store(Request $request)
    {
        //
        $rules = [
            'nombre' => 'required|string|min:1|max:100',
            'telefono' => 'required|string|min:8|max:20',
            'direccion' => 'required|string|max:200'
        ];

        $validacion = \Validator::make($request->input(), $rules);
        if ($validacion->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validacion->errors()->all()
            ], 400);
        }

        try {
            $proveedor = new Proveedor($request->input());
            $proveedor->save();

            return response()->json([
                'status' => true,
                'message' => 'Proveedor creado exitosamente'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error al crear el usuario',
                'error' => $e->getMessage()
            ], 500);
        }
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
    public function update(Request $request, Proveedor $proveedor)
    {
        //
        $rules = [
            'nombre' => 'required|string|min:1|max:100',
            'telefono' => 'required|string|min:8|max:20',
            'direccion' => 'required|string|max:200'
        ];

        $validacion = \Validator::make($request->input(), $rules);
        if ($validacion->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validacion->errors()->all()
            ], 400);
        }
        $proveedor->update(request()->input());
        return response()->json([
            'status' => false,
            'message' => 'Proveedor modificado exitosamente'
        ], 200);

    }
    public function destroy(Proveedor $proveedor)
    {
        //
        $proveedor->delete();
        return response()->json([
            'status' => false,
            'message' => 'Proveedor eliminado exitosamente'
        ], 200);

    }
}
