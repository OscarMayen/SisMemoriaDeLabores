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

            <div class="card">
                <form action="{{route('actividad.update', $actividad->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-header text-center">Nueva Actividad</div>
                    <div class="card-body">
                        <div class="row form-group">
                            <label for="id" class="col-2">ID</label>
                            <input type="text"
                                name="id"
                                value="{{$actividad->id}}"
                                class="form-control col-md-6" readonly>
                        </div>

                        <div class="row form-group">
                            <label for="titulo" class="col-2">Titulo</label>
                            <input type="text"
                                name="titulo"
                                class="form-control col-md-6 @error('titulo') is-invalid @enderror"
                                id="titulo"
                                value="{{$actividad->titulo}}"
                            >
                            @error('titulo')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <br>
                            @enderror
                        </div>

                        <div class="row form-group">
                            <label for="fechaActividad" class="col-2">Fecha de actividad</label>
                            <input type="text"
                                name="fechaActividad"
                                class="form-control col-md-6 @error('fechaActividad') is-invalid @enderror"
                                value="{{$actividad->fechaActividad}}"
                            >
                            @error('titulo')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            <br>
                        @enderror

                        </div>

                        <div class="form-group">
                            <label for="tipoActividad_id" class="col-2">Tipo de actividad</label>

                            <select name="tipoActividad_id"
                                    class="form-control col-md-6"
                                    id="tipoActividad_id">
                                <option value="">-- Seleccione --</option>

                                @foreach ($tiposActividad as $tipo )
                                    <option
                                    value="{{ $tipo->id }}"
                                    {{ $actividad->tipoActividad_id == $tipo->id ? 'selected' : '' }}
                                    > {{ $tipo->nombre }} </option>
                                @endforeach
                            </select>
                        </div>

                        @error('tipoActividad_id')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            <br>
                        @enderror

                        <div class="form-group">
                            <label for="contenido" class="col-2">Contenido</label>
                            <input type="hidden"
                                name="contenido"
                                id="contenido"
                                value={{ $actividad->contenido }}
                             >
                             <trix-editor style="height: 400px"
                                class="form-control @error('contenido') is-invalid @enderror"
                                 input="contenido"></trix-editor>

                             @error('contenido')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <br>
                             @enderror
                        </div>

                         <!--Para ver la imagen seleccionada  -->
                         <div class="form-group">
                            <img src="/imagen/{{ $actividad->imagen}}" width="200px" id="imagenSeleccionada">
                        </div>

                        <div class="form-group">
                            <input name="imagen" id="imagen" type="file" />
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
    <script >
        $(document).ready (function (e) {
            $('#imagen').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#imagenSeleccionada').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            } );
        });
    </script>


