@extends('adminlte::page')

@section('title','Home')

@section('content_header')
<h1>Ver Rol</h1>
@stop
    
@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="card-title">Descripción</h1>
    </div>
    <div class="card-body">
        <p>El equipo de profesionales está conformado por especialistas en Clínica Médica, que trabajan tanto en la atención primaria y preventiva de la salud, así como en la alta complejidad, con una importante labor en investigación y docencia.
           El Servicio da cobertura médica en nuestros Consultorios Externos, ya sea de Guardia o demanda programada  como en el Internado, en nuestra Terapia Intensiva, en nuestra Guardia Médica.</p>
    </div>
</div>
@stop

@section('ccs')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>console.log</script>
@stop    