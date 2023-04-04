<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" type="text" placeholder="Ingrese el nombre de un post">
    </div>
    
    @if ($posts->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead >
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($posts as $post )
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->name }}</td>
                            <td width="10px">
                                <a class="btn btn-warning btn-sm" href="{{ route("admin.posts.edit", $post) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action=" {{ route("admin.posts.destroy", $post) }} " method="post">
                                    @csrf
                                    @method("DELETE")
                                    <input class="btn btn-danger btn-sm" type="submit" value="Eliminar">
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>
        </div>

        <div class="card-footer">
            {{ $posts->links() }}
        </div> 
    @else
        <div class="card-body text-center">
            <strong>No hay registros creados</strong>
        </div>
    @endif
    
         

</div>
