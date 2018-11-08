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

    public function imagens(){
        return $this->hasMany('App\Imagem', 'eventos_id');
    }

    public function getDataHoraInicioAttribute(){
        $dataHoraInicio = explode('-', $this->attributes['dataHoraInicio']);
        if(count($dataHoraInicio) != 3){
            return"Sem data determinada";
        }
        $dataHoraInicio = $dataHoraInicio[2] . '/' . $dataHoraInicio[1] . '/' . $dataHoraInicio[0];
        return $dataHoraInicio;
    }

    public function getDia(){
        $dataHoraInicio = explode('-', $this->attributes['dataHoraInicio']);
        if(count($dataHoraInicio) != 3){
            return"";
        }
        $dia = $dataHoraInicio[2];
        return $dia;
    }

    public function getMesAttribute(){
        $dataHoraInicio = explode('-', $this->attributes['dataHoraInicio']);
        if(count($dataHoraInicio) != 3){
            return"";
        }

        //dd($dataHoraInicio[1]);

        if($dataHoraInicio[1] == "1"){
            return "JAN";
        }
        else if($dataHoraInicio[1] == "2"){
            return "FEV";
        }
        else if($dataHoraInicio[1] == "3"){
            return "MAR";
        }
        else if($dataHoraInicio[1] == "4"){
            return "ABR";
        }
        else if($dataHoraInicio[1] == "5"){
            return "MAI";
        }
        else if($dataHoraInicio[1] == "6"){
            return "JUN";
        }
        else if($dataHoraInicio[1] == "7"){
            return "JUL";
        }
        else if($dataHoraInicio[1] == "8"){
            return "AGO";
        }
        else if($dataHoraInicio[1] == "9"){
            return "SET";
        }
        else if($dataHoraInicio[1] == "10"){
            return "OUT";
        }
        else if($dataHoraInicio[1] == "11"){
            return "NOV";
        }
        else if($dataHoraInicio[1] == "12"){
            return "DEZ";
        }
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
