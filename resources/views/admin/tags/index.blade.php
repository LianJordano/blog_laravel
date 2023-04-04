@extends('adminlte::page')

@section('title', 'LianBlog')

@section('content_header')
    <h1>Listado de Etiquetas</h1>
@stop

@section('content')

@if (session("info"))
    <div class="alert alert-success">
        <strong>{{ session("info") }}</strong>
    </div>
@endif

    <div class="card">

        <div class="card-header">
            @can("admin.tags.create")
                <a class="btn btn-secondary float-right" href="{{ route("admin.tags.create") }}">Agregar Etiqueta</a>
            @endcan
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Color</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->color }}</td>
                            <td width="10px">
                                @can("admin.tags.edit")
                                    <a class="btn btn-warning btn-sm" href="{{ route("admin.tags.edit", $tag) }}">Editar</a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can("admin.tags.destroy")
                                    <form action=" {{route("admin.tags.destroy",$tag)}}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <input class="btn btn-danger btn-sm" type="submit" value="Eliminar">
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
