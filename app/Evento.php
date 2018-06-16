<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'descricao', 'dataInicio', 'dataFim', 'campanhas_id', 'status', 'enderecos_id',
    ];

    public function campanhas(){
        return $this->belongsTo('App\Campanha', 'campanhas_id');
    }

    public function enderecos(){
        return $this->belongsTo('App\Endereco', 'enderecos_id');
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
