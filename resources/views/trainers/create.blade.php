@extends('layouts.app')
@section('title','trainers create')

@section('content')

    <!-- FORMULARIO HECHO CON LARAVEL COLLECTIVE -->
    {!! Form::open(['route'=>'trainers.store', 'method' => 'POST', 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('name','Nombre') !!}
            {!! Form::text('name',null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
                {!! Form::label('slug','Slug') !!}
                {!! Form::text('slug',null, ['class'=>'form-control']) !!}
            </div>
        <div class="form-group">
            {!! Form::label('avatar','Avatar') !!}
            {!! Form::file('avatar') !!}
        </div>
        {!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}


    <!-- FORMULARIO HECHO CON HTML -->
    <!--
    <form class="form-group" method="POST" action="/trainers" enctype="multipart/form-data">
        @ csrf       
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Slug</label>
            <input type="text" name="slug" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Avatar</label>
            <input type="file" name="avatar"> <!-- para que se puedan enviar archivos en un formulario se agrega enctype="multipart/form-data" -->
<!--        </div>        
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
-->
@endsection
