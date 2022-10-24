<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    //protected $table = 'escuela';
    protected $primaryKey = 'pk_escuela';
    protected $keyType = 'string';
    public $timestamps = false;

    //Relacion de ono a muchos (inversa)
    public function facultad(){
        return $this->belongsTo('App\Facultad','pk_facultad');
    }

}
