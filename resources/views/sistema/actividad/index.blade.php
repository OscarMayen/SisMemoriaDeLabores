@extends('adminlte::page')

@section('title','Lista de Facultades')
@section('content_header')
    <h2 class="text-center mb-5">Listado de Actividades</h2>
@endsection

@section('content')

@if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

<div class="conteiner mt-2">
    <div class="card justify-content-center">
        <div class="card-header">
            <a class="btn btn-success mb-4" href="{{ route('actividad.create') }}" >Nuevo</a>
            <table class="table table-bordered table-stripied text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TITULO</th>
                        <th>FECHA</th>
                        <th>ESTADO</th>
                        <th>TIPO</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($actividades as $actividad)
                    <tr>
                        <td>{{ $actividad->id}}</td>
                        <td>{{ $actividad->titulo}}</td>
                        <td>{{ $actividad->fechaActividad}}</td>
                        <td>{{ $actividad->estado}}</td>
                        <td>{{ $actividad->tipoActividades->nombre }}</td>
                        <td width='10px'>
                            <a href="{{ route ('actividad.edit', $actividad->id) }}" class="btn btn-primary md-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </td>
                        <td width='10px'>
                            <a  class="btn btn-primary md-1">
                                Revision
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('ccs')
<link rel="stylesheet" href="css/sweetalert2.min.css">
@stop

@section('js')
<script src="{{ asset('static/js/sweetalert2.all.min.js') }}"></script>

<!-- Mensaje de confirmacion flash -->
@if (session('claveEliminarTipoActividad')=='OK')
    <script>
        Swal.fire(
            '¡Eliminado!',
            'Registro eliminado con éxito',
            'success'
        )
    </script>
@endif

<script type="text/javascript">
    $('.eliminarRegistro').submit(function(e){
    e.preventDefault();
    Swal.fire({
      title: '¿Estás seguro?',
      text: "Esta categoria será eliminado permanentemente",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: '¡Sí, Eliminar!'
    }).then((result) => {
        if (result.value) {
            this.submit();
        }
    })
    });
</script>
@stop
