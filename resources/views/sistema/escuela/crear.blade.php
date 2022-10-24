@extends('adminlte::page')

@section('title','Escuelas crear')

@section('content')
<div class="container mt-1">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-1">
            <!--Mensaje flash-->
            @if(session('claveGuardarEscuela'))
                <div class="alert alert-success">
                    {{ session('claveGuardarEscuela') }}
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
                <form action="{{ route('saveEscuela')}}" method="POST">
                @csrf
                    <div class="card-header text-center">Crear nueva Escuela</div>
                    <div class="card-body">
                        <div class="row form-group">
                            <label for="" class="col-2">ID escuela</label>
                            <input type="text" name="pk_escuela" class="form-control col-md-9">
                        </div>

                        <div class="form-group">
                            <label for="" class="col-2">Facultad</label>
                            <select name="pk_facultad"
                                    class="form-control"
                                    id="id">
                            <option value="">-- Seleccione --</option>
                            @foreach ($facultades as $id => $nombrefacultad)
                                <option value="{{ $id }}" 
                                {{ old('nombrefacultad') == $id ? 'selected' : '' }} >
                                    {{ $nombrefacultad }}
                                </option>
                            @endforeach
                            </select>
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-2">Codigo</label>
                            <input type="text" name="codigo" class="form-control col-md-9">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">nombre</label>
                            <input type="text" name="nombreescuela" class="form-control col-md-9">
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
<a class="btn btn-light btn-sm mt-2" href="{{ route('listEscuela') }}">&laquo Volver</a>
@stop