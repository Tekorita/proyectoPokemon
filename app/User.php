<?php

namespace proyectoPokemon;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function roles(){
        return $this->belongsToMany('proyectoPokemon\Role');//relacion muchos a muchos
    }

    //esta validacion es para autorizar el pase de usuario luego de verificar si tiene algun role
    public function authorizeRoles($roles){
        if($this->hasAnyRole($roles)){
            return true;
        }
        abort(401,'This action is unauthorized');
    }

    //esta validacion verifica si tiene varios arreglos osea si es un arreglo o no lo es cuando tienen un solo rol
    public function hasAnyRole($role){
        if(is_array($roles)){
            foreach ($roles as $role) {
                if($this->hasRole($role)){
                    return true;
                }
            }
        } else {
            if($this->hasRole($roles)){
                return true;
            }
        }
    }

    //Esta validacion es para verificar que un usario tenga un rol
    public function hasRole($role){ 
        if($this->roles()->where('name',$role)->first()){ 
            return true;
        }
        return false;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
