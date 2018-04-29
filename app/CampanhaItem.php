<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampanhaItem extends Model
{
    protected $fillable = [
        'campanhas_id', 'itens_id',
    ];
}
