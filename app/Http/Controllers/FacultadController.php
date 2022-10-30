<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facultad;

class FacultadController extends Controller
{
    public function __construct()
    { 
        $this->middleware('can:listFacultad')->only('mostrarFacultad');
        $this->middleware('can:formFacultad')->only('verFormFacultad', 'guardarFacultad');
    }

    //formulario de facultad
    public function verFormFacultad(){
        return View('sistema/facultad/crear');
    }

    //Guardar facultad
    public function guardarFacultad(Request $request){
       
        $validator = $this->validate($request,[
            'codigo'=>'required|string|max:15|unique:facultad,codigo',
            'nombrefacultad'=>'required|string|max:50',
        ]);
        
        $datos = request()->except('_token');
        Facultad::insert($datos);

        return back()->with('claveGuardarFacultad','Facultad guardado correctamente');
    }

    //funcion para mostrar todas las facultades
    public function mostrarFacultades(){
        $datos['facultad'] = Facultad::paginate(5);
        
        return View('sistema/facultad/listar', $datos);
    }

    //funcion para eliminar facultades(no se deberia hacer)
    public function eliminarFacultad($pk_facultad){
        Facultad::destroy($pk_facultad);

        return back()->with('claveEliminarFacultad','OK');
    }

    //funcion para Editar Facultad
    public function actualizarFacultad($pk_facultad){
        $facultad = Facultad::findOrFail($pk_facultad);

        return view('sistema/facultad/editar', compact('facultad'));
    }

    public function editarFacultad(Request $request, $pk_facultad){
        $datos = request()->except((['_token', '_method']));
        Facultad::where('pk_facultad', '=', $pk_facultad)->update($datos);

        return back()->with('claveEditarFacultad','Facultad modificado!');
    }    

}
