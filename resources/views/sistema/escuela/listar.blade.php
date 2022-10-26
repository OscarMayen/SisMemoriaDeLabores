@extends('adminlte::page')

@section('title','Lista de Escuelas')
@section('content_header')
    <h2 class="text-center mb-5">Escuelas de la facultad </h2>
@endsection

@section('content')
<div class="conteiner mt-2">
    <div class="card justify-content-center">
        <div class="card-header">
            <a class="btn btn-success mb-4" href="{{ route('formEscuela')  }}">Agregar Escuela</a>
            <table class="table table-bordered table-stripied text-center">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Facultad</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($escuela as $datos)
                    <tr>
                        <td>{{ $datos->pk_escuela }}</td>
                        <td>{{ $datos->nombreescuela }}</td>
                        <th>{{ $datos->pk_facultad }}</th>
                        <td width='10px'>
                            <a href="" class="btn btn-primary md-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </td>
                        <td width='10px'>
                            <form action="" class="eliminarRegistro">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $escuela->links() }}
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
@if (session('claveEliminarEscuelas')=='OK')
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
      text: "Esta facultad será eliminado permanentemente",
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