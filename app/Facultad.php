<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table = 'facultad';
    protected $primaryKey = 'pk_facultad';
    protected $fillable = ['codigo', 'nombrefacultad'];
    public $timestamps = false;

    //Relacion de uno a muchos
    public function Escuela(){
        return $this->hasMany('App\Escuela','pk_escuela');
    }
}
