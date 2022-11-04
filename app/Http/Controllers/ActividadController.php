<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\TipoActividad;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        //$this->middleware('can:<<nombre del permiso>>')->only('<<nombre/s del metodo del controlador>>');
        $this->middleware('can:actividad.index')->only('index');
    }

    public function index()
    {
        $actividades = Actividad::orderBy('id', 'Asc')->paginate(5);
        return view('sistema.actividad.index', compact('actividades') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //DB::table('tipo_actividad')->get()->pluck('nombre','id')->dd();

        $tiposActividad =DB::table('tipo_actividad')->get()
        ->pluck('nombre','id');

        return view('sistema.actividad.create', compact('tiposActividad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'titulo' => 'required|max:75',
            'fechaActividad' => 'required',
            'contenido' => 'required',
            'tipoActividad_id' => 'required',
        ]);

        $actividad = Actividad::create($request->all());

        return redirect()->route('actividad.index')
                ->with('status_success','Actividad agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function show(Actividad $actividad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function edit(Actividad $actividad)
    {
        $tiposActividad = TipoActividad::all('id', 'nombre');
        return view('sistema.actividad.edit', compact('actividad', 'tiposActividad'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actividad $actividad)
    {
        $request->validate([
            'titulo' => 'required|max:75',
            'fechaActividad' => 'required',
            'contenido' => 'required',
            'tipoActividad_id' => 'required',
        ]);

        $actividad->update($request->all());

        return redirect()->route('actividad.index')
                ->with('status_success','Actividad agregado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actividad $actividad)
    {
        //
    }
}
