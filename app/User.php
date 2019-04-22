<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    
    use Notifiable;
    
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    * champs autorise pour la modification
    */
    protected $fillable = [
        'login', 'email', 'password'
    ];
    
    
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     * champs cacher dans le formulaire
     */
    protected $hidden = [
        'remember_token',
    ];
    
    
    
    public function bloquerU(){
        $this->hasOne('App\Ordinateur_user', user_id);
    }

}