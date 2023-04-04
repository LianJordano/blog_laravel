@extends('adminlte::page')

@section('title', 'LianBlog')

@section('content_header')
    <h1>Listado de roles</h1>
@stop

@section('content')

    @if (session("info"))
    <div class="alert alert-success">
        <strong>{{ session("info") }}</strong>
    </div>
    @endif


<div class="card-header">
   {{--  @can("admin.roles.create") --}}
        <a class="btn btn-secondary float-right" href="{{ route("admin.roles.create") }}">Agregar rol</a>
   {{--  @endcan --}}
</div>

    <div class="card">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Rol</th>
                    <th colspan="2"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($roles as $role )
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td width="10px">
                            <a class="btn btn-sm btn-warning" href="{{ route("admin.roles.edit", $role) }}">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{ route("admin.roles.destroy", $role) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <tfoot>
            {{ $roles->links("pagination::bootstrap-4") }}
        </tfoot>
    </div>

@stop
