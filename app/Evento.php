<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'nome', 'descricao', 'dataHoraInicio', 'dataHoraInicio1', 'dataHoraFim', 'dataHoraFim1',  'campanhas_id', 'status', 'enderecos_id',
    ];

    public function campanhas(){
        return $this->belongsTo('App\Campanha', 'campanhas_id');
    }

    public function enderecos(){
        return $this->belongsTo('App\Endereco', 'enderecos_id');
    }

    public function getDataHoraInicioAttribute(){
        $dataHoraInicio = explode('-', $this->attributes['dataHoraInicio']);
        if(count($dataHoraInicio) != 3){
            return"Sem data determinada";
        }
        $dataHoraInicio = $dataHoraInicio[2] . '/' . $dataHoraInicio[1] . '/' . $dataHoraInicio[0];
        return $dataHoraInicio;
    }

    public function getDataHoraFimAttribute(){
        $dataHoraFim = explode('-', $this->attributes['dataHoraFim']);
        if(count($dataHoraFim) != 3){
            return"Sem data determinada";
        }
        $dataHoraFim = $dataHoraFim[2] . '/' . $dataHoraFim[1] . '/' . $dataHoraFim[0] . '';
        return $dataHoraFim;
    }
}
