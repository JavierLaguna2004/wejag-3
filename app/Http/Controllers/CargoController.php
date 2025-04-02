<?php

namespace App\Http\Controllers;
use App\Models\Cargo;

use Illuminate\Http\Request;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listaCargo=Cargo::all();

        return view('cargo.index')->with('dcargo',$listaCargo);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('cargo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $cargo=new Cargo();
        $cargo->nombre_700=$request->get('nombre_700');
     

        $cargo->save();
        return redirect('/cargo');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $cargo=Cargo::find($id);
        return view('cargo.delete')->with('cargo',$cargo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $cargo=Cargo::find($id);

        return view('cargo.editar')->with('cargo',$cargo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $cargo=Cargo::find($id);
        $cargo->nombre_700=$request->get('nombre_700');
        $cargo->save();

        return redirect('/cargo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{

    $eliminado = Cargo::find($id); 

    if (!$eliminado) {
        return redirect('/cargo')->with('error', 'El cargo no existe.');
    }

    $eliminado->delete();

    
    return redirect('/cargo')->with('success', 'Cargo eliminado correctamente.');
}
    public function eliminar(string $id)
    {
        $cargo = Cargo::find($id); 
    
        if (!$cargo) {
            return redirect()->route('cargo.index')->with('error', 'Cargo no encontrado.');
        }
    
        return view('cargo.delete')->with('cargo', $cargo);
    }
}
