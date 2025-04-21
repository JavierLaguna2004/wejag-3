<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index')->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'correo' => 'required|email|unique:Usuarios,correo|max:100',
            'password' => 'required|string|min:8',
            'rol' => 'required|in:basico,root'
        ]);

        $usuario = new Usuario();
        $usuario->nombre = $request->get('nombre');
        $usuario->correo = $request->get('correo');
        $usuario->password = bcrypt($request->get('password')); // Encriptar la contraseña
        $usuario->rol = $request->get('rol');
        $usuario->save();

        return redirect('/usuario')->with('success', 'Usuario creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = Usuario::find($id);
        return view('usuarios.delete')->with('usuario', $usuario);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = Usuario::find($id);
        return view('usuarios.edit')->with('usuario', $usuario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'correo' => 'required|email|unique:usuarios,correo,'.$id.'|max:100',
            'password' => 'nullable|string|min:8', // Opcional para actualización
            'rol' => 'required|in:basico,root'
        ]);

        $usuario = Usuario::find($id);
        $usuario->nombre = $request->get('nombre');
        $usuario->correo = $request->get('correo');
        
        // Actualizar contraseña solo si se proporciona
        if ($request->get('password')) {
            $usuario->password = bcrypt($request->get('password'));
        }
        
        $usuario->rol = $request->get('rol');
        $usuario->save();

        return redirect('/usuario')->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $usuario = Usuario::findOrFail($id);
            $usuario->delete();
            
            return redirect('/usuario')->with('success', 'Usuario eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect('/usuario')->with('error', 'No se pudo eliminar el usuario: ' . $e->getMessage());
        }
    }

    /**
     * Método adicional para mostrar la vista de confirmación de eliminación.
     */
    public function eliminar(string $id)
    {
        $usuario = Usuario::find($id);
    
        if (!$usuario) {
            return redirect('/usuario')->with('error', 'Usuario no encontrado.');
        }
    
        return view('usuario.delete')->with('usuario', $usuario);
    }
}