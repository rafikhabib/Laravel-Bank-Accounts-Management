<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class client extends Model
{
    public $timestamps = false;
    public function comptes()
    {
        return $this->hasMany('App\Compte','titulaire');
    } 
}
