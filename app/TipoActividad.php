<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoActividad extends Model
{
    protected $table = 'tipo_actividad';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable =[
        'nombre'];


    public function actividades(){
        return $this->hasMany('App\Actividad');
    }
}
