<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campanha extends Model
{
    protected $fillable = [
        'nome', 'descricao', 'urgencia',
    ];

    public function user(){
        return $this->belongsToMany('App\User', 'users_has_campanhas', 'campanhas_id', 'users_id');
    }
}
