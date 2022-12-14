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

                {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary mt-2']) !!}
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