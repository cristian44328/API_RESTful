<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        //
        $producto = Producto::all();
        return response()->json($producto);
    }
    public function store(Request $request)
    {
        //
        $rules = [
            'nombre' => 'required|string|min:1|max:100',
            'descripcion' => 'required|string|min:1|max:200',
            'precio' => 'required|numeric',
            'cantidad' => 'required|numeric'
        ];

        $validacion = \Validator::make($request->input(), $rules);
        if ($validacion->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validacion->errors()->all()
            ], 400);
        }

        try {
            $producto = new Producto($request->input());
            $producto->save();

            return response()->json([
                'status' => true,
                'message' => 'Producto creado exitosamente'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error al crear el usuario',
                'error' => $e->getMessage()
            ], 500);
        }

    }
    public function show(Producto $id)
    {
        //
        return response()->json(['status' => true, 'data' => $id]);
    }

    public function update(Request $request, string $id)
    {
        //
        $rules = [
            'nombre' => 'required|string|min:1|max:100',
            'descripcion' => 'required|string|min:1|max:200',
            'precio' => 'required|numeric',
            'cantidad' => 'required|numeric'
        ];

        $validacion = \Validator::make($request->input(), $rules);
        if ($validacion->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validacion->errors()->all()
            ], 400);
        }

        $producto = Producto::find($id);
        if (!$producto) {
            return response()->json([
                'status' => false,
                'message' => 'Producto a modificar no encontrado'
            ], 404);
        }

        $producto->fill($request->all());
        $producto->save();
        return response()->json([
            'status' => true,
            'message' => 'Producto modificado exitosamente'
        ], 200);

    }

    public function destroy(string $id)
    {
        //
        $producto = Producto::find($id);
        if (!$producto) {
            return response()->json([
                'status' => false,
                'message' => 'Producto a eliminar no encontrado'
            ], 404);
        }

        $producto->delete();
        return response()->json([
            'status' => true,
            'message' => 'Usuario eliminado exitosamente'
        ], 200);
    }
}
