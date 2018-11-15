<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserUserDenuncia extends Model
{
    protected $fillable = [
        'users_id', 'users_id1', 'denuncia', 'mensagem_denuncia'
    ];
}
