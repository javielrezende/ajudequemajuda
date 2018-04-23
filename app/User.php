<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'cpf', 'cnpj', 'enderecos_id', 'fone', 'entidade',
    ];

    public function endereco(){
        return $this->belongsTo('App\Endereco', 'enderecos_id');
    }

    public function campanha(){
        return $this->belongsToMany('App\Campanha', 'users_has_campanhas', 'users_id', 'campanhas_id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
