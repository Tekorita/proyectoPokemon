@extends('layouts.app')
@section('title','Trainer')

@section('content')            
<img style="margin: 20px; height: 200px; width: 200px; background-color:#EFEFEF" class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$trainer->avatar}}" alt="">        
    <div class="text-center">
        <h5 class="card-title">{{$trainer->name}}</h5>
            <p class="card-text">Some quick in the poke page we show the experience example text to build on the card title and make up the bulk of the card's content.</p>            
            <a href="/trainers/{{$trainer->slug}}/edit" class="btn btn-primary">Editar</a>    
    </div>
@endsection
 