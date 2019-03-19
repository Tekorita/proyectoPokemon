<?php

namespace proyectoPokemon\Http\Controllers;

use proyectoPokemon\Http\Controllers\Controller;

class PruebaController extends Controller {
    public function prueba($param){
        return 'Estoy dentro de pruebaController :D y recibi este parameto '.$param;
    }
}