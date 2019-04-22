<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordinateur_user extends Model 
{

    protected $table = 'ordinateurs_users';
    public $timestamps = true;
    
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * champs autorise pour la modification
     */
    protected $fillable = [
        'ordinateur_id', 'user_id'
    ];
    


}