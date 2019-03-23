@extends('layouts.app')
@section('title','trainers Edit')

@section('content')
    <form class="form-group" method="POST" action="/trainers/{{$trainer->slug}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf       
        <div class="form-group">
            <label for="">Nombre</label>
        <input type="text" name="name" value="{{$trainer->name}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Avatar</label>
            <input type="file" name="avatar"> <!-- para que se puedan enviar archivos en un formulario se agrega enctype="multipart/form-data" -->
        </div>        
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    
@endsection

<!-- Los formularios de html no soportan las acciones put o path o delete por eso se utiliza el  de blade method('PUT') -->
