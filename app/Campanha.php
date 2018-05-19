<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campanha extends Model
{
    protected $fillable = [
        'nome', 'descricao', 'status', 'dataInicio', 'dataFim',
    ];

    public function users(){
        return $this->belongsToMany('App\User', 'user_campanha_curtida_interresses', 'campanhas_id', 'users_id');
    }

    public function itens(){
        return $this->belongsToMany('App\Item', 'campanha_items', 'campanhas_id', 'itens_id');
    }
}
