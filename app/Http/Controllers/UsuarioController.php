<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        //Obtener todos lo elementos de la tabla
        $usuario = Usuario::all();
        return response()->json($usuario);
    }

    public function store(Request $request)
    {
        //
        $rules = [
            'login_usuario' => 'required|string|max:255',
            'nombre' => 'required|string|min:1|max:100',
            'apellidos' => 'required|string|min:1|max:100',
            'edad' => 'required|numeric',
            'telefono' => 'required|max:20',
            'correo' => 'required|email|max:80|unique:usuarios,correo',
            'direccion' => 'required|string|max:255',
            'password' => 'required|string|max:255'
        ];

        $validacion = \Validator::make($request->input(), $rules);
        if ($validacion->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validacion->errors()->all()
            ], 400);
        }

        try {
            $usuario = new Usuario($request->except('password'));
            $usuario->password = bcrypt($request->input('password'));
            $usuario->save();

            return response()->json([
                'status' => true,
                'message' => 'Usuario creado exitosamente'
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => 'Error al crear el usuario',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show(Usuario $id)
    {
        //
        return response()->json(['status' => true, 'data' => $id]);
    }
    public function update(Request $request, string $id)
    {
        $rules = [
            'login_usuario' => 'required|string|max:255',
            'nombre' => 'required|string|min:1|max:100',
            'apellidos' => 'required|string|min:1|max:100',
            'edad' => 'required|numeric',
            'telefono' => 'required|max:20',
            'correo' => 'required|email|max:80|unique:usuarios,correo,' . $id,  
            'direccion' => 'required|string|max:255',
            'password' => 'nullable|string|max:255'  
        ];

        $validacion = \Validator::make($request->all(), $rules);
        if ($validacion->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validacion->errors()->all()
            ], 400);
        }

        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json([
                'status' => false,
                'message' => 'Usuario no encontrado'
            ], 404);
        }

        $usuario->fill($request->except('password'));

        if ($request->input('password')) {
            $usuario->password = bcrypt($request->input('password'));
        }

        $usuario->save();

        return response()->json([
            'status' => true,
            'message' => 'Usuario modificado exitosamente'
        ], 200);
    }

    public function destroy(string $id)
    {
        //
        Usuario::destroy($id);
        return response()->json([
            'status' => true,
            'message' => 'Usuario elimidado exitosamente'
        ]);
    }
}
