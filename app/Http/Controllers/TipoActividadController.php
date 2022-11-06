<?php

namespace App\Http\Controllers;

use App\TipoActividad;
use Illuminate\Http\Request;

class TipoActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //$this->middleware('can:<<nombre del permiso>>')->only('<<nombre/s del metodo del controlador>>');
        $this->middleware('can:tipoActividad.index')->only('index');
    }

    public function index()
    {
        $tipos = TipoActividad::orderBy('id', 'Asc')->paginate(5);
        return view('sistema.tipoActividad.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sistema.tipoActividad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:75',
        ]);

        $tipo = TipoActividad::create($request->all());

        return redirect()->route('tipoActividad.index')
                ->with('status_success','Tipo actividad agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoActividad  $tipoActividad
     * @return \Illuminate\Http\Response
     */
    public function show(TipoActividad $tipoActividad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoActividad  $tipoActividad
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoActividad $tipoActividad)
    {
        return view('sistema.tipoActividad.edit', compact('tipoActividad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoActividad  $tipoActividad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoActividad $tipoActividad)
    {
        $request->validate([
            'nombre' => 'required|max:75',
        ]);

        $tipoActividad->update($request->all());

        return redirect()->route('tipoActividad.index')
                ->with('status_success','Tipo actividad agregado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoActividad  $tipoActividad
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoActividad $tipoActividad)
    {
        $tipoActividad->delete();
        return back()->with('claveEliminarTipoActividad','OK');
    }
}
