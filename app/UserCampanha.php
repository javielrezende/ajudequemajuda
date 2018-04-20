<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCampanha extends Model
{
    protected $fillable = [
        'users_id', 'campanhas_id',
    ];
}
