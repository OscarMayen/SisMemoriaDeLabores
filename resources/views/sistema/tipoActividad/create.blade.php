@extends('adminlte::page')

@section('title','Tipo actividad crear')

@section('content')
<div class="container mt-1">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-1">
            <!--Mensaje flash-->
            @if(session('status_success'))
                <div class="alert alert-success">
                    {{ session('status_success') }}
                </div>
            @endif

            <div class="card">
                <form action="{{route('tipoActividad.store')}}" method="POST" novalidate>
                @csrf
                    <div class="card-header text-center">CREAR TIPO ACTIVIDAD</div>
                    <div class="card-body">
                        <div class="row form-group">
                            <label for="" class="col-2">Nombre</label>
                            <input type="text" name="nombre" class="form-control col-md-9">
                        </div>

                        @error('nombre')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            <br>
                        @enderror

                        <div class="row form-group">
                            <button type="submit" class="btn btn-success col-md-9 offset-2">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<a class="btn btn-light btn-sm mt-2" href="{{ route('tipoActividad.index') }}">&laquo Volver</a>
@stop
