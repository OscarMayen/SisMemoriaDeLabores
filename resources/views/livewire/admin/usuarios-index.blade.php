<div>
    {{-- Do your work, then step back. --}}
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Ingrese nombre o correo para buscar">
            {{-- <h1>{{ $search }}</h1> --}}
        </div>

        @if ($users -> count())
            <div class="card-body">
                <div class="table">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td width='10px'>
                                        <a class="btn btn-primary" href="{{ route('admin.usuarios.edit', $user) }}">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay resultados.</strong>
            </div>
        @endif
    </div>
</div>
