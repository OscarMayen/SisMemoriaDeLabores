@extends('adminlte::page')

@section('title','Lista de Facultades')
@section('content_header')
    <h2 class="text-center mb-5">Facultades del Campus UES</h2>
@endsection

@section('content')
<div class="conteiner mt-2">
    <div class="card justify-content-center">
        <div class="card-header">
            <div class="d-flex flex-row-reverse">
            <a class="btn btn-success mb-4" href="{{ route('formFacultad')  }}">Agregar Facultad</a>
            </div>
            <table class="table table-bordered table-stripied text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($facultad as $datos)
                    <tr>
                        <td>{{ $datos->pk_facultad }}</td>
                        <td>{{ $datos->codigo }}</td>
                        <td>{{ $datos->nombreFacultad }}</td>
                        <td width='10px'>
                            <a href="{{ route('editFormFacultad', $datos->pk_facultad) }}" class="btn btn-primary md-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </td>
                        <td width='10px'>
                            <form action="{{ route('deleteFacultad', $datos->pk_facultad) }}" method="POST" class="eliminarRegistro">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $facultad->links() }}
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
@if (session('claveEliminarFacultades')=='OK')
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