<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedor.index')->with('proveedores', $proveedores);
    }

    public function create()
    {
        return view('proveedor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'contacto' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string',
        ]);

        $proveedor = new Proveedor();
        $proveedor->nombre = $request->nombre;
        $proveedor->contacto = $request->contacto;
        $proveedor->telefono = $request->telefono;
        $proveedor->direccion = $request->direccion;
        $proveedor->save();

        return redirect('/proveedor')->with('success', 'Proveedor creado correctamente.');
    }

    public function show($id)
    {
        $proveedor = Proveedor::find($id);
        return view('proveedor.delete')->with('proveedor', $proveedor);
    }

    public function edit($id)
    {
        $proveedor = Proveedor::find($id);
        return view('proveedor.edit')->with('proveedor', $proveedor);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'contacto' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string',
        ]);

        $proveedor = Proveedor::find($id);
        $proveedor->nombre = $request->nombre;
        $proveedor->contacto = $request->contacto;
        $proveedor->telefono = $request->telefono;
        $proveedor->direccion = $request->direccion;
        $proveedor->save();

        return redirect('/proveedor')->with('success', 'Proveedor actualizado correctamente.');
    }

    public function destroy($id)
    {
        $proveedor = Proveedor::find($id);
        $proveedor->delete();
        return redirect('/proveedor')->with('success', 'Proveedor eliminado correctamente.');
    }

    public function eliminar($id)
    {
        $proveedor = Proveedor::find($id);
        return view('proveedor.delete')->with('proveedor', $proveedor);
    }
}