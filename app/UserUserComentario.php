<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserUserComentario extends Model
{
    protected $fillable = [
        'users_id', 'users_id1', 'comentarios'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'users_id1');
    }
}