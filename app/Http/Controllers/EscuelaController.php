<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Facultad;
use App\Escuela;

class EscuelaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:listEscula')->only('mostrarEscula');
        $this->middleware('can:formEscula')->only('verFormEscula', 'guardarEscula');
    }

    //formulario de Escuelas
    public function verFormEscuela(){
        $facultades = DB::table('facultad')->get()->pluck('nombrefacultad','pk_facultad');

        return View('sistema/escuela/crear')->with('facultades', $facultades);
    }

    //Guardar Escuelas
    public function guardarEscuela(Request $request){
       
        $validator = $this->validate($request,[
            'pk_escuela'=>'required|string|max:10',
            'pk_facultad'=>'required|string|max:10',
            'codigo'=>'required|string|max:10',
            'nombreescuela'=>'required|string|max:50',
        ]);
        
        $datos = request()->except('_token');
        Escuela::insert($datos);

        return back()->with('claveGuardarEscuela','Escuela guardado correctamente');
    }

    //funcion para mostrar todas las facultades
    public function mostrarEscuelas(){
        $datos['escuela'] = Escuela::paginate(5);
        
        return View('sistema/escuela/listar', $datos);
    }

}
