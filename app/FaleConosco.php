<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaleConosco extends Model
{
    protected $fillable = [
        'nome', 'email', 'cidade', 'status', 'estado', 'fone', 'mensagem'
    ];
}
