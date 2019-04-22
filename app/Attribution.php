<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribution extends Model 
{

    protected $table = 'attributions';
    public $timestamps = true;
    
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * champs autorise pour la modification
     */
    protected $fillable = [
        'reservation_id', 'date', 'h_debut', 'h_fin'
    ];
    
    
    
    
    
    
    

}