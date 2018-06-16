<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    protected $fillable = [
        'titulo', 'capa', 'campanhas_id', 'eventos_id',
    ];
}
