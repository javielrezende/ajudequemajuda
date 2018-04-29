<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserUserCurtidaComentario extends Model
{
    protected $fillable = [
        'users_id', 'users_id1', 'curtidas', 'comentarios', 'denuncia', 'mensagem_denuncia'
    ];

}
