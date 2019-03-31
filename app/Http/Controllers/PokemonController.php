<?php

namespace proyectoPokemon\Http\Controllers;
use proyectoPokemon\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            return response()->json([
                ['id' => 1, 'name' => 'Picachu'],
                ['id' => 2, 'name' => 'Squirtle'],
                ['id' => 3, 'name' => 'Charizard'],
            ], 200); // 200 xq es una respuesta satisfactoria
        }
        return view('pokemons.index');
    }

    public function store(Request $request){
        if($request->ajax()){
            $pokemon = new Pokemon();
            $pokemon->name = $request->input('name');
            $pokemon->picture = $request->input('picture');
            $pokemon->save();
            return response()->json([
                "message" => "Pokemon creado correctamente" //segun json api donde creamos microservicios tenemos que responder http cuando la respuesta es satisfactoria se responde con el numero 200
            ], 200);
        }
    }
}
