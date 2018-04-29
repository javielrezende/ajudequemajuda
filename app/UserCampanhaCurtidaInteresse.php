<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCampanhaCurtidaInteresse extends Model
{
    protected $fillable = [
        'users_id', 'campanhas_id', 'curtidas', 'interesse',
    ];

}
