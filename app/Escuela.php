<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    protected $table = 'escuela';
    protected $primaryKey = 'pk_escuela';
    protected $fillable = ['codigo', 'nombreEscuela', 'fk_facultad'];
    public $timestamps = false;

    //Relacion de ono a muchos (inversa)
    public function facultades(){
        return $this->belongsTo('App\Facultad','fk_facultad');
    }

    //Obtener la categoria de la receta via FK
    // public function facultad2(){
    //     return $this->belongsTo(Facultad::class);
    // }

}
