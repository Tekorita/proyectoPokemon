<?php

namespace proyectoPokemon;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    public function trainer(){
        return $this->belongsTo('proyectoPokemon\Trainer'); //aqui hacemos relacion de q un pokemon a un entreenador
    }
}
