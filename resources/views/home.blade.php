@extends('adminlte::page')

@section('title','Home')

@section('content_header')
<h1 class="text-center">Bienvenidos al Sistema para la creación de la Memoria de Labores</h1>
@stop
    
@section('content')
<div class="card">
    <div class="card-header">
        <h3><i>Descripción</i></h3>
    </div>
<div class="card-body">
    
      <center> 
    <div class="content">
        <h2><img src="vendor/adminlte/dist/img/UESlogo.png"  alt="Cinque Terre" width="167" height="211"></h2><br>
    </div>
        <h4>La memoria de labores anual es una herramienta que permite mantener informados a todos los miembros de la comunidad universitaria, 
            en especial a los decanos, vicedecanos y miembros de la Asamblea General Universitaria, 
            sobre las diferentes actividades, proyectos, etc. que se realizan en la institución.</h4>
    </div> </center>  

</div>
@stop

@section('ccs')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
@stop

@section('js')
<script src="{{ asset('static/js/sweetalert2.all.min.js') }}"></script>
@if (($message) == 'sinRol')
    <script>
        $( document ).ready(function() {
            Swal.fire('Información!','Su usuario no tiene asignado un Rol<br>Contacte al administrador para que le asigne uno.','warning')
        });
    </script>
@endif
@stop
