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
    'name', 'email', 'password', 'imagem', 'cpf', 'cnpj', 'enderecos_id', 'fone', 'entidade', 'mensagem', 'solicitacao_entidade', 'descricao_entidade', 'status',
];

    public function endereco(){
        return $this->belongsTo('App\Endereco', 'enderecos_id');
    }

    public function campanhas(){
        return $this->belongsToMany('App\Campanha', 'user_campanha_curtida_interesses', 'users_id', 'campanhas_id');
    }

    public function users(){
        return $this->belongsToMany('App\User', 'user_user_curtida_comentarios', 'users_id', 'users_id1');
    }

    /*public function user(){
        return $this->belongsToMany('App\User', 'users_users_curtidas_comentarios', 'users_id1', 'users_id');
    }*/


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
