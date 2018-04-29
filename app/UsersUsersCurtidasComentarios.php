<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersUsersCurtidasComentarios extends Model
{
    protected $fillable = [
        'users_id', 'users_id1', 'curtidas', 'comentarios',
    ];

    public function user(){
        return $this->belongsToMany('App\User', 'users_users_curtidas_comentarios', 'users_id', 'users_id1');
    }

}
