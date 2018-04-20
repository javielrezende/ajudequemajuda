<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    protected $fillable = [
        'nome', 'email', 'mensagem', 'solicitacao_entidade',
    ];
}
