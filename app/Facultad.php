<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table = 'facultad';
    protected $primaryKey = 'pk_facultad';
    protected $fillable = ['codigo', 'nombreFacultad'];
    public $timestamps = false;

    //Relacion de uno a muchos
    public function escuelas(){
        return $this->hasMany('App\Escuela');
    }
}
