@extends('layouts.app')
@section('title','Trainer')

@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <img style="margin: 20px; height: 200px; width: 200px; background-color:#EFEFEF" class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$trainer->avatar}}" alt="">        
    <div class="text-center">
        <h5 class="card-title">{{$trainer->name}}</h5>
            <p class="card-text">Some quick in the pokemon page we show the experience| example text to build on the card title and make up easy the bulk of the card's content.</p>            
            <a href="/trainers/{{$trainer->slug}}/edit" class="btn btn-primary">Editar</a>    
        {!! Form::open(['route' => ['trainers.destroy', $trainer->slug], 'method' => 'DELETE']) !!}
            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
@endsection

 