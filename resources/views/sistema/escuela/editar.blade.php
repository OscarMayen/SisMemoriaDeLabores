@extends('adminlte::page')

@section('title','Escuelas Editar')

@section('content')
<div class="container mt-1">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-1">
            <!--Mensaje flash-->
            @if(session('claveEditarEscuela'))
                <div class="alert alert-success">
                    {{ session('claveEditarEscuela') }}
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
                <form action="{{ route('editEscuela', $escuela->pk_escuela)}}" method="POST">
                @csrf @method('PATCH')
                   <h3><div class="card-header text-center">Editar escuela</div></h3>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="" class="col-2">Facultad</label>
                            <select name="fk_facultad"
                                    class="form-control" 
                                    id="facultad">
                            <option value="">-- Seleccione --</option>
                            @foreach ($facultades as $facultad)
                                <option value="{{ $facultad->pk_facultad }}" {{ $escuela->fk_facultad == $facultad->pk_facultad ? 'selected' : '' }}>
                                    {{ $facultad->nombreFacultad }}
                                </option>
                            @endforeach
                            </select>
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-2">Codigo</label>
                            <input type="text" name="codigo" class="form-control col-md-9" 
                            value="{{ $escuela->codigo }}">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">nombre</label>
                            <input type="text" name="nombreEscuela" class="form-control col-md-9" 
                            value="{{ $escuela->nombreEscuela }}">
                        </div>
                        <div class="form-group">
                        <a class="btn btn-outline-primary" href="{{ route('listEscuela') }}">Regresar</a>
                            <button type="submit" class="btn btn-success col-md-0">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop