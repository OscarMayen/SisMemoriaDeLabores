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
            'imagen' => 'image|mimes:jpeg,png,svg|max:1024',
        ]);

        $actividad = $request->all();
        $actividad['estado']=1;

        if($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'imagen/';
            $imagenActividad = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenActividad);
            $actividad['imagen'] = "$imagenActividad";
        }
        Actividad::create($actividad);

        return redirect()->route('actividad.index')
                ->with('status_success','Actividad agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actividad = Actividad::find($id);

        $tiposActividad = TipoActividad::all('id', 'nombre');
        return view('sistema.actividad.show', compact('actividad', 'tiposActividad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actividad = Actividad::find($id);

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
    public function update(Request $request)
    {
        $id = $request->id;
        $actividad = Actividad::find($id);

        $act = $request->all();

        if($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'imagen/';
            $imagenActividad = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenActividad);
            $act['imagen'] = "$imagenActividad";
        }
        else{
            unset($act['imagen']);
        }

        $actividad->update($act);
        return redirect()->route('actividad.index')
                ->with('status_success','Actividad editada correctamente');
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

    public function revisar($id)
    {
        $actividad = Actividad::find($id);
        $tiposActividad = TipoActividad::all('id', 'nombre');
        return view('sistema.actividad.revisar', compact('actividad', 'tiposActividad'));
    }

    public function aprobar(Request $request)
    {
        $id = $request->id;
        $actividad = Actividad::find($id);
        $actividad->estado = 2;
        $actividad->update();
        return redirect()->route('actividad.index')
                ->with('status_success','Actividad aprobada correctamente');
    }

    public function denegar(Request $request)
    {
        $id = $request->id;
        $actividad = Actividad::find($id);
        $actividad->estado = 3;
        $actividad->update();
        return redirect()->route('actividad.index')
                ->with('status_success','Actividad aprobada correctamente');
    }

}
