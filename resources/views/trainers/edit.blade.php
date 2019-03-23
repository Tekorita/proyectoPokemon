@extends('layouts.app')
@section('title','trainers Edit')

@section('content')
 <!-- FORMULARIO HECHO CON LARAVEL COLLECTIVE -->
    {!! Form::model($trainer, ['route' => ['trainers.update', $trainer],'method' =>'PUT','files' => true]) !!}
        @include('trainers.form')
        {!! Form::submit('Editar', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
    
    <!-- FORMULARIO HECHO CON HTML -->
    <!--
    <form class="form-group" method="POST" action="/trainers/{ {$trainer->slug}}" enctype="multipart/form-data">
        @ method('PUT')
        @ csrf       
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" name="name" value="{ {$trainer->name}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Slug</label>
            <input type="text" name="slug" value="{ {$trainer->slug}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Avatar</label>
            <input type="file" name="avatar"> <!-- para que se puedan enviar archivos en un formulario se agrega enctype="multipart/form-data" -->
    <!--    </div>        
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
-->
@endsection

<!-- Los formularios de html no soportan las acciones put o path o delete por eso se utiliza el  de blade method('PUT') -->
