@extends('adminlte::page')

@section('title','Home')

@section('content_header')
<h1>Editar Rol</h1>
@stop
    
@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route' => ['admin.roles.update', $role->id], 'method'=>'put']) !!}
            @include('sistema.roles.partials.form')
            <div class="form-group">
                <a class="btn btn-outline-primary" href="{{ route('admin.roles.index') }}">Cancelar</a> &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="btn btn-success col-md-0" type="submit" value="Editar Rol">
            </div>
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