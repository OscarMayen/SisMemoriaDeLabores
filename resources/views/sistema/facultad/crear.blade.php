@extends('adminlte::page')

@section('title','Facultad crear')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-1">
            <!--Mensaje flash-->
            @if(session('claveGuardarFacultad'))
            <div class="alert alert-success">
                {{ session('claveGuardarFacultad') }}
            </div>
            @endif

            <!--Validación de errores-->
            <!-- @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$errors}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif -->

            <div class="card">
                <form action="{{ route('saveFacultad')}}" method="POST" novalidate>
                    @csrf
                    <h2>
                        <div class="card-header text-center">Crear facultad</div>
                    </h2>
                    <div class="card-body">

                        <div class="row form-group">
                            <label for="" class="col-2">Codigo</label>
                            <input type="text" name="codigo" class="form-control col-md-9 @error('codigo') is-invalid @enderror" id="codigo" value={{ old('titulo') }}>
                            @error('codigo')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-2">Nombre</label>
                            <input type="text" name="nombreFacultad" class="form-control col-md-9 @error('nombreFacultad') is-invalid @enderror" id="nombre" value={{ old('nombreFacultad') }}>
                            @error('nombreFacultad')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <a class="btn btn-outline-primary" href="{{ route('listFacultad') }}">Regresar</a>
                            <button type="submit" class="btn btn-success col-md-0">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop