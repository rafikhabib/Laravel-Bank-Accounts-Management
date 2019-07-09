<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    public $timestamps = false;
    public function comments()
    {
        return $this->belongsTo('App\client');
    } 
    protected $fillable = [
        'codeBanq', 'codeGuichet', 'rib','clerib','titulaire','solde','devise'
    ];
}
