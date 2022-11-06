@extends('adminlte::page')

@section('title','Facultad Editar')

@section('content')
<div class="container mt-1">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-1">
            <!--Mensaje flash-->
            @if(session('claveEditarFacultad'))
                <div class="alert alert-success">
                    {{ session('claveEditarFacultad') }}
                </div>
            @endif

            <!--Validación de errores-->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$errors}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <form action="{{ route('editFacultad', $facultad->pk_facultad) }}" method="POST">
                @csrf @method('PATCH')
                    <div class="card-header text-center">MODIFICAR FACULTAD</div>
                    <div class="card-body">
                        <div class="row form-group">
                            <label for="" class="col-2">Codigo</label>
                            <input type="text" name="codigo" class="form-control col-md-9" 
                            value="{{ $facultad->codigo }}">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">Nombre</label>
                            <input type="text" name="nombreFacultad" class="form-control col-md-9" 
                            value="{{ $facultad->nombreFacultad }}">
                        </div>
                        <div class="row form-group">
                            <button type="submit" class="btn btn-success col-md-9 offset-2">Modificar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<a class="btn btn-light btn-sm mt-2" href="{{ route('listFacultad') }}">&laquo Volver</a>
@stop