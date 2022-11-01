@extends('adminlte::page')

@section('title','Actividad crear')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@section('content')
<div class="container mt-1">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-1">
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
                <form method="POST">
                @csrf
                    <div class="card-header text-center">Nueva Actividad</div>
                    <div class="card-body">
                        <div class="row form-group">
                            <label for="titulo" class="col-2">Titulo</label>
                            <input type="text" name="titulo" class="form-control col-md-6">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-2">Fecha de actividad</label>
                            <input type="text" name="fecha" class="form-control col-md-6">
                        </div>

                        <div class="form-group">
                            <label for="tipoActividad" class="col-2">Tipo de actividad</label>
                            <select name="tipoActividad_id"
                                    class="form-control col-md-6"
                                    id="tipoActividad">
                                <option value="">-- Seleccione --</option>
                                @foreach ($tiposActividad as $id => $nombre )
                                <option value="{{ $id }}"> {{ $nombre }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="contenido" class="col-2">Contenido</label>
                            <input type="hidden" name="contenido" class="form-control col-md-6">
                            <trix-editor input="contenido"></trix-editor>
                        </div>

                        <div class=" form-group">
                            <button type="submit" class="btn btn-success col-md-3 ">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<a class="btn btn-light btn-sm mt-2" href="{{ route('actividad.index') }}">&laquo Volver</a>
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

