<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Obtener todos lo elementos de la tabla
        $usuario = Usuario::all();
        return $usuario;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $usuario = new Usuario();
        $usuario->login_usuario = $request->login_usuario;
        $usuario->nombre = $request->nombre;
        $usuario->apellidos = $request->apellidos;
        $usuario->edad = $request->edad;
        $usuario->telefono = $request->telefono;
        $usuario->correo = $request->correo;
        $usuario->direccion = $request->direccion;
        $usuario->password = $request->password;

        $usuario->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $usuario = Usuario:: findOrFail($id);
        $usuario->login_usuario = $request->login_usuario;
        $usuario->nombre = $request->nombre;
        $usuario->apellidos = $request->apellidos;
        $usuario->edad = $request->edad;
        $usuario->telefono = $request->telefono;
        $usuario->correo = $request->correo;
        $usuario->direccion = $request->direccion;
        $usuario->password = $request->password;

        $usuario->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Usuario::destroy($id);
    }
}
