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

            <div class="card">
                <form action="{{ route('saveEscuela')}}" method="POST">
                @csrf
                    <div class="card-header text-center">Crear nueva Escuela</div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="" class="col-2">Facultad</label>
                            <select name="fk_facultad"
                                    class="form-control @error('fk_facultad') is-invalid @enderror"
                                    id="facultad">

                            <option value="">-- Seleccione --</option>

                            @foreach ($facultades as $facultad)
                                <option value="{{ $facultad->pk_facultad }}" 
                                        {{ old('facultad') == $facultad->pk_facultad ? 'selected' : '' }}>
                                    {{ $facultad->nombreFacultad }}
                                </option>
                            @endforeach
                            </select>

                            @error('fk_facultad')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror   
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-2">Codigo</label>
                            <input  type="text" 
                                    name="codigo"   
                                    class="form-control col-md-9 @error('codigo') is-invalid @enderror" 
                                    id="nombre"
                                    value={{ old('codigo') }}>
                            @error('codigo')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror        
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">nombre</label>
                            <input  type="text" 
                                    name="nombreEscuela"   
                                    class="form-control col-md-9 @error('nombreEscuela') is-invalid @enderror" 
                                    id="nombre"
                                    value={{ old('nombreEscuela') }}>
                            @error('nombreEscuela')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
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