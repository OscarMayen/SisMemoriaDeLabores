@extends('adminlte::page')

@section('title','Actividad crear')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-1">
            <!--Mensaje flash-->
            @if(session('claveGuardarEscuela'))
                <div class="alert alert-success">
                    {{ session('claveGuardarEscuela') }}
                </div>
            @endif

            <div class="card">
                <form action="{{route('actividad.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <h2><div class="card-header text-center">Crear Actividad</div> </h2>
                    <div class="card-body">
                        <div class="row form-group">
                            <label for="titulo" class="col-2">Titulo</label>
                            <input type="text"
                                name="titulo"
                                class="form-control col-md-6 @error('titulo') is-invalid @enderror"
                                id="titulo"
                                value={{ old('titulo') }}
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
                                id="fechaActividad"
                                value={{ old('fechaActividad') }}
                            >
                            @error('fechaActividad')
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
                                @foreach ($tiposActividad as $id => $nombre )
                                <option value="{{ $id }}"> {{ $nombre }} </option>
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
                                value={{ old('contenido') }}
                             >

                             <!-- style="height: 400px" -->
                             <trix-editor
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
                            <img id="imagenSeleccionada" style="max-height: 300px">
                        </div>

                        <div class="form-group">
                            <input name="imagen" id="imagen" type="file" />
                        </div>

                        <div class=" form-group">
                            <a  class="btn btn-outline-primary" href="{{route('actividad.index') }}">Regresar</a>
                            <button type="submit" class="btn btn-success col-md-0 ">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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

