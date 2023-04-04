@extends('adminlte::page')

@section('title', 'LianBlog')

@section('content_header')
    <h1>Crear Rol</h1>
@stop

@section('content')

    @if (session("info"))
    <div class="alert alert-success">
        <strong>{{ session("info") }}</strong>
    </div>
    @endif


    <div class="card">
        
        {!! Form::open(["route" => "admin.roles.store"]) !!}

            @include("admin.roles.partials.form")

            {!! Form::submit("Crear rol", ["class" => "btn btn-primary"]) !!}

        {!! Form::close() !!}
        
    </div>


    

@stop
