<?php

namespace proyectoPokemon\Http\Controllers;
use proyectoPokemon\Pokemon;
use proyectoPokemon\Trainer;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index(Trainer $trainer, Request $request){
        if($request->ajax()){
            $pokemons = $trainer->pokemons;
            //$pokemons = Pokemon::all(); //orm de laravel para consultar o mapear todos los objects o pokemones
            return response()->json($pokemons, 200); // 200 xq es una respuesta satisfactoria
            //return response()->json($pokemons, 200);
        }
        return view('pokemons.index');
    }

    public function store(Trainer $trainer, Request $request){
        if($request->ajax()){
            $pokemon = new Pokemon();
            $pokemon->name = $request->input('name');
            $pokemon->picture = $request->input('picture');
            //$pokemon->save();
            $pokemon->trainer()->associate($trainer)->save();
            return response()->json([
                //"trainer" => $trainer,
                "message" => "Pokemon creado correctamente", //segun json api donde creamos microservicios tenemos que responder http cuando la respuesta es satisfactoria se responde con el numero 200
                "pokemon" => $pokemon
            ], 200);
        }
    }
}
