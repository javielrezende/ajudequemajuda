<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campanha extends Model
{
    protected $fillable = [
        'nome', 'descricao', 'status', 'dataInicio', 'dataFim',
    ];

    public function users(){
        return $this->belongsToMany('App\User', 'user_campanha_curtida_interesses', 'campanhas_id', 'users_id');
    }

    public function itens(){
        return $this->belongsToMany('App\Item', 'campanha_items', 'campanhas_id', 'itens_id');
    }

    public function getDataInicioAttribute(){
        $dataInicio = explode('-', $this->attributes['dataInicio']);
        if(count($dataInicio) != 3){
            return"Data não formatada corretamente";
        }
        $dataInicio = $dataInicio[2] . '/' . $dataInicio[1] . '/' . $dataInicio[0];
        return $dataInicio;
    }

    public function getDataFimAttribute(){
        $dataFim = explode('-', $this->attributes['dataFim']);
        if(count($dataFim) != 3){
            return"Data não formatada corretamente";
        }
        $dataFim = $dataFim[2] . '/' . $dataFim[1] . '/' . $dataFim[0];
        return $dataFim;
    }

}
