<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'descricao', 'quantidade',
    ];

    public function doacao(){
        return $this->belongsToMany('App\Doacao', 'item_doacaos', 'itens_id', 'doacoes_id');
    }

    public function campanha(){
        return $this->belongsToMany('App\Campanha', 'campanha_items', 'itens_id', 'campanhas_id');
    }
}
