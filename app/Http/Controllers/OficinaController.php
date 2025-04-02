<?php

namespace App\Http\Controllers;
use App\Models\Oficina;

use Illuminate\Http\Request;

class OficinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listaOficina=Oficina::all();

        return view('oficina.index')->with('doficina',$listaOficina);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('oficina.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $oficina=new Oficina();
        $oficina->ciudad_100=$request->get('ciudad_100');
        $oficina->calle_100=$request->get('calle_100');
        $oficina->numero_100=$request->get('numero_100');
        $oficina->cod_postal_100=$request->get('cod_postal_100');
        $oficina->telefono_100=$request->get('telefono_100');
     

        $oficina->save();
        return redirect('/oficina');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $oficina=Oficina::find($id);
        return view('oficina.delete')->with('oficina',$oficina);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $oficina=Oficina::find($id);

        return view('oficina.editar')->with('oficina',$oficina);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $oficina=Oficina::find($id);
        $oficina->ciudad_100=$request->get('ciudad_100');
        $oficina->calle_100=$request->get('calle_100');
        $oficina->numero_100=$request->get('numero_100');
        $oficina->cod_postal_100=$request->get('cod_postal_100');
        $oficina->telefono_100=$request->get('telefono_100');
        $oficina->save();

        return redirect('/oficina');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{

    $eliminado = Oficina::find($id); 

    if (!$eliminado) {
        return redirect('/oficina')->with('error', 'El oficina no existe.');
    }

    $eliminado->delete();

    
    return redirect('/oficina')->with('success', 'Oficina eliminado correctamente.');
}
    public function eliminar(string $id)
    {
        $oficina = Oficina::find($id); 
    
        if (!$oficina) {
            return redirect()->route('oficina.index')->with('error', 'Oficina no encontrado.');
        }
    
        return view('oficina.delete')->with('oficina', $oficina);
    }
}
