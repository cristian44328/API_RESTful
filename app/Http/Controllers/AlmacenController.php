<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen;

class AlmacenController extends Controller
{
    public function index()
    {
        //
        $almacen = Almacen::all();
        return response()->json($almacen);
    }
    public function store(Request $request)
    {
        //
        $rules = [
            'nombre' => 'required|string|min:1|max:100',
            'ubicacion' => 'required|string|min:8|max:20',
            'capacidad' => 'required|string|max:200'
        ];

        $validacion = \Validator::make($request->input(), $rules);
        if ($validacion->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validacion->errors()->all()
            ], 400);
        }
        $almacen = new Almacen($request->input());
        $almacen->save();
        return response()->json([
            'status' => true,
            'message' => 'Almacen creado exitosamente'
        ], 200);
    }
    public function show(Almacen $almacen)
    {
        //
        return response()->json(['status' => true, 'data' => $almacen]);
    }
    public function update(Request $request, Almacen $almacen)
    {
        //
        $rules = [
            'nombre' => 'required|string|min:1|max:100',
            'ubicacion' => 'required|string|min:8|max:20',
            'capacidad' => 'required|string|max:200'
        ];

        $validacion = \Validator::make($request->input(), $rules);
        if ($validacion->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validacion->errors()->all()
            ], 400);
        }

        $almacen->update(request()->input());
        return response()->json([
            'status' => false,
            'message' => 'Almacen modificado exitosamente'
        ], 200);
    }
    public function destroy(Almacen $almacen)
    {
        //
        $almacen->delete();
        return response()->json([
            'status' => true,
            'message' => 'Almacen eliminado exitosamente'
        ], 200);
    }
}
