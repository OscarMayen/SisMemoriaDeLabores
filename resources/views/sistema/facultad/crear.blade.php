@extends('adminlte::page')

@section('title','Facultad crear')

@section('content')
<div class="container mt-1">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-1">
            <!--Mensaje flash-->
            @if(session('claveGuardarFacultad'))
                <div class="alert alert-success">
                    {{ session('claveGuardarFacultad') }}
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
                <form action="{{ route('saveFacultad')}}" method="POST">
                @csrf
                    <div class="card-header text-center">CREAR FACULTAD</div>
                    <div class="card-body">
                        <div class="row form-group">
                            <label for="" class="col-2">ID</label>
                            <input type="text" name="pk_facultad" class="form-control col-md-9">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">Nombre</label>
                            <input type="text" name="nombrefacultad" class="form-control col-md-9">
                        </div>
                        <div class="row form-group">
                            <button type="submit" class="btn btn-success col-md-9 offset-2">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<a class="btn btn-light btn-sm mt-2" href="{{ route('listFacultad') }}">&laquo Volver</a>
@stop