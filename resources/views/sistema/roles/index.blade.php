@extends('adminlte::page')

@section('title','Home')

@section('content_header')

<h1 class="text-center mb-5">Lista de Roles</h1>

@stop

@section('content')

@if (session('info'))
<div class="alert alert-success">
    {{ session('info') }}
</div>
@endif
<div class="conteiner mt-2">
    <div class="card justify-content-center">
        <div class="card-header">
            <div class="d-flex flex-row-reverse">
                <a href="{{ route ('admin.roles.create' ) }}" class="btn btn-success">Crear Rol</a>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Rol</th>
                            <th colspan="2"> Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td width='10px'>
                                <a href="{{ route ('admin.roles.edit', $role->id ) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            </td>
                            <td width='10px'>
                                <form action="{{ route('admin.roles.destroy', $role ) }}" method="POST" class="eliminarRegistro">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@stop


@section('ccs')
<link rel="stylesheet" href="css/sweetalert2.min.css">
@stop

@section('js')
<script src="{{ asset('static/js/sweetalert2.all.min.js') }}"></script>

<!-- Mensaje de confirmacion flash -->
@if (session('claveEliminar')=='OK')
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
      text: "Este rol será eliminado permanentemente",
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
