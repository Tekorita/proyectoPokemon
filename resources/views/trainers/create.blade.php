@extends('layouts.app')
@section('title','trainers create')

@section('content')

    <!-- FORMULARIO HECHO CON LARAVEL COLLECTIVE -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach 
            </ul>
        </div>
        
    @endif
    {!! Form::open(['route'=>'trainers.store', 'method' => 'POST', 'files' => true]) !!}
        @include('trainers.form')
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
