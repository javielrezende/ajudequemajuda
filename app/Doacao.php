<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doacao extends Model
{
    protected $fillable = [
        'quantidade', 'users_id', 'campanhas_id', 'confirmacao',
    ];

    public function user(){
        return $this->belongsTo('App\User', 'users_id');
    }

    public function campanha(){
        return $this->belongsTo('App\Campanha', 'campanhas_id');
    }

    public function item(){
        return $this->belongsToMany('App\Item', 'item_doacaos', 'doacoes_id', 'itens_id');
    }
}
