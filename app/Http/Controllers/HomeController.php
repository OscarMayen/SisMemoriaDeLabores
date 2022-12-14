<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id_usuario = $this->user = Auth::id();
        $rol = DB::table('users_has_roles')->where('user_id', '=',$id_usuario)->get();
        if(count($rol) >0){
            return view('home')->with("message", "");
        }else{
            return view('home')->with("message", "sinRol");
        }
    }
}
