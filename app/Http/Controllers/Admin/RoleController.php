<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {   
        //$this->middleware('can:<<nombre del permiso>>')->only('<<nombre/s del metodo del controlador>>');
        $this->middleware('can:admin.roles.index')->only('index');
        $this->middleware('can:admin.roles.edit')->only('edit', 'update');

    }

    public function index()
    {
        //
        $roles = Role::all();
        return view('sistema.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permissions=Permission::all();
        $mensaje='Debe ingresar un nombre para crear el rol';
        return view('sistema.roles.create', compact('permissions', 'mensaje'));

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
            'name' => 'required'
        ]);


        $request->all();

        $role = Role::create(['name' => $request->input('name')]);

        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.edit', $role->id)->with('info', 'El rol se creó con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        // 
        return view('sistema.roles.show', compact('role'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $role = Role::where('id', $id)->first();
        $permissions=Permission::all();

        return view('sistema.roles.edit', compact('role','permissions'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required'
        ]);
        $role = Role::where('id', $id)->first();
        //$nombre_rol=$request->input('name');
        $role->update($request->all());
        //dd($nombre_rol);
        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.edit', $id)->with('info', 'El rol se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        $role->delete();
        return redirect()->route('admin.roles.index')->with('info', 'El rol se eliminó con éxito');
    }
}
