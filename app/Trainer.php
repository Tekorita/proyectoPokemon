<?php

namespace proyectoPokemon;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = ['name', 'avatar'];
    /**
 * Get the route key for the model.
 *
 * @return string
 */
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function pokemons(){
        return $this->hasMany('proyectoPokemon\Pokemon'); //aqui hacemos relacion de q un entrenador tendra muchos pokemones
    }

}
