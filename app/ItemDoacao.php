<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDoacao extends Model
{
    protected $fillable = [
        'itens_id', 'doacoes_id',
    ];
}
