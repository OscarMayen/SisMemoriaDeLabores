<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividad';
    protected $primaryKey = 'id';

    protected $fillable = [
        'titulo',
        'fechaActividad',
        'contenido',
        'tipoActividad_id',
        'estado',
        'imagen',
    ];

    public function tipoActividades(){
        return $this->belongsTo('App\TipoActividad', 'tipoActividad_id');
    }
}
