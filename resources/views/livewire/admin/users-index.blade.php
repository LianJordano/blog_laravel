<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" type="text" placeholder="Ingrese el nombre o correo de un usuario">
        </div>
        
        @if ($users->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user )
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td width="10px">
                                    <a class="btn btn-warning btn-sm" href="{{ route("admin.users.edit", $user) }}">Editar</a>
                                </td>
                            
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                <tfoot class="mt-3">{{ $users->links() }}</tfoot>
            </div>
        @else
            <div class="card-body">
                <strong>No hay Registros</strong>
            </div>
        @endif
            
    </div>
</div>
