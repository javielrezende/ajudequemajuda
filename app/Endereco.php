<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'rua', 'numero', 'complemento', 'cidade', 'cep', 'estado',
    ];

    public function user(){
        return $this->belongsToMany('App\User', 'users_has_campanhas', 'campanhas_id', 'users_id');
    }
}
