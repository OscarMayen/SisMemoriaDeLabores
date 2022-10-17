@extends('adminlte::page')

@section('title','Home')
    
@section('content_header')
    <a href="{{ route ('admin.usuarios.create') }}" class="btn btn-sm btn-secondary float-right">Crear Usuario</a>
    <h1>Lista de usuarios</h1>
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