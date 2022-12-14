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
@stop

@section('js')
    <script>console.log</script>
@stop    