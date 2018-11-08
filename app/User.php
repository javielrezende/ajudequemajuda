<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const USUARIO = 0;
    const ENTIDADE = 1;
    const ADMIN = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'name', 'email', 'password', 'imagem', 'cpf', 'cnpj', 'enderecos_id', 'fone', 'funcao', 'mensagem', 'solicitacao_entidade', 'descricao_entidade', 'status',
];

    public function endereco(){
        return $this->belongsTo('App\Endereco', 'enderecos_id');
    }

    public function campanhas(){
        return $this->belongsToMany('App\Campanha', 'user_campanhas', 'users_id', 'campanhas_id')->withTimestamps();
    }

    public function seguir(){
        return $this->belongsToMany('App\User', 'user_campanha_interesses', 'users_id', 'campanhas_id')->withPivot('interesse')->withTimestamps();
    }

    public function curtir(){
        return $this->belongsToMany('App\User', 'user_campanha_curtidas', 'users_id', 'campanhas_id')->withTimestamps();
    }

    public function users(){
        return $this->belongsToMany('App\User', 'user_user_curtida_comentarios', 'users_id', 'users_id1')->withPivot('curtidas', 'comentarios, denuncia, mensagem_denuncia')->withTimestamps();
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
