@extends('adminlte::page')

@section('title','Home')
    
@section('content_header')
   
<h2 class="text-center mb-5">Listado de Usuarios</h2>

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
