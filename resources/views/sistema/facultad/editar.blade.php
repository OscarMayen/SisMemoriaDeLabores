@extends('adminlte::page')

@section('title','Facultad Editar')

@section('content')
<div class="container-fluid">
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
                <h3><div class="card-header text-center">Editar facultad</div> </h3>
                    
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
                        <div class="form-group">
                        <a class="btn btn-outline-primary" href="{{ route('listFacultad') }}">Regresar</a>
                            <button type="submit" class="btn btn-success col-md-0">Editar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop