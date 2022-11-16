@extends('adminlte::page')

@section('title','Tipo actividad crear')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-1">
            <!--Mensaje flash-->
            @if(session('status_success'))
                <div class="alert alert-success">
                    {{ session('status_success') }}
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
                <form action="{{route('tipoActividad.update', $tipoActividad->id)}}" method="POST">
                @csrf
                @method('PUT')

                   <h3><div class="card-header text-center">Editar tipo de actividad</div></h3> 
                    <div class="card-body">
                        <div class="row form-group">
                            <label for="" class="col-2">ID</label>
                            <input type="text" name="id" value="{{$tipoActividad->id}}"
                            class="form-control col-md-9" readonly>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">Nombre</label>
                            <input type="text" name="nombre" value="{{$tipoActividad->nombre}}"
                            class="form-control col-md-9">
                        </div>
                        <div class="form-group">
                        <a class="btn btn-outline-primary" href="{{ route('tipoActividad.index') }}">Regresar</a>
                            <button type="submit" class="btn btn-success col-md-0">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop
