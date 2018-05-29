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
}
