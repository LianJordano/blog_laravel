@extends('adminlte::page')

@section('title', 'LianBlog')

@section('content_header')
    <h1>Listado de categorías</h1>
@stop

@section('content')

    @if (session("info"))
    <div class="alert alert-success">
        <strong>{{ session("info") }}</strong>
    </div>
    @endif


    <div class="card">

        <div class="card-header">
            @can("admin.categories.create")
                <a class="btn btn-secondary float-right" href="{{ route("admin.categories.create") }}">Agregar Categoría</a>
            @endcan
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td width="10px" >
                                @can("admin.categories.edit")
                                    <a class="btn btn-warning btn-sm" href="{{ route("admin.categories.edit", $category) }}">Editar</a>
                                @endcan
                            </td>
                            <td width="10px" >
                                @can("admin.categories.destroy")
                                    <form action="{{ route("admin.categories.destroy", $category) }}" method="post">
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
