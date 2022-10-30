<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $facultades = Facultad::all(['nombrefacultad','pk_facultad']);

        return View('sistema/escuela/crear')->with('facultades', $facultades);
    }

    //Guardar Escuelas
    public function guardarEscuela(Request $request){
       
        $validator = $this->validate($request,[
            'fk_facultad'=>'required|string|max:10',
            'codigo'=>'required|string|max:10',
            'nombreescuela'=>'required|string|max:50',
        ]);
        
        $datos = request()->except('_token');
        Escuela::insert($datos);

        return back()->with('claveGuardarEscuela','Escuela guardado correctamente');
    }

    //funcion para mostrar todas las escuelas
    public function mostrarEscuelas(){
        $datos['escuela'] = Escuela::paginate(5);
        
        return View('sistema/escuela/listar', $datos);
    }

    //funcion para eliminar Escuela(no se deberia hacer)
    public function eliminarEscuela($pk_escuela){
        Escuela::destroy($pk_escuela);

        return back()->with('claveEliminarEscuela','OK');
    }

    //funcion para Editar Escuela
    public function actualizarEscuela($pk_escuela){
        $escuela = Escuela::findOrFail($pk_escuela);
        $facultades = Facultad::all(['nombrefacultad','pk_facultad']);

        return view('sistema/escuela/editar', compact('escuela', 'facultades', $facultades));
    }

    public function editarEscuela(Request $request, $pk_escuela){
        $datos = request()->except((['_token', '_method']));
        Escuela::where('pk_escuela', '=', $pk_escuela)->update($datos);

        return back()->with('claveEditarEscuela','Escuela modificado!');
    }    


}
