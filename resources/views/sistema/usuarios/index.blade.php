@extends('adminlte::page')

@section('title','Home')
    
@section('content_header')
   
    <h1>Lista de usuarios</h1>
    <a href="{{ route ('admin.usuarios.create') }}" class="btn btn-success">Crear Usuario</a>
@stop

@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        {{ session('info') }}
    </div>
    @endif

    @livewire('admin.usuarios-index')
@stop
@section('ccs')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @livewireStyles()
@stop

@section('js')
    <script>console.log</script>
    @livewireScripts()
@stop    