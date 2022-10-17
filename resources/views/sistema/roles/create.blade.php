@extends('adminlte::page')

@section('title','Home')

@section('content_header')
<h1>Crear Rol</h1>
@stop
    
@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}
                @include('sistema.roles.partials.form')
                {!! Form::submit('Crear Rol', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('ccs')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>console.log</script>
@stop    