@extends('adminlte::page')

@section('title','Home')

@section('content_header')
<h1>Asignar un rol</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre:</p>
            <p class="form-control">{{ $user->name }}</p>

            <h2 class="h5"> Listado de roles:</h2>
            {!! Form::model($user, ['route' => ['admin.usuarios.update', $user->id],'method'=>'put']) !!}  
                @foreach ($roles as $role)
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach
                <div class="form-control col-md-6">
                    <label for="activo">Usuario activo: &nbsp;</la{{ $user->name }}bel>
                    <input id="activo"name="activo" type="checkbox" @if ($user->activo==1) checked @endif">
                </div>
                <hr>
                <div class="form-group">
                <a class="btn btn-outline-primary" href="{{ route('admin.usuarios.index') }}">Regresar</a> &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="btn btn-success col-md-0" type="submit" value="Editar usuario">
</div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('ccs')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @livewireStyles()
@stop

@section('js')
    <script>console.log</script>
    @livewireScripts()
@stop    