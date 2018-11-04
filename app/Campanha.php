<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campanha extends Model
{
    protected $fillable = [
        'nome', 'descricao', 'status', 'dataInicio', 'dataFim', 'destaque'
    ];

    public function users(){
        return $this->belongsToMany('App\User', 'user_campanhas', 'campanhas_id', 'users_id')->withTimestamps();
    }

    public function seguir(){
        return $this->belongsToMany('App\User', 'user_campanha_interesses', 'campanhas_id', 'users_id')->withPivot('interesse')->withTimestamps();
    }

    public function curtir(){
        return $this->belongsToMany('App\User', 'user_campanha_curtidas', 'campanhas_id', 'users_id')->withTimestamps();
    }

    public function itens(){
        return $this->belongsToMany('App\Item', 'campanha_items', 'campanhas_id', 'itens_id')->withTimestamps();
    }

    public function eventos(){
        return $this->hasMany('App\Evento', 'campanhas_id');
    }

    public function getDataInicioAttribute(){
        $dataInicio = explode('-', $this->attributes['dataInicio']);
        if(count($dataInicio) != 3){
            return"Não há!";
        }
        $dataInicio = $dataInicio[2] . '/' . $dataInicio[1] . '/' . $dataInicio[0];
        return $dataInicio;
    }

    public function getDataFimAttribute(){
        $dataFim = explode('-', $this->attributes['dataFim']);
        if(count($dataFim) != 3){
            return"Não há!";
        }
        $dataFim = $dataFim[2] . '/' . $dataFim[1] . '/' . $dataFim[0];
        return $dataFim;
    }

}
